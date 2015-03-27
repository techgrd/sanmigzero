<?php 
class Fbuser extends CI_Model {

	function __construct() {
		parent::__construct();
	}
	
	function insert($data) {
		$this->db->insert('fbuser',$data);
	}
	
	function update($data) {
		$this->db->update('fbuser',$data);
	}
	
	function delete($id) {
		$this->db->where('id',$id);
		$this->db->delete('fbuser');
	}
	
	function check_existing($fbid) {
		$this->db->where('fbid',$fbid);
		$query = $this->db->get('fbuser');
		
		return $query->num_rows();
	}
	
	function count_users() {
		$this->db->select('fbid');
		$this->db->from('fbuser');
		
		return $this->db->count_all_results();
	}
}
?>