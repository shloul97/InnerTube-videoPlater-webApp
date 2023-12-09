<?php
include 'conn.php';


$page1 = 0;
if(!isset($_SESSION['name'])){
	$_SESSION['name'] = null;
}
if(!isset($_SESSION['category'])){
	$_SESSION['category'] = null;
}
if(!isset($_SESSION['page'])){
	$_SESSION['page'] = null;
}
if(isset($_POST['name'])){
$_SESSION['name'] = mysqli_real_escape_string($db,$_POST['name']);
if($_SESSION['name'] == 'all'){
	$_SESSION['name'] = null;
}
}
if(isset($_POST['cat'])){
$_SESSION['category'] = mysqli_real_escape_string($db,$_POST['cat']);
if($_SESSION['category'] == 'all'){
	$_SESSION['category'] = null;
}
}
if(isset($_POST['page'])){
$_SESSION['page'] = mysqli_real_escape_string($db,$_POST['page']);
}
$page = $_SESSION['page'];
if($page != 0) {
	$page1 = $page * 20;
}else{
	$page1 = 0;
}

$sql = "SELECT * from videos where videoId IS NOT NULL";

if(!empty($_SESSION['name']) || $_SESSION['name'] != ''){
	$sql .= " AND video_name LIKE IFNULL('%".$_SESSION['name']."%',video_name)";
}
if(!empty($_SESSION['category']) || $_SESSION['category'] != ''){
	$sql .= " AND categoryId LIKE IFNULL('".$_SESSION['category']."',categoryId)";
}

$num_pages = ceil(mysqli_num_rows(mysqli_query($db,$sql)) / 20);
$sql .= " order by videoId asc LIMIT $page1,20";

//$sql = ."WHERE channel id = '$channel'";
//$sql = ."OR category = '$category'";
$video_array = array();
$result = mysqli_query($db,$sql);
$row = mysqli_num_rows($result);


$video_array['page'] = array('page' => $num_pages);
while($row = mysqli_fetch_array($result)){
	$video_array[$row['videoId']] = array(
		'id' => $row['videoId'],
		'channelId' => $row['channelId'],
		'categoryId' => $row['categoryId'],
		'imgPath' => $row['img_path'],
		'name' => $row['video_name']
		);
}
echo json_encode($video_array);

?>