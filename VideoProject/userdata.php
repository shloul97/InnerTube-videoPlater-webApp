<?php
include 'conn.php';
$userset = false;
$jsond = false;
$userArray = array();
if(isset($_POST['jsondata'])){
	$jsond = true;
}

if(isset($_SESSION['login_user'])){
	$userset = true;
	$username =  $_SESSION['login_user'];
	$get_user_sql =  "SELECT * from user where username = '$username'";
	$result = mysqli_query($db,$get_user_sql);
	$row = mysqli_fetch_assoc($result);
	$id = $row['userID'];
	$user_role = $row['user_role'];
	$wallet_btc = $row['wallet'];
	$wallet_ltc = $row['ltc_wallet'];
	$wallet_dog = $row['dog_wallet'];
	$sub_role = $row['sub_rule'];
	$subs = date_create($row['subTo']);
	$nowdate = date_create(date("Y-m-d"));
	$subValid = date_diff($nowdate,$subs)-> format('%R%a');
	$sub = false;
	if($sub_role == 1) {
		$_SESSION['sub_rule'] = 1;
		if($subValid <= 0){
			$sql_sub = "UPDATE user set sub_rule = 0 AND subFrom = null AND subTo = null where userID = $id";
			mysqli_query($db,$sql_sub);
			$sub_role = 0;
		}
	}
	
	$userArray['user_data'] = array(
	'username' => $username,
	'userId' => $row['userID'],
	'btc' => $row['wallet'],
	'ltc'=> $row['ltc_wallet'],
	'dog'=> $row['dog_wallet'],
	'sub_role'=> $row['sub_rule']
	);
	if($jsond){
		echo json_encode($userArray);
	}
}
?>