<?php
include '../conn.php';

	
	$userId = 2;
	$oldpass = mysqli_real_escape_string($db,$_POST['old']);
	$new = mysqli_real_escape_string($db,$_POST['new']);
	
	$sql = "SELECT * from user where userID = '$userId'";
	$result = mysqli_query($db,$sql);
	$row= mysqli_fetch_assoc($result);
	if($oldpass == $row['password']){
		$sql_change = "UPDATE user set password = '$new' where userID = '$userId'";
		mysqli_query($db,$sql_change);
		echo 1;
		
	}else {
		echo 0;
		
	}
	



?> 