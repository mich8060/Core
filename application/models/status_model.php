<?php

class Status_model extends CI_Model {
	
	function read(){
		$query = $this->db->query(
				'SELECT * FROM status'
		);
		if($query->num_rows() > 0) {
			foreach($query->result() as $row){
				$data[] = $row;
			}
			return $data;
		}
	}
	
}

/* End of file status_model.php */
/* Location: ./application/controllers/status_model.php */