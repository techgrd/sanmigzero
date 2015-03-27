<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01//EN"
   "http://www.w3.org/TR/html4/strict.dtd">

<html lang="en">
<head>
<meta charset="utf-8"> 
<title>SMZ - Message on a Bottle</title>
<meta property="og:image" content="<?=base_url()?>images/logo.png"/>
<link href="<?=base_url()?>css/style.css" rel="stylesheet" type="text/css" />
<link href="<?=base_url()?>css/fonts.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="<?=base_url()?>js/jquery-1.11.1.js"></script>
<script>
$(document).ready(function(){
	
	//show registration form if not yet registered
	var registered = "<?=$is_registered?>";
	if(registered == 1) {
		$('#registerbox').hide();
		$('#prompt').hide();
		$('#previewbox').hide();
	} else {
		$('#fblike').hide();
		$('#invite').hide();
		$('#start').hide();
	}
	
});
</script>
<style>
@font-face {
    font-family: 'segoe';
    src: url('./fonts/segoepr-webfont.eot');
    src: url('./fonts/segoepr-webfont.eot?#iefix') format('embedded-opentype'),
         url('./fonts/segoepr-webfont.woff2') format('woff2'),
         url('./fonts/segoepr-webfont.woff') format('woff'),
         url('./fonts/segoepr-webfont.ttf') format('truetype'),
         url('./fonts/segoepr-webfont.svg#segoe_printregular') format('svg');
    font-weight: normal;
    font-style: normal;
}
@media screen and (-webkit-min-device-pixel-ratio:0) {
    @font-face {
        font-family: 'segoe';
		src: url('./fonts/segoepr-webfont.eot');
		src: url('./fonts/segoepr-webfont.eot?#iefix') format('embedded-opentype'),
			 url('./fonts/segoepr-webfont.woff2') format('woff2'),
			 url('./fonts/segoepr-webfont.woff') format('woff'),
			 url('./fonts/segoepr-webfont.ttf') format('truetype'),
			 url('./fonts/segoepr-webfont.svg#segoe_printregular') format('svg');
		font-weight: normal;
		font-style: normal;
    }
}
#content {
	background: url(<?=base_url()?>images/home.jpg);
	background-repeat: no-repeat;
}
a {
	text-decoration: none;
}
.spacer {
	padding-left: 50px;
	padding-right: 50px;
}
#registerbox {
	width: 470px;
	height: auto;
	border: 0px solid #fff;
	-moz-box-shadow:    3px 3px 4px 0px #000;
	-webkit-box-shadow: 3px 3px 4px 0px #000;
	box-shadow:         3px 3px 4px 0px #000;
	font-family: "lucida fax";
	font-size: 12px;
	font-weight: bold;
	color: #f49500;
	padding: 3px;
	position: absolute;
	top: 50px;
	left: 50%;
	margin-left: -235px;
	z-index: 999;
}
#prompt {
	display: none;
	position: absolute;
	top: 200px;
	z-index: 9999;
	font-family: "lucida fax";
	width: 100%;
	text-align: center;
	color: #fff;
}
#registerbox h1 {
	font-family: "lucida fax";
	color: #fff;
}
#previewbox {
	display: block;
	background-color: #000;
	opacity: .96;
	-moz-opacity: .96;
	-webkit-opacity: .96;
	width: 100%;
	height: 100%;
	position: fixed;
	top: 0;
	left: 0;
	z-index: 0;
	cursor: pointer;
}
.textfull {
	font-family: "lucida fax";
	text-align: center;
	width: 100%;
	background-color: #efefef;
	border: 1px solid #fff;
	padding: 2px;
	border-radius: 8px;
	-moz-border-radius: 8px;
	-webkit-border-radius: 8px;
	height: 35px;
}
.textquarter {
	font-family: "lucida fax";
	text-align: center;
	width: 75%;
	background-color: #efefef;
	border: 1px solid #fff;
	padding: 2px;
	border-radius: 8px;
	-moz-border-radius: 8px;
	-webkit-border-radius: 8px;
	height: 35px;
}
.textdate {
	font-family: "lucida fax";
	font-size: 8pt;
	text-align: left;
	width: 32%;
	text-align: center;
	background-color: #efefef;
	border: 1px solid #fff;
	padding: 2px;
	border-radius: 5px;
	-moz-border-radius: 5px;
	-webkit-border-radius: 5px;
	height: 30px;
}
.smalltext {
	font-size: 11px;
	margin-left: 2px;
	margin-top: 2px;
	position: absolute;
}
#start {
	position: absolute;
	top: 0;
	left: 0;
	margin-left: 237px;
	margin-top: 160px;
	width: 70px;
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
		<a href="<?=base_url()?>main/moab"><img src="<?=base_url()?>images/btnMessage-HOME.png" /></a>
		<a href="<?=base_url()?>main/mygallery"><img src="<?=base_url()?>images/btnMyGallery.png" /></a>
		<a href="<?=base_url()?>main/gallery"><img src="<?=base_url()?>images/btnMOABGallery.png" /></a>
		<a href="<?=base_url()?>main/mechanics"><img src="<?=base_url()?>images/btnMechanics.png" /></a>
		<a href="<?=base_url()?>main/mythoughts"><img src="<?=base_url()?>images/btnInsights.png" /></a>
	</div>
	<div id="cleared"></div>
