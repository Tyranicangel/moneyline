<?php

include "connect.php";
session_start();
include "usercheck.php";
$today = date('Y-m-d h:i:s');
$itemname = $_POST['itemname'];
$itemprice = $_POST['itemprice'];
$itemdesc = $_POST['itemdesc'];
$imgname='';
$imagename='';
if(isset($_FILES['itempic'])) {

	$imgname = $_FILES['itempic']['name'];
	$ext = pathinfo($imgname, PATHINFO_EXTENSION);
	$imagename = md5(microtime()).".".$ext;

	$tempimgurl = $_FILES['itempic']['tmp_name'];
	$imageurl = $_SERVER['DOCUMENT_ROOT']."/moneyline/uploads/".$imagename;
	$moveresult = move_uploaded_file($tempimgurl, $imageurl);
	
}

$sql = "INSERT INTO items (itemname,itemdesc,userid, price, img_name, img_original_name, createdat, modifiedat) VALUES ('$itemname','$itemdesc', $userid, '$itemprice', '$imagename', '$imgname', '$today', '$today')";
if(!$result = $mysqli->query($sql)) {

	die("Query failed: ".$mysql->error);
}
else {

	echo $userid;
}

?>