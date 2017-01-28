<?php
	include('connect.php');
	if(!isset($_GET['token']))
	{
		$msg='This link is not available';
	}
	else
	{
		$tkn=intval($_GET['token']);
		$q=$mysqli->query("SELECT * FROM urls WHERE id=$tkn");
		$row=$q->fetch_assoc();
		if($row['lmt']!='-1' && intval($row['qty']>=intval($row['lmt'])))
		{
			$msg='This link has expired.';
		}
		else
		{
			$msg='success';
		}
		$items=explode('|',$row['itemid']);
		$mainitem=array();
		$userdat=0;
		foreach ($items as $key => $value) {
			if($value=="")
			{

			}
			else
			{
				$q1=$mysqli->query("SELECT * FROM items WHERE id=$value");
				$r1=$q1->fetch_assoc();
				array_push($mainitem,array($r1['id'],$r1['img_name'],$r1['itemname'],$r1['itemdesc']));
				if($userdat==0)
				{
					$userdat=$r1['userid'];
				}
			}
		}
		$uq=$mysqli->query("SELECT username,phoneno,address,logopath FROM users WHERE id=$userdat");
		$ur=$uq->fetch_assoc();
	}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Home</title>
	<script type="text/javascript">
		var itemsdat=JSON.parse('<?php echo json_encode($mainitem);?>');
	</script>
	<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen">
	<script src="http://code.jquery.com/jquery.js"></script>
	<script src='https://ajax.googleapis.com/ajax/libs/angularjs/1.3.10/angular.min.js'></script>
	<script src="scripts/home.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="styles/style.css">
    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
</head>
<body ng-app='mlApp' ng-controller='UniqueCtrl'>
	<div class="main_div">
		<div class="logo_dv">
			<?php
				if($ur['logopath']!='')
				{
			?>
			<div class="lg_main_dv" style='margin-right:20px;'>
				<img src="<?php echo 'uploads/'.$ur['logopath'];?>" style="max-width:100px;">
			</div>
			<?php
				}
			?>
			<div class="vendor_add">
				<p><b><?php echo $ur['username'];?></b></p>
				<p><?php echo $ur['address'];?></p>
				<p>Ph: <?php echo $ur['phoneno'];?></p>
			</div>
			<div class="payment_icon">
				<img src="images/payment.png" alt="">
			</div>
			<div class="lock_dv">
				<div class="lck_img">
					<img src="images/lock.png" style="width:50px;">
				</div>
				<div class="lock_txt">
					<span>Transactions on this site are safe and secure as indicated by the lock/green colour in your browser bar.</span>
				</div>
			</div>
		</div>
		<div class="content" style="padding-top:40px;">
			<?php
				if($msg!='success')
				{
			?>
			<div class="alert" style="margin-top:30px;">
			  <strong>Sorry!</strong><?php echo $msg;?>
			</div>
			<?php
				}
				else
				{
			?>
			<div class="content_left">
				<p style="padding-bottom:10px;"><b>Payment Details</b></p>
				<div class="pictures_div" ng-show='pics.length>0'>
					<div class="pic_nav_cls">
						<i class="fa fa-arrow-circle-left fa-lg ex_cls_rght" ng-show='showleft()' ng-click='move_left()'></i>
					</div>
					<div class="imgs_link">
						<img ng-src="{{'uploads/'+pics[mainpic]}}" style="max-width:100px;">
					</div>
					<div class="pic_nav_cls">
						<i class="fa fa-arrow-circle-right fa-lg ex_cls_rght" ng-show='showright()' ng-click='move_right()'></i>
					</div>
				</div>
				<div class="noofpics" ng-show='pics.length>0'>
					<span><b>No of Pictures:</b>{{pics.length}}</span>
				</div>
				<ul class="left_cont_ul">
					<li>
						<b>Name:</b>
						<span><?php
							if(count($mainitem)==1)
							{
								echo $mainitem[0][2];
							}
							else
							{
								echo $row['urlname'];
							}
						?></span>
					</li>
					<?php
						if(count($mainitem)==1)
						{
							if($mainitem[0][3]!='')
							{
					?>
					<li>
						<b>Description:</b>
						<span><?php echo $mainitem[0][3];?></span>
					</li>
					<?php

							}
						}
						else
						{
							if($row['urldesc']!='')
							{
					?>
					<li>
						<b>Description:</b>
						<span><?php echo $row['urldesc'];?></span>
					</li>
					<?php

							}
						}
					?>
					<?php
						if($row['rems']!='')
						{
					?>
					<li>
						<b>Remarks:</b>
						<span><?php echo $row['rems'];?></span>
					</li>
					<?php
						}
					?>
					<li>
						<b>No of Items:</b>
						<span><?php echo count($mainitem);?></span>
					</li>
					<li>
						<b>Total Cost:</b>
						<span>Rs <?php echo $row['price'];?>/- (INR)</span>
					</li>
				</ul>
			</div>
			<div class="content_right">
				<div class="pay_summ">
					<p class="pay_sum_p"><b>Payment Summary</b></p>
					<ul class="pay_summ_ul">
						<li><b>Total Cost:</b> <span>Rs <?php echo $row['price'];?>/- (INR)</span></li>
						<li><b>No of Items:</b><span><?php echo count($mainitem);?></span></li>
					</ul>
				</div>
				<div class="cust_dets_div">
					<p class="pls_fill_p"><b>Please fill your details before you pay</b></p>
					<ul class="cust_det_ul">
						<li><span class="cust_span">Name</span><input type="text" class="input"></li>
						<li><span class="cust_span">Email</span><input type="text" class="input"></li>
						<li><span class="cust_span">Phone</span><input type="text" class="input"></li>
						<li><span class="cust_span">Address</span><textarea></textarea></li>
						<li style="text-align:center;"><div class="btn btn-success">Pay Now</div></li>
					</ul>
				</div>	
			</div>
			<div class="content_instr">
				<span class="label label-info">Instructions</span>
				<ol class="content_inst_ol">
					<li>Fill in your details</li>
					<li>Click on Pay now, you will be redirected to the payment gateway</li>
					<li>An Invoice will be sent to your mail ID once your payment is successfull</li>
					<li>Please make sure you fill in your complete address incase there is any shipment to be sent after this transaction</li>
				</ol>
			</div>
		</div>
		<?php
			}
		?>
		<div class="footer">
			<div class="ftr_left">
				Copyright 2015, Pixelvide Design Solutions <br>
				Technology: PHP,JQuery, HTML/CSS <br>
				No Cookies Used
			</div>
			<div class="footer_info">
				<div class="menyline_lg">
					<img src="images/logo.png" style="width:200px;">
				</div>
				<div class="logo_dv_pixel">
					<div class="pix_logo_img_dv">
						<a href="http://www.pixelvide.com">
							<img src="images/pixelvide_logo.png" alt="pixelvide logo" style="width:105px;">
						</a>
					</div>
					<p class="eff_web_txt">
						Efficient Web.Secure Web
					</p>
				</div>
			</div>
		</div>
	</div>
</body>
</html>