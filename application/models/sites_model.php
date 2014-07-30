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
				url
			) 
			VALUES(
				'".$file."',
				'".$obj['url']."'
			)"
		);
	}
}

/* End of file sites_model.php */
/* Location: ./application/controllers/sites_model.php */