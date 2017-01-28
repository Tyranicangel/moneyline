<?php
	include('connect.php');
	session_start();
	if(!isset($_SESSION['userid']))
	{
		echo 'Invalid';
	}
	else
	{
		if(!isset($_POST['dat']))
		{
			echo 'Error';
		}
		else
		{
			$data=$_POST['dat'];
			$itemid=intval($data[0]);
			$price=intval($data[4]);
			if($data[9]==false)
			{
				$lmt=intval($data[10]);
			}
			else
			{
				$lmt=-1;
			}
			$qty=0;
			$rems=$data[11];
			$today = date('Y-m-d h:i:s');
			$q=$mysqli->query("INSERT INTO urls (itemid,price,lmt,rems,qty,createdat) values ('$itemid',$price,$lmt,'$rems',0,'$today')");
			if($q)
			{
				echo json_encode(array('Success',$mysqli->insert_id));
			}
			else
			{
				echo 'Fail';
			}
		}
	}
?>