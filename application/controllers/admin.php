<?php
class Admin extends CI_Controller {

	function __construct() {
		parent::__construct();
		
		$this->load->model('registered');
		$this->load->model('activity_log','log');
		
		$timezone = "Asia/Manila";
		putenv ('TZ=' . $timezone);
		$this->today = date('Y-m-d h:i:s');
		$this->datetime = date('Ymd_his');
		$this->dateonly = date('Y-m-d');
	}
	
	function index() {
		$this->load->view('admin/login');
	}
	
	//Login
	function login() {
		$this->load->model('administrator','user');
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		$admin = $this->user->is_admin($username,$password);
		
		if($username == '' || $password == '') {
			echo "<script>alert('Invalid username or password.'); history.back(-1); exit;</script>"; exit;
		} 
		
		if($admin == 1) {
			//add to session
			$data = array("username" => $username);
			$this->session->set_userdata($data);
			
			redirect('admin/users');
		} else {
			echo "<script>alert('Invalid username or password.'); history.back(-1); exit;</script>"; exit;
		}
		//echo json_encode($data);
	}
	
	//Logout
	function logout() {
		$data = array("username" => "");
		$this->session->unset_userdata($data);
		$this->session->sess_destroy();
		
		redirect('admin/index');
	}
	
	//Users page
	function users() {
		if($this->session->userdata('username') == ''){
			redirect('admin/index');
		}
		$data['users'] = $this->registered->get_all();
		$data['log'] = $this->log;
		
		$this->load->view('admin/users',$data);
	}

	//Gallery page
	function gallery() {
		if($this->session->userdata('username') == ''){
			redirect('admin/index');
		}
		$this->load->model('gifs');
		$data['gifs'] = $this->gifs->get_all();
		$data['user'] = $this->registered;
		$data['gifmodel'] = $this->gifs;
		
		$this->load->view('admin/gallery',$data);
	}
	
	//Receipts page
	function receipts() {
		if($this->session->userdata('username') == ''){
			redirect('admin/index');
		}
		$this->load->model('receipts','rcpt');
		$data['receipts'] = $this->rcpt->get_all();
		$data['user'] = $this->registered;
		
		$this->load->view('admin/receipts',$data);
	}
	
	//Approve gif
	function approve_gif() {
		$this->load->model('gifs');
		$this->load->model('activity_log','log');
		$fbid = $this->input->post('fbid');
		$gifid = $this->input->post('gifid');
		$val = $this->input->post('val');
		$activity = "Generated a MOAB";
		
		if($val == 1) {
			//Record activity and add points
			$log_data = array(
						"fbid"			=>	$fbid,
						"activity"		=>	$activity,
						"points"		=>	10,
						"date_logged"	=>	$this->today
					);
			$this->log->insert($log_data);
		} else {
			$this->log->delete_activity($fbid,$activity);
		}
		
		$this->gifs->set_approved($gifid,$val);
	}
	
	//Approve receipts
	function approve_receipt() {
		$this->load->model('receipts','rcpt');
		$this->load->model('activity_log','log');
		$fbid = $this->input->post('fbid');
		$gifid = $this->input->post('receiptid');
		$val = $this->input->post('val');
		$activity = "Submitted Proof of Purchase";
		
		if($val == 1) {
			//Record activity and add points
			$log_data = array(
						"fbid"			=>	$fbid,
						"activity"		=>	$activity,
						"points"		=>	10,
						"date_logged"	=>	$this->today
					);
			$this->log->insert($log_data);
		} else {
			$this->log->delete_activity($fbid,$activity);
		}
		
		$this->rcpt->set_approved($gifid,$val);
	}
	
	//Stats page
	function statistics() {
		$this->load->model('stats');
		$data['stats'] = $this->stats;
		$this->load->view('admin/statistics',$data);
	}
	
	//My Thoughts 
	function mythoughts() {
		$this->load->model('mythoughts2_model');
		$this->load->model('registered');
		$data['mythoughts'] = $this->mythoughts2_model;
		$data['answers'] = $this->mythoughts2_model->get_all();
		$data['user'] = $this->registered;
		$this->load->view('admin/mythoughts',$data);
	}
}
?>