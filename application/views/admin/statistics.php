<?php
	header("Cache-Control: no-store, no-cache, must-revalidate, no-transform, max-age=0, post-check=0, pre-check=0");
	header("Pragma: no-cache");
?>
<!DOCTYPE html>
<html>
<head>
<title>SMZ Message on a Bottle | ADMIN</title>
<script type="text/javascript" src="<?=base_url()?>js/jquery-1.11.1.js"></script>
<style>
body, html {
	font-family: Candara;
	font-size: 20px;
	color: #3d3d3d;
	position: absolute;
	width: 100%;
	top: 0;
	left: 0;
	margin: 0;
}
h1 {
	margin-left: 20px;
}
#tblUsers td, #tblUsers th{
	border: 1px solid #3d3d3d;
}
#tblUsers {
	border-collapse: collapse;
}
#tblUsers th{
	background-color: #3d3d3d;
	color: #fff;
}
a {
	text-decoration: none;
}
</style>
</head>
<body>
<?php include "header.php"; ?>
<h1>Statistics</h1>
<table align="center" width="300" cellpadding="10" cellspacing="0" id="tblUsers">
	<tbody>
		<tr>
			<td>Unique Visitors</td>
			<td><?=$stats->count_unique_users()?></td>
		</tr>
		<tr>
			<td>Registered Users</td>
			<td><?=$stats->count_registered_users()?></td>
		</tr>
		<tr>
			<td>Approved GIFs</td>
			<td><?=$stats->count_approved_gifs()?></td>
		</tr>
		<tr>
			<td>Pending GIFs</td>
			<td><?=$stats->count_pending_gifs()?></td>
		</tr>
		<tr>
			<td>Total GIF Likes</td>
			<td><?=$stats->count_likes()?></td>
		</tr>
		<tr>
			<td>Total GIF Shares</td>
			<td><?=$stats->count_shares()?></td>
		</tr>
		<tr>
			<td>Customized Message GIFs</td>
			<td><?=$stats->count_customized_gifs()?></td>
		</tr>
		<tr>
			<td>Predefined Message GIFs</td>
			<td><?=$stats->count_default_gifs()?></td>
		</tr>
	</tbody>
</table>

</body>
</html>