<?php

class Articles_model extends CI_Model {
	
	function index($id) {
		$query = $this->db->query(
				'SELECT articles.*, 
						profiles.first, profiles.last, profiles.pic, 
						categories.name,
						simpleurl.url 
				 FROM articles 
				 JOIN profiles ON articles.profile_id=profiles.id 
				 JOIN simpleurl ON articles.simple_id=simpleurl.id 
				 JOIN categories ON articles.cat_id=categories.id 
				 WHERE articles.simple_id="'.$id.'"');
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
	
	function add($obj) {
		$this->db->query(
				"INSERT INTO simpleurl (
					template,
					model,
					function,
					premissions,
					active,
					url,
					name
				) 
				VALUES(
					'pages/article_entry',
					'articles_model',
					'index',
					'0',
					'1',
					'".$obj['url']."',
					'".$obj['title']."'
				)"
		);
		
		$simple = $this->db->query("SELECT id FROM simpleurl WHERE url='".$obj['url']."'");
		echo $simple;
		
		$this->db->query(
				"INSERT INTO articles (
					image, 
					headline, 
					subheadline, 
					lead, 
					body, 
					length, 
					profile_id, 
					date, 
					simple_id,
					cat_id
				 )
				 VALUES(
					'http://placehold.it/2800x1400', 
					'".$obj['title']."', 
					'Placeholder Subheadline', 
					'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean et justo quis erat consequat faucibus eu at sapien. Ut sollicitudin erat non cursus sollicitudin. Donec ultrices tortor dolor condimentum.', 
					'<div class=\"inner-container\"><p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean et justo quis erat consequat faucibus eu at sapien. Ut sollicitudin erat non cursus sollicitudin. Donec ultrices tortor dolor condimentum.</p></div>', 
					'15 minutes read', 
					'1', 
					'".date("Y-m-d")."',
					".$simple.",
					'1'
				)"
		);

	}
	
	function list_articles() {
		$articles = base_url().'services/articles';
		$articles_api = json_decode(file_get_contents($articles));
		return $articles_api;
	}
	
	function read() {
		$query = $this->db->query(
				'SELECT articles.*,  
						profiles.first, profiles.last, profiles.pic, 
						categories.name,
						simpleurl.url 
				 FROM articles 
				 JOIN profiles ON articles.profile_id=profiles.id 
				 JOIN simpleurl ON articles.simple_id=simpleurl.id 
				 JOIN categories ON articles.cat_id=categories.id 
				 ORDER BY articles.id'
		);
		if($query->num_rows() > 0) {
			foreach($query->result() as $row){
				$data[] = $row;
			}
			return $data;
		}
	}
	
	function find($params, $limit) {
		$query = $this->db->query(
				'SELECT articles.*, 
						profiles.*,
						categories.name, 
						simpleurl.url 
				 FROM articles 
				 JOIN profiles ON articles.profile_id=profiles.id 
				 JOIN simpleurl ON articles.simple_id=simpleurl.id 
				 JOIN categories ON articles.cat_id=categories.id 
				 WHERE articles.'.$params.' = "'.$limit.'"'
		);
		if($query->num_rows() > 0) {
			foreach($query->result() as $row){
				$data[] = $row;
			}
			return $data;
		}
	}
	
	function latest() {
		$query = $this->db->query(
				'SELECT articles.*, 
						profiles.*,
						categories.name, 
						simpleurl.url 
				 FROM articles 
				 JOIN profiles ON articles.profile_id=profiles.id 
				 JOIN simpleurl ON articles.simple_id=simpleurl.id 
				 JOIN categories ON articles.cat_id=categories.id 
				 ORDER BY articles.id DESC LIMIT 1'
		);
		if($query->num_rows() > 0) {
			foreach($query->result() as $row){
				$data[] = $row;
			}
			return $data;
		}
	}
	
	function recent(){
		$query = $this->db->query(
				'SELECT articles.*, 
						profiles.*, 
						categories.name,
						simpleurl.url 
				 FROM articles JOIN profiles ON articles.profile_id=profiles.id 
				 JOIN simpleurl ON articles.simple_id=simpleurl.id 
				 JOIN categories ON articles.cat_id=categories.id 
				 ORDER BY articles.id DESC LIMIT 5'
		);
		if($query->num_rows() > 0) {
			foreach($query->result() as $row){
				$data[] = $row;
			}
			return $data;
		}
	}
	
	function range($offset, $limit){
		$query = $this->db->query(
				'SELECT articles.*, 
						profiles.*, 
						categories.name,
						simpleurl.url 
				 FROM articles JOIN profiles ON articles.profile_id=profiles.id 
				 JOIN simpleurl ON articles.simple_id=simpleurl.id 
				 JOIN categories ON articles.cat_id=categories.id 
				 ORDER BY articles.id DESC LIMIT '.$offset.','.$limit
		);
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