<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Ga extends CI_Controller {
	public function __construct(){
		date_default_timezone_set('Asia/Kolkata');
		parent::__construct();
		// Table name: ecs_ga
	}
	public function page_load(){
		try {
			$ins_data = array(
				"ip" => $_SERVER["REMOTE_ADDR"],
				""
			);
		} catch (Exception $e) {
			
		}
	}
	public function page_unload(){

	}
}
