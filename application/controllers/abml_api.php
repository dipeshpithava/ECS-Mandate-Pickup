<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Abml_api extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		echo "<center><h1>Unauthorised Access</h1></center>";
	}

	public function update_status (){

		$pan           = $this->input->post('pan',1);
		$dob           = $this->input->post('dob',1);
		$status        = $this->input->post('status',1);
		$client_code = $this->input->post('client_code',1);

/*
		$pan = 'APJPJ8593H';
		$dob = '24/01/1992';
		$status = 'complete';
		$client_code = "34f4ttgyhyhgd";
*/


		if(!$pan || !$dob || !$status){
			header('Content-Type: application/json');
			echo json_encode(array('status'=> false, 'error' => 'invalid parameters'));
			return false;			
		}

		if($status == 'completed' && strlen($customer_code) < 1){
			header('Content-Type: application/json');
			echo json_encode(array('status'=> false, 'error' => 'invalid parameters'));
			return false;
		}

		$this->db->where('pan',$pan);
		$this->db->where('dob',$dob);
		$q = $this->db->get('investors');
// 		print_r($q);exit;
		if($q->num_rows() > 0){

			$investor = $q->result_array()[0];

			$this->db->set('status',$status);
			$this->db->set('client_code',$client_code);
			$this->db->where('id',$investor['id']);
/*
			echo '<pre>';
			print_r($investor);exit;
*/
			if ($this->db->update('investors')){
				$this->db->insert('investors_historic',$investor);
				header('Content-Type: application/json');
				echo json_encode(array('status'=> true));
			}
			

			



		}

	}

}

/* End of file abml_api.php */
/* Location: ./application/controllers/abml_api.php */