<?php

class Site extends CI_Controller {
	
	function index() {
		
		$data;
		
		$this->load->model('simple_model');
		$data['control'] = $this->simple_model->simpleurl();
	
		// Create variable from multidimensional array to make more accesable. 
		$obj = $data['control'];	
		
		if(!$obj->active) {
			show_404('/this_page_was_not_found', FALSE);
		}
		
		if($this->agent->is_mobile()){
			if($this->agent->mobile() == 'iPad') {
		    	$data['mobile'] = 'Tablet';
		    }else{
				$data['mobile'] = 'Phone';
			}
		}else{
			$data['mobile'] = 'Desktop';
		}
		
		// Verify if a model is associated with this item.
		if($obj->model) {
			$models = explode(" ", $obj->function);
			$model = $obj->model;
			$this->load->model($model);
			
			foreach($models as $m){
				// Create variables to make more accesable. 
				$function = $m;
				$data[$m] = $this->$model->$function($obj->id);
			}
		}
		
		// Compile back into a format that codeigniter is familiar with.
		$data['template'] = $obj->template;
		
		// Load Templates
		$this->load->view('sections/template', $data);
	}
	
}