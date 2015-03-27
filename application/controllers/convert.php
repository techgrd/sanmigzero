<?php
class Convert extends CI_Controller {

	function __construct() {
		parent::__construct();
	}
	
	function index() {
		//add video version
		echo shell_exec("convert -coalesce /home/dabdigs04/dabdigs04.com/sanmigzero/images/uploads/10152285902460496/20141121_122428.gif /home/dabdigs04/dabdigs04.com/sanmigzero/images/uploads/10152285902460496/20141121_122428%03d.png");
		echo shell_exec('ffmpeg -framerate 1/5 -i /home/dabdigs04/dabdigs04.com/sanmigzero/images/uploads/10152285902460496/20141121_122428%03d.png -vf "format=yuv420p" /home/dabdigs04/dabdigs04.com/sanmigzero/images/uploads/myvideogif.mp4');
		
		echo "Convert success!";
	}

}
?>