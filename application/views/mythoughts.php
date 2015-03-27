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
	$("#mythoughtsbox").mCustomScrollbar({
		theme : "dark-thin",
		autoHideScrollbar:true
	});
	
	//Bottle link to MOAB
	$('#bottlelink').click(function(){
		window.location = "<?=base_url()?>main/moab";
	});
	
	//close preview
	$('#previewbox').click(function(){
		$(this).fadeOut('fast');
		$('#prompt').fadeOut('fast');
		$('#fblike').fadeIn('fast');
		$('#invite').fadeIn('fast');
	});
	
	$('#btnSubmit').click(function(){
		$('#fblike').fadeOut('fast');
		$('#invite').fadeOut('fast');
		
		var question_id = $("input[name='answer[]']:checked").attr('id');
		var checked = $("input[name='answer[]']:checked"); 
		
		//get all answers
		var answers = [];
		$("input[name='answer[]']:checked").each(function() {
		  answers.push($(this).val());
		});
		
		//get others if specified
		if($("input[value='others']").prop('checked')) {
			var others = $('#others').val();
		} else {
			var others = '';
		}
			
		if(checked.length == 0) {
			$('#previewbox').fadeIn('fast')
			$('#prompt').html('<h1>No answer selected. Please try again.</h1>')
			$('#prompt').fadeIn('fast');
		} else {
			//submit form
			$.post('<?=base_url()?>mythoughts/submit',{question_id : question_id, answers : answers, others : others}, function(data){	
				
				$('#previewbox').fadeIn('fast')
				$('#prompt').html(data.message)
				$('#prompt').fadeIn('fast');

			},'json');
		}
		
	});
	
	$('#btnSubmit2').click(function(){
		$('#fblike').fadeOut('fast');
		$('#invite').fadeOut('fast');
		
		var question_id = 2;
		var answer = $('#answer').val();
			
		if(answer == "") {
			$('#previewbox').fadeIn('fast')
			$('#prompt').html('<h1>You did not write anything. Please try again.</h1>')
			$('#prompt').fadeIn('fast');
		} else {
			//submit form
			$.post('<?=base_url()?>mythoughts/submit2',{question_id : question_id, answer : answer}, function(data){	
				
				$('#previewbox').fadeIn('fast')
				$('#prompt').html(data.message)
				$('#prompt').fadeIn('fast');

			},'json');
		}
		
	});
	
});
</script>
<style>
@font-face {
    font-family: 'lucida fax';
    src: url('<?=base_url()?>fonts/Lucida Fax Regular.eot');
    src: url('<?=base_url()?>fonts/Lucida Fax Regular.eot?#iefix') format('embedded-opentype'),
         url('<?=base_url()?>fonts/Lucida Fax Regular.woff2') format('woff2'),
         url('<?=base_url()?>fonts/Lucida Fax Regular.woff') format('woff'),
         url('<?=base_url()?>fonts/Lucida Fax Regular.ttf') format('truetype'),
         url('<?=base_url()?>fonts/Lucida Fax Regular.svg#segoe_printregular') format('svg');
    font-weight: normal;
    font-style: normal;
}
@media screen and (-webkit-min-device-pixel-ratio:0) {
    @font-face {
        font-family: 'lucida fax';
		src: url('<?=base_url()?>fonts/Lucida Fax Regular.eot');
		src: url('<?=base_url()?>fonts/Lucida Fax Regular.eot?#iefix') format('embedded-opentype'),
			 url('<?=base_url()?>fonts/Lucida Fax Regular.woff2') format('woff2'),
			 url('<?=base_url()?>fonts/Lucida Fax Regular.woff') format('woff'),
			 url('<?=base_url()?>fonts/Lucida Fax Regular.ttf') format('truetype'),
			 url('<?=base_url()?>fonts/Lucida Fax Regular.svg#segoe_printregular') format('svg');
		font-weight: normal;
		font-style: normal;
    }
}
#content {
	background: url(<?=base_url()?>images/moab_bg.jpg);
	background-repeat: no-repeat;
}
a {
	text-decoration: none;
}
#mythoughtsbox {
	width: 523px;
	height: 430px;
	margin-top: 25px;
	float: right;
	margin-right: 60px;
	color: #3d3d3d;
	background-color: #e2dfdf;
	font-weight: bold;
	font-size: 12px;
	border: 4px solid #ff9c00;
	padding: 20px;
	border-radius: 10px;
	-moz-border-radius: 10px;
	-webkit-border-radius: 10px;
	font-family: "lucida fax";
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
	font-family: 'lucida fax';
	font-size: 20px;
}
#others {
	display: hidden;
}
#survey {
	width: 385px;
	margin: 0 auto;
	line-height: 25px;
}
#prompt {
	display: none;
	position: absolute;
	top: 30%;
	z-index: 9999;
	font-family: "lucida fax";
	width: 100%;
	text-align: center;
	color: #fff;
}
#previewbox {
	display: none;
	background-color: #000;
	opacity: 0.9;
	-moz-opacity: 0.9;
	-webkit-opacity: 0.9;
	width: 100%;
	height: 100%;
	position: fixed;
	top: 0;
	left: 0;
	z-index: 0;
	cursor: pointer;
}
#btnSubmit, #btnSubmit2 {
	cursor: pointer;
}
#instructions {
	color: #fff;
	font-family: 'lucida fax';
	font-size: 12px;
	float: right;
	margin-right: 10px;
}
#answer {
	width: 95%;
	height: 200px;
}
#question1 h2 {
	color: #3d3d3d;
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
		<a href="<?=base_url()?>main/mechanics"><img src="<?=base_url()?>images/btnMechanics.png" /></a>
		<a href="<?=base_url()?>main/mythoughts"><img src="<?=base_url()?>images/btnInsights-active.png" /></a>
	</div>
	<div id="cleared"></div>
	<div id="instructions">​Complete this question to be entered into our raffles. But remember to keep coming back because the question will change.</div>
	<div id="cleared"></div>
	
	<div id="mythoughtsbox">
		<div id="survey">
			<div id="question1">
				<h3>What can you say about San Mig Zero?</h3><br />
				<textarea id="answer" maxlength="500"></textarea>
			</div>
			<br />
			<center><img src="<?=base_url()?>images/btnRegister.png" id="btnSubmit2" /></center>
		</div>
	</div>
	
	<!-- Prompy Message -->
	<div id="prompt"></div>
	<div id="previewbox"></div>
	
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