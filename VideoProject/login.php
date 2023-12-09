<?php
include 'conn.php';

if(isset($_POST['action'])) {
	$action = $_POST['action'];

	//$all_array = $_POST['q'];
	//echo $all_array;
	
	$username =mysqli_real_escape_string($db,$_POST['username']);
	$password =mysqli_real_escape_string($db,$_POST['password']);

	$sql_check_login = "SELECT * from user where username = '$username' AND password='$password'";
	$result= mysqli_query($db,$sql_check_login);
	$rows_num = mysqli_num_rows($result);
	$sql_check_reg = "SELECT * from user where username = '$username'";
	$result_reg = mysqli_query($db,$sql_check_reg);
	$rows_num_reg = mysqli_num_rows($result_reg);
	$error_message = '..' . $sql_check_login . '..'. $rows_num . '/n';
  
// path of the log file where errors need to be logged
	$log_file = "logerr.log";
  
// logging error message to given log file
	error_log($error_message, 3, $log_file);
	if($action == 'login'){
		$check = false;
		
		if($rows_num > 0){
			echo 1;
			$_SESSION['login_user'] = $username;
			$check = true;
		}
		else{
			$check = false;
			echo 'PASSWORD OR USERNAME INCORRECT';
		}
	}

	if($action == 'register'){
		if(isset($_POST['email'])){
		$email = mysqli_real_escape_string($db,$_POST['email']);
		}
		$check = false;
		if($rows_num_reg > 0){
			$check = false;
			echo 'Username already exist';
		}
		else{
			$check = true;
			$sql_reg = "INSERT into user(username,password) VALUES ('$username','$password')";
			mysqli_query($db,$sql_reg);
			$_SESSION['login_user'] = $username;
			echo 1;
		}
		
	}
}

?>