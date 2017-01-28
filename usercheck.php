<?php

	$sql = "SELECT * FROM users WHERE id='".$_SESSION['userid']."' ";
	if(!$result = $mysqli->query($sql)) {

		die("Query failed: ".$mysqli->error);
	}

	if($result->num_rows == 0) {

		$_SESSION['login_error'] = "Incorrect username or password";
		header("Location: .");
	}
	$row = $result->fetch_assoc();

	if($row['active_flag'] != 1) {

		header("Location: .");
	} else {

		$username = $row['username'];
		$userid = $row['id'];
		$username = $row['username'];
	}
?>