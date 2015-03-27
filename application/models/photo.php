<?php
class Photo extends CI_Model {

	function insert($data) {
		$this->db->insert('photo',$data);
	}

}
?>