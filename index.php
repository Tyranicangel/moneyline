<?php
	session_start();
	if(isset($_SESSION['login_error']))
	{
		$error=$_SESSION['login_error'];
		$_SESSION['login_error'] = "";
	}
	else
	{
		$error="";
	}
	if(isset($_SESSION['userid'])) {

		header("Location: ./home.php");
	}
	session_write_close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Home</title>
	<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen">
	<script src="http://code.jquery.com/jquery.js"></script>
	<script src='https://ajax.googleapis.com/ajax/libs/angularjs/1.3.10/angular.min.js'></script>
	<script src="scripts/home.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="styles/style.css">
    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    <script>
		function validateForm()
		{
			var user_id=document.forms['login_form']['inputId'].value;
			var user_pass=document.forms['login_form']['inputPassword'].value;
			if(user_id==null||user_id=='')
			{
				alert("Please enter Login id");
				return false;
			}
			else if(user_pass==null||user_pass=='')
			{
				alert("Please enter password");
				return false
			}
		}
	</script>
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
					<li><a href="#">Why Moneyline</a></li>
					<li class="divider-vertical"></li>
					<li><a href="#">Pricing</a></li>
					
					<li class="divider-vertical"></li>
					<li><a href="#">People</a></li>
				</ul>
			</div>
		</div>
		<div class="content">		
			<div class="index_img">
				<div class="slider_img">
					<img src="images/index_img.png">
				</div>
				<div class="slider_div">
					<i class="fa fa-arrow-circle-right fa-2x exa_cls_icn"></i>
				</div>
			</div>
			<div class="login_form">
				<form class="form-horizontal" action="home.php" method="post"  name="login_form" onsubmit="return validateForm()">
				  <div class="control-group" style="width:300px;margin-top:20px;">
				    <label class="control-label" for="inputEmail" style="width:55px;text-align:left;padding-left:20px;">User ID</label>
				    <div class="controls" style="float:left;margin-left:10px;">
				      <input type="text" id="inputId" name="inputId" placeholder="User id" style="width:170px;">
				    </div>
				  </div>
				  <div class="control-group" style="width:300px;">
				    <label class="control-label" for="inputPassword" style="width:55px;text-align:left;padding-left:20px;">Password</label>
				    <div class="controls"  style="float:left;margin-left:10px;">
				      <input type="password" id="inputPassword" name="inputPassword" placeholder="Password" style="width:170px;">
				    </div>
				  </div>
				  <div class="control-group" style="width:300px;">
				    <div class="controls" style="float:left;margin-left:90px;">
				      <button type="submit" class="btn" style="width:120px;">Sign in</button>
				    </div>
				  </div>
				  <span style="font-size:12px;color:red;"><?php echo $error; ?></span>
				</form>
			</div>
			<div class="steps">
				<div class="ech_step">
					<div class="step_num">
						<span>1</span>
					</div>
					<div class="step_desc">
						<span><a href="register.php" class="reg_link">Register</a> with us!</span>
					</div>
				</div>
				<div class="ech_step">
					<div class="step_num">
						<span>2</span>
					</div>
					<div class="step_desc">
						<span>We'l Activate your account <br>after verification!</span>
					</div>
				</div>
				<div class="ech_step">
					<div class="step_num">
						<span>3</span>
					</div>
					<div class="step_desc">
						<span>Generate a URL and share <br> it with your customer!</span>
					</div>
				</div>
				<div class="ech_step">
					<div class="step_num">
						<span>4</span>
					</div>
					<div class="step_desc">
						<span>Receive your payment <br><strong>instantly!</b></strong>
					</div>
				</div>
			</div>
			<div class="ind_bsn_cls" style="margin-left:0px;">
				<div class="ind_img" >
					<img src="images/individual.png">
				</div>
				<p class="ind_p"><b>Individuals</b></p>
				<p class="ind_p">
					Sample text here, this is a sample text for theis block, lorem ip sum thertisum therti sum therti
					sum thertisum therti <a href="#">Click here</a>
				</p>
			</div>
			<div class="ind_bsn_cls">
				<div class="ind_img">
					<img src="images/business.png">
				</div>
				<p class="ind_p"><b>Business</b></p>
				<p class="ind_p">
					Sample text here, this is a sample text for theis block, lorem ip sum thertisum therti sum therti
					sum thertisum therti <a href="#">Click here</a>
				</p>
			</div>
		</div>
		<?php
			include('footer.php');
		?>
	</div>
</body>
</html>