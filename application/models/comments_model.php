<?php

class Comments_model extends CI_Model {
	
	function index() {
		// Decides which article number to serve based on simple url schema 
		$query = $this->db->query('SELECT * FROM articles WHERE ref_id = "'.$id.'"');
		if($query->num_rows() > 0) {
			foreach($query->result() as $row){
				$data[] = $row;
			}
			$url = base_url().'services/articles/id/'.$data[0]->id;
			$api = json_decode(file_get_contents($url));
			return $api[0];
		}
	}
	
	function add($obj) {
		$values = '"'.$obj['name'].'", "'.$obj['comment'].'", "'.$obj['type'].'", "'.$obj['ref'].'"';
		$this->db->query('INSERT INTO comments (name, comment, type, ref_id) VALUES ('.$values.')');
	}
	
	function remove() {
		
	}
	
	function edit() {
		
	}
}

/* End of file comments.php */
/* Location: ./application/controllers/comments.php */