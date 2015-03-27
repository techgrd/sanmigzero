<?php
class Administrator extends CI_Model {

	function insert($data) {
		$this->db->insert('admin',$data);
	}
	
	function is_admin($username,$password) {
		$this->db->where('username',$username);
		$this->db->where('password',$password);
		$query = $this->db->get('admin');
		
		if($query->num_rows() > 0) {
			return 1;
		} else {
			return 0;
		}
	}

}
?>