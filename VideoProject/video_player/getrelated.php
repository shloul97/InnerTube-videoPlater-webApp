<?php
include '../conn.php';

$categoryId = mysqli_real_escape_string($db,$_POST['catId']);
$sql = "Select * from videos where categoryId = '$categoryId'";
$video_array = array();
$result = mysqli_query($db,$sql);
while($row = mysqli_fetch_array($result)){
	$video_array[$row['videoId']] = array(
		'id' => $row['videoId'],
		'imgPath' => $row['img_path'],
		'name' => $row['video_name']
		);
}
echo json_encode($video_array);
?>