<?php

class Forms extends CI_Controller {
	
	public function index(){
		$form = $this->uri->segment(2);
		
		switch ($form) {
		    case "comments":
				$obj = $this->clean($_POST);
				$this->load->model("comments_model");
				$this->comments_model->add($obj);
		        break;
			case "articles":
				$obj = $this->clean($_POST);
				$this->load->model("articles_model");
				$this->articles_model->add($obj);
		        break;
			case "sites":
				$obj = $this->clean($_POST);
				$this->load->model("sites_model");
				$this->sites_model->add($obj);
		        break;
		    default:
				show_404('/this_page_was_not_found', FALSE);
				break;
		}
	}
	
	private function clean($obj){
		$cleaned = Array();
		foreach ($obj as $key => $value) {
			$cleaned[$key] = strip_tags(htmlspecialchars(trim( $value)));
		}
		return $cleaned;
	}
	
}

/* End of file forms.php */
/* Location: ./application/controllers/forms.php */