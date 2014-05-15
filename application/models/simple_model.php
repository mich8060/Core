<?php

class Simple_model extends CI_Model {
	
	function simpleurl() {
		$query = $this->db->query('SELECT template, model, function, premissions, active FROM simpleurl WHERE url = "'.$this->uri->segment(1).'"'); 
		if ($query->num_rows() > 0) {
		   $row = $query->row(); 
		   return $row;
		}else{
			show_404('/this_page_was_not_found', FALSE);
		}
	}
	
}