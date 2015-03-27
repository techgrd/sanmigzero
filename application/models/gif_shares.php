<?php
class Gif_shares extends CI_Model {

	function insert($data) {
		$this->db->insert('gif_shares',$data);
	}
	
	function total_shares($fbid) {
		$this->db->where('fbid',$fbid);
		$this->db->from('gif_shares');
		
		return $this->db->count_all_results();
	}

}
?>