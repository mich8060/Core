<?php

class Feed_model extends CI_Model {
	
	function index(){
		$total = $this->read();
		$results = array_slice($total, 0, 20);
		return $results;
	}
	
	function read(){
		// Build Dribbble Likes Feed.
		$dribbble_likes = json_decode(file_get_contents('http://api.dribbble.com/players/mich8060/shots/likes?page=1&per_page=20'));
		$likes = array();
		foreach($dribbble_likes->shots as $s){
			 $likes[] = array(
				'type' 	=> 	'dribbble-likes',
			 	'url' 	=> 	$s->url,
				'image' =>  $s->image_url,
				'author'=>	$s->player->name,
				'author_url'	=>	$s->player->url,
				'date' => $s->created_at
			 );
		}
		
		$dribbble_shots = json_decode(file_get_contents('http://api.dribbble.com/players/mich8060/shots?page=1&per_page=20'));
		$shots = array();
		foreach($dribbble_shots->shots as $s){
			 $shots[] = array(
				'type' 	=> 	'dribbble-shots',
			 	'url' 	=> 	$s->url,
				'image' =>  $s->image_url,
				'date' => $s->created_at
			 );
		}
		
		$result = array_merge_recursive($likes, $shots);
		
		$articles = json_decode(file_get_contents(base_url().'/services/articles'));
		$article = array();
		foreach($articles as $a){
			$article[] = array(
				'type'	=>	'article',
				'image'	=>	base_url().$a->image,
				'title'	=>	$a->headline,
				'sub'	=>	$a->subheadline,
				'lead'	=>	$a->lead,
				'url'	=>	base_url().$a->url,
				'date'	=>	$a->date
			);
		}
		
		$result = array_merge_recursive($result, $article);
		
		$quotes = json_decode(file_get_contents(base_url().'/services/quote'));
		$quote = array();
		foreach($quotes as $q){
			$quote[] = array(
				"type"	=>	"quote",
				"quote"	=>	$q->quote,
				"author"=>	$q->author,
				"date"	=>	$q->q_date
			);
		}
			
		$result = array_merge_recursive($result, $quote);
		
		$status = json_decode(file_get_contents(base_url().'/services/status'));
		$stat = array();
		foreach($status as $s){
			$stat[] = array(
				'type'	=>	'status',
				'status'=>	$s->status,
				'photo'	=>	$s->photo,
				'video'	=>	$s->video,
				'date'	=>	$s->date
			);
		}	
		
		$result = array_merge_recursive($result, $stat);
		
		$sites = json_decode(file_get_contents(base_url().'/services/sites'));
		$site = array();
		foreach($sites as $s){
			$site[] = array(
				'type'	=>	'site',
				'image'	=>	$s->img,
				'url'	=>	$s->url,
				'date'	=>	$s->date
			);
		}	
		
		$result = array_merge_recursive($result, $site);
		
		// Order Feed by Date
		usort($result, function($a, $b) {
			$a = strtotime($a['date']);
			$b = strtotime($b['date']);
			return ($a < $b) ? -1 : 1;
		});
		
		return array_reverse($result);
	}
	
	function range($offset, $limit) {
		$total = $this->read();
		$results = array_slice($total, $offset, $limit);
		return $results;
	}
	
}

/* End of file feed_model.php */
/* Location: ./application/controllers/feed_model.php */