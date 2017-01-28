<?php
	include('connect.php');
	session_start();
	if(!isset($_SESSION['userid']))
	{
		echo 'Invalid';
	}
	else
	{
		if(!isset($_POST))
		{
			echo 'Error';
		}
		else
		{
			$itemid=$_POST['items'];
			$price=intval($_POST['cost']);
			$name=$_POST['name'];
			$desc=$_POST['desc'];
			$rems=$_POST['rems'];
			if($_POST['umlmt']==true)
			{
				$lmt=-1;
			}
			else
			{
				$lmt=intval($_POST['urllmt']);
			}
			$qty=0;
			$today = date('Y-m-d h:i:s');
			$q=$mysqli->query("INSERT INTO urls (itemid,price,lmt,rems,qty,urlname,urldesc,createdat) values ('$itemid',$price,$lmt,'$rems',0,'$name','$desc','$today')");
			if($q)
			{
				echo json_encode(array('Success',$mysqli->insert_id));
			}
			else
			{
				echo 'Fail'.$mysqli->error;
			}
		}
	}
?>