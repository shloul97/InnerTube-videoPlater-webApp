<?php
define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASS', '');
define('DB_DATABASE', 'newproject1');
$db = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASS,DB_DATABASE);
session_start();
?>