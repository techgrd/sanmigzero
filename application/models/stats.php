<?php
class Stats extends CI_Model {

	function count_unique_users() {
		$this->db->from('fbuser');
		
		return $this->db->count_all_results();
	}
	
	function count_registered_users() {
		$this->db->from('registered');
		
		return $this->db->count_all_results();
	}
	
	function count_approved_gifs() {
		$this->db->where('approved',1);
		$this->db->from('gifs');
		
		return $this->db->count_all_results();
	}
	
	function count_pending_gifs() {
		$this->db->where('approved',0);
		$this->db->from('gifs');
		
		return $this->db->count_all_results();
	}
	
	function count_likes() {
		$this->db->from('gif_likes');
		
		return $this->db->count_all_results();
	}
	
	function count_shares() {
		$this->db->from('gif_shares');
		
		return $this->db->count_all_results();
	}
	
	function count_customized_gifs() {
		$this->db->where('approved',1);
		$this->db->where('customized',1);
		$this->db->from('gifs');
		
		return $this->db->count_all_results();
	}
	
	function count_default_gifs() {
		$this->db->where('approved',1);
		$this->db->where('customized',0);
		$this->db->from('gifs');
		
		return $this->db->count_all_results();
	}

}
?>