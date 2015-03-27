<?php
class Registered extends CI_Model {

	function insert($data) {
		$this->db->insert('registered',$data);
	}
	
	function check_email($email) {
		$this->db->where('email',$email);
		$query = $this->db->get('registered');
		
		if($query->num_rows() > 0) {
			return 1;
		} else {
			return 0;
		}
	}
	
	function check_igname($igname) {
		$this->db->where('instagram_account',$igname);
		$query = $this->db->get('registered');
		
		if($query->num_rows() > 0) {
			return 1;
		} else {
			return 0;
		}
	}
	
	function get_name($fbid) {
		$this->db->where('fbid',$fbid);
		$query = $this->db->get('registered');
		
		foreach($query->result() as $user) {
			return $user->firstname.' '.$user->lastname;
		}
	}
	
	function get_igname($fbid) {
		$this->db->where('fbid',$fbid);
		$query = $this->db->get('registered');
		
		foreach($query->result() as $user) {
			return $user->instagram_account;
		}
	}
	
	function is_registered($fbid) {
		$this->db->where('fbid',$fbid);
		$query = $this->db->get('registered');
		
		if($query->num_rows() > 0) {
			return 1;
		} else {
			return 0;
		}
	}
	
	function get_all() {
		$this->db->order_by('date_registered','DESC');
		$query = $this->db->get('registered');
		
		return $query->result();
	}
}
?>