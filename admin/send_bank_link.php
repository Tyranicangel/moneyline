<?php
	include('../connect.php');
	include('../ses.php');
	$userid=$_POST['userdat'];
	$q1=$mysqli->query("SELECT * FROM users WHERE id=$userid");
	$r=$q1->fetch_assoc();
	$email=$r['userid'];
	$name=$r['username'];
	$usrtkn=$r['verificationcode'];
	$subject = "Bank Details";
	$mailmsg="<!DOCTYPE html><html lang='en'><head><meta charset='UTF-8'><title>Mail</title><link rel='stylesheet' href='//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css'></head><body><div style='float: left;width:640px;padding:30px;background:#f4f4f4;'><div style='float:left;width:100%;'><div style='float:left;'><img src='http://www.money-line.in/images/logo.png' style='width:200px;margin-left:-35px;'></div><div style='float:right;font-family:arial;font-size:13px;height:60px;line-height:60px;'><i class='fa fa-phone'></i><span style='margin-left:10px;'>Support Helpline: +91 040-23554749</span></div></div><div style='background: #474646;padding: 10px 20px;color: white;font-weight: bold;font-family: arial;width:600px;float: left;'>Hi, <span>".$name."</span></div><div style='background: white;float: left;font-family: arial;font-size: 13px;padding:10px 20px 20px 20px;	width:600px;'>Thank you for registering with Moneyline, you need to verify your E-mail ID that you have given us! Please click on the URL below to verify your E-mail ID, the page will lead you back to the moneyline website. Happy Transactions! <br> <br><span><b>Verification URL:</b><a href='http://www.money-line.in/bankverify.php?token=".$usrtkn."'>http://www.money-line.in/bankverify.php?token=".$usrtkn."</a></span></div></div></body></html>";
	sendEmail($email, $subject, $mailmsg);
?>