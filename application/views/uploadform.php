<!DOCTYPE html>
<html>
<head>
<meta http-equiv="refresh" content="30">
<script type="text/javascript" src="<?=base_url()?>js/jquery-1.11.1.js"></script>
<script>
$(document).ready(function(){
	
	$('#choosephoto').click(function(){
		$('#file').click();
		$(this).fadeOut('slow');
		$('#uploadphoto').fadeIn('slow');
	});
	
	$('#uploadphoto').click(function(){
		$('#upload').click();
		$(this).fadeOut('slow');
		$('#choosephoto').fadeIn('slow');
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
html, body {
	text-align: center;
}
input {
	font-family: segoe;
	font-size: 12pt;
	border: 5px solid #993300;
	background-color: #FFD700;
	color: #993300;
	padding: 10px;
	cursor: pointer;
}
#file {
	display: none;
} 
#uploadphoto, #upload {
	display: none;
}
#choosephoto, #uploadphoto {
	cursor: pointer;
}
</style>
</head>
<body>
<center>
<object data="<?=base_url()?>images/uploads/<?=$fbid?>/myphoto.jpg" type="image/jpeg" width="120" height="120" id="photo">
	<img src="<?=base_url()?>images/na.jpg" width="120" height="120" id="no-photo" />
</object>
<br />
<form action="<?=base_url()?>main/upload" method="post" enctype="multipart/form-data"> 
	<input id="file" type="file" name="uploadFile" /><br />
	<img id="choosephoto" src="<?=base_url()?>images/btnBrowse.png" />
	<img id="uploadphoto" src="<?=base_url()?>images/btnUpload.png" />
	<input type="submit" value="upload" id="upload" />
</form>
</center>

</body>
</html>