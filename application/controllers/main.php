<?php
class Main extends CI_Controller {

	private $today;
	private $datetime;
	private $dateonly;

	function __construct() {
		parent::__construct();
		
		//Load FB
		$fbconfig = array(
			"appId"		=>	"530656457064285",
			"secret"	=>	"f9b5fec6eaf8a48d09180d082616cb04"
		);
		$this->load->library("facebook",$fbconfig);
		
		$timezone = "Asia/Manila";
		putenv ('TZ=' . $timezone);
		$this->today = date('Y-m-d h:i:s');
		$this->datetime = date('Ymd_his');
		$this->dateonly = date('Y-m-d');
	}
	
	function index() {
		//Get current user fbid
		$user = $this->facebook->getUser();
		$redirect_url = "https://apps.facebook.com/smzmessageonabottle";
		//$redirect_url = "https://dabdigs04.com/sanmigzero";

        if ($user) {
            try {
				
				//Create user folder in server
				$userfolder = './images/uploads/'.$user.'/';
				$usergif = './images/uploads/'.$user.'/gif/';
				$userpng = './images/uploads/'.$user.'/png/';
				$uservideo = './images/uploads/'.$user.'/video/';
				$userreceipt = './images/uploads/'.$user.'/receipt/';
				if (!file_exists($userfolder)) {
					mkdir($userfolder, 0777, true);
					mkdir($usergif, 0777, true);
					mkdir($userpng, 0777, true);
					mkdir($uservideo, 0777, true);
					mkdir($userreceipt, 0777, true);
				}
				
				//Insert unique visitor
				$userprofile = $this->facebook->api('/me');
				$fbuser = array(
							"fbid"			=>	$user,
							"firstname"		=>	$userprofile['first_name'],
							"lastname"		=>	$userprofile['last_name'],
							"fullname"		=>	$userprofile['first_name'].' '.$userprofile['last_name'],
							"email"			=>	isset($userprofile['email']) ? $userprofile['email'] : "na",
							"gender"		=>	isset($userprofile['gender']) ? $userprofile['gender'] : "na",
							"birthday"		=>	isset($userprofile['birthday']) ? $userprofile['birthday'] : "na",
							"ip_address"	=>	$this->session->userdata('ip_address'),
							"first_visit"	=>	$this->today
						);
				$this->load->model('fbuser');
				$exists = $this->fbuser->check_existing($user);
				if($exists == 0) {
					$this->fbuser->insert($fbuser);
				}
				
				//Add data to session
				$data = array(
							"firstname"	=>	$userprofile['first_name'],
							"lastname"	=>	$userprofile['last_name']
						);
				$this->session->set_userdata($data);
				
				$this->home();
				
            } catch (FacebookApiException $e) {
				$url = $this->facebook->getLoginUrl(array('redirect_uri' => $redirect_url,'scope' => 'email,publish_actions'));
				echo "<script>window.top.location.href = '".$url."';</script>";
				exit($e);
            }
        } else {
			$url = $this->facebook->getLoginUrl(array('redirect_uri' => $redirect_url, 'scope' => 'email,publish_actions'));
			echo "<script>window.top.location.href = '".$url."';</script>";
			exit;
		}
	}
	
	function home() {
		$user = $this->facebook->getUser();
		$userprofile = $this->facebook->api('/me');
		$this->load->model('registered');
		
		$data['is_registered'] = $this->registered->is_registered($user);
		$data['fbid'] = $user;
		$data['firstname'] = $userprofile['first_name'];
		$data['lastname'] = $userprofile['last_name'];
		$data['email'] = isset($userprofile['email']) ? $userprofile['email'] : "";
		$data['gender'] = isset($userprofile['gender']) ? $userprofile['gender'] : "";
		$this->load->view('home',$data);
	}
	
	function registration() {
		$user = $this->facebook->getUser();
		$this->load->model('registered');
		
		$data['is_registered'] = $this->registered->is_registered($user);
		$data['fbid'] = $user;
		$this->load->view('registration',$data);
	}
	
	function account() {
		$user = $this->facebook->getUser();
		$this->load->model('registered');
		$this->load->model('activity_log','logs');
		
		$data['logs'] = $this->logs->get_activities($user);
		$data['total_points'] = $this->logs->get_total_points($user);
		$data['is_registered'] = $this->registered->is_registered($user);
		$data['fbid'] = $user;
		$this->load->view('account',$data);
	}
	
	function moab() {
		$user = $this->facebook->getUser();
		$this->load->model('registered');
		
		$data['is_registered'] = $this->registered->is_registered($user);
		$data['fbid'] = $user;
		$this->load->view('moab',$data);
	}
	
