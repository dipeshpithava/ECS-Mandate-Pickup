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
		define('COURIER_MYSELF', 'You have selected to courier myself.');
		define('UNSCHEDULED', 'Your status is unscheduled.');
		define('SCHEDULED', 'Your status has been changed to scheduled.');
		define('RESCHEDULED', 'Your status has been changed to rescheduled.');
		define('WAITING_FOR_PICKUP_FROM_CUSTOMER', 'Your status has been changed to waiting for pickup from customer.');
		define('WAITING_FOR_DELIVERY_TO_MU', 'Your status has been changed to waiting for delivery to MU.');
		define('RECEIVED_BY_MU', 'Your status has been changed to received by MU.');
		define('IN_PROCESS', 'Your status has been changed to in Process.');
		define('REJECTED', 'Your status has been changed to rejected.');
		define('ACCEPTED', 'Your status has been changed to accepted.');
		define('MANDATE_ACTIVE', 'Your status has been changed to mandate active.');
	}
	public function index(){
		redirect("admin/investors");
	}
	public function get_details($inv_id, $which){
		if($which == "transaction"){
			$this->db->where("investorId", $inv_id);
			$inv_transaction = $this->db->get("ecs_transactionsreport")->row();
			//print_r($inv_transaction);
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
			// $data["master_detail"] = $this->db->query("select * from (select ecs_schedules.investor_id, ecs_schedules.pincode, ecs_schedules.location_type, ecs_schedules.address, ecs_schedules.landmark, ecs_schedules.city, ecs_schedules.state, ecs_schedules.time_of_pickup, ecs_schedules.date_of_pickup, ecs_schedules.updated_by, ecs_status.status, ecs_status.remark from ecs_schedules inner join ecs_status on ecs_schedules.investor_id = ecs_status.investor_id)a right outer join (select ecs_investors.invuser_id, ecs_investors.panno, ecs_investors.name, ecs_investors.invKycStatus, ecs_investors.bankName, ecs_investors.DOB, ecs_investors.myUniverseEmailId, max(ecs_transactionsreport.t_cre_time) as t_cre_time from ecs_investors left outer join ecs_transactionsreport on ecs_investors.invuser_id = ecs_transactionsreport.investorId group by ecs_transactionsreport.investorId)b on a.investor_id = b.invuser_id")->result();
			$data["master_detail"] = $this->db->get("ecs_investors")->result();
			$this->load->view("admin/master_screen", $data);
		}else{
			if($filter == "status"){
				if($filter_val == "unscheduled"){
					$data["master_detail"] = $this->db->query("select ecs_investors.invuser_id, ecs_investors.panno, ecs_investors.name, ecs_investors.invKycStatus, ecs_investors.bankName, ecs_investors.DOB, ecs_investors.myUniverseEmailId, max(ecs_transactionsreport.t_cre_time) as t_cre_time from ecs_investors left outer join ecs_transactionsreport on ecs_investors.invuser_id = ecs_transactionsreport.investorId where ecs_investors.invuser_id not in (select ecs_schedules.investor_id from ecs_schedules) group by ecs_transactionsreport.investorId")->result();
					$data["uns_status"] = $filter_val;
				}else{
					$data["master_detail"] = $this->db->query("select * from (select ecs_schedules.investor_id, ecs_schedules.pincode, ecs_schedules.location_type, ecs_schedules.address, ecs_schedules.landmark, ecs_schedules.city, ecs_schedules.state, ecs_schedules.time_of_pickup, ecs_schedules.date_of_pickup, ecs_schedules.updated_by, ecs_status.status, ecs_status.remark from ecs_schedules inner join ecs_status on ecs_schedules.investor_id = ecs_status.investor_id)a right outer join (select ecs_investors.invuser_id, ecs_investors.panno, ecs_investors.name, ecs_investors.invKycStatus, ecs_investors.bankName, ecs_investors.DOB, ecs_investors.myUniverseEmailId, max(ecs_transactionsreport.t_cre_time) as t_cre_time from ecs_investors left outer join ecs_transactionsreport on ecs_investors.invuser_id = ecs_transactionsreport.investorId group by ecs_transactionsreport.investorId)b on a.investor_id = b.invuser_id where ecs_status = '".$filter_val."'")->result();
				}
				echo $this->load->view("admin/ajax_master_screen", $data, true);
			}
			if($filter == "priority"){
				if($filter_val == "high"){
					$data["master_detail"] = $this->db->query("select * from (select ecs_schedules.investor_id, ecs_schedules.pincode, ecs_schedules.location_type, ecs_schedules.address, ecs_schedules.landmark, ecs_schedules.city, ecs_schedules.state, ecs_schedules.time_of_pickup, ecs_schedules.date_of_pickup, ecs_schedules.updated_by, ecs_status.status, ecs_status.remark from ecs_schedules inner join ecs_status on ecs_schedules.investor_id = ecs_status.investor_id)a right outer join (select ecs_investors.invuser_id, ecs_investors.panno, ecs_investors.name, ecs_investors.invKycStatus, ecs_investors.bankName, ecs_investors.DOB, ecs_investors.myUniverseEmailId, max(ecs_transactionsreport.t_cre_time) as t_cre_time from ecs_investors left outer join ecs_transactionsreport on ecs_investors.invuser_id = ecs_transactionsreport.investorId group by ecs_transactionsreport.investorId)b on a.investor_id = b.invuser_id where DATE(t_cre_time) < CURDATE()")->result();
				}elseif($filter_val == "medium"){
					$data["master_detail"] = $this->db->query("select * from (select ecs_schedules.investor_id, ecs_schedules.pincode, ecs_schedules.location_type, ecs_schedules.address, ecs_schedules.landmark, ecs_schedules.city, ecs_schedules.state, ecs_schedules.time_of_pickup, ecs_schedules.date_of_pickup, ecs_schedules.updated_by, ecs_status.status, ecs_status.remark from ecs_schedules inner join ecs_status on ecs_schedules.investor_id = ecs_status.investor_id)a right outer join (select ecs_investors.invuser_id, ecs_investors.panno, ecs_investors.name, ecs_investors.invKycStatus, ecs_investors.bankName, ecs_investors.DOB, ecs_investors.myUniverseEmailId, max(ecs_transactionsreport.t_cre_time) as t_cre_time from ecs_investors left outer join ecs_transactionsreport on ecs_investors.invuser_id = ecs_transactionsreport.investorId group by ecs_transactionsreport.investorId)b on a.investor_id = b.invuser_id where DATE(t_cre_time) = CURDATE()")->result();
				}elseif ($filter_val == "low") {
					$data["master_detail"] = $this->db->query("select * from (select ecs_schedules.investor_id, ecs_schedules.pincode, ecs_schedules.location_type, ecs_schedules.address, ecs_schedules.landmark, ecs_schedules.city, ecs_schedules.state, ecs_schedules.time_of_pickup, ecs_schedules.date_of_pickup, ecs_schedules.updated_by, ecs_status.status, ecs_status.remark from ecs_schedules inner join ecs_status on ecs_schedules.investor_id = ecs_status.investor_id)a right outer join (select ecs_investors.invuser_id, ecs_investors.panno, ecs_investors.name, ecs_investors.invKycStatus, ecs_investors.bankName, investors.DOB, ecs_investors.myUniverseEmailId, max(ecs_transactionsreport.t_cre_time) as t_cre_time from ecs_investors left outer join ecs_transactionsreport on ecs_investors.invuser_id = ecs_transactionsreport.investorId group by ecs_transactionsreport.investorId)b on a.investor_id = b.invuser_id where DATE(t_cre_time) > CURDATE()")->result();
				}
				echo $this->load->view("admin/ajax_master_screen", $data, true);
			}
			if($filter == "kyc"){
				$data["master_detail"] = $this->db->query("select * from (select ecs_schedules.investor_id, ecs_schedules.pincode, ecs_schedules.location_type, ecs_schedules.address, ecs_schedules.landmark, ecs_schedules.city, ecs_schedules.state, ecs_schedules.time_of_pickup, ecs_schedules.date_of_pickup, ecs_schedules.updated_by, ecs_status.status, ecs_status.remark from ecs_schedules inner join ecs_status on ecs_schedules.investor_id = ecs_status.investor_id)a right outer join (select ecs_investors.invuser_id, ecs_investors.panno, ecs_investors.name, ecs_investors.invKycStatus, ecs_investors.bankName, ecs_investors.DOB, ecs_investors.myUniverseEmailId, max(ecs_transactionsreport.t_cre_time) as t_cre_time from ecs_investors left outer join ecs_transactionsreport on ecs_investors.invuser_id = ecs_transactionsreport.investorId group by ecs_transactionsreport.investorId)b on a.investor_id = b.invuser_id  where kyc_status = '".$filter_val."'")->result();
				echo $this->load->view("admin/ajax_master_screen", $data, true);
			}
		}
	}
	public function send_courier(){
		$this->db->select('st.status as user_status, st.date_time,inv.*');
		$this->db->from('ecs_status st');
		$this->db->join('ecs_investors inv','st.investor_id=inv.invuser_id');
		$this->db->where(array('st.status' => 'courier myself'));
		$data["courier_send_list"] = $this->db->get()->result();
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
		if(@$pin_codes){
		$data = $pin_codes;
		$city = $data->city;
		$state = $data->state;
		}
		if($pin_codes){
			echo json_encode(array("alert" =>"go ahead", "city" => $city, "state" => $state));
			exit;
		}
		
		if(!$pin_codes){
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
		
		$insert_data = array(
			'investor_id' => $data['current_user_id'],
			'email_id' => $data['email'],
			'pincode' => $data['pin'],
			'address' => $data['address'],
			'landmark' => $data['landmark'],
			'city' => $data['city'],
			'state' => $data['state'],
			'date_of_pickup' => $data['pickup_date'],
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
		$this->db->where("investor_user_id", $investor_id);
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
		$data["all_investors"] = $this->db->get("ecs_investors")->result();
		$this->load->view('admin/master_data',$data);
		
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
		$investor = $this->db->get("ecs_investors")->row();

		$txt = $this->message_selector($new_status);
		$config = Array(
		    'protocol' => 'smtp',
		    'smtp_host' => 'smtp.falconide.com',
		    'smtp_port' => 25,
		    'smtp_user' => 'myuniverse',
		    'smtp_pass' => 'Myuni@2015',
		    'mailtype'  => 'html', 
		    'charset'   => 'iso-8859-1'
		);
		$this->load->library('email', $config);

		$this->email->from('dipeshpithwa@outlook.com', 'Dipesh Pithwa');
		//$this->email->to($investor->myuniverse_email_id);
		$this->email->to("dipeshpithava@gmail.com");
		$this->email->subject('ECS Mandate');
		$this->email->message($txt);
		$this->email->send();

		// echo $this->email->print_debugger();
	}

	public function send_sms($investor_id, $new_status){
		$this->db->where("invuser_id", $investor_id);
		$investor = $this->db->get("ecs_investors")->row();

		if($investor->mobile_no != "" && strlen($investor->mobile_no) == 10){
			$new_status = rawurldecode($new_status);
			
			$txt = rawurlencode($this->message_selector($new_status));
			//$url = "https://bulkpush.mytoday.com/BulkSms/SingleMsgApi?feedid=342866&username=9833538989&password=djwpm&To=".$investor->mobile_no."&text=".$txt;
			$url = "https://bulkpush.mytoday.com/BulkSms/SingleMsgApi?feedid=342866&username=9833538989&password=djwpm&To=9930929091&text=".$txt;
			
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

	public function message_selector($new_status){
		switch ($new_status) {
			case 'courier myself':
				$txt = COURIER_MYSELF;
				break;

			case 'unscheduled':
				$txt = UNSCHEDULED;
				break;

			case 'scheduled':
				$txt = SCHEDULED;
				break;

			case 'rescheduled':
				$txt = RESCHEDULED;
				break;

			case 'waiting for pickup from customer':
				$txt = WAITING_FOR_PICKUP_FROM_CUSTOMER;
				break;

			case 'waiting for delivery to mu':
				$txt = WAITING_FOR_DELIVERY_TO_MU;
				break;

			case 'received by mu':
				$txt = RECEIVED_BY_MU;
				break;

			case 'in process':
				$txt = IN_PROCESS;
				break;

			case 'rejected':
				$txt = REJECTED;
				break;

			case 'accepted':
				$txt = ACCEPTED;
				break;

			case 'mandate active':
				$txt = MANDATE_ACTIVE;
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