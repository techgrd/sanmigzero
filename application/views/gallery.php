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
	$("#gallery").mCustomScrollbar({
		theme : "light-thin",
		autoHideScrollbar:true
	});
	
	//Bottle link to MOAB
	$('#bottlelink').click(function(){
		window.location = "<?=base_url()?>main/moab";
	});
	
	//preview gif
	$('.usergif').click(function(){
		var gif_id = $(this).attr('data-id');
		var shortname = $(this).attr('data-shortname');
		var filename = $(this).attr('data-filename');
		var fbid = $(this).attr('data-fbid');
		
		$('#previewbox').fadeIn('fast');
		$('#btnBack').fadeIn('fast');
		$('#mygif').attr('src',$(this).attr('src'));
		$('#mygif').fadeIn('fast');
		$('#saveas').fadeIn('fast');
		$('#fblike').fadeOut('fast');
		$('#invite').fadeOut('fast');
		
		//Download 
		$('#downloadpng').attr('href','http://dabdigs04.com/sanmigzero/main/download/png/'+fbid+'/'+filename+'.png');
		
		//Open giphy on gif download
		$('#downloadgif').unbind().click(function(e){
			e.preventDefault();
			window.open('http://dabdigs04.com/sanmigzero/main/download/gif/'+fbid+'/'+filename+'.gif','_blank');
			window.open('http://www.giphy.com/upload','blank');
		});
		$('#downloadvid').attr('href','http://dabdigs04.com/sanmigzero/main/download/video/'+fbid+'/'+filename+'.mp4');
		
		//Facebook share
		$('#facebook').unbind();
		$('#facebook').click(function(){
			sharethis(fbid, gif_id, 'http://dabdigs04.com/sanmigzero/main/download/png/'+fbid+'/'+filename+'.png');
		});
		
		//Twitter share
		$('#twitter').html('<a href="https://twitter.com/intent/tweet?url=https%3A%2F%2Fdabdigs04.com%2Fsanmigzero%2Fmoab%2Fgif%2F' + shortname + '&text=SMZ Message in a Bottle" target="_blank"><img src="<?=base_url()?>images/twitter.png" /></a>');
		
		//Pinterest share
		$('#pinterest').html('<a id="pinterest" href="//www.pinterest.com/pin/create/button/?url=http%3A%2F%2Fapps.facebook.com%2Fsmzmessageonabottle%2F&media=http%3A%2F%2Fdabdigs04.com%2Fsanmigzero%2Fmoab%2Fgif%2F' + shortname + '&description=Next%20stop%3A%20Pinterest" target="_blank"><img src="<?=base_url()?>images/pinterest.png" /></a>');
		
		//Tumblr share
		var gifUrl = encodeURI('http://dabdigs04.com/sanmigzero/images/uploads/'+fbid+'/gif/'+filename+'.gif');
		var caption = encodeURI('SMZ Message in a Bottle');
		var clickthru = encodeURI('http://apps.facebook.com/smzmessageonabottle');
		$('#tumblr').html('<a href="http://www.tumblr.com/share/photo?source='+gifUrl+'&caption='+caption+'&clickthru='+clickthru+'" title="Share on Tumblr" style="display:inline-block; text-indent:-9999px; overflow:hidden; width:48px; height:48px; background:url(<?=base_url()?>images/tumbler.png) top left no-repeat transparent;" target="_blank">Share on Tumblr</a>');
		
		//Google Plus share
		$('#googleplus').html('<a href="https://plus.google.com/share?url='+gifUrl+'" target="_blank"><img src="<?=base_url()?>images/googleplus.png" alt="Share on Google+"/></a>');
		
		//close preview
		$('#previewbox').click(function(){
			$(this).fadeOut('fast');
			$('#mygif').attr('src','');
			$('#mygif').fadeOut('fast');
			$('#saveas').fadeOut('fast');
			$('#prompt').fadeOut('fast');
			$('#btnBack').fadeOut('fast');
			$('#fblike').fadeIn('fast');
			$('#invite').fadeIn('fast');
		});
		$('#btnBack').click(function(){
			$('#previewbox').fadeOut('fast');
			$('#mygif').attr('src','');
			$('#mygif').fadeOut('fast');
			$('#saveas').fadeOut('fast');
			$('#prompt').fadeOut('fast');
			$(this).fadeOut('fast');
			$('#fblike').fadeIn('fast');
			$('#invite').fadeIn('fast');
		});
	});
	
	//Hovers
	$(".btnlike").hover(
		function() {
			$(this).attr('src','<?=base_url()?>images/btnlike_hover.png');
		}, function() {
			$(this).attr('src','<?=base_url()?>images/btnlike.png');
		}
	);
	
	$(".btnshare").hover(
		function() {
			$(this).attr('src','<?=base_url()?>images/btnshare_hover.png');
		}, function() {
			$(this).attr('src','<?=base_url()?>images/btnshare.png');
		}
	);
	
	//Like MOAB in gallery
	$('.btnlike').click(function(){
		
		var fbid = $(this).attr('alt');
		var gifid = $(this).attr('id');
		
		$.post("<?=base_url()?>main/like_gif",{ fbid:fbid, gifid:gifid },
				function(data){
				
					$('#likes_'+data.gifid).html(data.likes+' LIKES');
				
				},'json');
				
		$('#previewbox').fadeIn('fast');
		$('#prompt').html('<h1>You just liked a MOAB!</h1>');
		$('#prompt').fadeIn('fast');
		
		//close preview
		$('#previewbox').click(function(){
			$(this).fadeOut('fast');
			$('#prompt').fadeOut('fast');
			$('#fblike').fadeIn('fast');
			$('#invite').fadeIn('fast');
		});
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
#gallery {
	width: 555px;
	height: 480px;
	margin: 20px auto 0 auto;
	position: relative;
	float: right;
	right: 50px;
}
.gallerybox {
	background: url(<?=base_url()?>images/gallery-frame.png);
	width: 174px;
	height: 160px;
	float: left;
	position: relative;
}
.gallerybox img {
	position: absolute;
	margin-top: 21px;
	margin-left: 15px;
	cursor: pointer;
}
.btnlike {
	float: left;
    height: 30px;
    margin-left: 7px;
    margin-top: 121px;
    position: absolute;
    width: 72px;
    z-index: 999;
	cursor: pointer;
}
.btnshare {
	float: left;
    height: 30px;
    margin-left: 85px;
    margin-top: 121px;
    position: absolute;
    width: 72px;
    z-index: 999;
	cursor: pointer;
}
.imgowner {
	position: absolute;
	font-size: 6pt;
	font-weight: bold;
	margin-left: 20px;
	margin-top: 4px;
}
.like-counter {
	position: absolute;
	font-size: 6pt;
	font-weight: bold;
	margin-right: 20px;
	margin-top: 4px;
	color: #fff;
	right: 0;
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
#mygif {
	position: absolute;
	left: 50%;
	top: 410px;
	margin-left: -360px;
	margin-top: -340px;
	z-index: 999;
	border: 5px solid #fff;
}
#saveas {
	display: none;
	float: right;
    position: absolute;
    right: 10px;
    top: 45px;
    z-index: 9999;
}
.btnSave {
	margin-left: 0px;
}
#btnBack {
	display: none;
	position: absolute;
	left: 50%;
	margin-left: -121px;
	top: 650px;
	z-index: 9999;
	cursor: pointer;
}
#saveas img {
	cursor: pointer;
}
#saveas h5 {
	color: #6C3085;
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
.spacer {
	padding-left: 50px;
	padding-right: 50px;
}
#twitter {
	height: 33px;
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
	margin-left: 158px;
    margin-top: -390px;
	cursor: pointer;
}
#instructions {
	color: #fff;
	font-family: 'lucida fax';
	font-size: 12px;
	float: right;
	margin-right: 108px;
	text-align: center;
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
		<a class="spacer" /></a>
		<a href="<?=base_url()?>main/moab"><img src="<?=base_url()?>images/btnMessage.png" /></a>
		<a href="<?=base_url()?>main/mygallery"><img src="<?=base_url()?>images/btnMyGallery.png" /></a>
		<a href="<?=base_url()?>main/gallery"><img src="<?=base_url()?>images/btnMOABGallery-active.png" /></a>
		<a href="<?=base_url()?>main/mechanics"><img src="<?=base_url()?>images/btnMechanics.png" /></a>
		<a href="<?=base_url()?>main/mythoughts"><img src="<?=base_url()?>images/btnInsights.png" /></a>
	</div>
	<div id="cleared"></div>
	<div id="instructions">Vote for your favourite Messages on a Bottle by clicking the Like button.<br /> Then Share it on Facebook, Twitter, Instagram, Tumblr etc for everyone to see.</div>
	<div id="cleared"></div>
	<div id="gallery">
		<?php foreach($gifs as $gif) { $name = $user->get_name($gif->fbid); ?>
			<div class="gallerybox">
				<div class="imgowner"><?=(strlen($name) > 20) ? substr($name,0,18).'...' : $name?></div>
				<div class="like-counter" id="likes_<?=$gif->id?>" data-likes="<?=$model->total_likes($gif->id)?> LIKES"><?=$model->total_likes($gif->id)?> LIKES</div>
				<img src="<?=base_url()?>images/uploads/<?=$gif->fbid?>/gif/<?=$gif->filename?>" width="142" height="100" class="usergif" data-shortname="<?=$gif->shortname?>" data-filename="<?=substr($gif->filename,0,-4)?>" data-fbid="<?=$gif->fbid?>" data-id="<?=$gif->id?>" />
				<div id="cleared"></div>
				<div class="btnlike" id="<?=$gif->id?>" alt="<?=$fbid?>"></div>
				<div class="btnshare" onclick="sharethis('<?=$fbid?>','<?=$gif->id?>','<?=base_url()?>images/uploads/<?=$gif->fbid?>/png/<?=$gif->png_filename?>')"></div>
				<div id="cleared"></div>
			</div>
	
		<?php } ?>
		<div id="cleared"></div>
	</div>
