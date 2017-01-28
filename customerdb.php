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
			<div class="ttl_cust_dv">
				<span><b>Total Customers:</b> 982</span>
			</div>
			<div class="btn btn-info snd_mlr_btn">Send a Mailer</div>
			<div class="pagination pagination-right" style="margin-top:0px;margin-bottom:10px;">
				<ul>
					<li><a href="#">&laquo;</a></li>
					<li><a href="#">1</a></li>
					<li><a href="#">2</a></li>
					<li><a href="#">3</a></li>
					<li><a href="#">4</a></li>
					<li><a href="#">&raquo;</a></li>
				</ul>
			</div>
			<table class="table table-striped table-hover">
				<tr style="font-weight:bold;">
					<td>Sno</td>
					<td>Customer Name</td>
					<td>Phone</td>
					<td>Email</td>
					<td>Country</td>
				</tr>
				<tr>
					<td>1</td>
					<td>Prathyush</td>
					<td>+91 9666108492</td>
					<td>prathyush.reddy7@gmail.com</td>
					<td>India</td>
				</tr>
				<tr>
					<td>2</td>
					<td>Sneha</td>
					<td>+91 9666108492</td>
					<td>prathyush.reddy7@gmail.com</td>
					<td>India</td>
				</tr>
				<tr>
					<td>3</td>
					<td>Robert</td>
					<td>+91 9666108492</td>
					<td>prathyush.reddy7@gmail.com</td>
					<td>India</td>
				</tr>
			</table>	
		</div>
		<?php
			include('footer.php');
		?>
	</div>
</body>
</html>