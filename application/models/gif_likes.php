<?php
class Gif_likes extends CI_Model {

	function insert($data) {
		$this->db->insert('gif_likes',$data);
	}
	
	function total_likes($fbid) {
		$this->db->where('fbid',$fbid);
		$this->db->from('gif_likes');
		
		return $this->db->count_all_results();
	}

}
?>