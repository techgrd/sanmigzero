<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01//EN"
   "http://www.w3.org/TR/html4/strict.dtd">

<html lang="en">
<head>
<meta charset="utf-8"> 
<title>SMZ - Message on a Bottle</title>
<meta property="og:image" content="<?=base_url()?>images/logo.png"/>
<link href="<?=base_url()?>css/style.css" rel="stylesheet" type="text/css" />
<link href="<?=base_url()?>css/fonts.css" rel="stylesheet" type="text/css" />
<link href="<?=base_url()?>css/jquery.mCustomScrollbar.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="<?=base_url()?>js/jquery-1.11.1.js"></script>
<script type="text/javascript" src="<?=base_url()?>js/b64.js"></script>
<script type="text/javascript" src="<?=base_url()?>js/LZWEncoder.js"></script>
<script type="text/javascript" src="<?=base_url()?>js/NeuQuant.js"></script>
<script type="text/javascript" src="<?=base_url()?>js/GIFEncoder.js"></script>
<script type="text/javascript" src="<?=base_url()?>js/jquery.textillate.js"/></script>
<script type="text/javascript" src="<?=base_url()?>js/kinetic-v5.1.0.min.js"></script>
<script type="text/javascript" src="<?=base_url()?>js/jquery.mCustomScrollbar.js"></script>
<script>
var defmsg;
$(document).ready(function(){

	//preview box
	$('#previewbox').click(function(){
		$(this).fadeOut('slow');
		$('#mygif').fadeOut('fast');
		$('#savebox').fadeOut('fast');
	});
	
	//back to moab
	$('#backtomoab').click(function(){
		$(this).fadeOut('slow');
		$('#mygif').fadeOut('fast');
		$('#previewbox').fadeOut('fast');
		$('#savebox').fadeOut('fast');
	});

	//image scroller
	$("#bgs").mCustomScrollbar({
		theme : "light-thin",
		autoHideScrollbar:true
	});
	
	//choose category tab
	$('.tab').click(function(){
		var category = $(this).attr('id');
		
		if(category == 'humour') {
			$('.humour').show();
			$('.life').hide();
			$('.animals').hide();
		} else if(category == 'life') {
			$('.humour').hide();
			$('.life').show();
			$('.animals').hide();
		} else if(category == 'animals') {
			$('.humour').hide();
			$('.life').hide();
			$('.animals').show();
		}
	});

	//default background
	$('#background').val('1.jpg');

	$('.bg').click(function(){
		var file = $(this).attr('alt');
		$('#background').val(file)
		$('.bg').css('border','3px solid #e1dfda');
		$(this).css('border','3px solid #ff0000');
		
		//default messages
		var photo = $(this).attr('data-bg');
		if(photo == 'humour1') {
			$('#message').val("This Beer is SHOCKINGLY good thanks to ZERO bitterness.");
			defmsg = 1;
		} else if(photo == 'humour2') {
			$('#message').val("I can’t help but go crazy for this Zero bitterness beer!");
			defmsg = 1;
		} else if(photo == 'humour3') {
			$('#message').val("Bitterness imprisons life; love releases it.");
			defmsg = 1;
		} else if(photo == 'humour4') {
			$('#message').val("This Zero bitterness beer is going straight to my head!");
			defmsg = 1;
		} else if(photo == 'humour5') {
			$('#message').val("Bitterness or betterness, It's your choice to be the hero.");
			defmsg = 1;
		} else if(photo == 'humour6') {
			$('#message').val("This zero bitterness beer is making me loco!");
			defmsg = 1;
		} else if(photo == 'humour7') {
			$('#message').val("Don't let anyone's bitterness change who you are.");
			defmsg = 1;
		} else if(photo == 'humour8') {
			$('#message').val("This zero bitterness beer is fit for royalty.");
			defmsg = 1;
		} else if(photo == 'humour9') {
			$('#message').val("The roots of education is bitter, but the fruit is sweet.");
			defmsg = 1;
		} else if(photo == 'humour10') {
			$('#message').val("Be better, no bitter in your old age.");
			defmsg = 1;
		} else if(photo == 'humour11') {
			$('#message').val("Bitterness doesn't have a sweet revenge.");
			defmsg = 1;
		} else if(photo == 'humour12') {
			$('#message').val("A new beer formula, a better drinking experience.");
			defmsg = 1;
		} else if(photo == 'humour13') {
			$('#message').val("This Zero bitterness beer has enough kick to make me man");
			defmsg = 1;
		} else if(photo == 'humour14') {
			$('#message').val("Guilt-free enjoyment brought to you by San Mig Zero.");
			defmsg = 1;
		} else if(photo == 'humour15') {
			$('#message').val("Look, there's no bitterness inside here.");
			defmsg = 1;
		} else if(photo == 'humour16') {
			$('#message').val("It's hard work being bitter...");
			defmsg = 1;
		} else if(photo == 'humour17') {
			$('#message').val("Never trust your lounge when your heart is bitter.");
			defmsg = 1;
		} else if(photo == 'humour18') {
			$('#message').val("Bitterness imprisons life, love releases it.");
			defmsg = 1;
		} else if(photo == 'humour19') {
			$('#message').val("I see zero bitterness beer in your future.");
			defmsg = 1;
		} else if(photo == 'life1') {
			$('#message').val("Let your past make you better not bitter.");
			defmsg = 1;
		} else if(photo == 'life2') {
			$('#message').val("Only a super mom would approve of this new and improved San Mig Zero.");
			defmsg = 1;
		} else if(photo == 'life3') {
			$('#message').val("Zero bitterness, zero drama.");
			defmsg = 1;
		} else if(photo == 'life4') {
			$('#message').val("Leave your problems in the office and enjoy a guilt-free weekend.");
			defmsg = 1;
		} else if(photo == 'life5') {
			$('#message').val("Love at first sip with Zero Bitterness.");
			defmsg = 1;
		} else if(photo == 'life6') {
			$('#message').val("Never succumb to the temptation of bitterness");
			defmsg = 1;
		} else if(photo == 'life7') {
			$('#message').val("Beauty, more than bitterness, makes the heart break.");
			defmsg = 1;
		} else if(photo == 'life8') {
			$('#message').val("Let's party hard with zero bitterness and a lot of love.");
			defmsg = 1;
		} else if(photo == 'animals1') {
			$('#message').val("WOAH, is that a ZERO bitterness beer I see?");
			defmsg = 1;
		} else if(photo == 'animals2') {
			$('#message').val("Go ahead, make my day and pour me a zero bitterness beer.");
			defmsg = 1;
		} else if(photo == 'animals3') {
			$('#message').val("Me liking the zero bitterness beer.");
			defmsg = 1;
		} else if(photo == 'animals4') {
			$('#message').val("A guilt-free vacation is the most relaxing kind!");
			defmsg = 1;
		} else if(photo == 'animals5') {
			$('#message').val("WARNING. Contains zero bitterness.");
			defmsg = 1;
		} else if(photo == 'animals6') {
			$('#message').val("You'll always look your best when you're guilt-free, even when others don’t agree.");
			defmsg = 1;
		} else if(photo == 'animals7') {
			$('#message').val("Hipster bear approves of this zero bitterness beer.");
			defmsg = 1;
		} else if(photo == 'animals8') {
			$('#message').val("No clothes, no problem! I’m living the guilt-free life!");
			defmsg = 1;
		} else if(photo == 'animals9') {
			$('#message').val("When life gets bitter, sit down and have a beer.");
			defmsg = 1;
		} else if(photo == 'animals10') {
			$('#message').val("Look extra cool with the stronger and tastier San Mig Zero.");
			defmsg = 1;
		} else if(photo == 'animals11') {
			$('#message').val("What, this isn't a bitter beer! Give me some now!");
			defmsg = 1;
		} else {
			$('#message').val("");
			defmsg = 0;
		}
	});
	
	$('#message').keypress(function(){
		defmsg = 0;
	});
	
	$('#preview').click(function(){
		var file = $('#background').val();
		var msg = $('#message').val();
		$('#custommsg').val(msg);
		if(defmsg == 1) {
			$('#loader h1').html("Please wait whilst we convert your MOAB. <br /> Once it's ready, you can Share it from the 'My MOAB' tab. ");
			$('#defmsg').val(1);
		} else {
			$('#loader h1').html('Sending your MOAB for Approval');
			$('#defmsg').val(0);
		}
		preview(file);
	});
	
	//preloader
	$('#submitmoab').click(function(){
		$('#previewbox').unbind('click');
		$('#mygif').fadeOut('fast');
		$('#savebox').fadeOut('fast');
		$('#loader').fadeIn('fast');
	});
	
});

