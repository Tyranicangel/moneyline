<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Register</title>
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
		<div class="navbar">
			<div class="navbar-inner">
				<ul class="nav">
					<li><a href="home.php">Home</a></li>
					<li class="divider-vertical"></li>
					<li><a href="#">How does it work</a></li>
					<li class="divider-vertical"></li>
					<li><a href="register.php">Register</a></li>
					<li class="divider-vertical"></li>
					<li><a href="#">Pricing</a></li>
					<li class="divider-vertical"></li>
					<li><a href="#">Why Moneyline</a></li>
					<li class="divider-vertical"></li>
					<li><a href="#">People</a></li>
				</ul>
			</div>
		</div>
		<div class="reg_left_div">
			<p class="reg_p"><b>Register</b></p>
			<form action="registration.php" method='POST' id='register_form' enctype="multipart/form-data">
				<ul class="reg_ul">
					<li>
						<span class="reg_des">Full Name</span>
						<input type="text" class="input" name='fname' id='fname'>
					</li>
					<li>
						<span class="reg_des">Email</span>
						<input type="text" class="input" name='email' id='email'>
					</li>
					<li>
						<span class="reg_des">Phone No</span>
						<input type="text" class="input" name='phone' id='phone'>
					</li>
					<li>
						<span class="reg_des">Type</span>
						<select class="span2" id='type_select' name='type_select'>
							<option value="select">SELECT</option>
							<option value="ind">Individual</option>
							<option value="business">Business</option>
						</select>
					</li>
					<li>
						<span class="reg_des">Address</span>
						<textarea name='address' id='address'></textarea>
					</li>
					<li id='logo_li' style='display:none;'>
						<span class="reg_des">Upload your logo</span>
						<input type="file" class="input" name='logo' id='logo'>
					</li>
					<li>
						<input type="checkbox" style="margin-top:0px;" id='termsbox'> 
						<span style="margin:2px 3px;">I Agree to all the <a href="">Terms and Conditions</a></span>
					</li>
					<li style="text-align:Center;"><input type='submit' value='Register' class="btn btn-info"></li>
				</ul>
			</form>
			<p class="text-error" id='register_error'></p>
		</div>
		<div class="reg_right_dv">
			<div class="reg_img">
				<img src="images/register.png" style="width:400px;">
			</div>
			<p class="reg_steps_p"><b>Registration to Transactions!</b></p>
			<ol class="reg_ol">
				<li>You'l receive a activation link to your mail the moment you register!Click on the activation link to activate your moneyline account!</li>
				<li>Within 8 hours of your account activation you will receive a call from our team to verify your details!</li>
				<li>After verfication you'l receive a link to attach your bank account to your moneyline account, within 24 hours after you attach your bank account you'l receive your moneyline login credentials</li>
				<li>Happy Transactions!</li>
			</ol>
		</div>
	</div>
</body>
</html>