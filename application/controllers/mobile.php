<?phpclass Mobile extends CI_Controller {	function __construct() {		parent::__construct();				//Load FB		$fbconfig = array(			"appId"		=>	"530656457064285",			"secret"	=>	"f9b5fec6eaf8a48d09180d082616cb04"		);		$this->load->library("facebook",$fbconfig);				$timezone = "Asia/Manila";		putenv ('TZ=' . $timezone);		$this->today = date('Y-m-d h:i:s');		$this->datetime = date('Ymd_his');		$this->dateonly = date('Y-m-d');	}		function index() {		//Get current user fbid		$user = $this->facebook->getUser();		$redirect_url = "https://apps.facebook.com/smzmessageonabottle";		//$redirect_url = "https://dabdigs04.com/sanmigzero/mobile/";				if($user) {					try {				//Save Profile info to session				$userprofile = $this->facebook->api('/me');				$photo = $this->facebook->api('/me/picture?redirect=0&height=300&type=large&width=240');								$url = $photo['data']['url'];				$content = file_get_contents($url);				$save_path = './images/photo/'.$user.'/';								//Create Subdirectory per FBID				if(!file_exists($save_path)) {						mkdir($save_path, 0777, true);						chmod($save_path, 0777);					}								$fileName = $save_path.'profilepic.jpg';				$file = fopen($fileName, 'w+');				fputs($file, $content);				fclose($file);								//print "<pre>";				//print_r($userprofile); exit;								$data['name'] = $userprofile['name'];				$data['fbid'] = $user;				$data['firstname'] = $userprofile['first_name'];				$data['lastname'] = $userprofile['last_name'];				$data['fullname'] = $userprofile['first_name'].' '.$userprofile['last_name'];				$this->session->set_userdata($data);								$this->load->view('mobile/home');							} catch(FacebookApiException $e) {				$url = $this->facebook->getLoginUrl();				echo "<script>window.top.location.href = '".$url."';</script>";				exit($e);			}		} else {			$url = $this->facebook->getLoginUrl();			echo "<script>window.top.location.href = '".$url."';</script>";			exit;		}	}		function generator() {		$data['message'] = $this->input->post('message');		$data['background'] = $this->input->post('background');		$this->load->view('mobile/generator',$data);	}		function upload() {		//save message to session		$mymessage = $this->input->post('mymessage');		$mydata = array(					"caption"	=>	$mymessage				);		$this->session->set_userdata($mydata);				//upload photo		$user = $this->facebook->getUser();		$save_path = './images/uploads/'.$user.'/';						//Create Subdirectory per FBID		if(!file_exists($save_path)) {				mkdir($save_path, 0777, true);				chmod($save_path, 0777);			}		$img = $this->input->post('imagedata');		$img = str_replace('data:image/png;base64,', '', $img);		$img = str_replace(' ', '+', $img);		$data = base64_decode($img);		$filename = $this->datetime.".png";		$file = $save_path.$filename;		$result = file_put_contents($file, $data);				//log generated photo		$this->load->model('photo');		$data = array(					"fbid"				=>	$user,					"photo"				=>	$filename,					"date_generated"	=>	$this->today				);		$this->photo->insert($data);		$this->session->set_userdata($data);		redirect('/main/share');	}		function test() {		$this->load->view('mobile/test');	}}?>