function preview(file) {
	var canvas = document.getElementById('myCanvas');
	var context = canvas.getContext('2d');
	var dragok = false;
	
	var encoder = new GIFEncoder();
	encoder.setRepeat(0);
	encoder.setDelay(700);
	encoder.setSize(720, 540);
	encoder.start();
	
	//Message
	var maxWidth = 130;
	var lineHeight = 35;
	var x = 123;
	var y = 300;
	var text = $('#message').val();
	var trimmedtext = text.substring(0,70);
	
	//Background
	var imageObj = new Image();
	imageObj.onload = function() {
		var pattern = context.createPattern(imageObj, 'no-repeat');
		
		context.rect(0, 0, canvas.width, canvas.height);
		context.fillStyle = pattern;
		context.fill();

	};
	imageObj.src = '<?=base_url()?>images/bg/' + file;
	
	//Beer image
	var beerimg = new Image();
	beerimg.onload = function() {
		//beer image
		context.drawImage(beerimg,37,0);
		
		//text
		context.font = '14pt levibrush';
		context.fillStyle = 'rgba(127, 86, 24, 0.8)';
		wrapText(context, trimmedtext, x, y, maxWidth, lineHeight, encoder);
		
		encoder.finish();
		var binary_gif = encoder.stream().getData() //notice this is different from the as3gif package!
		var data_url = 'data:image/gif;base64,'+encode64(binary_gif);
		
		$('canvas').fadeOut('slow');
		$('#mygif').attr('src',data_url);
		$('#previewbox').fadeIn('fast');
		$('#mygif').fadeIn('slow');
		$('#savebox').fadeIn('slow');
		$('#base64img').val(data_url);
		//$('#panel').hide();
		//$('#myCanvas').show();
	}
	beerimg.src = '<?=base_url()?>images/beer.png';

}

