<?php
include '../conn.php';

$userid = mysqli_real_escape_string($db,$_POST['userid']);
$video_array = array();
$sql = "select * from videos where videoId in (select videoId from likes where userId = '$userid')";
$result = mysqli_query($db,$sql);
while($row=mysqli_fetch_assoc($result)){
	$video_array[$row['videoId']] = array(
		'id' => $row['videoId'],
		'name' => $row['video_name'],
		'img' => $row['img_path']
	);
}
echo json_encode($video_array);
?>