<?phpclass Mythoughts_model extends CI_Model {	function insert($data) {		$this->db->insert('mythoughts',$data);	}		function count_answers($question_id) {		$query = $this->db->query("SELECT COUNT(fbid) as total FROM mythoughts WHERE question_id = ".$question_id);				foreach($query->result() as $answers) {			return $answers->total;		}	}		function user_has_answered($fbid) {		$this->db->where('fbid',$fbid);		$query = $this->db->get('mythoughts');				if($query->num_rows() > 0) {			return 1;		} else {			return 0;		}	}		function get_all() {		$query = $this->db->get('mythoughts');				return $query->result();	}		function get_question($question_id) {		$this->db->where('id',$question_id);		$query = $this->db->get('question');				foreach($query->result() as $question) {			return $question->fulltext;		}	}}?>