<?php
class Gifs extends CI_Model {

	function insert($data) {
		$this->db->insert('gifs',$data);
	}
	
	function delete($id) {
		$this->db->where('id',$id);
		$this->db->delete('gifs');
	}
	
	function get_all() {
		$this->db->order_by('date_generated','DESC');
		$query = $this->db->get('gifs');
		
		return $query->result();
	}
	
	function get_approved() {
		$this->db->where('approved',1);
		$this->db->order_by('date_generated','DESC');
		$query = $this->db->get('gifs');
		
		return $query->result();
	}
	
	function get_approved_owned($fbid) {
		$this->db->where('fbid',$fbid);
		$this->db->where('approved',1);
		$this->db->order_by('date_generated','DESC');
		$query = $this->db->get('gifs');
		
		return $query->result();
	}
	
	function set_approved($id,$val) {
		$this->db->where('id',$id);
		$data = array("approved" => $val);
		
		$this->db->update('gifs',$data);
	}
	
	function get_fbid($id) {
		$this->db->where('id',$id);
		$query = $this->db->get('gifs');
		
		foreach($query->result() as $gif) {
			return $gif->fbid;
		}
	}
	
	function get_url($id) {
		$this->db->where('id',$id);
		$query = $this->db->get('gifs');
		
		foreach($query->result() as $gif) {
			return 'http://dabdigs04.com/sanmigzero/images/uploads/'.$gif->fbid.'/gif/'.$gif->filename;
		}
	}
	
	function get_video_url($id) {
		$this->db->where('id',$id);
		$query = $this->db->get('gifs');
		
		foreach($query->result() as $gif) {
			return 'http://dabdigs04.com/sanmigzero/images/uploads/'.$gif->fbid.'/video/'.$gif->vid_filename;
		}
	}
	
	function get_png_url($id) {
		$this->db->where('id',$id);
		$query = $this->db->get('gifs');
		
		foreach($query->result() as $gif) {
			return 'http://dabdigs04.com/sanmigzero/images/uploads/'.$gif->fbid.'/png/'.$gif->png_filename;
		}
	}
	
	function get_shortname($id) {
		$this->db->where('id',$id);
		$query = $this->db->get('gifs');
		
		foreach($query->result() as $gif) {
			return $gif->shortname;
		}															
	}
	
	function total_likes($gifid) {
		$this->db->where('gif_id',$gifid);
		$this->db->from('gif_likes');
		
		return $this->db->count_all_results();
	}
	
	function total_shares($gifid) {
		$this->db->where('gif_id',$gifid);
		$this->db->from('gif_shares');
		
		return $this->db->count_all_results();
	}
}
?>