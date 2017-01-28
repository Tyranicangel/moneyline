<?php
	include('../connect.php');
	session_start();
	if(!isset($_SESSION['mladmin']))
	{
		header('Location:../');
	}
	$q=$mysqli->query("SELECT * FROM users WHERE active_flag=3 ORDER BY modifiedat");
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Admin</title>
	<link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen">
	<script src="http://code.jquery.com/jquery.js"></script>
	<script src="../scripts/admin.js"></script>
    <script src="../bootstrap/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="../styles/style.css">
    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
</head>
<body>
	<div class="main_div">
		<?php include('header.php');?>
		<div class="content">
			<p class="reg_p"><b>Email Verified</b></p>
			<table class="table table-striped table-hover table-condensed">
				<tr style="font-weight:bold;">
					<td>Sno</td>
					<td>Customer Name</td>
					<td>Phone</td>
					<td>Email</td>
					<td>Date</td>
					<td>Activate</td>
				</tr>
				<?php
					$counter=1;
					while($r=$q->fetch_assoc())
					{

				?>
				<tr>
					<td><?php echo $counter;?></td>
					<td><?php echo $r['username'];?></td>
					<td><?php echo $r['phoneno'];?></td>
					<td><?php echo $r['userid'];?></td>
					<td><?php echo $r['modifiedat'];?></td>
					<td><button class='btn' id='<?php echo $r["userid"];?>'>Activate</button></td>
				</tr>
				<?php
					}
				?>
			</table>	
		</div>
	</div>
</body>
</html>