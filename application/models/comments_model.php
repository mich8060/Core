<?php

class Comments_model extends CI_Model {
	
	function index() {
		// Decides which article number to serve based on simple url schema 
		$url = base_url().'services/comments/ref_id/'.$data[0]->id;
		$api = json_decode(file_get_contents($url));
		return $api[0];
	}
	
	function read() {
		$query = $this->db->query('SELECT * FROM comments ORDER BY id');
		if($query->num_rows() > 0) {
			foreach($query->result() as $row){
				$data[] = $row;
			}
			return $data;
		}
	}
	
	function add($obj) {
		$values = implode("', '", $obj);
		$values = "'".$values."'";
		$this->db->query('INSERT INTO comments (name, comment, type, ref_id) VALUES ('.$values.')');
	}
	
	function find($params, $limit) {
		$query = $this->db->query('SELECT * FROM comments WHERE '.$params.' = "'.$limit.'"');
		if($query->num_rows() > 0) {
			foreach($query->result() as $row){
				$data[] = $row;
			}
			return $data;
		}
	}
	
	function remove() {
		
	}
	
	function edit() {
		
	}
}

/* End of file comments.php */
/* Location: ./application/controllers/comments.php */