	function gallery() {
		$user = $this->facebook->getUser();
		$this->load->model('gifs');
		$this->load->model('registered');
		
		$data['is_registered'] = $this->registered->is_registered($user);
		$data['fbid'] = $user;
		$data['gifs'] = $this->gifs->get_approved();
		$data['model'] = $this->gifs;
		$data['user'] = $this->registered;
		$this->load->view('gallery',$data);
	}
	
	function mygallery() {
		$user = $this->facebook->getUser();
		$this->load->model('gifs');
		$this->load->model('registered');
		
		$data['is_registered'] = $this->registered->is_registered($user);
		$data['fbid'] = $user;
		$data['gif_model'] = $this->gifs;
		$data['gifs'] = $this->gifs->get_approved_owned($user);
		$data['user'] = $this->registered;
		$this->load->view('mygallery',$data);
	}
	
	function mechanics() {
		$user = $this->facebook->getUser();
		$this->load->model('registered');
		
		$data['is_registered'] = $this->registered->is_registered($user);
		$data['fbid'] = $user;
		$this->load->view('mechanics',$data);
	}
	
	function mythoughts() {
		$user = $this->facebook->getUser();
		$this->load->model('registered');
		
		$data['is_registered'] = $this->registered->is_registered($user);
		$data['fbid'] = $user;
		$this->load->view('mythoughts',$data);
	}
	
	function upload_form() {
		$user = $this->facebook->getUser();
		
		$data['fbid'] = $user;
		$this->load->view('uploadform',$data);
	}
	
	function upload() {
		$user = $this->facebook->getUser();
		$target_dir = "./images/uploads/".$user."/";
		$target_dir = $target_dir . 'myphoto.jpg';
		$uploadFile_size = $_FILES['uploadFile']['size'];
		$uploadFile_type = $_FILES['uploadFile']['type'];
		$uploadOk = 1;

		// Check if file already exists
		/*
		if (file_exists($target_dir . $_FILES["uploadFile"]["name"])) {
			echo "Sorry, file already exists.";
			$uploadOk = 0;
		}*/

		// Check file size
		if ($uploadFile_size > 500000) {
			echo "<script>alert('Sorry, your file is too large.'); history.back(-1);</script>";
			//echo "<input type='button' value='back' onclick='history.back(-1)' />";
			$uploadOk = 0;
			exit;
		}

		// Only JPG files allowed
		if (!($uploadFile_type == "image/jpeg")) {
			echo "<script>alert('Sorry, only JPG files are allowed.'); history.back(-1);</script>";
			//echo "<input type='button' value='back' onclick='history.back(-1)' />";
			$uploadOk = 0;
			exit;
		}

		// Check if $uploadOk is set to 0 by an error
		if ($uploadOk == 0) {
			echo "Sorry, your file was not uploaded.";
			exit;
		// if everything is ok, try to upload file
		} else {
			if (move_uploaded_file($_FILES["uploadFile"]["tmp_name"], $target_dir)) {
				redirect('main/upload_form');
			} else {
				echo "Sorry, there was an error uploading your file.<br /><br /><br /><br />";
				echo "<input type='button' value='back' onclick='history.back(-1)' />";
				exit;
			}
		}
	}
	
