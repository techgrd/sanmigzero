<?php
class Receipts extends CI_Model {

	function insert($data) {
		$this->db->insert('receipts',$data);
	}
	
	function get_all() {
		$query = $this->db->get('receipts');
		
		return $query->result();
	}
	
	function get_approved() {
		$this->db->where('approved',1);
		$query = $this->db->get('receipts');
		
		return $query->result();
	}
	
	function set_approved($id,$val) {
		$this->db->where('id',$id);
		$data = array("approved" => $val);
		
		$this->db->update('receipts',$data);
	}

}
?>