</div>

<div id="registerbox">
	<h1>Registration</h1>
	<table cellpadding="5" cellspacing="5" width="95%" height="100%" align="center" id="registration">
		<tr>
			<td colspan="2">First Name <br /><input type="text" id="firstname" name="firstname" value="<?=$firstname?>" class="textfull" maxlength="30" /></td>
		</tr>
		<tr>
			<td colspan="2">Last Name <br /><input type="text" id="lastname" name="lastname" value="<?=$lastname?>" class="textfull" maxlength="30" /></td>
		</tr>
		<tr>
			<td>
				Gender<br />
				<select name="gender" class="textfull" id="gender">
					<option value="" <?php if($gender == ''){ echo 'selected="selected"'; } ?>>--select gender--</option>
					<option value="male" <?php if($gender == 'male'){ echo 'selected="selected"'; } ?>>Male</option>
					<option value="female" <?php if($gender == 'female'){ echo 'selected="selected"'; } ?>>Female</option>
				</select>
			</td>
			<td>
				Date of Birth (YYYY-MM-DD)<br />
				<select id="year" name="year" class="textdate">
					<option value="">year</option>
					<option value="1996">1996</option>
					<?php for($i=1997; $i>=1960;$i--) { ?>
					<option value="<?=$i?>"><?=$i?></option>
					<?php } ?>
				</select>
				<select id="month" name="month" class="textdate">
					<option value="">month</option>
					<option value="01">Jan</option>
					<option value="02">Feb</option>
					<option value="03">Mar</option>
					<option value="04">Apr</option>
					<option value="05">May</option>
					<option value="06">Jun</option>
					<option value="07">Jul</option>
					<option value="08">Aug</option>
					<option value="09">Sep</option>
					<option value="10">Oct</option>
					<option value="11">Nov</option>
					<option value="12">Dec</option>
				</select>
				<select id="day" name="day" class="textdate">
					<option value="">day</option>
				</select>
			</td>
		</tr>
		<tr>
			<td>City <br /><input type="text" id="city" name="city" value="" class="textfull" maxlength="30" /></td>
			<td>Province <br /><input type="text" id="province" name="province" value="" class="textfull" maxlength="30" /></td>
		</tr>
		<tr>
			<td colspan="2">Contact Number <br /><input type="text" id="contactnum" name="contactnum" value="" class="textfull" maxlength="20" /></td>
		</tr>
		<tr>
			<td colspan="2">Email Address <br /><input type="text" id="email" name="email" value="<?=$email?>" class="textfull" maxlength="100" /></td>
		</tr>
		<tr>
			<td>
				<!--<input type="checkbox" id="read_mechanics" name="read_mechanics" value="1" /> <span class="smalltext">I have read and understood the Mechanics</span> <br />-->
				<input type="checkbox" id="subscribe" name="subscribe" value="1" /> <span class="smalltext">Subscribe to Email Updates</span>
			</td>
			<td align="right"><input type="image" src="<?=base_url()?>images/btnRegister.png" id="submit" /></td>
		</tr>
	</table>

