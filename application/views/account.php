<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01//EN"
   "http://www.w3.org/TR/html4/strict.dtd">

<html lang="en">
<head>
<meta charset="utf-8"> 
<title>SMZ - Message on a Bottle</title>
<link href="<?=base_url()?>css/style.css" rel="stylesheet" type="text/css" />
<link href="<?=base_url()?>css/jquery.mCustomScrollbar.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="<?=base_url()?>js/jquery-1.11.1.js"></script>
<script type="text/javascript" src="<?=base_url()?>js/jquery.mCustomScrollbar.js"></script>
<script>
$(document).ready(function(){
	
	//image scroller
	$(".table").mCustomScrollbar({
		theme : "light-thin",
		autoHideScrollbar:true
	});
	
	//select file
	$('#btnSubmitSMZ').click(function(){
		$('#file').click();
	});
	
	//submit form once file was selected
	$("input:file").change(function (){
		$("#smzform").delay(10000).submit();
		$('#previewbox').css('opacity','1');
		$('#previewbox').css('background-color','#fff');
		$('#previewbox').fadeIn('fast');
		$('#previewbox').unbind('click');
		$('#loader').fadeIn('fast');
    });
	 
	//preview box
	$('#previewbox').click(function(){
		$(this).fadeOut('slow');
		$('#loader').fadeOut('fast');
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
#content {
	background: url(<?=base_url()?>images/account_bg.jpg);
	background-repeat: no-repeat;
}
a {
	text-decoration: none;
}
#points {
	background: url(<?=base_url()?>images/stagebg.jpg);
	width: 467px;
	height: 288px;
	border: 1px solid #000;
	float: right;
	margin-top: 35px;
	margin-right: 80px;
	-moz-box-shadow:    3px 3px 4px 0px #000;
	-webkit-box-shadow: 3px 3px 4px 0px #000;
	box-shadow:         3px 3px 4px 0px #000;
	overflow: hidden;
	text-align: center;
	position: relative;
}
#actions,#total {
	width: 233px;
	height: 100%;
	text-align: center;
	float: left;
}
#actions {
	border-right: 1px solid #3d3d3d;
}
#totalpoints {
	padding: 5px;
}
#actions .title, #total .title {
	background-color: #a8a9aa;
	color: #fff;
	width: 100%;
	padding-top: 3px;
	padding-bottom: 3px;
}
#points .table {
	width: 100%;
	height: 100%;
	position: absolute;
	top: 60px;
	font-size: 12px;
	font-weight: bold;
	padding-bottom: 10px;
}
#submitsmz {
	width: 467px;
	height: 260px;
	border: 5px solid #9c9795;
	float: right;
	margin-top: 35px;
	margin-right: 80px;
	-moz-box-shadow:    inset 0 0 10px #000;
	-webkit-box-shadow: inset 0 0 10px #000;
	box-shadow:         inset 0 0 10px #000;
	border-radius: 20px;
	-moz-border-radius: 20px;
	-webkit-border-radius: 20px;
	text-align: center;
	color: #fff;
}
#submitsmz p {
	font-size: 25px;
	margin-top: 50px;
}
#submitsmz img {
	cursor: pointer;
}
form {
	display: none;
}
#loader {
	display: none;
	width: 100%;
	text-align: center;
	position: absolute;
	top: 10%;
	z-index: 9999;
	font-family: segoe;
	color: #3d3d3d;
}
#loader h1 {
	width: 100%;
	text-align: center;
	position: absolute;
	top: 10px;
}
#loader h5 {
	width: 100%;
	text-align: center;
	position: absolute;
	top: 225px;
}
</style>
</head>
<body>
<div id="content">
	<div class="menu">
		<?php if($is_registered == 1) { ?>
			<a href="<?=base_url()?>main/account"><img src="<?=base_url()?>images/btnAccount-active.png" /></a>
			<a href="<?=base_url()?>main/moab"><img src="<?=base_url()?>images/btnMessage.png" /></a>
			<a href="<?=base_url()?>main/gallery"><img src="<?=base_url()?>images/btnGallery.png" /></a>
		<?php } else { ?>
			<a href="<?=base_url()?>main/registration"><img src="<?=base_url()?>images/btnRegistration.png" /></a>
		<?php } ?>
		<a href="<?=base_url()?>main/mechanics"><img src="<?=base_url()?>images/btnMechanics.png" /></a>
		<img src="<?=base_url()?>images/btnInsights.png" />
	</div>
	
	<div id="cleared"></div>
	
	<div id="points">
		<div id="totalpoints"><strong>TOTAL POINTS: <?=($total_points) ? $total_points : 0?></strong></div>
		<div id="actions">
			<div class="title">Actions</div>
		</div>
		<div id="total">
			<div class="title">Equivalent Points</div>
		</div>
		<div class="table">
			<table width="100%" id="tblPoints" align="center" cellspacing="7" cellpadding="7">
				<?php foreach($logs as $log) { ?>
					<tr>
						<td width="233"><?=$log->activity.' '.date('m/d/Y',strtotime($log->date_logged))?></td>
						<td width="233"><?=$log->points?></td>
					</tr>
				<?php } ?>
				<tr>
					<td></td>
					<td></td>
				</tr>
				<tr>
					<td></td>
					<td></td>
				</tr>
				<tr>
					<td></td>
					<td></td>
				</tr>
				<tr>
					<td></td>
					<td></td>
				</tr>
			</table>
			<div id="cleared"></div>
		</div>
		<div id="cleared"></div>
	</div>
	
	<div id="cleared"></div>
	
	<div id="submitsmz">
		<p>Earn points by buying San Mig Zero.<br /> Click below to validate your purchase</p>
		<img src="<?=base_url()?>images/btnSubmitSMZ.png" id="btnSubmitSMZ" />
		<form action="<?=base_url()?>main/upload_receipt" method="post" enctype="multipart/form-data" id="smzform"> 
			<input id="file" type="file" name="receiptimg" /><br />
			<input type="submit" value="upload" id="btnUpload" />
		</form>
	</div>
</div>
<div id="previewbox"></div>
<div id="loader">
	<h1>Sending your Proof of Purchase for Approval</h1>
	<img src="<?=base_url()?>images/loader.gif" />
	<h5>(Points will be given once the submitted proof has been approved.)</h5>
</div>
</body>
</html>