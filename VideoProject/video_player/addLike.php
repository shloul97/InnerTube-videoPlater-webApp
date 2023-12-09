<?php 
include '../userdata.php';
	
if(isset($_POST['action'])){
	$action = mysqli_real_escape_string($db,$_POST['action']);
	$vidId = mysqli_real_escape_string($db,$_POST['vidId']);
	if($action == 'add'){
		mysqli_query($db,"INSERT INTO likes(videoId,userId) Values ($vidId,$id)");
		echo 'DONE';
	}
	if($action == 'remove'){
		mysqli_query($db,"delete from likes where videoId = $vidId and userId = $id");
		echo 'DONE';
	}
}
?>