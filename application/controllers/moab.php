<?php
class Moab extends CI_Controller {

	function __construct() {
		parent::__construct();
	}
	
	function gif() {
		$shortname = $this->uri->segment(3);
		$this->load->model('gifs');
		
		$url = $this->gifs->get_url($shortname);
		redirect($url);
	}

}
?>