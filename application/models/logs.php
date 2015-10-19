<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Logs extends CI_Model{

	public function add_json_logs($post){
		$investor_id = "ABMU00000165";
		$query = $this->db->get_where('autosave', array('investor_id' => $investor_id));
		
		$json_encoded = json_encode($post);

		if($query->num_rows() > 0){
			$data = array(
               'json' => $json_encoded
            );

			$this->db->where('investor_id', $investor_id);
			$success = $this->db->update('autosave', $data); 
			return $success;
			exit;
		}
		
		
		$array_insert = array(
			'investor_id' => $investor_id,
			'json' => $json_encoded
		);
		$success = $this->db->insert('autosave', $array_insert); 					
		return $success;
		
	}
}


