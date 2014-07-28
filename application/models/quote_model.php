<?php

class Quote_model extends CI_Model {
	
	function read(){
		$query = $this->db->query(
				'SELECT * FROM quotes'
		);
		if($query->num_rows() > 0) {
			foreach($query->result() as $row){
				$data[] = $row;
			}
			return $data;
		}
	}
	
}

/* End of file quote_model.php */
/* Location: ./application/controllers/quote_model.php */