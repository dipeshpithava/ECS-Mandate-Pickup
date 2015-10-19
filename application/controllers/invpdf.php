<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Invpdf extends CI_Controller {


	public function __construct(){
		parent::__construct();
		$this->load->library('table');
		$this->load->helper('form');
	}

	public function index(){
		// $this->session->set_userdata("investor_id", "ABMMU0002705");
		$this->db->where("invuser_id", $this->session->userdata("investor_id"));
		$data["investor_details"] = $this->db->get("ecs_investors")->row();
		// print_r($data);
		// exit;
		// $this->load->view("sample", $data);
		// exit;
		$this->load->library('pdf');
		header("Content-type: application/pdf");
		$this->pdf->set_base_path(realpath(FCPATH));
		$this->pdf->load_view('sample', $data);
		$this->pdf->render();
		echo $this->pdf->output();
		// $this->pdf->stream("{$investor_id}.pdf");
	}

}

/* End of file pdf.php */
/* Location: ./application/controllers/pdf.php */