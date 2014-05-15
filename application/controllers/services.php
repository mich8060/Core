<?php

class Services extends CI_Controller {
	public function index() {
		
		// Requests from the same server don't have a HTTP_ORIGIN header
		if (!array_key_exists('HTTP_ORIGIN', $_SERVER)) {
		    $_SERVER['HTTP_ORIGIN'] = $_SERVER['SERVER_NAME'];
		}
		
		$_SERVER['API_KEY'] = $this->config->item('api_key');

		echo "<pre>";
		print_r($_SERVER);
		echo "</pre>";
		
	}
}

/* End of file services.php */
/* Location: ./application/controllers/services.php */