<?php
include 'conn.php';
if(isset($_GET['action'])){

for($i = 0 ; $i<= 150;$i++){
	$random1 = rand(0,4);
	$random2 = rand(1,16);

 	$path = '../video1';
 	$channel = 2000 + $random1;
 	$category = 3001 + $random2;
 	$img = '../website er-diagram.png';
 	$name = 'video'.$i;
 	$sql = "INSERT INTO videos(vidPath,channelId,categoryId,img_path,video_name) Values('$path',$channel,$category,'$img','$name')";
 	mysqli_query($db,$sql);
}
echo "ALL DONE";
}
?>
<!DOCTYPE html>
<html>
	<form method="post" action="insert.php?action=insert">

		<input type="submit" value="INSERT" name="insert"/>
	</form>
</html>