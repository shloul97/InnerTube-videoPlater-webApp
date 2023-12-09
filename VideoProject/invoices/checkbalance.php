<?php
require_once('../block_io.php');
include '../keys.php';
include 'getinvoicesdata.php';


if(isset($_GET['inv_id'])){
	$inv_id = $_GET['inv_id'];
	$getData = new getInvoice($inv_id);
	$dataArr = $getData->get_data();
	$type = $dataArr['type'];
	$plan = $dataArr['plan_id'];
	$amoun = $dataArr['amount'];
	$rwallet;
	$cont_sql;
	$vari = 'dog';
	switch($type){
		case 'btc' :
		$get_balance = $block_io_btc->get_address_balance(array('addresses' => $wallet_btc));
		$balance = $get_balance->data->available_balance;
		$rwallet = $wallet_btc;
		$cont_sql = "AND wallet = null";
		break;
		case 'ltc' :
		$get_balance = $block_io_ltc->get_address_balance(array('addresses' => $wallet_ltc));
		$balance = $get_balance->data->available_balance;
		$rwallet = $wallet_ltc;
		$cont_sql = "AND ltc_wallet = null";
		break;
		case 'dog' :
		$get_balance = $block_io_dog->get_address_balance(array('addresses' => $wallet_dog));
		$balance = $get_balance->data->available_balance;
		$rwallet = $wallet_ltc;
		$cont_sql = "AND dog_wallet = null";
		break;
	}
	if($balance > 0){
		$sql_checkPlan = "select * from plans where planId = $plan";
		$row_check = mysqli_fetch_assoc(mysqli_query($db,$sql_checkPlan));
		$duration = $row['duration'];
		$dateFrom = date('Y-m-d');
		$dateTo = strtotime("+".$duration."day", strtotime(date('Y-m-d')));
		
		if($balance >= $amount){
			$sql_transaction = "INSERT INTO transaction(wallet,amount,txdate,userId,type) VALUES 
			('$rwallet',$amoun,'$dateFrom',$id,'$type')";
			mysqli_query($db,$sql_transaction);
			$sql_update = "update user set subFrom ='$dateFrom' AND subTo = '$dateTo' AND sub_rule = 1 where userID = $id";
			$sql_update .= $cont_sql;
			mysqli_query($db,$sql_update);
		}else{
			echo 'Sorry we can\'t find any Transaction Or your Transaction still under process wait until your Transaction have 3 Confirmation';
		}
	}
	
}

?>