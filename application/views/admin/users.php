<?php
	header("Cache-Control: no-store, no-cache, must-revalidate, no-transform, max-age=0, post-check=0, pre-check=0");
	header("Pragma: no-cache");
?>
<!DOCTYPE html>
<html>
<head>
<title>SMZ Message on a Bottle | ADMIN</title>
<script type="text/javascript" src="<?=base_url()?>js/jquery-1.11.1.js"></script>
<script type="text/javascript" src="<?=base_url()?>js/jquery.dataTables.js"></script>
<script>
$(document).ready(function(){
	
	//convert to datatable
	$('#tblUsers').dataTable();

});
</script>
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
	margin-top: 30px;
}
#tblUsers th{
	background-color: #3d3d3d;
	color: #fff;
}
a {
	text-decoration: none;
}
#tblUsers td, #tblUsers th{
	border: 2px solid #3d3d3d;
}
#tblUsers {
	border-collapse: collapse;
}
#tblUsers th{
	background-color: #3d3d3d;
	color: #fff;
	cursor: pointer;
}
#tblUsers_info {
	text-align: center;
}
#tblUsers_paginate {
	text-align: center;
	margin-top: 30px;
}
#tblUsers_paginate a {
	background-color: #3d3d3d;
	color: #fff;
	font-weight: bold;
	padding: 5px;
	margin: 3px;
	cursor: pointer;
}
#tblUsers_length {
	text-align: right;
	width: 90%;
	margin: 0 auto;
}
#tblUsers_filter {
	text-align: left;
	width: 90%;
	margin: 0 auto;
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
			<th>City</th>
			<th>Province</th>
			<th>Contact Number</th>
			<th>Email</th>
			<th>Date Registered</th>
			<th>Subscribed</th>
		</tr>
	</thead>
	<tbody>
		<?php $i = 1; foreach($users as $user) { ?>
		<tr>
			<td><?=$i?></td>
			<td><?=$user->firstname.' '.$user->lastname?></td>
			<td><?=date('F m, Y',strtotime($user->birthday))?></td>
			<td><?=$user->city?></td>
			<td><?=$user->province?></td>
			<td><?=$user->contactnum?></td>
			<td><?=$user->email?></td>
			<td><?=date('F d, Y',strtotime($user->date_registered))?></td>
			<td><?= ($user->subscribed == 1) ? 'yes' : 'no' ?></td>
		</tr>
		<?php $i++; } ?>
	</tbody>
</table>

</body>
</html>