<?php
include 'userdata.php';
require_once('block_io.php');

$apiKey = "0b08-9006-0206-6a51";
$version = 2;
$pin = "MM1997Mm00258MmM";
$block_io = new BlockIo($apiKey, $pin, $version);
$wallet1 = '3KzvfvtaGDM35bbFKBRtMSPQzAHK5VdyB5';

$i = $block_io->get_address_balance(array('addresses' => $wallet1));
$credit_update = $i->data->available_balance;

?>
<!DOCTYPE html>
<html>
<head>
<style>
button {
	background-color: lightgreen;
	height: 30px;
	width: 70px;
}
</style>
</head>
<body>
<div>
<?php echo '<h1>'.$credit_update.'</h1>' ?>
<form action="balancetest.php?action=btc" method="get">
<label for="wallet"></label>
<h3 name="wallet" id="wallet" value="<?php echo $wallet;?>"><?php echo $wallet;?></h3>
<button type="submit" id="verify" name="verify"> Verify</button>
</form>
</div>

</body>

</html>