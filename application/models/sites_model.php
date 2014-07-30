<?php

class Sites_model extends CI_Model {
	function add($obj) {
		$img = $_POST['image'];
		$img = str_replace('data:image/png;base64,', '', $img);
		$img = str_replace(' ', '+', $img);
		$data = base64_decode($img);
		$file = 'img/sites/' . uniqid() . '.png';
		file_put_contents($file, $data);
		$this->db->query(
			"INSERT INTO sites (
				img,
				url,
				date
			) 
			VALUES(
				'".$file."',
				'".$obj['url']."',
				'".date('Y-m-d H:i:s')."'
			)"
		);
	}
	
	function read() {
		$query = $this->db->query(
				'SELECT * FROM sites ORDER BY id ASC'
		);
		if($query->num_rows() > 0) {
			foreach($query->result() as $row){
				$data[] = $row;
			}
			return $data;
		}
	}
}

/* End of file sites_model.php */
/* Location: ./application/controllers/sites_model.php */