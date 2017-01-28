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
					<li><b>Total Amount received:</b> <span>238900</span></li>
					<li><b>Amount transferred to vendor:</b> <span>3487</span></li>
					<li class="bal_cls_li"><b>Balance to be transffered:</b> <span>234899</span></li>
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
			<table class="table table-striped table-hover table-condensed">
				<tr style="font-weight:bold;">
					<td>Sno</td>
					<td>Customer Name</td>
					<td>Phone</td>
					<td>Email</td>
					<td>Address</td>
					<td>Amount(Rs.)</td>
					<td>Date</td>
					<td>Time</td>
				</tr>
				<tr>
					<td>1</td>
					<td>Prathyush</td>
					<td>+91 9666108492</td>
					<td>prathyush.reddy7@gmail.com</td>
					<td>2-2-1075/20/6/1,Tilaknagar,hyd</td>
					<td>23899</td>
					<td>29 Jan 2014</td>
					<td>17:23</td>
				</tr>
				<tr>
					<td>2</td>
					<td>Sneha</td>
					<td>+91 9666108492</td>
					<td>prathyush.reddy7@gmail.com</td>
					<td>2-2-1075/20/6/1,Tilaknagar,hyd</td>
					<td>78324</td>
					<td>17 Jan 2014</td>
					<td>23:28</td>
				</tr>
			</table>	
		</div>
		<?php
			include('footer.php');
		?>
	</div>
</body>
</html>