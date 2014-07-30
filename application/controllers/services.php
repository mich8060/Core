<?php

class Services extends CI_Controller {
	public function index() {
		
		// For Future Reference
		$method = $_SERVER['REQUEST_METHOD'];
		$data = explode('/', rtrim($_SERVER['REDIRECT_QUERY_STRING'], '/'));
		
		// Existing API's 
		$list = array(
			"articles",
			"comments",
			"feed",
			"quote",
			"status",
			"books",
			"sites"
		);
		
		if(in_array(strtolower($data[2]), $list)){
			//Divide the traffic based on parameters 
			$model = strtolower($data[2])."_model";
			$this->load->model($model);
			if(isset($data[3])){
				if($data[3] == "latest"){
					$params = mysql_real_escape_string(strtolower($data[3]));
					$data = $this->$model->latest();
					$this->build($data);
				}elseif($data[3] == "recent"){
					$params = mysql_real_escape_string(strtolower($data[3]));
					$data = $this->$model->recent();
					$this->build($data);
				}elseif($data[3] == "offset"){
					if(isset($data[4]) && isset($data[5])){
						$offset = $data[4];
						$limit = $data[5];
						$params = mysql_real_escape_string(strtolower($data[4]));
						$limit = mysql_real_escape_string(strtolower($data[5]));
						$data = $this->$model->range($offset, $limit);
						$this->build($data);
					}elseif(!isset($data[4]) && !isset($data[5])){
						$data = $this->$model->range(0, 20);
						$this->build($data);
					}else{
						show_404('/this_page_was_not_found', FALSE);
					}
				}else{
					if(isset($data[4])){
						$params = mysql_real_escape_string(strtolower($data[3]));
						$limit = mysql_real_escape_string(strtolower($data[4]));
						$data = $this->$model->find($params, $limit);
						$this->build($data);
					}else{
						show_404('/this_page_was_not_found', FALSE);
					}
				}
			}elseif(!isset($data[3])){
				$data = $this->$model->read();
				$this->build($data);
			}else{
				show_404('/this_page_was_not_found', FALSE);
			}
		}else{
			show_404('/this_page_was_not_found', FALSE);
		}
		
	}
	
	function build($obj) {
		header("Access-Control-Allow-Orgin: *");
        header("Access-Control-Allow-Methods: *");
        header("Content-Type: application/json");
		echo json_encode($obj);
	}
}

/* End of file services.php */
/* Location: ./application/controllers/services.php */