<?php
	include('connect.php');
	include('ses.php');
	if(!isset($_POST['email']))
	{
		header('Location:register.php');
	}
	$email=$_POST['email'];
	$today = date('Y-m-d h:i:s');
	$q1=$mysqli->query("SELECT * FROM users WHERE userid='$email'");
	if($q1->num_rows==0)
	{
		$phone=$_POST['phone'];
		$type=$_POST['type_select'];
		$address=$_POST['address'];
		$fname=$_POST['fname'];
		if($type=='business')
		{
			$logo=$_FILES['logo'];
			$imgname = $logo['name'];
			$ext = pathinfo($imgname, PATHINFO_EXTENSION);
			$imagename = md5(microtime()).".".$ext;

			$tempimgurl = $logo['tmp_name'];
			$imageurl = $_SERVER['DOCUMENT_ROOT']."/moneyline/uploads/".$imagename;
			$moveresult = move_uploaded_file($tempimgurl, $imageurl);
			$mde=md5($email);
			$q=$mysqli->query("INSERT INTO users (userid,username,password,phoneno,address,logopath,createdat,active_flag,verificationcode) VALUES ('$email','$fname','e10adc3949ba59abbe56e057f20f883e','$phone','$address','$imagename','$today',0,'$mde')");
		}
		else
		{
			$mde=md5($email);
			$q=$mysqli->query("INSERT INTO users (userid,username,password,phoneno,address,createdat,active_flag,verificationcode) VALUES ('$email','$fname','e10adc3949ba59abbe56e057f20f883e','$phone','$address','$today',0,'$mde')");
		}
		$usrtkn=$mysqli->insert_id;
		$subject = "Verification";
		$mailmsg="<!DOCTYPE html><html lang='en'><head><meta charset='UTF-8'><title>Mail</title><link rel='stylesheet' href='//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css'></head><body><div style='float: left;width:640px;padding:30px;background:#f4f4f4;'><div style='float:left;width:100%;'><div style='float:left;'><img src='http://www.money-line.in/images/logo.png' style='width:200px;margin-left:-35px;'></div><div style='float:right;font-family:arial;font-size:13px;height:60px;line-height:60px;'><i class='fa fa-phone'></i><span style='margin-left:10px;'>Support Helpline: +91 040-23554749</span></div></div><div style='background: #474646;padding: 10px 20px;color: white;font-weight: bold;font-family: arial;width:600px;float: left;'>Hi, <span>Prathyush</span></div><div style='background: white;float: left;font-family: arial;font-size: 13px;padding:10px 20px 20px 20px;	width:600px;'>Thank you for registering with Moneyline, you need to verify your E-mail ID that you have given us! Please click on the URL below to verify your E-mail ID, the page will lead you back to the moneyline website. Happy Transactions! <br> <br><span><b>Verification URL:</b><a href='http://www.money-line.in/verfication.php?token=".$usrtkn."'>http://www.money-line.in/verfication.php?token=".$usrtkn."</a></span></div></div></body></html>"
		sendEmail($email, $subject, $mailmsg);
		$message='Your account has been created. An email has been sent to your email id for confirmation.';
	}
	else
	{
		$row = $q1->fetch_assoc();
		if($row['active_flag']==1)
		{
			$message='This email is already in use.';
		}
		elseif($row['active_flag']==0)
		{
			$message='Verification link has been sent to your email. Please click on the link to activate your account.<br>Click here to resend the verification link.';
		}
		elseif($row['active_flag']==2)
		{
			$message='Your account is awaiting for verification from our team. You will be receiving a call from our team shortly.';
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