function wrapText(context, text, x, y, maxWidth, lineHeight, encoder) {
	var words = text.split(' ');
	var line = '';
	
	encoder.start();
	encoder.addFrame(context);

	for(var n = 0; n < words.length; n++) {	
	  var testLine = line + words[n] + ' ';
	  var metrics = context.measureText(testLine);
	  var testWidth = metrics.width;
	  if (testWidth > maxWidth && n > 0) {
		context.textAlign = "center";
		context.fillText(line, x, y);	
		line = words[n] + ' ';
		encoder.addFrame(context);
		y += lineHeight;
	  }
	  else {
		line = testLine;
	  }
	}
	context.fillText(line, x, y);
	encoder.addFrame(context);
	encoder.addFrame(context);
	encoder.addFrame(context);
	encoder.addFrame(context);
}
</script>
<style>
/*LEVIBRUSH*/
@font-face {
    font-family: 'levibrush';
    src: url('<?=base_url()?>fonts/levibrush-webfont.eot');
    src: url('<?=base_url()?>fonts/levibrush-webfont.eot?#iefix') format('embedded-opentype'),
         url('<?=base_url()?>fonts/levibrush-webfont.woff2') format('woff2'),
         url('<?=base_url()?>fonts/levibrush-webfont.woff') format('woff'),
         url('<?=base_url()?>fonts/levibrush-webfont.ttf') format('truetype'),
         url('<?=base_url()?>fonts/levibrush-webfont.svg') format('svg');
    font-weight: normal;
    font-style: normal;
}
@media screen and (-webkit-min-device-pixel-ratio:0) {
    @font-face {
        font-family: 'levibrush';
		src: url('<?=base_url()?>fonts/levibrush-webfont.eot');
		src: url('<?=base_url()?>fonts/levibrush-webfont.eot?#iefix') format('embedded-opentype'),
			 url('<?=base_url()?>fonts/levibrush-webfont.woff2') format('woff2'),
			 url('<?=base_url()?>fonts/levibrush-webfont.woff') format('woff'),
			 url('<?=base_url()?>fonts/levibrush-webfont.ttf') format('truetype'),
			 url('<?=base_url()?>fonts/levibrush-webfont.svg') format('svg');
		font-weight: normal;
		font-style: normal;
    }
}
#savebox {
	display: none;
	top: 600px;
    position: absolute;
    text-align: center;
    width: 100%;
    z-index: 9999;
}
#savebox img {
	cursor: pointer;
}
#previewbox {
	display: none;
	background-color: #333F52;
	opacity: 1;
	-moz-opacity: 1;
	-webkit-opacity: 1;
	width: 100%;
	height: 100%;
	position: fixed;
	top: 0;
	left: 0;
	z-index: 0;
	cursor: pointer;
}
#loader {
	display: none;
	width: 100%;
	text-align: center;
	position: absolute;
	top: 10px;
	z-index: 9999;
	font-family: "lucida fax";
	color: #3d3d3d;
}
#prompt {
	display: none;
	position: absolute;
	top: 200px;
	z-index: 9999;
	font-family: 'lucida fax';
	width: 100%;
	text-align: center;
	color: #3d3d3d;
}
#loader h1 {
	width: 100%;
	text-align: center;
	position: absolute;
	top: 10px;
	color: #fff;
}
#loader img {
	margin-top: 100px;
}
.spacer {
	padding-left: 50px;
	padding-right: 50px;
}
h2 {
	color: #fff;
	font-family: 'lucida fax';
	line-height: 0;
}
.tab {
	/*position: absolute;*/
	text-align: center;
	line-height: 45px;
	font-family: 'lucida fax';
	font-size: 16px;
	font-weight: bold;
	width: 122px;
	height: 50px;
	color: #fff;
	background: url(<?=base_url()?>images/bgtab.png);
	margin-top: -50px;
	margin-right: 5px;
	border-top: 2px solid #f49500;
	border-right: 2px solid #f49500;
	border-left: 2px solid #f49500;
	border-radius: 7px 7px 0 0;
	float: left;
	cursor: pointer;
}
#instructions {
	color: #fff;
	font-family: 'lucida fax';
	font-size: 12px;
	float: right;
	margin-right: 10px;
}
.life, .animals {
	display: none;
}
pre {
	color: #fff;
}
.fontdiv {
	float: left;
	position: absolute;
	top: 0;
	left: 0;
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
	<div class="fontdiv" style="font-family: levibrush;">.</div>
	<div class="fontdiv" style="font-family: lucidafax;">.</div>
	<div id="cleared"></div>
</div>
<div class="fontdiv" style="font-family: levibrush;">.</div>
<div class="fontdiv" style="font-family: lucidafax;">.</div>
<div id="content">
	<div class="menu">
			<a class="spacer" /></a>
			<a href="<?=base_url()?>main/moab"><img src="<?=base_url()?>images/btnMessage-active.png" /></a>
			<a href="<?=base_url()?>main/mygallery"><img src="<?=base_url()?>images/btnMyGallery.png" /></a>
			<a href="<?=base_url()?>main/gallery"><img src="<?=base_url()?>images/btnMOABGallery.png" /></a>
			<a href="<?=base_url()?>main/mechanics"><img src="<?=base_url()?>images/btnMechanics.png" /></a>
			<a href="<?=base_url()?>main/mythoughts"><img src="<?=base_url()?>images/btnInsights.png" /></a>
	</div>
	<div id="cleared"></div>
	<div id="instructions"><strong>Step 1</strong>: Select a background. <strong>Step 2</strong>: Write your message. <strong>Step 3</strong>: Submit and wait for approval. Step 4: Visit 'My Moab' to Share.</div>
	<div id="cleared"></div>
	<div id="panel">
		<div class="tab" id="humour">Humour</div>
		<div class="tab" id="life">Life</div>
		<div class="tab" id="animals">Animals</div>
		<div id="panelbox">
			<div class="section" id="topsection">
			<!-- MOAB BACKGROUNDS -->
				<div id="bgs">
					<img src="<?=base_url()?>images/bg/humour1.jpg" class="bg humour" alt="humour1.jpg" data-bg="humour1" data-cat="humour" />
					<img src="<?=base_url()?>images/bg/humour2.jpg" class="bg humour" alt="humour2.jpg" data-bg="humour2" data-cat="humour"  />
					<img src="<?=base_url()?>images/bg/humour3.jpg" class="bg humour" alt="humour3.jpg" data-bg="humour3" data-cat="humour"  />
					<img src="<?=base_url()?>images/bg/humour4.jpg" class="bg humour" alt="humour4.jpg" data-bg="humour4" data-cat="humour"  />
					<img src="<?=base_url()?>images/bg/humour5.jpg" class="bg humour" alt="humour5.jpg" data-bg="humour5" data-cat="humour"  />
					<img src="<?=base_url()?>images/bg/humour6.jpg" class="bg humour" alt="humour6.jpg" data-bg="humour6" data-cat="humour"  />
					<img src="<?=base_url()?>images/bg/humour7.jpg" class="bg humour" alt="humour7.jpg" data-bg="humour7" data-cat="humour"  />
					<img src="<?=base_url()?>images/bg/humour8.jpg" class="bg humour" alt="humour8.jpg" data-bg="humour8" data-cat="humour"  />
					<img src="<?=base_url()?>images/bg/humour9.jpg" class="bg humour" alt="humour9.jpg" data-bg="humour9" data-cat="humour"  />
					<img src="<?=base_url()?>images/bg/humour10.jpg" class="bg humour" alt="humour10.jpg" data-bg="humour10" data-cat="humour"  />
					<img src="<?=base_url()?>images/bg/humour11.jpg" class="bg humour" alt="humour11.jpg" data-bg="humour11" data-cat="humour"  />
					<img src="<?=base_url()?>images/bg/humour12.jpg" class="bg humour" alt="humour12.jpg" data-bg="humour12" data-cat="humour"  />
					<img src="<?=base_url()?>images/bg/humour13.jpg" class="bg humour" alt="humour13.jpg" data-bg="humour13" data-cat="humour"  />
					<img src="<?=base_url()?>images/bg/humour14.jpg" class="bg humour" alt="humour14.jpg" data-bg="humour14" data-cat="humour"  />
					<img src="<?=base_url()?>images/bg/humour15.jpg" class="bg humour" alt="humour15.jpg" data-bg="humour15" data-cat="humour"  />
					<img src="<?=base_url()?>images/bg/humour16.jpg" class="bg humour" alt="humour16.jpg" data-bg="humour16" data-cat="humour"  />
					<img src="<?=base_url()?>images/bg/humour17.jpg" class="bg humour" alt="humour17.jpg" data-bg="humour17" data-cat="humour"  />
					<img src="<?=base_url()?>images/bg/humour18.jpg" class="bg humour" alt="humour18.jpg" data-bg="humour18" data-cat="humour"  />
					<img src="<?=base_url()?>images/bg/humour19.jpg" class="bg humour" alt="humour19.jpg" data-bg="humour19" data-cat="humour"  />
					<img src="<?=base_url()?>images/bg/life1.jpg" class="bg life" alt="life1.jpg" data-bg="life1" data-cat="life"  />
					<img src="<?=base_url()?>images/bg/life2.jpg" class="bg life" alt="life2.jpg" data-bg="life2" data-cat="life"  />
					<img src="<?=base_url()?>images/bg/life3.jpg" class="bg life" alt="life3.jpg" data-bg="life3" data-cat="life"  />
					<img src="<?=base_url()?>images/bg/life4.jpg" class="bg life" alt="life4.jpg" data-bg="life4" data-cat="life"  />
					<img src="<?=base_url()?>images/bg/life5.jpg" class="bg life" alt="life5.jpg" data-bg="life5" data-cat="life"  />
					<img src="<?=base_url()?>images/bg/life6.jpg" class="bg life" alt="life6.jpg" data-bg="life6" data-cat="life"  />
					<img src="<?=base_url()?>images/bg/life7.jpg" class="bg life" alt="life7.jpg" data-bg="life7" data-cat="life"  />
					<img src="<?=base_url()?>images/bg/life8.jpg" class="bg life" alt="life8.jpg" data-bg="life8" data-cat="life"  />
					<img src="<?=base_url()?>images/bg/animals1.jpg" class="bg animals" alt="animals1.jpg" data-bg="animals1" data-cat="life"  />
					<img src="<?=base_url()?>images/bg/animals2.jpg" class="bg animals" alt="animals2.jpg" data-bg="animals2" data-cat="life"  />
					<img src="<?=base_url()?>images/bg/animals3.jpg" class="bg animals" alt="animals3.jpg" data-bg="animals3" data-cat="life"  />
					<img src="<?=base_url()?>images/bg/animals4.jpg" class="bg animals" alt="animals4.jpg" data-bg="animals4" data-cat="life"  />
					<img src="<?=base_url()?>images/bg/animals5.jpg" class="bg animals" alt="animals5.jpg" data-bg="animals5" data-cat="life"  />
					<img src="<?=base_url()?>images/bg/animals6.jpg" class="bg animals" alt="animals6.jpg" data-bg="animals6" data-cat="life"  />
					<img src="<?=base_url()?>images/bg/animals7.jpg" class="bg animals" alt="animals7.jpg" data-bg="animals7" data-cat="life"  />
					<img src="<?=base_url()?>images/bg/animals8.jpg" class="bg animals" alt="animals8.jpg" data-bg="animals8" data-cat="life"  />
					<img src="<?=base_url()?>images/bg/animals9.jpg" class="bg animals" alt="animals9.jpg" data-bg="animals9" data-cat="life"  />
					<img src="<?=base_url()?>images/bg/animals10.jpg" class="bg animals" alt="animals10.jpg" data-bg="animals10" data-cat="life"  />
					<img src="<?=base_url()?>images/bg/animals11.jpg" class="bg animals" alt="animals11.jpg" data-bg="animals11" data-cat="life"  />

				</div>
				<div id="cleared"></div>
			</div>
			<div class="section" id="botsection">
				<div class="input" id="messageForm">
					<h2>What's your Message?</h2>
					<input type="text" id="message" value="" size="30" maxlength="70" /><br />
					<pre>Customize message by clicking on the box.(Max 70 characters)</pre>
					<input type="hidden" id="background" value="" />
				</div>
				<div class="input" id="btnGenerate">
					<input type="image" src="<?=base_url()?>images/btnGenerate.png" id="preview" style="margin-top: 80px;" />
					<div id="cleared"></div>
				</div>
			</div>
			<div id="cleared"></div>
		</div>
		<div id="cleared"></div>
	</div>
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

<canvas id="myCanvas" width="720" height="540"></canvas><br />
<div id="cleared"></div>
<img id="mygif" src="" />
<div id="savebox">
	<form action="<?=base_url()?>main/upload_gif" method="post">
		<input type="hidden" id="base64img" name="base64img" value="">
		<input type="hidden" id="defmsg" name="defmsg" value="">
		<input type="hidden" id="custommsg" name="custommsg" value="">
		<input type="image" src="<?=base_url()?>images/btnSubmitMOAB.png" id="submitmoab" />
		<img src="<?=base_url()?>images/btnBacktoMOAB.png" id="backtomoab" />
	</form>
</div>
<div id="prompt"></div>
<div id="previewbox"></div>
<div id="loader">
	<h1></h1>
	<img src="<?=base_url()?>images/loader.gif" />
</div>
<script>
	var canvas = document.getElementById('myCanvas');
	var context = canvas.getContext('2d');
	
	//Background
	var imageObj = new Image();
	imageObj.onload = function() {
		var pattern = context.createPattern(imageObj, 'no-repeat');

		context.rect(0, 0, canvas.width, canvas.height);
		context.fillStyle = pattern;
		context.fill();
	};
	imageObj.src = '<?=base_url()?>images/bg/humour1.jpg';
	
	//Beer image
	var beerimg = new Image();
	beerimg.onload = function() {
		context.drawImage(beerimg,10,0);

	}
	beerimg.src = '<?=base_url()?>images/beer.png';
</script>
</body>
</html>