	//Upload generated GIF
	function upload_gif() {
		$user = $this->facebook->getUser();
		$img = $this->input->post('base64img');
		$defmsg = $this->input->post('defmsg');
		$message = $this->input->post('custommsg');
		$img = str_replace('data:image/gif;base64,', '', $img);
		$img = str_replace(' ', '+', $img);
		$data = base64_decode($img);
		$rawfile = $this->datetime;
		$filename = $rawfile.'.gif';
		$file = './images/uploads/'.$user.'/gif/'.$filename;
		$uploaded = file_put_contents($file,$data);
		
		//active if default message
		if($defmsg == 1) {
			$approved = 1;
			$customized = 0;
		} else {
			$approved = 0;
			$customized = 1;
		}
		
		//add video version
		echo shell_exec("convert -coalesce /home/dabdigs04/dabdigs04.com/sanmigzero/images/uploads/".$user."/gif/".$rawfile.".gif /home/dabdigs04/dabdigs04.com/sanmigzero/images/uploads/".$user."/".$rawfile."%03d.png");
		
		//move last frame to png folder
		$files = glob("./images/uploads/".$user."/*.png");
		$files = array_combine($files, array_map("filemtime", $files));
		arsort($files);
		rename(key($files),'./images/uploads/'.$user.'/png/'.$rawfile.'.png');

		echo shell_exec('ffmpeg -framerate 2/5 -i /home/dabdigs04/dabdigs04.com/sanmigzero/images/uploads/'.$user.'/'.$rawfile.'%03d.png -vf "format=yuv420p" /home/dabdigs04/dabdigs04.com/sanmigzero/images/uploads/'.$user.'/video/'.$rawfile.'.mp4');
		
		
		//delete generated multiple png files used for conversion
		array_map('unlink', glob('./images/uploads/'.$user.'/*.png'));
		
		if($uploaded) {
			//save data to db
			$this->load->model('gifs');
			$shortname = substr(strtolower(preg_replace('/[0-9_\/]+/','',base64_encode(sha1($rawfile)))),0,8);
			$data = array(
						"fbid"				=>	$user,
						"filename"			=>	$filename,
						"vid_filename"		=>	$rawfile.'.mp4',
						"png_filename"		=>	$rawfile.'.png',
						"message"			=>	$message,
						"customized"		=>	$customized,
						"shortname"			=>	$shortname,
						"date_generated"	=>	$this->today,
						"approved"			=>	$approved
					);
			$this->gifs->insert($data);
			
			//delete myphoto
			if(file_exists('./images/uploads/'.$user.'/myphoto.jpg')) {
				unlink('./images/uploads/'.$user.'/myphoto.jpg');
			}
		}
		
		redirect('main/mygallery');
	}
	
	//Register user
	function register() {
		$user = $this->facebook->getUser();
		$this->load->model('registered');
		
		$firstname = $this->input->post('firstname');
		$lastname = $this->input->post('lastname');
		$gender = $this->input->post('gender');
		$city = $this->input->post('city');
		$province = $this->input->post('province');
		$contactnum = $this->input->post('contactnum');
		//$igname = $this->input->post('igname');
		$email = $this->input->post('email');
		$subscribe = $this->input->post('subscribe');
		//$read_mechanics = $this->input->post('read_mechanics');
		
		//birthdate
		$year = $this->input->post('year');
		$month = $this->input->post('month');
		$day = $this->input->post('day');
		
		//validate fields
		if($firstname == '') {
			$errormsg = "Name is incomplete. Please provide your full name.";
		}else if($lastname == '') {
			$errormsg = "Name is incomplete. Please provide your full name.";
		}else if($gender == '') {
			$errormsg = "Please select a gender.";
		//}else if($igname == '') {
			//$errormsg = "Please provide your Instagram Account Name.";
		}else if($year == '' || $month == '' || $day == '') {
			$errormsg = "Provided birthdate is invalid.";
		}else if($city == '') {
			$errormsg = "Please provide your city";
		}else if($province == '') {
			$errormsg = "Please provide your province";
		}else if($contactnum == '') {
			$errormsg = "Please provide your contact number";
		}else if($email == '') {
			$errormsg = "Please provide your email address";
		}else if($this->check_email_address($email) == false) {
			$errormsg = "Please provide a valid email address.";
		}else if($this->registered->check_email($email) == 1) {
			$errormsg = "The provided email address was already used by another user. Please try a different one.";
		//}else if($this->registered->check_igname($igname) == 1) {
			//$errormsg = "The provided Instagram account name was already registered. Please try a different one.";
		//}else if($read_mechanics == 0) {
			//$errormsg = "Please confirm if you have fully read the mechanics.";
		} else {
			$errormsg = '';
		}
		
		if($errormsg != '') {
			//Return json
			$data = array(
						"success"	=>	0,
						"errormsg"	=>	$errormsg
					);
			
			echo json_encode($data);
			exit;
		} else {
		
			//Store form data to array data
			$regdata = array(
						"fbid"				=>	$user,
						"firstname"			=>	$firstname,
						"lastname"			=>	$lastname,
						"gender"			=>	$gender,
						"birthday"			=>	$year.'-'.$month.'-'.$day,
						"city"				=>	$city,
						"province"			=>	$province,
						"contactnum"		=>	$contactnum,
						"email"				=>	$email,
						"subscribed"		=>	$subscribe,
						"date_registered"	=>	$this->today
					);
			
			//Save data
			$this->registered->insert($regdata);

			//Return json
			$data = array(
						"success"	=>	1
					);
			echo json_encode($data);
			exit;
		}
		
	}
	
	//Check Leap Year
	function isleapyear() {
		$year = $this->input->post('year');
		$selectid = $this->input->post('selectid');
		$data = array(
					"isLeapYear"	=> date('L',strtotime($year.'-01-01'))
				);
		echo json_encode($data);
	}
	
