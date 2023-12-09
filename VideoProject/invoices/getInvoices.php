<?php
include '../userdata.php';

$sql_invoice = "select * from invoices where userId = $id";
$result_invoice = mysqli_query($db,$sql_invoice);

?>