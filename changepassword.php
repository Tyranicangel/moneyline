<?php
session_start();
include "connect.php";
if(isset($_SESSION['userid'])) {

	include "usercheck.php";
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Home</title>
	<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen">
	<script src="http://code.jquery.com/jquery.js"></script>
	<script src='https://ajax.googleapis.com/ajax/libs/angularjs/1.3.10/angular.min.js'></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <script src="scripts/home.js"></script>
    <link rel="stylesheet" href="styles/style.css">
    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    <script type="text/javascript">

    	function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('.imgs')
                    .attr('src', e.target.result)
                    .width(150);
            };

            reader.readAsDataURL(input.files[0]);
        }
    }
    </script>
</head>
<body>
	<div class="main_div">
		<?php 
			include('header.php');
		?>
		<div class="content">
			<div class="control-group">
				 <label class="control-label">Old Password</label>
				 <div class="controls">
				 	<input type="text" placeholder="Old Password" >
				 </div>
			</div>
			<div class="control-group">
				 <label class="control-label">New Password</label>
				 <div class="controls">
				 	<input type="text" placeholder="New Password">
				 </div>
			</div>
			<div class="control-group">
				 <label class="control-label">Confirm New Password</label>
				 <div class="controls">
				 	<input type="text" placeholder="Confirm New Password">
				 </div>
			</div>
			<div class="btn">Change Password</div>
		</div>
		<?php
			include('footer.php');
		?>
	</div>
</body>
</html>