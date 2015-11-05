<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Courier extends CI_Controller {
	public function __construct(){
		parent::__construct();
		if(!$this->ion_auth->logged_in()){
			redirect('auth/login');
		}
		// courier
		if (!$this->ion_auth->in_group("courier")){
			exit;
		}
	}
	public function index(){
		$today = @date("d-m-Y");
		$tomorrow = @date('d-m-Y', strtotime($today. ' + 1 days'));
		$tomorrow = str_replace("-", "/", $tomorrow);
		$data["courier_details"] = $this->db->query("SELECT ecs_schedules.*, ecs_status.status, ecs_investors.name FROM ecs_schedules inner join ecs_status on ecs_schedules.investor_id = ecs_status.investor_id inner join ecs_investors on ecs_status.investor_id = ecs_investors.invuser_id where ecs_schedules.date_of_pickup like '".$tomorrow."%' AND (ecs_status.status = 'scheduled' OR ecs_status.status = 'rescheduled');")->result();
		$this->load->view("admin/courier_screen", $data);
	}
	public function down_excel(){
		// validate download
		$dump_data = $this->db->query("select * from ecs_excel_dump_counts where upload_count != download_count;")->result();
		if(count($dump_data) > 0){
			foreach($dump_data as $dump_data_row){
				echo "Upload data for ".$dump_data_row->dump_date;
				echo "<br/>";
			}
			exit;
		}

		// Check if downloading for first time.
		$is_upload_count = $this->db->get("ecs_upload_excel")->result();
		if(count($is_upload_count) < 1){
			$this->fill_data_courier_pickup();
		}

		$this->load->library('PHPExcel');
	    $xl_obj = new PHPExcel();
		$today = date("Y-m-d");
	    $tomorrow = date('Y-m-d', strtotime($today. ' + 1 days'));
	    $tomorrow = str_replace("-", "/", $tomorrow);

	    $give_data = $this->db->query("select * from ecs_courier_pickups where date_of_pickup like '".$tomorrow."%' AND status IN('scheduled', 'rescheduled')")->result();

	    		$this->phpexcel->setActiveSheetIndex(0);
	    		$this->phpexcel->getActiveSheet()->setCellValue('A1', 'Investor ID');
	    		$this->phpexcel->getActiveSheet()->setCellValue('B1', 'Investor Name');
	    		$this->phpexcel->getActiveSheet()->setCellValue('C1', 'Address');
	    		$this->phpexcel->getActiveSheet()->setCellValue('D1', 'Date Of Pickup');
	    		$this->phpexcel->getActiveSheet()->setCellValue('E1', 'Time Of Pickup');
	    		$this->phpexcel->getActiveSheet()->setCellValue('F1', 'Status');
	    		$this->phpexcel->getActiveSheet()->setCellValue('G1', 'Remark');
	    		$this->phpexcel->getActiveSheet()->setCellValue('H1', 'Reschedule Date');
	    		$this->phpexcel->getActiveSheet()->setCellValue('I1', 'Reschedule Time');
	    		$this->phpexcel->getActiveSheet()->setCellValue('J1', 'Reschedule Address');
	    		$file_content_str = "Investor ID \t Investor Name \t Address \t Date Of Pickup \t Time Of Pickup \t Status \t Remark \t Reschedule Date \t Reschedule Time \t Reschedule Address \n";

	    		$latest_upd_data = array(
	    			"status" => "waiting for pickup from customer"
	    		);
				
				
	    		$row_counter = 2;
	    		foreach($give_data as $give_data_row){
	    			$this->db->where("investor_id", $give_data_row->investor_id);
	    			$this->db->update("ecs_status", $latest_upd_data);

	    			$this->db->where("investor_id", $give_data_row->investor_id);
					$this->db->update("ecs_courier_pickups", $latest_upd_data);
					
					$download_pickup = array(
	    			"investor_id"  => $give_data_row->investor_id,
					"download_for_date" => $tomorrow
	    		);
					
	    		$result = $this->db->insert("ecs_download_excel", $download_pickup);
				//echo $result;

	    			$this->phpexcel->getActiveSheet()->setCellValue('A'.$row_counter, $give_data_row->investor_id);
		    		$this->phpexcel->getActiveSheet()->setCellValue('B'.$row_counter, $give_data_row->investor_name);
		    		$this->phpexcel->getActiveSheet()->setCellValue('C'.$row_counter, $give_data_row->address);
		    		$date_of_pickup = str_replace("/", ".", $give_data_row->date_of_pickup);
		    		$this->phpexcel->getActiveSheet()->setCellValue('D'.$row_counter, $date_of_pickup);
		    		$this->phpexcel->getActiveSheet()->setCellValue('E'.$row_counter, $give_data_row->time_of_pickup);
		    		$this->phpexcel->getActiveSheet()->setCellValue('F'.$row_counter, $give_data_row->status);
		    		$this->phpexcel->getActiveSheet()->setCellValue('G'.$row_counter, $give_data_row->remark);

		    		$file_content_str .= $give_data_row->investor_id."\t".$give_data_row->investor_name."\t".$give_data_row->address."\t".$date_of_pickup."\t".$give_data_row->time_of_pickup."\t".$give_data_row->status."\t".$give_data_row->remark."\n";

		    		$row_counter++;
	    		}

	    		$today_file = "pickup_".date("Y_m_d_H_i_s").".xls";
	    		file_put_contents("./assets/csv/".$today_file, $file_content_str);

	    		$pickup_log_ins_data = array(
	    			"download_date"      => date("Y-m-d H:i:s"),
	    			"download_count"     => $row_counter-2,
	    			"download_file_name" => $today_file,
	    			"download_for_date"  => date('Y-m-d', strtotime($today. ' + 1 days')),
	    			"upload_for_date"    => NULL
	    		);
	    		$this->db->insert("ecs_courier_file_logs", $pickup_log_ins_data);
	    		$filename = $today_file;
	    		header('Content-Type: application/vnd.ms-excel');
	    		header('Content-Disposition: attachment;filename="'.$filename.'"');
	    		header('Cache-Control: max-age=0');

	    		$objWriter = PHPExcel_IOFactory::createWriter($this->phpexcel, 'Excel5');
	    		$objWriter->save('php://output');
	}
	public function read_excel($file_excel=null, $dt=null){
		try {
			$this->load->library('PHPExcel');
	    	$xl_obj = new PHPExcel();
			$reader = PHPExcel_IOFactory::createReader('Excel5');
			$reader->setReadDataOnly(true);
			
			// $file = $reader->load('./assets/csv/courier_pickups.xls'); // Dummy File for testing.
			
			$file = $reader->load('./assets/csv/'.$file_excel);

			$data_val = array();
			$objWorksheet = $file->getActiveSheet()->getCellCollection();
			foreach($objWorksheet as $cell){
				$column = $file->getActiveSheet()->getCell($cell)->getColumn();
				$row = $file->getActiveSheet()->getCell($cell)->getRow();
				$val = $file->getActiveSheet()->getCell($cell)->getValue();
				
				$data_value = $file->getActiveSheet()->getCell($cell)->getValue();
				if ($row == 1) {
        			$header[$row][$column] = $data_value;
    			} else {
        			$data_val[$row][$column] = $data_value;
    			}
			}

			// Validate Excel File.
			
			// Get data from upload excel table.
			$dt = str_replace("-", "/", $dt);

			$row_num = 2;
			// echo "data val : ".count($data_val);
			if(count($data_val) > 0){
				// echo "In IF<br>";
				foreach ($data_val as $data) {
					// echo "IN Foreach";
					// A => Investor ID
					// D => Date of Pickup
					// F => Status
					// G => Remark
					// H => Reschedule Date
					// I => Reschedule Time
					// J => Reschedule Address

					// Check for valid Investor ID.
					$this->db->where("invuser_id", @$data["A"]);
					$check_inv_id = $this->db->get("ecs_investors")->row();
					if(count($check_inv_id) < 1){
						return json_encode(array("status" => "error", "message" => "Invalid Investor ID at Row ".$row_num));
					}

					$this->db->where("upload_for_date", $dt);
					$this->db->where("investor_id", @$data["A"]);
					$up_excel_data = $this->db->get("ecs_upload_excel")->result();

					// Get data from download excel table.
					$this->db->where("download_for_date", $dt);
					$this->db->where("investor_id", @$data["A"]);
					$dn_excel_data = $this->db->get("ecs_download_excel")->result();
					print_r($dn_excel_data);
					// exit;

					// Check for Investor ID which was given to courier company in download file.
					$check_up = 0;
					foreach ($up_excel_data as $up_excel_data_row) {
						if($up_excel_data_row->investor_id == @$data["A"]){
							$check_up = 1;
						}
					}
					$check_dn = 0;
					foreach ($dn_excel_data as $down_excel_data_row) {
						if($down_excel_data_row->investor_id == @$data["A"]){
							$check_dn = 1;
							break;
						}
					}
					if($check_up != 0 && $check_dn != 1){
						return json_encode(array("status" => "error", "message" => "Duplicate Investor ID detected or Invalid investor id in excel file."));
					}
					
					// Check for valid status.
					if(@$data["F"] != "done" && @$data["F"] != "rejected"){
						return json_encode(array("status" => "error", "message" => "Invalid Status at Row ".$row_num." ".@$data["F"]));
					}

					// Check for combination validation so that status cannot be rejected without any reason.
					if(@$data["F"] == "rejected" && trim(@$data["G"], " ") == "" && trim(@$data["H"], " ") == "" && trim(@$data["I"], " ") == ""){
						return json_encode(array("status" => "error", "message" => "Rejected with no reason at Row ".$row_num));
					}

					// Check for valid date format.
					$date_parts = explode(".", @$data["H"]);
					if(@$data["H"] != ""){
						if(count($date_parts) != 3 || strlen($date_parts[0]) != 2 || strlen($date_parts[1]) != 2 || strlen($date_parts[2]) != 4 || is_numeric($date_parts[0]) != 1 || is_numeric($date_parts[1]) != 1 || is_numeric($date_parts[2]) != 1){
							return json_encode(array("status" => "error", "message" => "Reschedule Date format not correct at Row ".$row_num));
						}

						// Check Date of Pickup is greater than previous Date of Pickup.
						if(@$data["D"] >= @$data["H"]){
							return json_encode(array("status" => "error", "message" => "Invalid Date of Pickup at Row ".$row_num));
						}
					}

					$row_num++;
				}
			}

			$this->fill_data_courier_pickup();
			// Excel file is Valid

			// Log in Counts table.
			$this->db->where("dump_date", $dt);
			$dump_count = $this->db->get("ecs_excel_dump_counts")->result();

			$upl_count = count($data_val);

			if(count($dump_count) < 1){
				$upload_data_dt = date("Y-m-d", strtotime($dt));
				$excel_dump_cnt_data = array(
					"dump_date" => $upload_data_dt,
					"upload_count" => $upl_count
				);
				$this->db->insert("ecs_excel_dump_counts", $excel_dump_cnt_data);
			}else{
				$this->db->where("dump_date", $dt);
				$this->db->set("upload_count", "upload_count+".$upl_count, false);
				$this->db->update("ecs_excel_dump_counts");
			}

			$pickup_log_ins_data = array(
	    			"upload_date"       => date("Y-m-d H:i:s"),
	    			"upload_count"      => $upl_count,
	    			"excel_file_name"   => $file_excel,
	    			"upload_for_date"   => $dt,
	    			"download_for_date" => NULL
	    		);
	    	$this->db->insert("ecs_courier_file_logs", $pickup_log_ins_data);
			
			foreach($data_val as $data){
					// Update status in status table.
	        		$new_status = @$data["F"];
	        		if(@$data["F"] == "done"){
	        			$new_status = "waiting for delivery to mu";
	        		}elseif(@$data["F"] == "rejected"){
	        			$new_status = "rescheduled";
	        		}

	        		$upd_data = array(
	        			"status" => $new_status,
	        			"remark" => @$data["G"],
	        			"updated_by" => "courier",
	        			"date_time" => date("Y-m-d H:i:s")
	        		);

	        		$this->db->query("update ecs_status set status = '".$new_status."', remark = '".@$data["G"]."', updated_by = 'courier', date_time = '".date("Y-m-d H:i:s")."' where investor_id = '".@$data["A"]."' AND (status = 'unscheduled' OR status = 'scheduled' OR status = 'rescheduled' OR status = 'waiting for pickup from customer')");

	        		if(@$data["H"] != ""){
	        			// Update Date and Time of Pickup in schedules table.
		        		$upd_data_schedule = array(
		        			"date_of_pickup" => str_replace(".", "/", @$data["H"]),
		        			"time_of_pickup" => @$data["I"],
		        			"updated_by" => "courier",
		        			"date_time" => date("Y-m-d H:i:s")
		        		);
		        		$this->db->where("investor_id", @$data["A"]);
		        		$this->db->update("ecs_schedules", $upd_data_schedule);
	        		}

	        		$remark = @$data["G"]==""?" ":@$data["G"];
	        		$upd_data_courier_pickup = array(
	        			"date_of_pickup" => str_replace(".", "/", @$data["H"]),
	        			"time_of_pickup" => @$data["I"],
	        			"status" => $new_status,
	        			"remark" => $remark,
	        			"update_date_time" => date("Y-m-d H:i:s")
	        		);
	        		$this->db->where("investor_id", @$data["A"]);
	        		$this->db->update("ecs_courier_pickups", $upd_data_courier_pickup);
					
				//Akhilesh code start
				
					$upload_pickup = array(
						"investor_id"  => @$data["A"],
						"upload_for_date" => $dt
					);
					if(@$data["A"] != ""){
						$this->db->insert("ecs_upload_excel", $upload_pickup);
					}
					
					// Send Email
					$this->send_email($investor_id, $new_status);
					// Send SMS
					$this->send_sms($investor_id, $new_status);
					
			}
			//end
			$this->load->view("admin/courier_success");
			// return json_encode(array("status" => "success", "message" => "All Set."));
		} catch (Exception $e) {
			print_r($e->getMessage());
		}
	}
	public function fill_data_courier_pickup(){

		// Fill Data in courier_pickup Table.
	    $today = date("Y-m-d");
		$tomorrow = date('Y-m-d', strtotime($today. ' + 1 days'));
		$tomorrow = str_replace("-", "/", $tomorrow);

		$courier_details = $this->db->query("SELECT ecs_schedules.*, ecs_status.status, ecs_status.remark, ecs_investors.name FROM ecs_schedules inner join ecs_status on ecs_schedules.investor_id = ecs_status.investor_id inner join ecs_investors on ecs_status.investor_id = ecs_investors.invuser_id where ecs_schedules.date_of_pickup like '".$tomorrow."%' AND (ecs_status.status = 'scheduled' OR ecs_status.status = 'rescheduled');")->result();

		foreach($courier_details as $courier_details_row){
			$courier_pickup_data = array(
				"address" => $courier_details_row->address.", ".$courier_details_row->landmark.", ".$courier_details_row->city.", ".$courier_details_row->state.", ".$courier_details_row->pincode,
				"date_of_pickup" => $courier_details_row->date_of_pickup,
				"time_of_pickup" => $courier_details_row->time_of_pickup,
				"status" => $courier_details_row->status,
				"remark" => $courier_details_row->remark,
				"investor_name" => $courier_details_row->name,
				"update_date_time" => date("Y-m-d H:i:s")
			);
			$this->db->where("investor_id", $courier_details_row->investor_id);
			if(count($this->db->get("ecs_courier_pickups")->result()) > 0){
				// Update
				$this->db->where("investor_id", $courier_details_row->investor_id);
				$this->db->update("ecs_courier_pickups", $courier_pickup_data);
			}else{
				// Insert
				$courier_pickup_data["investor_id"] = $courier_details_row->investor_id;
				$this->db->insert("ecs_courier_pickups", $courier_pickup_data);
			}
		}
	}
	public function upload_csv(){
		$config['upload_path'] = 'assets/csv/';
		$config['allowed_types'] = 'xls';
		$config['encrypt_name'] = true;

		$this->load->library('upload', $config);
		$this->upload->initialize($config);

		if ( ! $this->upload->do_upload("txt_csv_courier")){
			$error["err"] = array('error' => $this->upload->display_errors());

			print_r($error);
		}
		else{
			$data = array('upload_data' => $this->upload->data());
			$ret_val = $this->read_excel($data["upload_data"]["file_name"], $this->input->post("txt_dt"));
			echo $ret_val;
		}
	}
	public function dump_data(){
		$this->load->view("admin/export_courier");
	}
	
	public function holiday_list(){
		if($this->input->post()){
			$remark = $this->input->post("remark");
			$date = $this->input->post("date");
			$token = $this->input->post("val");
			$id = $this->input->post("id");
			if($token){
				$insert_data = array(
					"holiday_date" => $date ,
					"remark" => $remark
				);
				$result = $this->db->insert('ecs_holiday_list',$insert_data);
				echo $result;
				exit;
			}
			$this->db->where("id",$id);
			$result = $this->db->delete("ecs_holiday_list");
			echo $result;
			exit;
		}
		$data["all_holiday"] = $this->db->get("ecs_holiday_list")->result();
		$this->load->view('admin/holiday_list',$data);
	}

	private function send_email($investor_id, $new_status){
		try {
			$this->db->where("invuser_id", $investor_id);
			$data["investor_details"] = $this->db->get("ecs_investors")->row();
			$this->load->library('pdf');
			$this->pdf->set_base_path(realpath(FCPATH));
			$this->pdf->load_view('sample', $data);
			$filename = date("Y-m-d-h-i-s-").$investor_id;
			$this->pdf->render();
			$output = $this->pdf->output();
			file_put_contents("assets/csv/".$filename.".pdf", $output);

			$this->db->where("invuser_id", $investor_id);
			$investor = $this->db->get("ecs_investors")->row();

			$data["investor_data"] = $investor;

			$this->db->where("investor_id", $investor_id);
			$data["investor_address"] = $this->db->get("ecs_schedules")->row();

			$txt = $this->message_selector(urldecode($new_status));

			if($txt == ""){
				return 0;
			}

			$this->load->library('email');
			$config['protocol']     = 'smtp';
			$config['smtp_host']    = 'smtp.falconide.com';
			$config['smtp_port']    = '25';
			$config['smtp_timeout'] = '7';
			$config['smtp_user']    = 'myuniverse';
			$config['smtp_pass']    = 'Myuni@2015';

			$config['charset']      = 'utf-8';
			$config['newline']      = "\r\n";
			$config['mailtype']     = 'html'; // or html
			$config['validation']   = TRUE; // bool whether to validate email or not

	        $this->email->initialize($config);

	        $this->email->from('EcsMandate@myuniverse.co.in', 'MyUniverse ECS Mandate');
	        // $this->email->to("Harry.Cheese@gmail.com");
	        $this->email->to(@$investor->myUniverseEmailId);

	        $this->email->subject('ECS Mandate');
	        // $this->email->message($txt);
	        $this->email->message($this->load->view($txt, $data, true));
	        $this->email->attach("assets/csv/".$filename.".pdf");

	        @$this->email->send();
	        @unlink($filename.".pdf");
		} catch (Exception $e) {
			$this->log_error(1, $e->getMessage());
		}
		// echo $this->email->print_debugger();
	}

	private function send_sms($investor_id, $new_status){
		try {
			$this->db->where("invuser_id", $investor_id);
			$investor = $this->db->get("ecs_investors")->row();

			if($investor->mobileno != "" && strlen($investor->mobileno) == 10){
				$new_status = rawurldecode($new_status);
				
				$txt = rawurlencode($this->sms_selector($investor_id, $new_status));
				$url = "https://bulkpush.mytoday.com/BulkSms/SingleMsgApi?feedid=342866&username=9833538989&password=djwpm&To=".$investor->mobileno."&text=".$txt;
				// $url = "https://bulkpush.mytoday.com/BulkSms/SingleMsgApi?feedid=342866&username=9833538989&password=djwpm&To=9930929091&text=".$txt;
				// $url = "https://bulkpush.mytoday.com/BulkSms/SingleMsgApi?feedid=342866&username=9833538989&password=djwpm&To=8976348188&text=".$txt;
				
				$agent = "Mozilla/5.0 (Windows; U; Windows NT 5.0; en-US; rv:1.4) Gecko/20030624 Netscape/7.1 (ax)";
				$ch = curl_init();
				curl_setopt($ch, CURLOPT_URL,$url);
				curl_setopt($ch, CURLOPT_USERAGENT, $agent);
				curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
				curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
				curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
				curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
				$returned = curl_exec($ch);
			}
		} catch (Exception $e) {
			$this->log_error(2, $e->getMessage());
		}
	}

	private function sms_selector($investor_id, $new_status){
		$this->db->where("invuser_id", $investor_id);
		$investor_detail = $this->db->get("ecs_investors")->row();

		$this->db->where("investor_id", $investor_id);
		$schedule_detail = $this->db->get("ecs_schedules")->row();

		switch ($new_status) {
			case 'courier myself':
				$txt = "";
				break;

			case 'unscheduled':
				$txt = "";
				break;

			case 'scheduled':
				$txt = "Dear customer, we have received your request for document pickup for ".date("d-m-Y", strtotime($schedule_detail->date_of_pickup))." ".$schedule_detail->time_of_pickup." from your ".$schedule_detail->location_type." at ".$schedule_detail->city.". Please keep your documents readily available to be handed over to our representative.";
				break;

			case 'rescheduled':
				$txt = "Dear customer, we have received your request for document pickup for ".date("d-m-Y", strtotime($schedule_detail->date_of_pickup))." ".$schedule_detail->time_of_pickup." from your ".$schedule_detail->location_type." at ".$schedule_detail->city.". Please keep your documents readily available to be handed over to our representative.";
				break;

			case 'waiting for pickup from customer':
				$txt = "Dear Customer, our representative will arrive at your ".$schedule_detail->location_type." at ".$schedule_detail->city." for document pickup. Request you to download, print and sign the documents received in your email. Helpdesk 022-61802828";
				break;

			case 'waiting for delivery to mu':
				$txt = "";
				break;

			case 'received by mu':
				$txt = "";
				break;

			case 'in process':
				$txt = "";
				break;

			case 'rejected':
				$txt = "";
				break;

			case 'accepted':
				$txt = "Dear Customer, your mandate has been accepted by MyUniverse and is sent to ".$investor_detail->bankName." for their acceptance. The Mandate will be active after we receive the Bank’s confirmation.";
				break;

			case 'mandate active':
				$txt = "Congratulations!! Your mandate for ".$investor_detail->bankName." is active. SIP can now be processed on this mandate.";
				break;
			}
			return $txt;
	}

	private function message_selector($new_status){
		switch ($new_status) {
			case 'courier myself':
				$txt = "";
				break;

			case 'unscheduled':
				$txt = "";
				break;

			case 'scheduled':
				$txt = "emailer/appointmentrec";
				break;

			case 'rescheduled':
				$txt = "emailer/appointmentrec";
				break;

			case 'waiting for pickup from customer':
				$txt = "emailer/outforpickup";
				break;

			case 'waiting for delivery to mu':
				$txt = "emailer/pickupsuccess";
				break;

			case 'received by mu':
				$txt = "emailer/documentsrecevied";
				break;

			case 'in process':
				$txt = "";
				break;

			case 'rejected':
				$txt = "emailer/rejected";
				break;

			case 'accepted':
				$txt = "";
				break;

			case 'mandate active':
				$txt = "";
				break;
			}
		return $txt;
	}
}