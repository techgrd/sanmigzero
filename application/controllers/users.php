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
	font-size: 12px;
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
<h1>Registered Users</h1>
<table align="center" width="80%" cellpadding="3" cellspacing="0" id="tblUsers">
	<thead>
		<tr>
			<th>#</th>
			<th>Name</th>
			<th>Birthday</th>
			<th>Email</th>
			<th>Instagram Account</th>
			<th>Date Registered</th>
			<th>Total Points</th>
		</tr>
	</thead>
	<tbody>
		<?php $i = 1; foreach($users as $user) { ?>
		<tr>
			<td><?=$i?></td>
			<td><?=$user->firstname.' '.$user->lastname?></td>
			<td><?=date('F m, Y',strtotime($user->birthday))?></td>
			<td><?=$user->email?></td>
			<td><a href="http://www.instagram.com/<?=$user->instagram_account?>" target="_blank" /><?=$user->instagram_account?></a></td>
			<td><?=date('F m, Y',strtotime($user->date_registered))?></td>
			<td align="center"><?=$log->get_total_points($user->fbid)?></td>
		</tr>
		<?php $i++; } ?>
	</tbody>
</table>

</body>
</html>