</div>

<!-- Comment Section -->
<center>
<div class="fb-comments" data-href="http://dabdigs04.com/sanmigzero" data-width="941" data-numposts="5" data-colorscheme="dark"></div>
</center>
<!-- Comment Section -->

<img src="" id="mygif" />
<img src="<?=base_url()?>images/btnBacktoMOAB.png" id="btnBack" />
<div id="prompt"></div>
<div id="previewbox"></div>

<!-- FACEBOOK -->
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
<script type='text/javascript'>
	//FB Share App
	function sharethis(fbid,gifid,gif){  
		FB.ui({ 
			method : 'feed',
			name: 'Message on a Bottle by San Mig Zero', 
			caption: "Make this San Mig Zero bottle your own by writing your personal messages ​on the bottle for a chance to win some prizes.",
			picture: gif,
			link: 'https://apps.facebook.com/smzmessageonabottle?gifid='+gifid
		},
		function(response) {
			if (response && !response.error_code) {
				//Share GIF and gain 5 points
				$.post("<?=base_url()?>main/share_gif",{ fbid:fbid, gifid:gifid },function(data){},"json");
				$('#previewbox').fadeIn('fast');
				$('#prompt').html('<h1>You just shared a MOAB!</h1>');
				$('#prompt').fadeIn('fast');
				
				//close preview
				$('#previewbox').click(function(){
					$(this).fadeOut('fast');
					$('#prompt').fadeOut('fast');
					$('#fblike').fadeIn('fast');
					$('#invite').fadeIn('fast');
				});
			} 
			
		});
			
		return false;
	}
</script>

<!-- Link to MOAB -->
<div id="bottlelink"></div>

<div id="saveas">
	
	<h5><strong>TIP:</strong> Save your <br />MOAB as a GIF<br /> then upload it to <br />  www.giphy.com <br />to be able to share <br />it on Facebook.</h5>
	<a id="downloadgif" href="" target="_blank"><img src="<?=base_url()?>images/dl_gif.png" class="btnSave" /></a>
	<br />
	<a id="downloadvid" href="" target="_blank"><img src="<?=base_url()?>images/dl_video.png" class="btnSave" /></a>
	<br />
	<a id="downloadpng" href="" target="_blank"><img src="<?=base_url()?>images/dl_png.png" class="btnSave" /></a>
	<br />
	
	<div id="facebook"><img src="<?=base_url()?>images/facebook.png" /></div>
	
	<div id="twitter"></div>
	
	<br />
	
	<div id="pinterest"></div>
	
	<div id="tumblr"></div>
	<script src="http://platform.tumblr.com/v1/share.js"></script>
	
	<div id="googleplus"></div>
	
</div>

</body>
</html>