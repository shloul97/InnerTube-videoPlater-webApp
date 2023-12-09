<?php
if(isset($_GET['action'])){


$video = $_FILES["file"]["name"];
$name = explode('.',$video);
if (!file_exists('videos/'.$name[0])) {
    mkdir('videos/'.$name[0], 0777, true);
}
$bitrate = '350k';
$bitrate_arr = array(700,1200,2500,5000);
$res_arr = array(360,480,720,1080);
$command_img = "ffmpeg -ss 00:00:03 -i $video -frames:v 1 -q:v 4 videos/$name[0]/output.jpg 2> out.txt";
system($command_img);
for($i = 0;$i < count($bitrate_arr);$i++){
$video_name = $name[0] .'-'.$res_arr[$i];
$bit = $bitrate_arr[$i] . 'k';
$command = "ffmpeg -i $video -b:v $bit -bufsize $bit videos/$name[0]/$video_name.mp4 2> out.txt";
system($command);
}
}
?>
<!DOCTYPE html>
<html>

   <head> 
      <title>Main</title>
	  <meta charset="utf-8">
	  <meta name="viewport" content ="width= device-width, initial-scale=1">
      <link rel="stylesheet" type="text/css" href="All_files/all.css">
	  <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
	  <link href='https://css.gg/css' rel='stylesheet'>
	  <link href='https://unpkg.com/css.gg/icons/all.css' rel='stylesheet'>
	  <link href='https://cdn.jsdelivr.net/npm/css.gg/icons/all.css' rel='stylesheet'>
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
	  <script type="text/javascript" charset="utf-8" async="" src="All_files/1.js"></script>
	  
	  
   </head>
   <body>
   <div class ="custom-content">
			<div class="custom-form">
				<form action="index.php?action=convert" method="post" id="upload-form" enctype="multipart/form-data">
					<div class="file-area">
						<input type="file" id="file" name="file"  accept="video/mp4,video/*" />
					</div>
					<div class="simple-field">
						<input type="submit" name="submit" id="submit" />
					</div>
				</form>
			</div>
			
		</div>
   </body>
   <script>
	
   </script>
</html>