</div>

<!-- Comment Section -->
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&appId=818676048151741&version=v2.0";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>

<center>
<div class="fb-comments" data-href="http://dabdigs04.com/sanmigzero" data-width="941" data-numposts="5" data-colorscheme="dark"></div>
</center>
<!-- Comment Section -->

<div id="prompt"></div>
<div id="previewbox"></div>

<script>
$(document).ready(function(){
		
	//Update days based on month and year
	$('#month').change(function(){
		var year = $('#year').val();
		$.post('<?=base_url()?>main/isleapyear',{ year : year },function(data){
			var month = $('#month').val();
			var isleapyear = data.isLeapYear;
			var selectday = $('#day');
			var days = 0;
			
			if(month == 01 || month == 03 || month == 05 || month == 07 || month == 08 || month == 10 || month == 12) {
				days = 31;
			} else if(month == 02) {
				if(isleapyear == 1) {
					days = 29;
				} else {
					days = 28;
				}
			} else if(month == 04 || month == 6 || month == 09 || month == 11) {
				days = 30;
			} 
			
			selectday.empty();
			for(d=1;d<=days;d++) {
				selectday.append($("<option></option>").attr("value", d).text(d));
			}				
			
		},'json');
	});
	
	$('#year').change(function(){
		var year = $(this).val();
		$.post('<?=base_url()?>main/isleapyear',{ year : year },function(data){
			var month = $('#month').val();
			var isleapyear = data.isLeapYear;
			var selectday = $('#day');
			var days = 0;
			
			if(month == 01 || month == 03 || month == 05 || month == 07 || month == 08 || month == 10 || month == 12) {
				days = 31;
			} else if(month == 02) {
				if(isleapyear == 1) {
					days = 29;
				} else {
					days = 28;
				}
			} else if(month == 04 || month == 6 || month == 09 || month == 11) {
				days = 30;
			} else {
				days = '';
			}
			
			selectday.empty();
			for(d=1;d<=days;d++) {
				selectday.append($("<option></option>").attr("value", d).text(d));
			}				
			
		},'json');
	});
	
	//submit form
	$('#submit').click(function(){
		var firstname = $('#firstname').val();
		var lastname = $('#lastname').val();
		var gender = $('#gender').val();
		var year = $('#year').val();
		var month = $('#month').val();
		var day = $('#day').val();
		var city = $('#city').val();
		var province = $('#province').val();
		var contactnum = $('#contactnum').val();
		var email = $('#email').val();
		
		if($('#subscribe').is(':checked')) {
			var subscribe = $('#subscribe').val();
		} else {
			var subscribe = 0;
		}
		
		/*if($('#read_mechanics').is(':checked')) {
			var read_mechanics = $('#read_mechanics').val();
		} else {
			var read_mechanics = 0;
		}*/
		
		$('#previewbox').click(function(){
			$('#registerbox').fadeIn('fast');
			$('#prompt').fadeOut('fast');
		});
		
		$.post("<?=base_url()?>main/register",{ firstname:firstname, lastname:lastname, gender:gender, year:year, month:month, day:day, city:city, province:province, contactnum:contactnum, email:email, subscribe:subscribe },function(data){
							
			if(data.success == 0) {
				//alert(data.errormsg);
				//$('#previewbox').fadeIn('fast');
				$('#registerbox').fadeOut('fast');
				$('#prompt').html('<h1>'+data.errormsg+'</h1>');
				$('#prompt').fadeIn('fast');
				exit;
			} else if(data.success == 1){
				//alert('Registration complete. Thank you.');
				//$('#previewbox').fadeIn('fast');
				$('#registerbox').fadeOut('fast');
				$('#prompt').html('<h1>Registration Complete. Thank You.</h1>');
				$('#prompt').fadeIn('fast').delay(8000).fadeOut('slow');
				window.location = "<?=base_url()?>main/home";
				exit;
			}
			
		},'json');
	});
});
</script>

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