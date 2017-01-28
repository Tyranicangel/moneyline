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
			<div class="cont_lft_usr_prof">
				<p class="usr_prof_p"><b>User Profile</b></p>
				<p style="clear:both;"></p>
				<ul class="usr_pro_ul">
					<li><b>Name:</b> <span>9 Yards</span></li>
					<li><b>User ID:</b> <span>MNY908</span></li>
					<li><b>Address: </b><span>2-2-32389/23, Banjara Hills,Hyderabad</span></li>
					<li><b>Email:</b> <span>info@9yards.com</span></li>
					<li><b>Phone:</b> <span>+91 9666108492</span></li>
					<li><b>Bank A/c Name:</b> <span>9 Yards</span></li>
					<li><b>Bank A/c No:</b> <span>32349491074</span></li>
					<li><b>IFSC Code:</b> <span>SBIN0002724</span></li>
				</ul>
			</div>
			
			<div class="alert paysummdisc_cls" style="font-size:12px;">
			  <button type="button" class="close" data-dismiss="alert">&times;</button>
			  <strong>Note!</strong> Payments will be transferred to the vendor's account every saturday! <br>
			  the total money received contains the charges as well
			</div>
		</div>
		<?php
			include('footer.php');
		?>
	</div>
</body>
</html>