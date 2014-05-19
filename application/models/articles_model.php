<?php

class Articles_model extends CI_Model {
	
	function index($id) {
		// Decides which article number to serve based on simple url schema 
		$query = $this->db->query('SELECT articles.id, articles.headline, articles.subheadline, articles.body, articles.length, articles.image, articles.profile_id, articles.date, articles.simple_id, profiles.first, profiles.last, profiles.pic, profiles.title FROM articles JOIN profiles ON articles.profile_id=profiles.id WHERE articles.simple_id = "'.$id.'"');
		if($query->num_rows() > 0) {
			foreach($query->result() as $row){
				$data[] = $row;
			}
			$url = base_url().'services/articles/id/'.$data[0]->id;
			$api = json_decode(file_get_contents($url));
			return $api[0];
		}
	}
	
	function read() {
		$query = $this->db->query('SELECT articles.id, articles.headline, articles.subheadline, articles.body, articles.length, articles.image, articles.profile_id, articles.date, articles.simple_id, profiles.first, profiles.last, profiles.pic, profiles.title FROM articles JOIN profiles ON articles.profile_id=profiles.id ORDER BY articles.id');
		if($query->num_rows() > 0) {
			foreach($query->result() as $row){
				$data[] = $row;
			}
			return $data;
		}
	}
	
	function find($params, $limit) {
		$query = $this->db->query('SELECT articles.id, articles.headline, articles.subheadline, articles.body, articles.length, articles.image, articles.profile_id, articles.date, articles.simple_id, profiles.first, profiles.last, profiles.pic, profiles.title FROM articles JOIN profiles ON articles.profile_id=profiles.id WHERE articles.'.$params.' = "'.$limit.'"');
		if($query->num_rows() > 0) {
			foreach($query->result() as $row){
				$data[] = $row;
			}
			return $data;
		}
	}
	
	function latest() {
		$query = $this->db->query('SELECT articles.id, articles.headline, articles.subheadline, articles.body, articles.length, articles.image, articles.profile_id, articles.date, articles.simple_id, profiles.first, profiles.last, profiles.pic, profiles.title FROM articles JOIN profiles ON articles.profile_id=profiles.id ORDER BY articles.id DESC LIMIT 1');
		if($query->num_rows() > 0) {
			foreach($query->result() as $row){
				$data[] = $row;
			}
			return $data;
		}
	}
	
	function recent() {
		$query = $this->db->query('SELECT articles.id, articles.headline, articles.subheadline, articles.body, articles.length, articles.image, articles.profile_id, articles.date, articles.simple_id, profiles.first, profiles.last, profiles.pic, profiles.title FROM articles JOIN profiles ON articles.profile_id=profiles.id ORDER BY articles.id DESC LIMIT 5');
		if($query->num_rows() > 0) {
			foreach($query->result() as $row){
				$data[] = $row;
			}
			return $data;
		}
	}
	
}

/* End of file simple_model.php */
/* Location: ./application/controllers/simple_model.php */