<?php
	header("Cache-Control: no-store, no-cache, must-revalidate, no-transform, max-age=0, post-check=0, pre-check=0");
	header("Pragma: no-cache");
?>
<!DOCTYPE html>
<html>
<head>
<title>SMZ Message on a Bottle | ADMIN</title>
<link rel="stylesheet" type="text/css" href="<?=base_url()?>css/tooltipster.css" />
<script type="text/javascript" src="<?=base_url()?>js/jquery-1.11.1.js"></script>
<script type="text/javascript" src="<?=base_url()?>js/jquery.tooltipster.js"></script>
<script>
$(document).ready(function(){

	//toggle gif approval
	$(".approval").change(function() {
		var receiptid = $(this).attr('id');
		var fbid = $(this).attr('alt');
		if(this.checked) {
			var val = 1;
			$.post("<?=base_url()?>admin/approve_receipt",{ fbid:fbid, receiptid:receiptid, val:val },function(data){},'json');
		} else {
			var val = 0;
			$.post("<?=base_url()?>admin/approve_receipt",{ fbid:fbid, receiptid:receiptid, val:val },function(data){},'json');
		}
	});
	
	$('.myreceipt').mouseover(function(){
		var receipt = $(this).attr('href');
		$(this).tooltipster({
			position: 'right',
			content: $('<span><img src="'+receipt+'" width="400" /></span>')
		});
	});

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
	border: 2px solid #3d3d3d;
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
<h1>Proof of Purchases</h1>
<table align="center" cellpadding="3" cellspacing="0" id="tblUsers">
	<thead>
		<tr>
			<th>#</th>
			<th>Facebook ID</th>
			<th>Name</th>
			<th>GIF</th>
			<th>Date Generated</th>
			<th>Approved</th>
		</tr>
	</thead>
	<tbody>
		<?php $i = 1; foreach($receipts as $receipt) { ?>
		<tr>
			<td><?=$i?></td>
			<td><?=$receipt->fbid?></td>
			<td><?=$user->get_name($receipt->fbid)?></td>
			<td><a class="myreceipt tooltip" href="<?=base_url()?>images/uploads/<?=$receipt->fbid?>/receipt/<?=$receipt->filename?>" target="_blank">view</a></td>
			<td><?=date('F m, Y',strtotime($receipt->date_submitted))?></td>
			<td align="center"><input type="checkbox" id="<?=$receipt->id?>" alt="<?=$receipt->fbid?>" class="approval" <?=($receipt->approved == 1) ? "checked" : ""?> /></td>
		</tr>
		<?php $i++; } ?>
	</tbody>
</table>

</body>
</html>