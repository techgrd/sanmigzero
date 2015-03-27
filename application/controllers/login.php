<?php
	header("Cache-Control: no-store, no-cache, must-revalidate, no-transform, max-age=0, post-check=0, pre-check=0");
	header("Pragma: no-cache");
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="ISO-8859-1"> 
<title>SMZ Message on a Bottle | ADMIN</title>
<script type="text/javascript" src="<?=base_url()?>js/jquery-1.11.1.js"></script>
<script>
$(document).ready(function(){

	//Login admin
	$('#login').click(function(){
		var username = $('#username').val();
		var password = $('#password').val();

		$.post("<?=base_url()?>admin/login",
				{ username:username, password:password },
				function(data){
				
					if(data.success == 0){
						$('#previewbox').fadeIn('fast');
						$('#prompt').html('<h1>Incorrect Username or Password. Please try again.');
						$('#prompt').fadeIn('slow');
					} else {
						window.location = "<?=base_url()?>admin/users";
					}
				
				},"json");
	});
	
	//Popup dark bg with message
	$('#previewbox').click(function(){
		$(this).fadeOut('fast');
		$('#prompt').fadeOut('fast');
	});

});
</script>
<style>
@font-face {
    font-family: 'segoe';
    src: url('<?=base_url()?>fonts/segoepr-webfont.eot');
    src: url('<?=base_url()?>fonts/segoepr-webfont.eot?#iefix') format('embedded-opentype'),
         url('<?=base_url()?>fonts/segoepr-webfont.woff2') format('woff2'),
         url('<?=base_url()?>fonts/segoepr-webfont.woff') format('woff'),
         url('<?=base_url()?>fonts/segoepr-webfont.ttf') format('truetype'),
         url('<?=base_url()?>fonts/segoepr-webfont.svg#segoe_printregular') format('svg');
    font-weight: normal;
    font-style: normal;
}
@media screen and (-webkit-min-device-pixel-ratio:0) {
    @font-face {
        font-family: 'segoe';
		src: url('<?=base_url()?>fonts/segoepr-webfont.eot');
		src: url('<?=base_url()?>fonts/segoepr-webfont.eot?#iefix') format('embedded-opentype'),
			 url('<?=base_url()?>fonts/segoepr-webfont.woff2') format('woff2'),
			 url('<?=base_url()?>fonts/segoepr-webfont.woff') format('woff'),
			 url('<?=base_url()?>fonts/segoepr-webfont.ttf') format('truetype'),
			 url('<?=base_url()?>fonts/segoepr-webfont.svg#segoe_printregular') format('svg');
		font-weight: normal;
		font-style: normal;
    }
}
body {
	font-family: segoe;
}
#prompt {
	display: none;
	position: absolute;
	top: 50%;
	z-index: 9999;
	font-family: segoe;
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
</style>
</head>

<center>
<img src="<?=base_url()?>images/logo.png" />
</center>

<table align="center" cellpadding="5" cellspacing="0">
	<tr>
		<td>Username</td>
		<td><input type="text" name="username" id="username" /></td>
	</tr>
	<tr>
		<td>Password</td>
		<td><input type="password" name="password" id="password" /></td>
	</tr>
	<tr>
		<td colspan="2" align="right"><input type="button" value="login" id="login" /></td>
	</tr>
</table>

<div id="prompt"></div>
<div id="previewbox"></div>

</body>
</html>