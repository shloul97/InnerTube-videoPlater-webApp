<?php

$apiKey_btc = "YOUR_BTC_API_KEY";
$apiKey_ltc = "YOUR_LTC_API_KEY";
$apiKey_dog = "YOUR_DOGE_API_KEY";
$version = 2;
$pin = "YOUR_SECRET_PIN";
$block_io_btc = new BlockIo($apiKey_btc, $pin, $version);
$block_io_ltc = new BlockIo($apiKey_ltc, $pin, $version);
$block_io_dog = new BlockIo($apiKey_dog, $pin, $version);

?>