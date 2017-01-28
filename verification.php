<?php
	include('connect.php');
	if(!isset($_GET['token']))
	{
		header('Location:.');
	}
	$tkn=$_GET['token'];
	$u=$mysqli->query("SELECT id,userid,active_flag FROM users WHERE verificationcode='$tkn'");
	if($u->num_rows==0)
	{
		$message='Sorry this verification link is not accepted';
	}
	else
	{
		$r=$u->fetch_assoc();
		if($r['active_flag']!=0)
		{
			$message='Sorry this account is already verified';
		}
		else
		{
			$today = date('Y-m-d h:i:s');
			$f=$mysqli->query("UPDATE users SET active_flag=2,modifiedat='$today' WHERE verificationcode='$tkn'");
			$message='Thank you for verifying your account. You will be receiving a call from our team shortly.';
		}
	}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Registeration</title>
	<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen">
	<script src="http://code.jquery.com/jquery.js"></script>
	<script src='https://ajax.googleapis.com/ajax/libs/angularjs/1.3.10/angular.min.js'></script>
	<script src="scripts/home.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="styles/style.css">
    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
</head>
<body>
	<div class="main_div">
		<div class="logo_dv">
			<div class="lg_main_dv">
				<img src="images/logo.png" alt="">
			</div>
			<div class="contact">
				<div style="float:left;">
					<i class="fa fa-phone"></i>
					<span><b>040 2 3554749</b></span> <br>
					<span class="label label-info">Moneyline Helpline</span>
				</div>
				<div class="pay_icon">
					<img src="images/payment.png" alt="">
				</div>
			</div>
			<div class="address">
				<address>
				  <strong>Moneyline</strong><br>
				  Road No. 72, Jubilee Hills<br>
				  Prshasan Nagar, Hyderabad, Telangana, India<br>
				  <abbr title="Phone">P:</abbr> (+91) 040-23554749
				</address>
			</div>
		</div>
		<p class='text-success'><?php echo $message;?></p>
	</div>
</body>
</html>