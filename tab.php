<?php

$signed_request = $_REQUEST["signed_request"];

list($encoded_sig, $payload) = explode('.', $signed_request, 2);

$data = json_decode(base64_decode(strtr($payload, '-_', '+/')), true);

$app_data = isset($data["app_data"]) ? $data["app_data"] : '';
$_REQUEST["fb_page_id"] = $data["page"]["id"];
$access_admin = $data["page"]["admin"] == 1;
$has_liked = $data["page"]["liked"] == 1;

?>	
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xmlns:fb="http://www.facebook.com/2008/fbml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
<title>Do The AHHHH</title>
<script src="js/jquery-1.9.1.js"></script>
<style type="text/css">
#cover {
	width: 810px;
	height: 600px;
	/*background-image: url(images/landing.jpg);*/
	background-repeat:	none;
	background-position: top center;
	margin: 0 auto 0 auto;
}

</style>
</head>
<body>

<div id="cover"></div>

<?php
//if($has_liked) {
	echo "<script type='text/javascript'>top.location.href='http://apps.facebook.com/smzmessageonabottle';</script>";
//} 
?>

</body>
</html>