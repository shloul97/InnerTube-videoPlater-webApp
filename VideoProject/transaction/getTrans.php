<?php 
include '../userdata.php';

if($userset){
	$sql_trans = "select * from transaction where userId = $id";
	$result_trans = mysqli_query($db,$sql_trans);
	
}

?>