	//Validate email address
	function check_email_address($email) { 
		return filter_var($email, FILTER_VALIDATE_EMAIL);	
	}
	
	//Upload SMZ receipt
	function upload_receipt() {
		$user = $this->facebook->getUser();
		$filename = $this->datetime.".jpg";
		$target_dir = "./images/uploads/".$user."/receipt/".$filename;
		$uploadFile_size = $_FILES['receiptimg']['size'];
		$uploadFile_type = $_FILES['receiptimg']['type'];
		
		// Only JPG files allowed
		if (!($uploadFile_type == "image/jpeg")) {
			echo "<script>alert('Sorry, only JPG files are allowed.'); history.back(-1);</script>";
			exit;
		}
		
		// Check file size
		if ($uploadFile_size > 500000) {
			echo "<script>alert('Sorry, your file is too large.'); history.back(-1);</script>";
			exit;
		}
		
		if (move_uploaded_file($_FILES["receiptimg"]["tmp_name"], $target_dir)) {
			$this->load->model('receipts');
			$data = array(
						"fbid"				=>	$user,
						"filename"			=>	$filename,
						"date_submitted"	=>	$this->today
					);
			$this->receipts->insert($data);
			
			redirect('main/account');
		} else {
			echo "Sorry, there was an error uploading your file.<br /><br /><br /><br />";
			echo "<input type='button' value='back' onclick='history.back(-1)' />";
			exit;
		}
	}
	
	//Like GIF
	function like_gif() {
		$this->load->model('gifs');
		$this->load->model('gif_likes','likes');
		$fbid = $this->input->post('fbid');
		$gifid = $this->input->post('gifid');
		
		$data = array(
					"fbid"			=> $fbid,
					"gif_id"		=> $gifid,
					"date_liked"	=> $this->today
				);
		$this->likes->insert($data);
		
		//Record activity and add points
		$this->load->model('activity_log','log');
		$activity = 'Liked a MOAB';
		$log_data = array(
					"fbid"			=>	$fbid,
					"activity"		=>	$activity,
					"points"		=>	5,
					"date_logged"	=>	$this->today
				);
		$this->log->insert($log_data);
		
		//Record activity - somebody liked your MOAB
		$activity2 = 'MOAB was liked by a user.';
		$log_data2 = array(
					"fbid"			=>	$this->gifs->get_fbid($gifid),
					"activity"		=>	$activity2,
					"points"		=>	5,
					"date_logged"	=>	$this->today
				);
		$this->log->insert($log_data2);
		
		$total_likes = $this->gifs->total_likes($gifid);
		
		$data = array(
						"likes" => $total_likes,
						"gifid"	=> $gifid
					);
		echo json_encode($data);
	}
	
	//Share GIF
	function share_gif() {
		$this->load->model('gifs');
		$this->load->model('gif_shares','shares');
		$fbid = $this->input->post('fbid');
		$gifid = $this->input->post('gifid');
		
		$data = array(
					"fbid"			=> $fbid,
					"gif_id"		=> $gifid,
					"date_shared"	=> $this->today
				);
		$this->shares->insert($data);
		
		//Record activity and add points
		$this->load->model('activity_log','log');
		$activity = 'Shared a MOAB';
		$log_data = array(
					"fbid"			=>	$fbid,
					"activity"		=>	$activity,
					"points"		=>	5,
					"date_logged"	=>	$this->today
				);
		$this->log->insert($log_data);
		
		//Record activity - somebody liked your MOAB
		$activity2 = 'MOAB was shared by a user.';
		$log_data2 = array(
					"fbid"			=>	$this->gifs->get_fbid($gifid),
					"activity"		=>	$activity2,
					"points"		=>	5,
					"date_logged"	=>	$this->today
				);
		$this->log->insert($log_data2);
	}
	
	//download gif
	function download() {
		$type = $this->uri->segment(3);
		$fbid = $this->uri->segment(4);
		$img = $this->uri->segment(5);
		if($type == 'gif') {
			$file = './images/uploads/'.$fbid.'/gif/'.$img;
			$ext = '.gif';
		} else if($type == 'video') {
			$file = './images/uploads/'.$fbid.'/video/'.$img;
			$ext = '.mp4';
		} else if($type == 'png') {
			$file = './images/uploads/'.$fbid.'/png/'.$img;
			$ext = '.png';
		}

		if (file_exists($file)) {
			header('Content-Description: File Transfer');
			header('Content-Type: application/octet-stream');
			header('Content-Disposition: attachment; filename=mymoab'.$ext);
			readfile($file);
		}
	}
	
}
?>