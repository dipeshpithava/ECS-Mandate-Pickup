<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller {
	public function __construct(){
		date_default_timezone_set('Asia/Kolkata');
		parent::__construct();

		
		$this->form_validation->set_error_delimiters('<div class="error">', '</div>');

	}

	public function land(){
		if($this->session->userdata('investor_id') == ""){
			echo '<script>window.location.href = "https://stg.adityabirlamoneyuniverse.com/signin?target=ecsmandate";</script>';
			exit;
		}
		$this->load->view("firstpage");
	}

	public function thankyou(){
		$this->db->where("invuser_id", $this->session->userdata("investor_id"));
		$data["investor_data"] = $this->db->get("ecs_investors")->row();
		// print_r($data["investor_data"]);
		// exit;
		$this->load->view("thankyou", $data);
	}

	public function schedule_again(){
		try {
			$upd_data = array(
				"status" => "scheduled",
				"date_time" => date("Y-m-d H:i:s")
			);
			$this->db->where("investor_id", $this->session->userdata("investor_id"));
			$this->db->update("ecs_status", $upd_data);
			redirect("https://stg.adityabirlamoneyuniverse.com/schedule-ecs-pickup");
		} catch (Exception $e) {
			
		}
	}
	
	public function login(){
		$this->load->view("login");
	}

	public function is_valid_pincode(){
		$this->db->where("pincode", $this->input->post("txt_pincode"));
		$result_set = $this->db->get("ecs_all_pincodes")->result();
		if(count($result_set) < 1){
			echo "invalid";
		}else{
			echo "valid";
		}
	}

	public function get_status(){
		$this->db->where("investor_id", $this->session->userdata("investor_id"));
		$investor_status = $this->db->get("ecs_status")->row();
		echo @$investor_status->status;
	}

	public function schedule(){
		if($this->session->userdata('investor_id') == ""){
			echo '<script>window.location.href = "https://stg.adityabirlamoneyuniverse.com/signin?target=ecsmandate";</script>';
			exit;
		}

		$investor_id = $this->session->userdata('investor_id');
		if($investor_id==""){
			die("Not an Authenticated User.");
		}

		
			$this->db->where("invuser_id",$investor_id);
			$is_user_available = $this->db->get("ecs_investors")->result();
			if(count($is_user_available) < 1){
				$ins_log_data = array(
					"email_id"    => $this->session->userdata('email_id'),
					"investor_id" => $this->session->userdata('investor_id')
				);
				$this->db->insert("ecs_unknown_investors", $ins_log_data);
				die("We are unable to retrive your data. Please schedule after some time.");
			}
			$this->db->where("investor_id",$investor_id);
			$data["all_status"] = $this->db->get("ecs_status")->result();
			$user_status = @$data["all_status"]['0']->status==""?"unscheduled":@$data["all_status"]['0']->status;
			if($user_status=="unscheduled" || $user_status=="scheduled" || $user_status=="rescheduled" || $user_status=="courier myself" || count($data["all_status"]) < 1){
				$this->db->where("investor_id",$investor_id);
				$data['user_data'] = $this->db->get("ecs_schedules")->result();
				$this->db->where("invuser_id",$investor_id);
				$data['bank_details'] = $this->db->get("ecs_investors")->result();
				$data['holiday_list'] = $this->db->get("ecs_holiday_list")->result();
				$this->load->view("schedule_screen",$data);
			}else{
				redirect("home/status");
			}
	}
	
	public function get_day(){
		$date = $this->input->post("name");
		$day = date('l', strtotime($date));
		echo $day;
	}

	public function get_remark(){
		$this->db->where("investor_id", $this->session->userdata('investor_id'));
		$remark = $this->db->get("ecs_status")->row();
		return $remark->remark;
	}
	
	public function status(){
		if($this->session->userdata('investor_id') == ""){
			echo '<script>window.location.href = "https://stg.adityabirlamoneyuniverse.com/signin?target=ecsstatus";</script>';
			exit;
		}

		$data["all_status"] = $this->db->query("select * from ecs_schedule_status_history where investor_id = '".$this->session->userdata('investor_id')."' and id > (select max(id) as id from ecs_schedule_status_history where investor_id = '".$this->session->userdata('investor_id')."' and status = 'rejected')")->result();
		if(count($data["all_status"]) < 1){
			$data["all_status"] = $this->db->query("select status, max(date_time) as date_time from ecs_schedule_status_history where investor_id = '".$this->session->userdata('investor_id')."' group by status order by date_time asc")->result();
		}
		
		$this->load->view("ecstrack1", $data);
	}

	public function status1(){
		// $data["scheduled_status"] = 1 => successful
		// $data["scheduled_status"] = 2 => inprogress
		// $data["scheduled_status"] = 3 => rejected
		if($this->session->userdata('investor_id') == ""){
			echo '<script>window.location.href = "https://stg.adityabirlamoneyuniverse.com/signin?target=ecsstatus";</script>';
			exit;
		}
		$data["curr_status"] = $this->db->query("select * from ecs_status where investor_id = '".$this->session->userdata('investor_id')."'")->row();
		
		if($data["curr_status"]->status == "scheduled" || $data["curr_status"]->status == "rescheduled" || $data["curr_status"]->status == "waiting for pickup from customer"){
			$data["scheduled_date"] = $data["curr_status"]->date_time;

			$data["scheduled_status"] = 1;

			$data["status_num"] = 1;
		}
		if($data["curr_status"]->status == "received by mu"){
			$rows_2 = $this->db->query("select * from ecs_schedule_status_history where date_time = (select max(date_time) as date_time from ecs_schedule_status_history where (status = 'scheduled' or status = 'rescheduled') and investor_id = '".$this->session->userdata('investor_id')."')")->row();
			
			$data["scheduled_date"] = $rows_2->date_time;
			$data["received_by_mu_date"] = $data["curr_status"]->date_time;

			$data["scheduled_status"] = 1;
			$data["received_by_mu_status"] = 1;

			$data["status_num"] = 2;
		}
		if($data["curr_status"]->status == "in process"){
			$rows_2 = $this->db->query("select * from ecs_schedule_status_history where date_time = (select max(date_time) as date_time from ecs_schedule_status_history where (status = 'scheduled' or status = 'rescheduled') and investor_id = '".$this->session->userdata('investor_id')."')")->row();
			$rows_3 = $this->db->query("select * from ecs_schedule_status_history where date_time = (select max(date_time) as date_time from ecs_schedule_status_history where status = 'received by mu' and investor_id = '".$this->session->userdata('investor_id')."')")->row();

			$data["scheduled_date"] = $rows_2->date_time;
			$data["received_by_mu_date"] = $rows_3->date_time;
			$data["in_process_date"] = $data["curr_status"]->date_time;

			$data["scheduled_status"] = 1;
			$data["received_by_mu_status"] = 1;
			$data["in_process_status"] = 2;

			$data["status_num"] = 3;
		}
		if($data["curr_status"]->status == "accepted"){
			$rows_2 = $this->db->query("select * from ecs_schedule_status_history where date_time = (select max(date_time) as date_time from ecs_schedule_status_history where (status = 'scheduled' or status = 'rescheduled') and investor_id = '".$this->session->userdata('investor_id')."')")->row();
			$rows_3 = $this->db->query("select * from ecs_schedule_status_history where date_time = (select max(date_time) as date_time from ecs_schedule_status_history where status = 'received by mu' and investor_id = '".$this->session->userdata('investor_id')."')")->row();
			$rows_4 = $this->db->query("select * from ecs_schedule_status_history where date_time = (select max(date_time) as date_time from ecs_schedule_status_history where status = 'in process' and investor_id = '".$this->session->userdata('investor_id')."')")->row();

			$data["scheduled_date"] = $rows_2->date_time;
			$data["received_by_mu_date"] = $rows_3->date_time;
			$data["in_process_date"] = @$row_4->date_time;
			$data["accepted_date"] = $data["curr_status"]->date_time;

			$data["scheduled_status"] = 1;
			$data["received_by_mu_status"] = 1;
			$data["in_process_status"] = 1;
			$data["accepted_status"] = 2;

			$data["status_num"] = 4;
		}
		if($data["curr_status"]->status == "mandate active" || $data["curr_status"]->status == "rejected"){
			$rows_2 = $this->db->query("select * from ecs_schedule_status_history where date_time = (select max(date_time) as date_time from ecs_schedule_status_history where (status = 'scheduled' or status = 'rescheduled') and investor_id = '".$this->session->userdata('investor_id')."')")->row();
			$rows_3 = $this->db->query("select * from ecs_schedule_status_history where date_time = (select max(date_time) as date_time from ecs_schedule_status_history where status = 'received by mu' and investor_id = '".$this->session->userdata('investor_id')."')")->row();
			$rows_4 = $this->db->query("select * from ecs_schedule_status_history where date_time = (select max(date_time) as date_time from ecs_schedule_status_history where status = 'in process' and investor_id = '".$this->session->userdata('investor_id')."')")->row();
			$rows_5 = $this->db->query("select * from ecs_schedule_status_history where date_time = (select max(date_time) as date_time from ecs_schedule_status_history where status = 'accepted' and investor_id = '".$this->session->userdata('investor_id')."')")->row();

			$data["scheduled_date"] = $rows_2->date_time;
			$data["received_by_mu_date"] = $rows_3->date_time;
			$data["in_process_date"] = $row_4->date_time;
			$data["accepted_date"] = $row_5->date_time;
			$data["active_date"] = $data["curr_status"]->date_time;

			$data["scheduled_status"] = 1;
			$data["received_by_mu_status"] = 1;
			$data["in_process_status"] = 1;
			$data["accepted_status"] = 1;
			if($data["curr_status"]->status == "mandate active"){
				$data["active_status"] = 1;
			}else{
				$data["reject_remark"] = $data["curr_status"]->remark;
				$data["active_status"] = 3;
			}

			$data["status_num"] = 5;
		}
		$this->load->view("ecstrack", $data);
	}

	public function show_all_data(){
		$investor_id = $this->session->userdata('investor_id');
		$this->db->select('sh.*,st.status');
		$this->db->from('ecs_schedules sh');
		$this->db->join('ecs_status st','sh.investor_id=st.investor_id');
		$this->db->where(array('sh.investor_id' => $investor_id));
		$data['all_user_data'] = $this->db->get()->result();
		$this->load->view("ecstrack", $data);
	}
	
	public function save_couriour(){
		$user_email = $this->session->userdata('investor_email');
		$investor_id = $this->session->userdata('investor_id');
		$data = array(
			'investor_id' => $investor_id,
			'status'      => 'courier myself',
			'updated_by'  => 'self'
		);
		$this->db->where("investor_id",$investor_id);
		$user_result = $this->db->get("ecs_status")->row();
		if($user_result){
			$this->db->where("investor_id",$investor_id);
			$result = $this->db->update("ecs_status",$data);

			// Send Email
			$this->send_email($investor_id, 'courier myself');
			// Send SMS
			$this->send_sms($investor_id, 'courier myself');
		if($result){
			echo "successfully updated";	
			exit;
		}
		}else{
			$result = $this->db->insert("ecs_status",$data);
			if($result){
				// Send Email
				$this->send_email($investor_id, 'courier myself');
				// Send SMS
				$this->send_sms($investor_id, 'courier myself');
				echo "successfully inserted";
				exit;
			}
		}
			
				
	}
	
	public function pincode($city_pin=""){
		$data['pin'] = $city_pin;
		$data['redirect_from'] = $this->input->post("redirect_from");
		$this->load->view("picode",$data);
	}
	
	public function piccheck(){
		$email = $this->input->post("email");
		$this->db->where("myUniverseEmailId",$email);
		$user_data = $this->db->get("ecs_investors")->row();
		$this->db->where("email_id",$email);
		$user_email = $this->db->get("ecs_schedules")->row();
		$pin = $this->input->post("pin");
		$this->db->where("pincode",$pin);
		$pin_codes = $this->db->get("ecs_pincodes")->row();
		if(@$pin_codes){
			$data = $pin_codes;
			$city = $data->city;
			$state = $data->state;
		}
		if($user_data && $pin_codes){
			echo json_encode(array("alert" =>"go ahead", "city" => $city, "state" => $state));
			exit;
		}
		if(!$user_data){
			echo json_encode(array("alert" =>"not get email"));
			exit;
		}
		if(!$pin_codes){
			echo json_encode(array("alert" =>"not get pin"));
			exit;
			
		}
		
	}
		
	public function save_schedule(){
		$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
		if($this->form_validation->run() == true){
			$investor_id = $this->session->userdata('investor_id');
			try {
				$ins_data = array(
					"investor_id"    => $investor_id,
					"email_id"       => $this->input->post("email"),
					"pincode"        => $this->input->post("pin"),
					"location_type"  => $this->input->post("radiog_dark"),
					"address"        => $this->input->post("address"),
					"landmark"       => $this->input->post("landmark"),
					"city"           => $this->input->post("city"),
					"state"          => $this->input->post("state"),
					"date_of_pickup" => $this->input->post("txt_date_of_pickup"),
					"time_of_pickup" =>	$this->input->post("txt_time_of_pickup"),
					"updated_by"     => "User",
					"mobileno"       => $this->input->post("mobile_no")
				);
				
				$this->db->where("investor_id",$investor_id);
				$user_result = $this->db->get("ecs_schedules")->row();
				if($user_result){
					$this->db->where("investor_id",$investor_id);
					$user_results = $this->db->update("ecs_schedules",$ins_data);
						$investor_id = $this->session->userdata('investor_id');
						$status_data = array(
							"investor_id"       => $investor_id,
							"status"         => "rescheduled",
							"date_time"   => date("Y-m-d H:i:s"),
							"updated_by"     => "User"
						);
					$this->db->where("investor_id",$investor_id);
					$result = $this->db->update("ecs_status", $status_data);

					// Send Email
					$this->send_email($investor_id, 'rescheduled');
					// Send SMS
					$this->send_sms($investor_id, 'rescheduled');

					echo "successfully updated";
					exit;
				}else{
					$result = $this->db->insert("ecs_schedules", $ins_data);
					if($result){
						$investor_id = $this->session->userdata('investor_id');
							$ins_data = array(
								"investor_id"       => $investor_id,
								"status"         => "scheduled",
								"updated_by"     => "User"
							);
						
						$result = $this->db->insert("ecs_status", $ins_data);
					}
					// Send Email
					$this->send_email($investor_id, 'scheduled');
					// Send SMS
					$this->send_sms($investor_id, 'scheduled');

					echo "successfully inserted";
					exit;
				}
			}catch (Exception $e){
				echo json_encode(array("status" => "error", "message" => $e->getMessage()));
			}
		}
		
	}
	
	
	public function save_reschedule(){
		try {
			$upd_data = array(
				"pincode"        => $this->input->post("txt_pincode"),
				"location_type"  => $this->input->post("txt_location_type"),
				"address"        => $this->input->post("txt_address"),
				"landmark"       => $this->input->post("landmark"),
				"city"           => $this->input->post("txt_city"),
				"state"          => $this->input->post("txt_state"),
				"date_of_pickup" => $this->input->post("txt_date_of_pickup"),
				"time_of_pickup" => $this->input->post("txt_time_of_pickup"),
				"mobileno"       => $this->input->post("mobile_no")
			);
			
			$this->db->where("id", $this->session->userdata("schedule_id"));
			$this->db->update("schedules", $upd_data);
			echo json_encode(array("status" => "success", "message" => "Re Scheduled."));
		} catch (Exception $e) {
			echo json_encode(array("status" => "error", "message" => $e->getMessage()));
		}
	}
	
	private function send_email($investor_id, $new_status){
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

        try {
        	@$this->email->send();
        	@unlink($filename.".pdf");
        } catch (Exception $e) {
        	
        }
        

		// echo $this->email->print_debugger();
	}

	private function send_sms($investor_id, $new_status){
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
				$txt = "Dear Customer, your mandate has been accepted by MyUniverse and is sent to ".$investor_detail->bankName." for their acceptance. The Mandate will be active after we receive the Bank’s feedback.";
				break;

			case 'mandate active':
				$txt = "Congratulations!! Your mandate for ".$investor_detail->bankName." is active. You can schedule a SIP to be automatically deducted from this account.";
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

	// public function saml(){
	// 	$response = "PFJlc3BvbnNlIHhtbG5zPSJ1cm46b2FzaXM6bmFtZXM6dGM6U0FNTDoxLjA6cHJvdG9jb2wiIHhtbG5zOnNhbWw9InVybjpvYXNpczpuYW1lczp0YzpTQU1MOjEuMDphc3NlcnRpb24iIHhtbG5zOnNhbWxwPSJ1cm46b2FzaXM6bmFtZXM6dGM6U0FNTDoxLjA6cHJvdG9jb2wiIHhtbG5zOnhzZD0iaHR0cDovL3d3dy53My5vcmcvMjAwMS9YTUxTY2hlbWEiIHhtbG5zOnhzaT0iaHR0cDovL3d3dy53My5vcmcvMjAwMS9YTUxTY2hlbWEtaW5zdGFuY2UiIElzc3VlSW5zdGFudD0iMjAxNS0wOS0wMVQxMTozNTowNC4wNDZaIiBNYWpvclZlcnNpb249IjEiIE1pbm9yVmVyc2lvbj0iMSIgUmVjaXBpZW50PSJodHRwczovL2h0dHA6Ly9jYXNhZXN0aWxvLmluL21hbmRhdGVfcGlja3VwL2hvbWUvdGVzdF9kZWMiIFJlc3BvbnNlSUQ9Il8zMTcyZDQwNjkzNmU0NzEzNjk1OGYyMTA4NWNiOWMxMiI+PGRzOlNpZ25hdHVyZSB4bWxuczpkcz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC8wOS94bWxkc2lnIyI+CjxkczpTaWduZWRJbmZvPgo8ZHM6Q2Fub25pY2FsaXphdGlvbk1ldGhvZCBBbGdvcml0aG09Imh0dHA6Ly93d3cudzMub3JnLzIwMDEvMTAveG1sLWV4Yy1jMTRuIyI+PC9kczpDYW5vbmljYWxpemF0aW9uTWV0aG9kPgo8ZHM6U2lnbmF0dXJlTWV0aG9kIEFsZ29yaXRobT0iaHR0cDovL3d3dy53My5vcmcvMjAwMC8wOS94bWxkc2lnI3JzYS1zaGExIj48L2RzOlNpZ25hdHVyZU1ldGhvZD4KPGRzOlJlZmVyZW5jZSBVUkk9IiNfMzE3MmQ0MDY5MzZlNDcxMzY5NThmMjEwODVjYjljMTIiPgo8ZHM6VHJhbnNmb3Jtcz4KPGRzOlRyYW5zZm9ybSBBbGdvcml0aG09Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvMDkveG1sZHNpZyNlbnZlbG9wZWQtc2lnbmF0dXJlIj48L2RzOlRyYW5zZm9ybT4KPGRzOlRyYW5zZm9ybSBBbGdvcml0aG09Imh0dHA6Ly93d3cudzMub3JnLzIwMDEvMTAveG1sLWV4Yy1jMTRuIyI+PGVjOkluY2x1c2l2ZU5hbWVzcGFjZXMgeG1sbnM6ZWM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDEvMTAveG1sLWV4Yy1jMTRuIyIgUHJlZml4TGlzdD0iY29kZSBkcyBraW5kIHJ3IHNhbWwgc2FtbHAgdHlwZW5zICNkZWZhdWx0IHhzZCB4c2kiPjwvZWM6SW5jbHVzaXZlTmFtZXNwYWNlcz48L2RzOlRyYW5zZm9ybT4KPC9kczpUcmFuc2Zvcm1zPgo8ZHM6RGlnZXN0TWV0aG9kIEFsZ29yaXRobT0iaHR0cDovL3d3dy53My5vcmcvMjAwMC8wOS94bWxkc2lnI3NoYTEiPjwvZHM6RGlnZXN0TWV0aG9kPgo8ZHM6RGlnZXN0VmFsdWU+Mkd5elp4NGVyQmFOaW4vRjRqZE9teXZCQlNzPTwvZHM6RGlnZXN0VmFsdWU+CjwvZHM6UmVmZXJlbmNlPgo8L2RzOlNpZ25lZEluZm8+CjxkczpTaWduYXR1cmVWYWx1ZT5nQUM4MmppMlNmM0Z4dFRTU0dmeWlXWkxlL2VFdkIxenJuZUdvZUtrL1VnaUdMTHRodjJhbGJRU1IyNldkQkxBYmQ0blRSeUNxRG5MZ1lJU0FGZm84ekFiNGFZTTBvN0F1ZUVqR0xXS3FNWW5IMjE0RmRvMG80RDBHN3l6U3RTUnhxMldiWlRmSmpuSW5jSmZlbTU4cE9iSTdld3lmV3VzUHhIUGVKL1pVdmc9PC9kczpTaWduYXR1cmVWYWx1ZT4KPGRzOktleUluZm8+CjxkczpYNTA5RGF0YT4KPGRzOlg1MDlDZXJ0aWZpY2F0ZT5NSUlDSHpDQ0FZaWdBd0lCQWdJRVZkSDA5akFOQmdrcWhraUc5dzBCQVFVRkFEQlVNUXN3Q1FZRFZRUUdFd0pKVGpFTE1Ba0dBMVVFQ0JNQ1RVZ3hEREFLQmdOVkJBY1RBMDExYlRFTE1Ba0dBMVVFQ2hNQ1RrSXhFREFPQmdOVkJBc1RCMFpwYm1GdVkyVXhDekFKQmdOVkJBTVRBazVDTUI0WERURTFNRGd4TnpFME5URXpORm9YRFRFMk1EZ3hOakUwTlRFek5Gb3dWREVMTUFrR0ExVUVCaE1DU1U0eEN6QUpCZ05WQkFnVEFrMUlNUXd3Q2dZRFZRUUhFd05OZFcweEN6QUpCZ05WQkFvVEFrNUNNUkF3RGdZRFZRUUxFd2RHYVc1aGJtTmxNUXN3Q1FZRFZRUURFd0pPUWpDQm56QU5CZ2txaGtpRzl3MEJBUUVGQUFPQmpRQXdnWWtDZ1lFQWlpUUJsUk9lNHJrNkZ0TVlqUFptY25kN25JUEQ2MG5SeGVwelNTQ1lBV29QNm94ai9ua1NwU1RBYmlxMU1ySXY5ay9DSEpORGY1bUlwTGUrVTZzUUhVODBibWNZU2NXekxld1R3OUFnYkhkbHFMQVJTNGQzblVsK0JBczZjVndySDB4ckNuVFBkd0d2OE9OZHRjZHd0T2ZtenpzNGhFV253SHNqQ0ZnaFZrMENBd0VBQVRBTkJna3Foa2lHOXcwQkFRVUZBQU9CZ1FCQ2dmVVdpQ09QcFk5N2lDQlEzMUhzeThxNU83ZUFCazBtRVlTaXR0SGVvV0pUTnpiVDhScDE0NzN1NWo4VzBhOEVrTVlpL1lLUXFaQURXcWphWmU0MlBPNTg1L0JHTE1MSXpyNDN5WU9rUDM4R1NCOE9zRTlISEdPM3NXdHZLdXRHNWE3M2FkZUZsaU9iSFlMT3BnS0pGRG1VUFRCMHArc0dQNWpPRlQ2cGxnPT08L2RzOlg1MDlDZXJ0aWZpY2F0ZT4KPC9kczpYNTA5RGF0YT4KPC9kczpLZXlJbmZvPjwvZHM6U2lnbmF0dXJlPjxTdGF0dXM+PFN0YXR1c0NvZGUgVmFsdWU9InNhbWxwOlN1Y2Nlc3MiPjwvU3RhdHVzQ29kZT48L1N0YXR1cz48QXNzZXJ0aW9uIHhtbG5zPSJ1cm46b2FzaXM6bmFtZXM6dGM6U0FNTDoxLjA6YXNzZXJ0aW9uIiBBc3NlcnRpb25JRD0iXzhkZWYwOThlNWE4MzJkZjk2MzE5NWE4YzU3MDk3Y2UyIiBJc3N1ZUluc3RhbnQ9IjIwMTUtMDktMDFUMTE6MzQ6MzMuOTU1WiIgSXNzdWVyPSIxMDIwX015VW5pdmVyc2UiIE1ham9yVmVyc2lvbj0iMSIgTWlub3JWZXJzaW9uPSIxIj48QXV0aGVudGljYXRpb25TdGF0ZW1lbnQgQXV0aGVudGljYXRpb25JbnN0YW50PSIyMDE1LTA5LTAxVDExOjM1OjAzLjg5OVoiIEF1dGhlbnRpY2F0aW9uTWV0aG9kPSJ1cm46b2FzaXM6bmFtZXM6dGM6U0FNTDoxLjA6YW06dW5zcGVjaWZpZWQiPjxTdWJqZWN0PjxOYW1lSWRlbnRpZmllciBGb3JtYXQ9InVybjpvYXNpczpuYW1lczp0YzpTQU1MOjEuMTpuYW1laWQtZm9ybWF0OnVuc3BlY2lmaWVkIj43NjIzMTE5MS0yRjJDLTQ2QzMtQUM2Ni1CN0Y1MjUyMjQ1NTY8L05hbWVJZGVudGlmaWVyPjxTdWJqZWN0Q29uZmlybWF0aW9uPjxDb25maXJtYXRpb25NZXRob2Q+dXJuOm9hc2lzOm5hbWVzOnRjOlNBTUw6MS4wOmNtOmJlYXJlcjwvQ29uZmlybWF0aW9uTWV0aG9kPjwvU3ViamVjdENvbmZpcm1hdGlvbj48L1N1YmplY3Q+PFN1YmplY3RMb2NhbGl0eSBETlNBZGRyZXNzPSIwMUhXNTY5Mzk2IiBJUEFkZHJlc3M9IjE3Mi4yMC4yNDcuMzAiPjwvU3ViamVjdExvY2FsaXR5PjwvQXV0aGVudGljYXRpb25TdGF0ZW1lbnQ+PEF0dHJpYnV0ZVN0YXRlbWVudD48U3ViamVjdD48TmFtZUlkZW50aWZpZXIgRm9ybWF0PSJ1cm46b2FzaXM6bmFtZXM6dGM6U0FNTDoxLjE6bmFtZWlkLWZvcm1hdDp1bnNwZWNpZmllZCI+NzYyMzExOTEtMkYyQy00NkMzLUFDNjYtQjdGNTI1MjI0NTU2PC9OYW1lSWRlbnRpZmllcj48U3ViamVjdENvbmZpcm1hdGlvbj48Q29uZmlybWF0aW9uTWV0aG9kPnVybjpvYXNpczpuYW1lczp0YzpTQU1MOjEuMDpjbTpiZWFyZXI8L0NvbmZpcm1hdGlvbk1ldGhvZD48L1N1YmplY3RDb25maXJtYXRpb24+PC9TdWJqZWN0PjxBdHRyaWJ1dGUgQXR0cmlidXRlTmFtZT0iVFBBdHRyaWJ1dGVzIiBBdHRyaWJ1dGVOYW1lc3BhY2U9Ind3dy50ZWNocHJvY2Vzcy5jby5pbiI+PEF0dHJpYnV0ZVZhbHVlPkFDSExqSW5uK1hNMENJRzdodmRLL3diQUh2KzZGRFRidTVoVWtxd0s1UUs0KytWYlhSZmR5TlJMd2VvTFJWc05MN3dkWTY1MXptU3BhTTM1VmdsQWQ0Qi80MFpwVG5WNXZmdmVha2pISk16YWVpcHZQeUl6UEYwN2xTN1JKZ2tnUS9Dd2dodGZwdzFITXZqdFJxK3d2L0p1SWpYR0xlU082WFFYS3ZQTHZ6UT06V1doazRHUERaSzcyKzI4MEZ1RXN0ZldUU2hKYUJ2RGhtSStOTFgwek1PNEtrUlZEdTZuQ3pmMHJVQXJWay80MjFEYzZyMHJsQkcrMTdWMWJ3Ty9NMHBOdnE2WWF3MytaVzRtcjBQTm5rYTdJKzFZenh2ZERzV0FYaU52V0g3YVNiUFVhRGR6Sis0UDZsWWphYkNMK210YVpEcVVMM3JrWnVJTzdKejFjTUJQeGNEbjlJWWdqODkwMGUwYkQrSUFXN3Jrbk9mVkI0RDF2MVRnZGUyQ01TNkF3L1YvVWRrRkZMdXdickdSR05JWGY5eWNOWDBmTXE0WlZBZURMcURPSlp4UmZicjI0N1JraHQ5THFBM3BaTHV3ZjI3aGJwcW5Fek1zM0ZSM0pxbGpnMi84eERrckRWZ3FIYjFyb0tRRGhqTDZHT3FWSlROYUNoVFZwd3ZSS0JMUElxYVpTVWtFOEwwbW92VUFMTTRIVTJMVDNMZ1QyMzkyWlpkV253V25KPC9BdHRyaWJ1dGVWYWx1ZT48L0F0dHJpYnV0ZT48L0F0dHJpYnV0ZVN0YXRlbWVudD48ZHM6U2lnbmF0dXJlIHhtbG5zOmRzPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwLzA5L3htbGRzaWcjIj4KPGRzOlNpZ25lZEluZm8+CjxkczpDYW5vbmljYWxpemF0aW9uTWV0aG9kIEFsZ29yaXRobT0iaHR0cDovL3d3dy53My5vcmcvMjAwMS8xMC94bWwtZXhjLWMxNG4jIj48L2RzOkNhbm9uaWNhbGl6YXRpb25NZXRob2Q+CjxkczpTaWduYXR1cmVNZXRob2QgQWxnb3JpdGhtPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwLzA5L3htbGRzaWcjcnNhLXNoYTEiPjwvZHM6U2lnbmF0dXJlTWV0aG9kPgo8ZHM6UmVmZXJlbmNlIFVSST0iI184ZGVmMDk4ZTVhODMyZGY5NjMxOTVhOGM1NzA5N2NlMiI+CjxkczpUcmFuc2Zvcm1zPgo8ZHM6VHJhbnNmb3JtIEFsZ29yaXRobT0iaHR0cDovL3d3dy53My5vcmcvMjAwMC8wOS94bWxkc2lnI2VudmVsb3BlZC1zaWduYXR1cmUiPjwvZHM6VHJhbnNmb3JtPgo8ZHM6VHJhbnNmb3JtIEFsZ29yaXRobT0iaHR0cDovL3d3dy53My5vcmcvMjAwMS8xMC94bWwtZXhjLWMxNG4jIj48ZWM6SW5jbHVzaXZlTmFtZXNwYWNlcyB4bWxuczplYz0iaHR0cDovL3d3dy53My5vcmcvMjAwMS8xMC94bWwtZXhjLWMxNG4jIiBQcmVmaXhMaXN0PSJjb2RlIGRzIGtpbmQgcncgc2FtbCBzYW1scCB0eXBlbnMgI2RlZmF1bHQgeHNkIHhzaSI+PC9lYzpJbmNsdXNpdmVOYW1lc3BhY2VzPjwvZHM6VHJhbnNmb3JtPgo8L2RzOlRyYW5zZm9ybXM+CjxkczpEaWdlc3RNZXRob2QgQWxnb3JpdGhtPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwLzA5L3htbGRzaWcjc2hhMSI+PC9kczpEaWdlc3RNZXRob2Q+CjxkczpEaWdlc3RWYWx1ZT5HT1ZMd2pTTi9CNmxQZnE0RHdXRUI1ZUdONjQ9PC9kczpEaWdlc3RWYWx1ZT4KPC9kczpSZWZlcmVuY2U+CjwvZHM6U2lnbmVkSW5mbz4KPGRzOlNpZ25hdHVyZVZhbHVlPgpRVkVpOGw2TWMyN1Z2YlJZaUdnMFA0SmNiK3kyNXNjNExwN3h5MlFFZWpvZkpPNDFPS2l4YTJZaUFDUHJMelRlQlp3ZElYOEJaSDRNCk95emJrK0w5ODJNUTRyV1lQR2FMNWg1SWR2WG5uRVVmNGtuckc1VFMydk5Ia1F6RFNOZ29zcm1BRkdzOHNPaW9USXdleE1TNjJuY1oKUmhyUzlscytuT1lrOVFKVjMyMD0KPC9kczpTaWduYXR1cmVWYWx1ZT4KPGRzOktleUluZm8+CjxkczpYNTA5RGF0YT4KPGRzOlg1MDlDZXJ0aWZpY2F0ZT4KTUlJQ0h6Q0NBWWlnQXdJQkFnSUVWZEgwOWpBTkJna3Foa2lHOXcwQkFRVUZBREJVTVFzd0NRWURWUVFHRXdKSlRqRUxNQWtHQTFVRQpDQk1DVFVneEREQUtCZ05WQkFjVEEwMTFiVEVMTUFrR0ExVUVDaE1DVGtJeEVEQU9CZ05WQkFzVEIwWnBibUZ1WTJVeEN6QUpCZ05WCkJBTVRBazVDTUI0WERURTFNRGd4TnpFME5URXpORm9YRFRFMk1EZ3hOakUwTlRFek5Gb3dWREVMTUFrR0ExVUVCaE1DU1U0eEN6QUoKQmdOVkJBZ1RBazFJTVF3d0NnWURWUVFIRXdOTmRXMHhDekFKQmdOVkJBb1RBazVDTVJBd0RnWURWUVFMRXdkR2FXNWhibU5sTVFzdwpDUVlEVlFRREV3Sk9RakNCbnpBTkJna3Foa2lHOXcwQkFRRUZBQU9CalFBd2dZa0NnWUVBaWlRQmxST2U0cms2RnRNWWpQWm1jbmQ3Cm5JUEQ2MG5SeGVwelNTQ1lBV29QNm94ai9ua1NwU1RBYmlxMU1ySXY5ay9DSEpORGY1bUlwTGUrVTZzUUhVODBibWNZU2NXekxld1QKdzlBZ2JIZGxxTEFSUzRkM25VbCtCQXM2Y1Z3ckgweHJDblRQZHdHdjhPTmR0Y2R3dE9mbXp6czRoRVdud0hzakNGZ2hWazBDQXdFQQpBVEFOQmdrcWhraUc5dzBCQVFVRkFBT0JnUUJDZ2ZVV2lDT1BwWTk3aUNCUTMxSHN5OHE1TzdlQUJrMG1FWVNpdHRIZW9XSlROemJUCjhScDE0NzN1NWo4VzBhOEVrTVlpL1lLUXFaQURXcWphWmU0MlBPNTg1L0JHTE1MSXpyNDN5WU9rUDM4R1NCOE9zRTlISEdPM3NXdHYKS3V0RzVhNzNhZGVGbGlPYkhZTE9wZ0tKRkRtVVBUQjBwK3NHUDVqT0ZUNnBsZz09CjwvZHM6WDUwOUNlcnRpZmljYXRlPgo8L2RzOlg1MDlEYXRhPgo8L2RzOktleUluZm8+PC9kczpTaWduYXR1cmU+PC9Bc3NlcnRpb24+PC9SZXNwb25zZT4=";

	// 	$decoded = base64_decode($response);

	// 	$xml = simplexml_load_string($decoded);
	// 	$json = json_encode($xml);
	// 	$array = json_decode($json,TRUE);

	// 	$crypted = explode(":", $array["Assertion"]["AttributeStatement"]["Attribute"]["AttributeValue"])[0];
	// 	$cryp_decode = base64_decode($crypted);

	// 	$p12cert = array();
	// 	$fp=fopen("assets/keys/myp12file.p12","r");
	// 	$c=fread($fp,8192);
	// 	fclose($fp);

	// 	if (openssl_pkcs12_read($c, $p12cert, 'NBCore') ){
	// 		$pkey = $p12cert['pkey'];  //private key
	// 	    $cert = $p12cert['cert'];  //public key

	// 	    if(openssl_private_decrypt($cryp_decode, $decrypted, $pkey)){
	// 	    	// Decryption success.
	// 	    }else{
	// 	    	// Unable to Decrypt.
	// 	    	while ($msg = openssl_error_string())
	// 	    		echo $msg . "<br />";
	// 	    	exit;
	// 	    }
	// 	}

	// 	// AES Dec.
	// 	$ciphertext_base64 = explode(":", $array["Assertion"]["AttributeStatement"]["Attribute"]["AttributeValue"])[1];

	// 	$iv_size = mcrypt_get_iv_size(MCRYPT_RIJNDAEL_128, MCRYPT_MODE_ECB);
	// 	$iv = mcrypt_create_iv($iv_size, MCRYPT_RAND);
	// 	$ciphertext_dec = base64_decode($ciphertext_base64);
	// 	$iv_dec = substr($ciphertext_dec, 0, $iv_size);
	// 	$ciphertext_dec = substr($ciphertext_dec, $iv_size);
	// 	$plaintext_dec = mcrypt_decrypt(MCRYPT_RIJNDAEL_128, $decrypted, $ciphertext_dec, MCRYPT_MODE_ECB, $iv_dec);

	// 	$investor_id = $this->get_string_between($plaintext_dec, "<INV_USERID>", "</INV_USERID>");
	// 	$email_id = $this->get_string_between($plaintext_dec, "<ABMU_TPID>", "</ABMU_TPID>");

	// 	$this->session->set_userdata('investor_id', $investor_id);
	// 	$this->session->set_userdata('email_id', $email_id);

	// 	redirect("home/schedule");
	// }

	private function get_string_between($string, $start, $end){
	    $string = " ".$string;
	    $ini = strpos($string,$start);
	    if ($ini == 0) return "";
	    $ini += strlen($start);
	    $len = strpos($string,$end,$ini) - $ini;
	    return substr($string,$ini,$len);
	}

	public function index(){
		if($this->input->post("SAMLResponse") == ""){
			echo '<script>window.location.href = "https://stg.adityabirlamoneyuniverse.com/signin?target=ecsmandate";</script>';
			exit;
		}
		$response = $this->input->post("SAMLResponse");

		$decoded = base64_decode($response);

		$xml = simplexml_load_string($decoded);
		$json = json_encode($xml);
		$array = json_decode($json,TRUE);

		$crypted = explode(":", $array["Assertion"]["AttributeStatement"]["Attribute"]["AttributeValue"])[0];
		$cryp_decode = base64_decode($crypted);

		$p12cert = array();
		$fp=fopen("assets/keys/myp12file.p12","r");
		$c=fread($fp,8192);
		fclose($fp);

		if (openssl_pkcs12_read($c, $p12cert, 'NBCore') ){
			$pkey = $p12cert['pkey'];  //private key
		    $cert = $p12cert['cert'];  //public key

		    if(openssl_private_decrypt($cryp_decode, $decrypted, $pkey)){
		    	// Decryption success.
		    }else{
		    	// Unable to Decrypt.
		    	while ($msg = openssl_error_string())
		    		echo $msg . "<br />";
		    	exit;
		    }
		}

		// AES Dec.
		$ciphertext_base64 = explode(":", $array["Assertion"]["AttributeStatement"]["Attribute"]["AttributeValue"])[1];

		$iv_size = mcrypt_get_iv_size(MCRYPT_RIJNDAEL_128, MCRYPT_MODE_ECB);
		$iv = mcrypt_create_iv($iv_size, MCRYPT_RAND);
		$ciphertext_dec = base64_decode($ciphertext_base64);
		$iv_dec = substr($ciphertext_dec, 0, $iv_size);
		$ciphertext_dec = substr($ciphertext_dec, $iv_size);
		$plaintext_dec = mcrypt_decrypt(MCRYPT_RIJNDAEL_128, $decrypted, $ciphertext_dec, MCRYPT_MODE_ECB, $iv_dec);
		// print_r($plaintext_dec);
		// exit;

		$status = $this->get_string_between($plaintext_dec, "<Status>", "</Status>");
		$originator = $this->get_string_between($plaintext_dec, "<ORIGINATOR>", "</ORIGINATOR>");
		$inv_id = $this->get_string_between($plaintext_dec, "<INVESTORID>", "</INVESTORID>");
		$email_id = $this->get_string_between($plaintext_dec, "<EMAIL>", "</EMAIL>");

		$this->session->set_userdata('investor_id', $inv_id);
		$this->session->set_userdata('email_id', $email_id);

		$this->db->where("invuser_id", $this->session->userdata("investor_id"));
		$investor_data = $this->db->get("ecs_investors")->row();
		$this->session->set_userdata("investor_name", $investor_data->name);

		redirect("home/land");
		// echo "Status: ".$status;
		// echo "<br>";
		// echo "Originator: ".$originator;
		// echo "<br>";
		// echo "Inv ID: ".$inv_id;
		// echo "<br>";
		// echo "Email ID: ".$email_id;
		// exit;

		// $name = $this->get_string_between($plaintext_dec, "<NAME>", "</NAME>");
		// $email_id = $this->get_string_between($plaintext_dec, "<EMAILID>", "</EMAILID>");
		// $pan = $this->get_string_between($plaintext_dec, "<PAN_NUM>", "</PAN_NUM>");
		// $investor_id = $this->get_string_between($plaintext_dec, "<INVESTOR_ID>", "</INVESTOR_ID>");
		// $dob = $this->get_string_between($plaintext_dec, "<DOB>", "</DOB>");

		// echo "Name: ".$name;
		// echo "<br>";
		// echo "Email ID: ".$email_id;
		// echo "<br>";
		// echo "PAN No.: ".$pan;
		// echo "<br>";
		// echo "Investor ID: ".$investor_id;
		// echo "<br>";
		// echo "DOB: ".$dob;
	}
}
