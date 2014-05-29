<?php

class Articles_model extends CI_Model {
	
	function index($id) {
		$query = $this->db->query('SELECT articles.id, articles.headline, articles.subheadline, articles.body, articles.length, articles.image, articles.profile_id, articles.date, articles.simple_id, profiles.first, profiles.last, profiles.pic, profiles.title, simpleurl.url FROM articles JOIN profiles ON articles.profile_id=profiles.id JOIN simpleurl ON articles.simple_id=simpleurl.id WHERE articles.simple_id = "'.$id.'"');
		if($query->num_rows() > 0) {
			foreach($query->result() as $row){
				$data[] = $row;
			}
			$article = base_url().'services/articles/id/'.$data[0]->id;
			$article_api = json_decode(file_get_contents($article));
			$comments = base_url().'services/comments/ref_id/'.$data[0]->id;
			$comments_api = json_decode(file_get_contents($comments));
			$results = array($article_api[0], $comments_api);
			return $results;
		}
	}
	
	function list_articles() {
		$articles = base_url().'services/articles';
		$articles_api = json_decode(file_get_contents($articles));
		return $articles_api;
	}
	
	function read() {
		$query = $this->db->query('SELECT articles.id, articles.headline, articles.subheadline, articles.body, articles.length, articles.image, articles.profile_id, articles.date, articles.simple_id, profiles.first, profiles.last, profiles.pic, profiles.title, simpleurl.url FROM articles JOIN profiles ON articles.profile_id=profiles.id JOIN simpleurl ON articles.simple_id=simpleurl.id ORDER BY articles.id');
		if($query->num_rows() > 0) {
			foreach($query->result() as $row){
				$data[] = $row;
			}
			return $data;
		}
	}
	
	function find($params, $limit) {
		$query = $this->db->query('SELECT articles.id, articles.headline, articles.subheadline, articles.body, articles.length, articles.image, articles.profile_id, articles.date, articles.simple_id, profiles.first, profiles.last, profiles.pic, profiles.title, simpleurl.url FROM articles JOIN profiles ON articles.profile_id=profiles.id JOIN simpleurl ON articles.simple_id=simpleurl.id WHERE articles.'.$params.' = "'.$limit.'"');
		if($query->num_rows() > 0) {
			foreach($query->result() as $row){
				$data[] = $row;
			}
			return $data;
		}
	}
	
	function latest() {
		$query = $this->db->query('SELECT articles.id, articles.headline, articles.subheadline, articles.body, articles.length, articles.image, articles.profile_id, articles.date, articles.simple_id, profiles.first, profiles.last, profiles.pic, profiles.title, simpleurl.url FROM articles JOIN profiles ON articles.profile_id=profiles.id JOIN simpleurl ON articles.simple_id=simpleurl.id ORDER BY articles.id DESC LIMIT 1');
		if($query->num_rows() > 0) {
			foreach($query->result() as $row){
				$data[] = $row;
			}
			return $data;
		}
	}
	
	function recent(){
		$query = $this->db->query('SELECT articles.id, articles.headline, articles.subheadline, articles.body, articles.length, articles.image, articles.profile_id, articles.date, articles.simple_id, profiles.first, profiles.last, profiles.pic, profiles.title, simpleurl.url FROM articles JOIN profiles ON articles.profile_id=profiles.id JOIN simpleurl ON articles.simple_id=simpleurl.id ORDER BY articles.id DESC LIMIT 5');
		if($query->num_rows() > 0) {
			foreach($query->result() as $row){
				$data[] = $row;
			}
			return $data;
		}
	}
	
	function range($offset, $limit){
		$query = $this->db->query('SELECT articles.id, articles.headline, articles.subheadline, articles.body, articles.length, articles.image, articles.profile_id, articles.date, articles.simple_id, profiles.first, profiles.last, profiles.pic, profiles.title, simpleurl.url FROM articles JOIN profiles ON articles.profile_id=profiles.id JOIN simpleurl ON articles.simple_id=simpleurl.id ORDER BY articles.id DESC LIMIT 0, 2');
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