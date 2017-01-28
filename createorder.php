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
				 <label class="control-label">Item Name</label>
				 <div class="controls">
				 	<input type="text" placeholder="Item Name" id="itemname">
				 </div>
			</div>
			<div class="control-group">
				 <label class="control-label">Item Description</label>
				 <div class="controls">
				 	<textarea placeholder="Description" id="itemdesc"></textarea>
				 </div>
			</div>
			<div class="control-group">
				 <label class="control-label">Item Price</label>
				 <div class="controls">
				 	<input type="number" placeholder="Price" id="itemprice">
				 </div>
			</div>
			<div class="control-group">
				 <label class="control-label">Upload Picture</label>
				 <div class="controls">
				 	<input type="file" id="itempic" name="itempic" onchange="readURL(this);">
				 </div>
			</div>
			<div class="imgbox">
				<img class="imgs">
			</div>
			<div class="clearfix"></div>
			<div class="btn createitembtn" style="margin-left:100px;margin-top:30px;">Create Item</div>

			<div class="mesgbox"></div>

		</div>
		<?php
			include('footer.php');
		?>
	</div>
</body>
</html>