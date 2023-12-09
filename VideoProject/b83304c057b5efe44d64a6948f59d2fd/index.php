<?php 

include '../userdata.php';
if(isset($userset) && $user_role == 1){
	
if(isset($_GET['action'])){

$category = $_GET['category'];
$channel = $_GET['channel'];

$video = $_FILES["file"]["name"];
$name = explode('.',$video);
$real_name = $name[0];
if (!file_exists('videos/'.$real_name)) {
	$path360 = 'videos/'.$real_name;
	$path480 = 'videos/'.$real_name;
	$path720 = 'videos/'.$real_name;
	$path1080 = 'videos/'.$real_name;
	$sql_insert_vid = "INSERT into videos(channelId,categoryId,img_path,video_name,path_720,path_480,path_360,vidPath) VALUES ($channel,$category,'videos/$real_name/$real_name.jpg','$real_name'";
    mkdir('videos/'.$real_name, 0777, true);
	$bitrate = '350k';
	$bitrate_arr = array(700,1200,2500,5000);
	$res_arr = array(360,480,720,1080);
	$command_img = "ffmpeg -ss 00:06:03 -i $video -frames:v 1 -q:v 4 videos/$real_name/$real_name.jpg 2> out.txt";
	system($command_img);
	for($i = 0;$i < count($bitrate_arr);$i++){
		$video_name = $real_name .'-'.$res_arr[$i];
		$bit = $bitrate_arr[$i] . 'k';
		$command = "ffmpeg -i $video -b:v $bit -bufsize $bit videos/$real_name/$video_name.mp4 2> out.txt";
		system($command);
		switch($i) {
			case 0 :
			$path360 .= '/'.$video_name.'.mp4';
			break;
			case 1 :
			$path480 .= '/'.$video_name.'.mp4';
			break;
			case 2 : 
			$path720 .= '/'.$video_name.'.mp4';
			break;
			case 3 : 
			$path1080 .= '/'.$video_name.'.mp4';
			break;
		}
	}
	$sql_insert_vid .= "'$path720','$path480','$path360','$path1080')";
	mysqli_query($db,$sql_insert_vid);
}else {
	echo '<script>alert(Video already exist يا خرا)</script>';
}
}
}
else {
	header("Location: ../home");
}

?>
<!DOCTYPE html>
<html>

   <head> 
      <title>Main</title>
	  <meta charset="utf-8">
	  <meta name="viewport" content ="width= device-width, initial-scale=1">
      <link rel="stylesheet" type="text/css" href="../All_files/custom-style.css">
	  <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
	  <link href='https://css.gg/css' rel='stylesheet'>
	  <link href='https://unpkg.com/css.gg/icons/all.css' rel='stylesheet'>
	  <link href='https://cdn.jsdelivr.net/npm/css.gg/icons/all.css' rel='stylesheet'>
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
	  <script type="text/javascript" charset="utf-8" async="" src="../All_files/1.js"></script>
	  <script src="https://code.jquery.com/jquery-1.11.1.min.js"></script>
	  <script src="https://code.jquery.com/ui/1.11.1/jquery-ui.min.js"></script>
	  
   </head>
   <body>
		<div class ="custom-content">
			<div class="custom-form">
				<form action="" method="post" id="upload-form" enctype="multipart/form-data">
					<div class="file-area">
						<input type="file" id="file" name="file[]" multiple accept="video/mp4,video/*" />
					</div>
					<div class="simple-field">
					<label for="category">Category</label>
						<select name="category">
							<option value="3000">Hello</option>
							<option value="3000">Hello</option>
						</select>
					</div>
					
					<div class="simple-field">
					<label for="channel">Channel</label>
						<select name="channel">
							<option value="2000">Hello</option>
							<option value="2000">Hello</option>
						</select>
					</div>
					<div class="simple-field">
					<label for="keywords">Keywords</label>
						<textarea type="text-box" name="keywords" id="keywords-box" rows="8" cols="50"></textarea>
					</div>
					<div class="simple-field">
						<input type="submit" name="submit" id="submit" />
					</div>
				</form>
			</div>
			<div class="motivational">
				<p>When you give joy to other people, you get more joy in return. You should give a good thought to happiness that you can give out </p>
			</div>
		</div>
	
   </body>
   <script>

   </script>
</html>