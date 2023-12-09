<?php
include 'getInvoices.php';


class getInvoice{
	
	private $inv_id;
	
	public function __construct($inv_id){
		$this->inv_id = $inv_id;
	}
	public function get_data(){
		$inv_id1 = $this->inv_id;
		$data_arr = array();
		global $db;
		global $wallet_btc;
		global $wallet_ltc;
		global $wallet_dog;
		global $id;
		
		$sql_inv = "SELECT * from invoices, plans where invoices.inv_id = $inv_id1
		AND invoices.planId = plans.planId AND invoices.userId = $id";
		$row_total = mysqli_fetch_assoc(mysqli_query($db,$sql_inv));
		$planId = $row_total['planId'];
		$amount = $row_total['crypto_amount'];
		$type = $row_total['type'];
		$ext_wallet;
		switch($type){
			case 'btc' : 
			$ext_wallet =  $wallet_btc;
			break;
			case 'ltc' :
			$ext_wallet =  $wallet_ltc;
			break;
			case 'dog' :
			$ext_wallet =  $wallet_dog;
			break;
		}
		
		$data_arr = array('inv_id' => $inv_id1,
		'plan_id' => $planId,
		'amount' => $amount,
		'type' => $type,
		'wallet' => $ext_wallet);
		
		return $data_arr;
		
	}
}

?>