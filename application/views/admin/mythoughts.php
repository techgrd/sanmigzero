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
	$('#tblMythoughts').dataTable();

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
#tblMythoughts td, #tblMythoughts th{
	border: 1px solid #3d3d3d;
}
#tblMythoughts {
	border-collapse: collapse;
	margin-top: 30px;
}
#tblMythoughts th{
	background-color: #3d3d3d;
	color: #fff;
}
a {
	text-decoration: none;
}
#tblMythoughts td, #tblMythoughts th{
	border: 2px solid #3d3d3d;
}
#tblMythoughts {
	border-collapse: collapse;
}
#tblMythoughts th{
	background-color: #3d3d3d;
	color: #fff;
	cursor: pointer;
}
#tblMythoughts_info {
	text-align: center;
}
#tblMythoughts_paginate {
	text-align: center;
	margin-top: 30px;
}
#tblMythoughts_paginate a {
	background-color: #3d3d3d;
	color: #fff;
	font-weight: bold;
	padding: 5px;
	margin: 3px;
	cursor: pointer;
}
#tblMythoughts_length {
	text-align: right;
	width: 90%;
	margin: 0 auto;
}
#tblMythoughts_filter {
	text-align: left;
	width: 90%;
	margin: 0 auto;
}
</style>
</head>
<body>
<?php include "header.php"; ?>
<h1>My Thoughts</h1>
<table align="center" width="80%" cellpadding="3" cellspacing="0" id="tblMythoughts">
	<thead>
		<tr>
			<th>#</th>
			<th>Name</th>
			<th>Question</th>
			<th>Answers</th>
			<th>Date Submitted</th>
		</tr>
	</thead>
	<tbody>
		<?php $i = 1; foreach($answers as $answer) { ?>
		<tr>
			<td><?=$i?></td>
			<td><?=$user->get_name($answer->fbid)?></td>
			<td><?=$mythoughts->get_question($answer->question_id)?></td>
			<td><?=$answer->answer?></td>
			<td><?=date('F d, Y',strtotime($answer->date_submitted))?></td>
		</tr>
		<?php $i++; } ?>
	</tbody>
</table>

</body>
</html>