<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01//EN"
   "http://www.w3.org/TR/html4/strict.dtd">

<html lang="en">
<head>
<meta charset="utf-8"> 
<title>SMZ - Message on a Bottle</title>
<link href="<?=base_url()?>css/jquery.mCustomScrollbar.css" rel="stylesheet" type="text/css" />
<link href="<?=base_url()?>css/style.css" rel="stylesheet" type="text/css" />
<link href="<?=base_url()?>css/fonts.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="<?=base_url()?>js/jquery-1.11.1.js"></script>
<script type="text/javascript" src="<?=base_url()?>js/jquery.mCustomScrollbar.js"></script>
<script>
$(document).ready(function(){

	//image scroller
	$("#mechanicsbox").mCustomScrollbar({
		theme : "light-thin",
		autoHideScrollbar:true
	});
	
	//Bottle link to MOAB
	$('#bottlelink').click(function(){
		window.location = "<?=base_url()?>main/moab";
	});
	
});
</script>
<style>
#content {
	background: url(<?=base_url()?>images/moab_bg.jpg);
	background-repeat: no-repeat;
}
a {
	text-decoration: none;
}
#mechanicsbox {
	font-family: "lucida fax";
	width: 523px;
	height: 450px;
	margin-top: 25px;
	float: right;
	margin-right: 70px;
	color: #3d3d3d;
	background-color: #e2dfdf;
	font-weight: bold;
	font-size: 12px;
	border: 4px solid #ff9c00;
	padding: 20px;
	border-radius: 10px;
	-moz-border-radius: 10px;
	-webkit-border-radius: 10px;
}
.spacer {
	padding-left: 50px;
	padding-right: 50px;
}
#bottlelink {
	width: 175px;
	height: 350px;
	border: 1px solid #000;
	position: absolute;
	top: 20;
	left: 20;
	background-color: #3d3d3d;
	opacity: 0;
	z-index: 999;
	margin-left: 20px;
    margin-top: 140px;
	cursor: pointer;
}
#smz {
	font-family: 'notera';
	font-size: 50px;
}
</style>
</head>
<body>
<div id="fb-buttons">
	<!-- FACEBOOK -->
	<div id="fblike">
		<div class="fb-like" data-href="https://apps.facebook.com/smzmessageonabottle" data-layout="button" data-action="like" data-show-faces="false" data-share="false"></div>
	</div>
	<!-- FB Invite -->
	<div id="invite">
		<img src="<?=base_url()?>images/fbinvite.png" onclick="app_request()" />
	</div>
	<div id="cleared"></div>
</div>

<div id="content">
	<div class="menu">
		<a class="spacer"></a>
		<a href="<?=base_url()?>main/moab"><img src="<?=base_url()?>images/btnMessage.png" /></a>
		<a href="<?=base_url()?>main/gallery"><img src="<?=base_url()?>images/btnMyGallery.png" /></a>
		<a href="<?=base_url()?>main/gallery"><img src="<?=base_url()?>images/btnMOABGallery.png" /></a>
		<a href="<?=base_url()?>main/mechanics"><img src="<?=base_url()?>images/btnMechanics-active.png" /></a>
		<a href="<?=base_url()?>main/mythoughts"><img src="<?=base_url()?>images/btnInsights.png" /></a>
	</div>
	<div id="cleared"></div>
	
	<div id="mechanicsbox">
		Dear San Mig Zero fans, <br />
		<br />
		We built the Message on a Bottle (MOAB) Facebook application with you, our loyal Facebook fans, in mind. <br />
		<br />
		The app provides you with a unique & creative way to send messages to your friends and followers. To make this experience more exciting, we've decided to give away some prizes! <br />
		<br />
		Now how should you start? Well, you have to choose a background and generate a personal message (or choose one of our quirky built-in messages). The message will appear on the San Mig Zero bottle then all you have to do is click 'Save' and 'Share'. Don't forget to use #SanMigZero (hashtag). It's that easy! <br />
		<br />
		We've given you three fun ways to get your message across: <br />
		*GIF <br />
		*Video (in MP4) <br />
		*Photo (in PNG) <br />
		<br />
		Should you decide to generate a personal message, please bear with us as we will need our app robot to approve your MOAB. But once it has been approved, we will send you a notification. <br />
		<br />
		Remember, for every message you generate using the MOAB app, you get a chance to win any of the following prizes:<br />
		- Caps<br />
		- T-shirts<br />
		- Towels<br />
		- Pedometers<br />
		- 4-packs<br />
		- iPads<br />
		<br />
		So have fun! Send some messages and express yourselves. <br />
		<br />
		Cheers! <br />
		<br />
		<br />
		<div id="smz">San Mig Zero</div> <br />
		Bringing you #zerobitterness since 2013 <br />
	</div>
	
	<!-- Link to MOAB -->
	<div id="bottlelink"></div>
	
</div>

<!-- Comment Section -->
<div id="fb-root"></div>
<center>
<div class="fb-comments" data-href="http://dabdigs04.com/sanmigzero" data-width="941" data-numposts="5" data-colorscheme="dark"></div>
</center>
<!-- Comment Section -->

<div id="fb-root"></div>
<script>
	window.fbAsyncInit = function() {
	FB.init({
	  appId      : '530656457064285', // App ID
	  channelUrl : '//WWW.YOUR_DOMAIN.COM/channel.html', // Channel File
	  status     : true, // check login status
	  cookie     : true, // enable cookies to allow the server to access the session
	  xfbml      : true  // parse XFBML
	});

	// Additional initialization code here
	};

	// Load the SDK Asynchronously
	(function(d){
	 var js, id = 'facebook-jssdk', ref = d.getElementsByTagName('script')[0];
	 if (d.getElementById(id)) {return;}
	 js = d.createElement('script'); js.id = id; js.async = true;
	 js.src = "//connect.facebook.net/en_US/all.js";
	 ref.parentNode.insertBefore(js, ref);
	}(document));
</script>
<script>
//FB Invite Friends
function app_request() {

	FB.ui({
		method : 'apprequests',
		message: 'Have you joined San Mig Zero Message on a Bottle? Get the chance to win some prizes!',
		title: 'Select Friends to Invite'
	},
	function (response) {
		if (response && !response.error_code) {
			
		}
	});
	return false;
}
</script>

</body>
</html>