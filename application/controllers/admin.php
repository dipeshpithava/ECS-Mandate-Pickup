<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends CI_Controller {
	public function __construct(){
		parent::__construct();
		if(!$this->ion_auth->logged_in()){
			redirect('auth/login');
		}
		if ($this->ion_auth->in_group("courier")){
			redirect("courier");
		}

		// Messages according to Status.
		// define('COURIER_MYSELF', 'You have selected to courier myself.');
		// define('UNSCHEDULED', 'Your status is unscheduled.');
		// define('SCHEDULED', 'Your status has been changed to scheduled.');
		// define('RESCHEDULED', 'Your status has been changed to rescheduled.');
		// define('WAITING_FOR_PICKUP_FROM_CUSTOMER', 'Your status has been changed to waiting for pickup from customer.');
		// define('WAITING_FOR_DELIVERY_TO_MU', 'Your status has been changed to waiting for delivery to MU.');
		// define('RECEIVED_BY_MU', 'Your status has been changed to received by MU.');
		// define('IN_PROCESS', 'Your status has been changed to in Process.');
		// define('REJECTED', 'Your status has been changed to rejected.');
		// define('ACCEPTED', 'Your status has been changed to accepted.');
		// define('MANDATE_ACTIVE', 'Your status has been changed to mandate active.');
	}
	public function index(){
		redirect("admin/investors");
	}
	public function send_email2(){
		// $this->db->where("invuser_id", $investor_id);
		// $investor = $this->db->get("ecs_investors")->row();

		// $txt = $this->message_selector($new_status);

		$data = array();

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
        $this->email->to("dipeshpithava@gmail.com");
        // $this->email->to($investor->myuniverse_email_id);

        $this->email->subject('ECS Mandate');
        $this->email->message($this->load->view("emailer/rejected", $data, true));

        $this->email->send();

		echo $this->email->print_debugger();
	}
	public function change_status($inv_id, $status){
		try {
                        $upd_data = array(
                                "status" => urldecode(strtolower($status)),
                                "date_time" => date("Y-m-d H:i:s")
                        );
                        $this->db->where("investor_id", $inv_id);
                        $this->db->update("ecs_status", $upd_data);

                        $this->output->set_content_type('application/json')->set_output(json_encode(array("status" => "success", "message" => "Status Changed.")));
                } catch (Exception $e) {
                        $this->output->set_content_type('application/json')->set_output(json_encode(array("status" => "success", "message" => $e->getMessage())));
                }
	}
	public function search_courier_myself(){
		// $this->db->select('st.status as user_status, st.date_time,inv.*');
	 //    $this->db->from('ecs_status st');
	 //    $this->db->join('ecs_investors inv','st.investor_id=inv.invuser_id');
	 //    $this->db->where(array('st.status' => 'courier myself'));
	 //    $data["courier_send_list"] = $this->db->get()->result();

		$q1 = "";
		$q2 = "";
		$q3 = "";
		$q4 = "";
		if($this->input->post("txt_investor_id") != ""){
			$q1 = "invuser_id = '".$this->input->post("txt_investor_id")."'";
		}
		if($this->input->post("txt_investor_name") != ""){
			$q2 = "name like '%".$this->input->post("txt_investor_name")."%'";
		}
		if($this->input->post("txt_investor_emailid") != ""){
			$q3 = "myUniverseEmailId like '%".$this->input->post("txt_investor_emailid")."%'";
		}
		if($this->input->post("txt_investor_pan") != ""){
			$q4 = "panno = '".$this->input->post("txt_investor_pan")."'";
		}
		// $q5 = $q1." ".$q2." ".$q3." ".$q4;

		// $q = substr($q5, 4);
		$q5 = array($q1, $q2, $q3, $q4);
		$q5 = array_filter($q5);
		$q = implode(" AND ", $q5);

	    $data["courier_send_list"] = $this->db->query("select * from ecs_status inner join ecs_investors on investor_id = invuser_id where status = 'courier myself' AND ".$q)->result();
	    // $data["courier_send_list"] = $this->db->query("select st.status as user_status, st.date_time, inv.* from ecs_schedule_status_history st inner join ecs_investors inv on st.investor_id = inv.invuser_id where status = 'courier myself' AND ".$q)->result();
	    
	    echo $this->load->view("admin/ajax_courier_myself", $data, true);
	}
	public function search_status(){
		$investor_id = $this->input->post("txt_investor_id");
		$investor_name = $this->input->post("txt_investor_name");
		$investor_emailid = $this->input->post("txt_investor_emailid");
		$investor_pan = $this->input->post("txt_investor_pan");
		
		

		if($investor_id == "" && $investor_name == "" && $investor_emailid == "" && $investor_pan == ""){
			echo "No result found.".$investor_emailid;
			exit;
		}

		if($investor_id != ""){
			$data["all_status"] = $this->db->query("select ecs_status.status, ecs_status.remark, ecs_schedules.* from ecs_status inner join ecs_schedules on ecs_status.investor_id = ecs_schedules.investor_id where ecs_schedules.investor_id = '".$investor_id."'")->result();
		}else{
			$q2 = "";
			$q3 = "";
			$q4 = "";
			
			if($investor_name != ""){
				$q2 = "AND name like '%".$investor_name."%'";
			}
			if($investor_emailid != ""){
				$q3 = "AND myUniverseEmailId like '%".$investor_emailid."%'";
			}
			if($investor_pan != ""){
				$q4 = "AND panno = '".$investor_pan."'";
			}
			$q5 = $q2." ".$q3." ".$q4;
			$q = substr($q5, 4);
			$inv_data = $this->db->query("select * from ecs_investors where ".$q)->result();
			$inv_ids = "";
			foreach ($inv_data as $inv_data_row) {
				$inv_ids .= ",'".$inv_data_row->invuser_id."'";
			}
			$inv_ids = substr($inv_ids, 1);
			// $data["all_status"] = $this->db->query("select ecs_status.status, ecs_status.remark, ecs_schedules.* from ecs_status inner join ecs_schedules on ecs_status.investor_id = ecs_schedules.investor_id where ecs_schedules.investor_id in (".$inv_ids.")")->result();
			$data["all_status"] = $this->db->query("select ecs_status.status, ecs_status.remark, ecs_status.investor_id as inv_usr_id, ecs_schedules.* from ecs_status left outer join ecs_schedules on ecs_status.investor_id = ecs_schedules.investor_id where ecs_status.investor_id in (".$inv_ids.")")->result();
			if(count($data["all_status"]) < 1){
				echo "No result found.";
				exit;
			}
		}
		echo $this->load->view("admin/ajax_status", $data, true);
	}
	public function get_mu_email_id($investor_id){
		$this->db->where("invuser_id", $investor_id);
		$email_data = $this->db->get("ecs_investors")->row();
		return $email_data->myUniverseEmailId;
	}
	public function search_master_data(){
		$investor_id = $this->input->post("txt_investor_id");
		$investor_name = $this->input->post("txt_investor_name");
		$investor_emailid = $this->input->post("txt_investor_emailid");
		$investor_pan = $this->input->post("txt_investor_pan");
		$data["all_investors"] = "";
		if($investor_id == "" && $investor_name == "" && $investor_emailid == "" && $investor_pan == ""){
			echo "No result found.";
			exit;
		}else{
			$q1 = "";
			$q2 = "";
			$q3 = "";
			$q4 = "";
			if($investor_id != ""){
				$q1 = "invuser_id = '".$investor_id."'";
			}
			if($investor_name != ""){
				$q2 = "name like '%".$investor_name."%'";
			}
			if($investor_emailid != ""){
				$q3 = "myUniverseEmailId like '%".$investor_emailid."%'";
			}
			if($investor_pan != ""){
				$q4 = "panno = '".$investor_pan."'";
			}
			// $q5 = $q1." ".$q2." ".$q3." ".$q4;

			// $q = substr($q5, 4);
			$q5 = array($q1, $q2, $q3, $q4);
			$q5 = array_filter($q5);
			$q = implode(" AND ", $q5);
			
			$data["all_investors"] = $this->db->query("select * from ecs_investors where ".$q)->result();
			if(count($data["all_investors"]) < 1){
				echo "No result found.";
				exit;
			}
		}
		echo $this->load->view("admin/ajax_master_data", $data, true);
	}
	public function schedule_history($investor_id){
		try {
			$data["history_data"] = $this->db->query("select max([address]) as address, max(landmark) as landmark, max(city) as city, max([state]) as state, max(pincode) as pincode, max(date_of_pickup) as date_of_pickup, max(time_of_pickup) as time_of_pickup, max([status]) as status, max(updated_by) as updated_by, max(date_time) as date_time from ecs_schedule_status_history where investor_id = '".$investor_id."' group by date_time order by date_time desc")->result();
			$data["investor_id"] = $investor_id;
			$this->load->view("admin/schedule_history", $data);
		} catch (Exception $e) {
			echo $e->getMessage();
		}
	}
	public function get_details($inv_id, $which){
		if($which == "transaction"){
			$this->db->where("investorId", $inv_id);
			$inv_transaction = $this->db->get("ecs_transactionsreport")->row();
			return $inv_transaction;
		}
		if($which == "status"){
			$this->db->where("investor_id", $inv_id);
			$inv_status = $this->db->get("ecs_status")->row();
			return $inv_status;
		}
		if($which == "schedule"){
			$this->db->where("investor_id", $inv_id);
			$inv_schedules = $this->db->get("ecs_schedules")->row();
			return $inv_schedules;
		}
	}
	public function master($filter=null, $filter_val=null){
		if(!$filter){
			$data["master_detail"] = $this->db->get("ecs_investors")->result();
			$data["disabled_dates"] = $this->db->get("ecs_holiday_list")->result();
			
			$this->load->view("admin/master_screen", $data);
		}else{
			$data["filter"] = $filter;
			$data["filter_val"] = urldecode($this->input->post("filter"));
			$q1 = "";
			$q2 = "";
			$q3 = "";
			$q4 = "";
			if($this->input->post("txt_investor_id") != ""){
				$q1 = "invuser_id = '".$this->input->post("txt_investor_id")."'";
				// $this->db->where("invuser_id", $this->input->post("txt_investor_id"));
			}
			if($this->input->post("txt_investor_name") != ""){
				$q2 = "name like '%".$this->input->post("txt_investor_name")."%'";
			}
			if($this->input->post("txt_investor_email_id") != ""){
				$q3 = "myUniverseEmailId like '%".$this->input->post("txt_investor_email_id")."%'";
				// $this->db->where("myUniverseEmailId", $this->input->post("txt_investor_email_id"));
			}
			if($this->input->post("txt_investor_pan") != ""){
				$q4 = "panno = '".$this->input->post("txt_investor_pan")."'";
				// $this->db->where("panno", $this->input->post("txt_investor_pan"));
			}
			$q5 = array($q1, $q2, $q3, $q4);
			$q5 = array_filter($q5);
			$q = implode(" AND ", $q5);
			if($q != ""){
				$q = " WHERE ".$q;
			}
			$data["master_detail"] = $this->db->query("select * from ecs_investors".$q)->result();
			// $data["master_detail"] = $this->db->get("ecs_investors")->result();
			echo $this->load->view("admin/ajax_master_screen", $data, true);
		}
	}
	public function send_courier(){
		// $this->db->select('st.status as user_status, st.date_time,inv.*');
		// $this->db->from('ecs_status st');
		// $this->db->join('ecs_investors inv','st.investor_id=inv.invuser_id');
		// $this->db->where(array('st.status' => 'courier myself'));
		// $data["courier_send_list"] = $this->db->get()->result();
		// $this->load->view('admin/courier_myself',$data);

		$this->db->select('st.status as user_status, st.date_time,inv.*');
		$this->db->from('ecs_schedule_status_history st');
		$this->db->join('ecs_investors inv','st.investor_id=inv.invuser_id');
		$this->db->where(array('st.status' => 'courier myself'));
		$data["courier_send_list"] = $this->db->get()->result();
		// select st.status as user_status, st.date_time, inv.* from ecs_schedule_status_history st inner join ecs_investors inv on st.investor_id = inv.invuser_id where st.status = 'courier myself'
		$this->load->view('admin/courier_myself',$data);
	}
	
	public function kk(){
		$this->db->select('sh.*,inv.*','tr.t_cre_time');
		$this->db->from('ecs_schedules sh');
		//$this->db->join('status st','st.investor_id=sh.investor_id');
		$this->db->join('ecs_investors inv','sh.investor_id=inv.invuser_id','outer');
		$this->db->join('ecs_transactionsreport tr','sh.investor_id=tr.investorId','outer');
		$data["dats"] = $this->db->get()->result();
		echo '<pre>';
		print_r($data["dats"]);
		echo '</pre>';
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
					"remark" => $remark,
					"inserted_by" =>"admin"
				);
				$result = $this->db->insert('ecs_holiday_list',$insert_data);
				echo $result;
				exit;
			}else{
			$this->db->where("id",$id);
			$result = $this->db->delete("ecs_holiday_list");
			echo $result;
			exit;
			}
		}
		$data["all_holiday"] = $this->db->get("ecs_holiday_list")->result();
		$this->load->view('admin/holiday_list_admin',$data);
	}
	/*public function gen(){
		$res = $this->db->query("show columns from investors")->result();
		foreach($res as $r){
			echo '<td>$investor_master_data_row->'.$r->Field.'?></td>';
		}
	}*/
	/*public function gen2(){
		$res = $this->db->query("show columns from TransactionsReport")->result();
		foreach($res as $r){
			echo '<td>$all_transactions_row->'.$r->Field.'?></td>';
		}
	}*/
	/*public function investors1(){
		$crud = new grocery_CRUD();
		$crud->set_table('investors'); //Change to your table name
		$crud->unset_add();
		$crud->unset_delete();
		$data = $crud->render();
		$this->load->view('admin/crud_view',$data);
	}*/
	
	public function pincheck(){
		$pin = $this->input->post("filter");
		$this->db->where("pincode",$pin);
		$pin_codes = $this->db->get("ecs_pincodes")->row();

		$this->db->where("pincode", $pin);
		$all_pincodes = $this->db->get("ecs_all_pincodes")->row();

		if(@$pin_codes){
		$data = $pin_codes;
		$city = $data->city;
		$state = $data->state;
		}
		if(count($pin_codes) > 0 && count($all_pincodes) > 0){
			echo json_encode(array("alert" =>"go ahead", "city" => $city, "state" => $state));
			exit;
		}
		
		if(count($pin_codes) < 1 && count($all_pincodes) < 1){
			//echo "hellow";
			echo json_encode(array("alert" =>"not get pin"));
			exit;
			
		}
		
	}

	public function user_data(){
		$user_ids = $this->input->post("user_val");
		$this->db->where("investor_id",$user_ids);
		$pin_codes = $this->db->get("ecs_schedules")->row();
		if(@$pin_codes){
			$data = $pin_codes;
			$email = $data->email_id;
			$pincode = $data->pincode;
			$address = $data->address;
			$landmark = $data->landmark;
			$city = $data->city;
			$state = $data->state;
			$date_of_pickup = $data->date_of_pickup;
			$time_of_pickup = $data->time_of_pickup;
		}
		if($pin_codes){
			echo json_encode(array("alert" =>"go ahead", "email" => $email, "pincode" => $pincode,"address" => $address,"landmark" =>$landmark,"city" => $city,"state" => $state,"date_of_pickup" => $date_of_pickup,"time_of_pickup"=> $time_of_pickup));
		}
	}
	
	public function submit_data(){
		$data = $this->input->post();
		$investorId = $data['current_user_id'];
		//echo $investorId;
		//exit;
		$old_schedule = $data['current_schedule'];
		if($old_schedule==""){
			$new_schedule ="scheduled";
		}else{
			$new_schedule = "rescheduled";
		}
		
		$dt_of_pickup = date("Y/m/d", strtotime($data['pickup_date']));
		$insert_data = array(
			'investor_id' => $data['current_user_id'],
			'email_id' => $data['email'],
			'pincode' => $data['pin'],
			'address' => $data['address'],
			'landmark' => $data['landmark'],
			'city' => $data['city'],
			'state' => $data['state'],
			'date_of_pickup' => $dt_of_pickup,
			'time_of_pickup' => $data['select_time'],
			'updated_by' => 'user',
		);
		if($old_schedule==""){
			$result = $this->db->insert('ecs_schedules',$insert_data);
		}else{
			$this->db->where("investor_id",$investorId);
			$result = $this->db->update('ecs_schedules',$insert_data);
		}
		if($result){
			$status_data = array(
				'investor_id' => $data['current_user_id'],
				'status' => $new_schedule,
				'updated_by' => 'admin',
		 );
			if($old_schedule==""){
				$results = $this->db->insert("ecs_status", $status_data);
				// Send Email
				$this->send_email($data['current_user_id'], $new_schedule);
				// Send SMS
				$this->send_sms($data['current_user_id'], $new_schedule);
				echo "successfully inserted";
				exit;
			}else{
				$this->db->where("investor_id",$investorId);
				$result = $this->db->update("ecs_status", $status_data);
				// Send Email
				$this->send_email($data['current_user_id'], $new_schedule);
				// Send SMS
				$this->send_sms($data['current_user_id'], $new_schedule);
				echo "successfully updated";
				exit;
			}
		}
	}
	
	public function pdf($investor_id){
		$this->db->where("invuser_id", $investor_id);
		$data["investor_details"] = $this->db->get("ecs_investors")->row();
		$this->load->library('pdf');
		header("Content-type: application/pdf");
		$this->pdf->set_base_path(realpath(FCPATH));
		$this->pdf->load_view('sample', $data);
		$this->pdf->render();
		echo $this->pdf->output();
		// $this->pdf->stream("{$investor_id}.pdf");
	}
	public function investors($investor_id=""){
		if($investor_id!=""){
			$data["investor_id"] = $investor_id;
			$this->db->where("invuser_id", $investor_id);
			$data["all_investors"] = $this->db->get("ecs_investors")->row();
			$this->load->view('admin/investor_screen',$data);
		}
		$this->load->view('admin/master_data');
		// $data["all_investors"] = $this->db->get("ecs_investors")->result();
		// $this->load->view('admin/master_data',$data);
		
	}
	public function transactions($investor_id){
		$data["investor_id"] = $investor_id;
		$this->db->where("investorId", $investor_id);
		$data["investor_transaction"] = $this->db->get("ecs_transactionsreport")->result();
		$this->load->view("admin/transactions", $data);
	}
	public function user_screen($investor_id){
		$data["investor_id"] = $investor_id;
		$this->db->where("investor_id", $investor_id);
		$data["investor_screen"] = $this->db->get("ecs_schedules")->row();
		$this->load->view("admin/user_screen", $data);
	}
	public function status_update(){
		$data["all_status"] = $this->db->query("select ecs_status.status, ecs_status.remark, ecs_schedules.* from ecs_status inner join ecs_schedules on ecs_status.investor_id = ecs_schedules.investor_id")->result();
		$this->load->view("admin/status", $data);
	}
	public function ajax_change_status(){
		try {
			$upd_data = array(
				"status" => strtolower($this->input->post("txt_new_status")),
				"date_time" => date("Y-m-d H:i:s")
			);
			$this->db->where("investor_id", $this->input->post("txt_inv_id"));
			$this->db->update("ecs_status", $upd_data);
			
			// Send Email
			$this->send_email($this->input->post("txt_inv_id"), strtolower($this->input->post("txt_new_status")));
			// Send SMS
			$this->send_sms($this->input->post("txt_inv_id"), strtolower($this->input->post("txt_new_status")));

			$this->output->set_content_type('application/json')->set_output(json_encode(array("status" => "success", "message" => "Status Changed.")));
		} catch (Exception $e) {
			$this->output->set_content_type('application/json')->set_output(json_encode(array("status" => "success", "message" => $e->getMessage())));
		}
	}
	public function ajax_change_remark(){
		try {
			$upd_data = array(
				"remark" => $this->input->post("txt_remark"),
				"date_time" => date("Y-m-d H:i:s")
			);
			$this->db->where("investor_id", $this->input->post("txt_inv_id"));
			$this->db->update("ecs_status", $upd_data);
			$this->output->set_content_type('application/json')->set_output(json_encode(array("status" => "success", "message" => "Remark Changed.")));
		} catch (Exception $e) {
			$this->output->set_content_type('application/json')->set_output(json_encode(array("status" => "success", "message" => $e->getMessage())));
		}
	}

	public function send_msg(){
		try {
			$investor_id = $this->input->post("txt_inv_id");
			
			$this->db->where("investor_id", $investor_id);
			$new_status_row = $this->db->get("ecs_status")->row();
			$new_status = @$new_status_row->status == ""?"unscheduled":@$new_status_row->status;

			$this->send_email($investor_id, $new_status);
			$this->send_sms($investor_id, $new_status);

			echo "sent";
		} catch (Exception $e) {
			echo $e->getMessage();
		}
	}

	public function send_email($investor_id, $new_status){

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
        // $this->email->bcc("dipeshpithava@gmail.com");
        $this->email->to(@$investor->myUniverseEmailId);

        $this->email->subject('ECS Mandate');
        // $this->email->message($txt);
        $this->email->message($this->load->view($txt, $data, true));
        $this->email->attach("assets/csv/".$filename.".pdf");

        try {
			@$this->email->send();
			@unlink($filename.".pdf");        	
        } catch (Exception $e) {
        	
        }

		// echo $this->email->print_debugger();
	}

	public function send_sms($investor_id, $new_status){
		$this->db->where("invuser_id", $investor_id);
		$investor = $this->db->get("ecs_investors")->row();

		if($investor->mobileno != "" && strlen($investor->mobileno) == 10){
			$new_status = rawurldecode($new_status);
			
			$txt = rawurlencode($this->sms_selector($investor_id, $new_status));
			if($txt == ""){
				return 0;
			}
			$url = "https://bulkpush.mytoday.com/BulkSms/SingleMsgApi?feedid=342866&username=9833538989&password=djwpm&To=".$investor->mobileno."&text=".$txt;
			// $url = "https://bulkpush.mytoday.com/BulkSms/SingleMsgApi?feedid=342866&username=9833538989&password=djwpm&To=8976348188&text=".$txt;
			// $url = "https://bulkpush.mytoday.com/BulkSms/SingleMsgApi?feedid=342866&username=9833538989&password=djwpm&To=9930929091&text=".$txt;
			
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
	}

	public function sms_selector($investor_id, $new_status){
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

	public function message_selector($new_status){
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
	
		public function status_matrix($old_status, $new_status){
		$old_status = strtolower($old_status);
		$new_status = strtolower($new_status);
		switch ($old_status) {
			case 'unscheduled':
				return 0;
				break;

			case 'scheduled':
				if($new_status == "rescheduled" || $new_status == "waiting for pickup from customer"){
					return 1;
				}else{
					return 0;
				}
				break;

			case 'rescheduled':
				if($new_status == "rescheduled" || $new_status == "waiting for pickup from customer"){
					return 1;
				}else{
					return 0;
				}
				break;

			case 'waiting for pickup from customer':
				if($new_status == "rescheduled" || $new_status == "waiting for delivery to mu"){
					return 1;
				}else{
					return 0;
				}
				break;

			case 'waiting for delivery to mu':
				if($new_status == "received by mu"){
					return 1;
				}else{
					return 0;
				}
				break;

			case 'received by mu':
				if($new_status == "in process"){
					return 1;
				}else{
					return 0;
				}
				break;

			case 'in process':
				if($new_status == "rejected"){
					return 1;
				}else{
					return 0;
				}
				break;

			case 'rejected':
				if($new_status == "scheduled" || $new_status == "unscheduled"){
					return 1;
				}else{
					return 0;
				}
				break;

			case 'accepted':
				if($new_status == "mandate active" || $new_status == "rescheduled"){
					return 1;
				}else{
					return 0;
				}
				break;

			case 'mandate active':
				return 0;
				break;
			
			default:
				return 0;
				break;
		}
	}
}