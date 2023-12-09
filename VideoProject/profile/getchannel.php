<?php
include '../conn.php';

$userId = mysqli_real_escape_string($db,$_POST['userid']);
$sql = "SELECT * from channel where channelId IN (SELECT channelId from favchannel where userId = '$userId')";
$channel_array = array();
$result = mysqli_query($db,$sql);
while($row = mysqli_fetch_array($result)){
	$channel_array[$row['channelId']] = array(
		'id' => $row['channelId'],
		'imgPath' => $row['channel_img'],
		'name' => $row['channelName']
		);
}
echo json_encode($channel_array);
?>