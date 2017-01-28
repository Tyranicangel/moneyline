<?php
session_start();
include "connect.php";
if(isset($_SESSION['userid'])) {

	include "usercheck.php";
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Home</title>
	<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen">
	<script src="http://code.jquery.com/jquery.js"></script>
	<script src='https://ajax.googleapis.com/ajax/libs/angularjs/1.3.10/angular.min.js'></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="styles/style.css">
    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
</head>
<body>
	<div class="main_div">
		<?php 
			include('header.php');
		?>
		<div class="content">
			<div class="pay_summ_div">
				<ul class="pay_summ_ul">
					<li><b>Total No of URLs generated:</b> <span>23890</span></li>
				</ul>
			</div>
			<div class="alert paysummdisc_cls" style="font-size:12px;">
			  <button type="button" class="close" data-dismiss="alert">&times;</button>
			  <strong>Note!</strong> Payments will be transferred to the vendor's account every saturday! <br>
			  the total money received contains the charges as well
			</div>
			<div class="pagination pagination-right pag_ex_cls">
				<ul>
					<li><a href="#">&laquo;</a></li>
					<li><a href="#">1</a></li>
					<li><a href="#">2</a></li>
					<li><a href="#">3</a></li>
					<li><a href="#">4</a></li>
					<li><a href="#">&raquo;</a></li>
				</ul>
			</div>
			<table class="table table-striped table-hover table-condensed" style="font-size:12px;">
				<tr style="font-weight:bold;">
					<td>Sno</td>
					<td>URL</td>
					<td>Name</td>
					<td>Desc</td>
					<td>Remarks</td>
					<td>Amount(Rs.)</td>
					<td>Date</td>
					<td>URL Limit</td>
					<td>Payments Done.</td>
					<td>In progress.</td>
					<td>URL Status</td>
				</tr>
				<tr>
					<td>1.</td>
					<td><a href="#">www.moneyline.com/sampleurl/vendor.php?user=fedasf</a></td>
					<td>Sample name</td>
					<td>Sample Description, here so there some text here</td>
					<td>Sample Remarks here</td>
					<td>23000</td>
					<td>12/1/2015</td>
					<td>3</td>
					<td>2</td>
					<td>0</td>
					<td><span class="label label-success">Active</span></td>
				</tr>
				<tr>
					<td>2.</td>
					<td><a href="#">www.moneyline.com/sampleurl/vendor.php?user=fedasf</a></td>
					<td>Sample name</td>
					<td>Sample Description, here so there some text here</td>
					<td>Sample Remarks here</td>
					<td>23000</td>
					<td>12/1/2015</td>
					<td>3</td>
					<td>2</td>
					<td>1</td>
					<td><span class="label label-important">Expired</span></td>
				</tr>
			</table>	
		</div>
		<?php
			include('footer.php');
		?>
	</div>
</body>
</html>