<?php
session_start();
include "connect.php";
if(!isset($_SESSION['userid'])) {
	if(isset($_POST['inputId']) && isset($_POST['inputPassword'])) {

		$sql = "SELECT * FROM users WHERE userid='".$_POST['inputId']."' ";

		if(!$result = $mysqli->query($sql)) {

			die("Query failed: ".$mysqli->error);
		}
		if($result->num_rows == 0) {

			$_SESSION['login_error'] = "Incorrect username or password";
			header("Location: .");
		}
		$row = $result->fetch_assoc();
		if($row['verificationcode']=='0')
		{
			$_SESSION['mladmin']=$row['id'];
			header('Location:admin/');
		}
		if($row['active_flag'] == 1) {

			$_SESSION['userid'] = $userid = $row['id'];
			$_SESSION['username'] = $row['username'];
		} else {

			header("Location: .");
		}


	} else {

		header("Location: .");
	}
} else {
	include "usercheck.php";

}

$sqlitems = "SELECT * FROM items WHERE userid='$userid' ";
if(!$resultitems = $mysqli->query($sqlitems)) {

	die("Query failed222: ".$mysqli->error);
}
else
{
	$rowdata=mysqli_fetch_all($resultitems);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Home</title>
	<script type="text/javascript">
		var itemsdata=JSON.parse('<?php echo json_encode($rowdata);?>');
	</script>
	<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen">
	<script src="http://code.jquery.com/jquery.js"></script>
	<script src='https://ajax.googleapis.com/ajax/libs/angularjs/1.3.10/angular.min.js'></script>
	<script src="scripts/home.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="styles/style.css">
    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
</head>
<body ng-app="mlApp" ng-controller='HomeCtrl' ng-cloak>
	<div class="main_div">
		<?php 
			include('header.php');
		?>
		<div class="content">
			<div class="alert" style="float:left;" ng-if='items.length==0'>
			  <strong>Hi There!</strong> Seems Like you do not have any items created, please create an item to generate a URL! <br><br>
			  <strong>How to create an Item?</strong> <br>
			  <ol>
			  	<li>Click on Create an Item in the above menu</li>
			  	<li>Fill in the Item details</li>
			  	<li>Click on Create Item</li>
			  </ol>
			</div>
			<div ng-show='items.length!=0'>
				<div class="cont_top_dv">
					<div class="crt_mult">
						<span><a href="#" class="gen_mul_a_cls" ng-click='gen_mul()'>Generate URL for multiple items>></a></span>
					</div>
					<!-- <div class="pagination pagination-right pag_ex_cls" style="margin-top:0px;">
						<ul>
							<li><a href="#">&laquo;</a></li>
							<li><a href="#">1</a></li>
							<li><a href="#">2</a></li>
							<li><a href="#">3</a></li>
							<li><a href="#">4</a></li>
							<li><a href="#">&raquo;</a></li>
						</ul>
					</div> -->
				</div>
				<ul class="thumbnails thumbnails_extra" ng-repeat='item in items'>
					<li class="span3">
						<div class="thumbnail">
							<img ng-if='item[7]==""' ng-src="images/noimage.png" style="width:200px;">
							<img ng-if='item[7]!=""' ng-src="{{'uploads/'+item[7]}}" style="width:200px;">
							<h5>{{item[1]}}</h5>
							 <p ng-if='item[2]!=""' style="padding-bottom:20px;">
							 	<b>Desc:</b><span>{{item[2]}}</span>
							 </p>
							 <div class="btn gen_url_btn" ng-click='gen_url(item)'>Generate URL</div>
							<i class="fa fa-pencil-square-o fa-lg thum_icns_cls edit_icon_cls"></i>
							<i class="fa fa-trash fa-lg thum_icns_cls"></i>
						</div>
					</li>
				</ul>
			</div>
		</div>
		<?php
			include('footer.php');
		?>
	</div>
	<div class="lightbox"></div>
	<div class="lght_panel_outdv">
		<div class="gen_url_lightbox_panel">
			<p class="gen_url_txt">
				<b>Generate URL</b>
				<i class="fa fa-times fa-lg lght_box_gen_url_close_btn" ng-click='close_single()'></i>
			</p>
			<div class="genurl_pic_dv">
				<img ng-if='singleitem[7]==""' ng-src="images/noimage.png" class="model_img_tg_gen_url">
				<img ng-if='singleitem[7]!=""' ng-src="{{'uploads/'+singleitem[7]}}" class="model_img_tg_gen_url">
			</div>
			<ul class="gen_url_ul">
				<li><b class='lb_product_title'>{{singleitem[1]}}</b></li>
				<li ng-if='singleitem[2]!=""'>
					<b>Description:</b><span>{{singleitem[2]}}</span>
				</li>
				<li>
					<span class="cost_txt"><b>Cost:</b></span>
					<input type="text" class="input-small lb_product_cost" ng-model='singleitem[4]'>
				</li>
				<li>
					<span class="cost_txt"><b>Remarks</b></span>
					<textarea ng-model='singleitem[11]'></textarea>
				</li>
				<li>
					<span class="cost_txt"><b>URL Limit:</b></span>
					<input type="text" class="input-small" ng-model='singleitem[10]' ng-readonly='singleitem[9]'>
					<input type="checkbox" style="margin: 0px 3px 0px 20px;" ng-model='singleitem[9]'><span style="font-size:12px;">No Limit</span><br>
					<span class="whats_this_spn" id="whats_this_a_id">(What's this?)</span>
				</li>
				<li style="text-align:center;"><div class="btn gen_url_main_btn" ng-click='single_gen()'>Generate</div></li>
				<li>
					<div class="alert" ng-show='single_error'>
					  <strong>Warning!</strong> {{error_msg}}
					</div>
				</li>
				<li><input type="text" class="input-xlarge" id='single_gen' placeholder="Generated URL here..." style="width:322px;" ng-model='generated' ng-focus='focus_gen()'></li>
			</ul>
		</div>
	</div>
	<div class="lght_panel_outdv">
		<div class="gen_edit_lightbox_panel">
			<p class="gen_url_txt">
				<b>Edit Item</b>
				<i class="fa fa-times fa-lg lght_box_edit_close_btn"></i>
			</p>
			<div class="genurl_pic_dv">
				<img src="images/model.png" class="model_img_tg_gen_url">
			</div>
			<ul class="gen_url_ul">
				<li>
					<span class="cost_txt"><b>Name:</b></span>
					<input type="text" class="input-large">
				</li>
				<li>
					<span class="cost_txt"><b>Description:</b></span>
					<textarea></textarea>
				</li>
				<li>
					<span class="cost_txt"><b>Cost:</b></span>
					<input type="text" class="input-small">
				</li>
				<li style="text-align:center;"><div class="btn btn-info">Save Changes</div></li>
			</ul>
		</div>
	</div>
	<div class="lght_panel_outdv" style="width:600px;">
		<div class="gen_mult_url_lightbox_panel" style="width:600px;">
			<p class="gen_url_txt">
				<b>Generate Multiple URL</b>
				<i class="fa fa-times fa-lg lght_box_gen__mul_url_close_btn"></i>
			</p>
			<p class="sel_stuff_p">* select the items you want to generate a URL for and click on Next>></p><br>
			<div class="gen_mul_dv_table">
				<table class="table table-striped table-hover table-condensed" style="font-size:12px;">
					<tr style="font-weight:bold;">
						<td>Sno</td>
						<td>Image</td>
						<td>Name</td>
						<td style='min-width:280px;'>Description</td>
						<td>Price(Rs.)</td>
						<td>Select</td>
					</tr>
					<tr ng-repeat='item in mulitems'>
						<td>{{$index+1}}</td>
						<td>
							<img ng-if='item[7]==""' ng-src="images/noimage.png" style="width:50px;">
							<img ng-if='item[7]!=""' ng-src="{{'uploads/'+item[7]}}" style="width:50px;">
						</td>
						<td>{{item[1]}}</td>
						<td>{{item[2]}}</td>
						<td>{{item[4]}}</td>
						<td><input type="checkbox" ng-model='item[9]'></td>
					</tr>
				</table>
			</div>
			<ul style="list-style:none;">
				<li style="text-align:center;"><div class="btn btn-info" id="nxt" ng-click='nxt_mul()'>Next>></div></li>
			</ul>
			<ul style="list-style:none;">
				<li>
					<div class="alert" ng-show='nxt_error'>
						<strong>Warning!</strong> {{nxt_error_msg}}
					</div>
				</li>
			</ul>
		</div>
	</div>
	<div class="lght_panel_outdv">
		<div class="gen_mul_url_next_lightbox_panel">
			<p class="gen_url_txt">
				<b>Generate Multiple URL</b>
				<i class="fa fa-times fa-lg lght_box_mul_url_next_close_btn"></i>
			</p>
			<div class="pictures_div" style="padding:10px 50px;" ng-show='pics.length>0'>
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
			<div class="noofpics" style="width:370px;margin-bottom:10px;margin-left:24px;" ng-show='pics.length>0'>
					<span><b>No of Pictures:</b>{{pics.length}}</span>
			</div>
			<ul class="gen_url_ul">
				<li>
					<span class="cost_txt"><b>Name:</b></span>
					<input type="text" class="input-large" ng-model='mulname'>
				</li>
				<li>
					<span class="cost_txt"><b>Description:</b></span>
					<textarea ng-model='muldesc'></textarea>
				</li>
				<li>
					<span class="cost_txt"><b>Total Cost:</b></span>
					<input type="text" class="input-small" ng-model='tc'>
				</li>
				<li>
					<span class="cost_txt"><b>Remarks:</b></span>
					<textarea ng-model='mulrems'></textarea>
				</li>
				<li>
					<span class="cost_txt"><b>URL Limit:</b></span>
					<input type="text" class="input-small" ng-readonly='mulnl' ng-model='mulurllmt'>
					<input type="checkbox" style="margin: 0px 3px 0px 20px;" ng-model='mulnl'><span style="font-size:12px;">No Limit</span><br>
					<span class="whats_this_spn" id="whats_this_a_id">(What's this?)</span>
				</li>
				<li style="text-align:center;"><div class="btn btn-info" ng-click='generate_multiple()'>Generate URL</div></li>
				<li>
					<div class="alert" ng-show='mul_error'>
					  <strong>Warning!</strong> {{mul_error_msg}}
					</div>
				</li>
				<li><input type="text" class="input-xlarge" placeholder="Generated URL here..." style="width:322px;" ng-model='mulgenerated' ng-focus='mul_focus()' id='mul_gen'></li>
			</ul>
		</div>
	</div>
</body>
</html>