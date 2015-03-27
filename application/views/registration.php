	<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01//EN"
   "http://www.w3.org/TR/html4/strict.dtd">

<html lang="en">
<head>
<meta charset="utf-8"> 
<title>SMZ - Message on a Bottle</title>
<script type="text/javascript" src="<?=base_url()?>js/jquery-1.11.1.js"></script>
<link href="<?=base_url()?>css/style.css" rel="stylesheet" type="text/css" />
<style>
@font-face {
    font-family: 'segoe';
    src: url('../fonts/segoepr-webfont.eot');
    src: url('../fonts/segoepr-webfont.eot?#iefix') format('embedded-opentype'),
         url('../fonts/segoepr-webfont.woff2') format('woff2'),
         url('../fonts/segoepr-webfont.woff') format('woff'),
         url('../fonts/segoepr-webfont.ttf') format('truetype'),
         url('../fonts/segoepr-webfont.svg#segoe_printregular') format('svg');
    font-weight: normal;
    font-style: normal;
}
@media screen and (-webkit-min-device-pixel-ratio:0) {
    @font-face {
        font-family: 'segoe';
		src: url('../fonts/segoepr-webfont.eot');
		src: url('../fonts/segoepr-webfont.eot?#iefix') format('embedded-opentype'),
			 url('../fonts/segoepr-webfont.woff2') format('woff2'),
			 url('../fonts/segoepr-webfont.woff') format('woff'),
			 url('../fonts/segoepr-webfont.ttf') format('truetype'),
			 url('../fonts/segoepr-webfont.svg#segoe_printregular') format('svg');
		font-weight: normal;
		font-style: normal;
    }
}
#content {
	background: url(<?=base_url()?>images/registration_bg.jpg);
	background-repeat: no-repeat;
}
a {
	text-decoration: none;
}
#registerbox {
	width: 470px;
	height: 300px;
	border: 1px solid #fff;
	float: right;
	margin-right: 75px;
	margin-top: 30px;
	-moz-box-shadow:    3px 3px 4px 0px #000;
	-webkit-box-shadow: 3px 3px 4px 0px #000;
	box-shadow:         3px 3px 4px 0px #000;
	font-size: 12px;
	font-weight: bold;
	color: #3d3d3d;
	padding: 3px;
}
#registration {
	margin-top: 10px;
}
#registration td {
	padding: 3px;
}
.textfull {
	font-family: 'segoe';
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
	font-family: 'segoe';
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
	font-family: 'segoe';
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
#prompt {
	display: none;
	position: absolute;
	top: 30%;
	z-index: 9999;
	font-family: segoe;
	width: 100%;
	text-align: center;
	color: #fff;
}
</style>
</head>
<body>
<div id="content">
	<div class="menu">
		<?php if($is_registered == 1) { ?>
			<a href="<?=base_url()?>main/account"><img src="<?=base_url()?>images/btnAccount.png" /></a>
			<a href="<?=base_url()?>main/moab"><img src="<?=base_url()?>images/btnMessage.png" /></a>
			<a href="<?=base_url()?>main/gallery"><img src="<?=base_url()?>images/btnGallery.png" /></a>
		<?php } else { ?>
			<a href="<?=base_url()?>main/registration"><img src="<?=base_url()?>images/btnRegistration-active.png" /></a>
		<?php } ?>
		<a href="<?=base_url()?>main/mechanics"><img src="<?=base_url()?>images/btnMechanics.png" /></a>
		<img src="<?=base_url()?>images/btnInsights.png" />
	</div>
	<div id="cleared"></div>
	<div id="registerbox">

		<table cellpadding="5" cellspacing="5" width="95%" height="100%" align="center" id="registration">
			<tr>
				<td width="50%">First Name <br /><input type="text" id="firstname" name="firstname" class="textfull" /></td>
				<td>Last Name <br /><input type="text" id="lastname" name="lastname" class="textfull" /></td>
			</tr>
			<tr>
				<td>
					Instagram Account Name<br />
					@ <input type="text" id="igname" name="igname" class="textquarter" /></td>
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
				<td colspan="2">Email Address <br /><input type="text" id="email" name="email" class="textfull" /></td>
			</tr>
			<tr>
				<td>
					<input type="checkbox" id="read_mechanics" name="read_mechanics" value="1" /> <span class="smalltext">I have read and understood the Mechanics</span> <br />
					<input type="checkbox" id="subscribe" name="subscribe" value="1" /> <span class="smalltext">Subscribe to Email Updates</span>
				</td>
				<td align="right"><input type="image" src="<?=base_url()?>images/btnRegister.png" id="submit" /></td>
			</tr>
		</table>

	</div>
	<div id="cleared"></div>
</div>
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
			var igname = $('#igname').val();
			var year = $('#year').val();
			var month = $('#month').val();
			var day = $('#day').val();
			var email = $('#email').val();
			
			if($('#subscribe').is(':checked')) {
				var subscribe = $('#subscribe').val();
			} else {
				var subscribe = 0;
			}
			
			if($('#read_mechanics').is(':checked')) {
				var read_mechanics = $('#read_mechanics').val();
			} else {
				var read_mechanics = 0;
			}
			
			//close preview prompt
			$('#previewbox').click(function(){
				$('#previewbox').fadeOut('slow');
				$('#prompt').fadeOut('fast');
				$('#prompt').html('');
			});
			
			$.post("<?=base_url()?>main/register",{ firstname:firstname, lastname:lastname, igname:igname, year:year, month:month, day:day, email:email, subscribe:subscribe, read_mechanics:read_mechanics },function(data){
								
				if(data.success == 0) {
					//alert(data.errormsg);
					$('#previewbox').fadeIn('fast');
					$('#prompt').html('<h1>'+data.errormsg+'</h1>');
					$('#prompt').fadeIn('fast');
					exit;
				} else if(data.success == 1) {
					//alert('Registration complete. Thank you.');
					$('#previewbox').fadeIn('fast');
					$('#prompt').html('<h1>Registration Complete. Thank You.</h1>');
					$('#prompt').fadeIn('fast');
					window.location = "<?=base_url()?>main/account";
					exit;
				}
				
			},'json');
		});
	});
</script>
</body>
</html>