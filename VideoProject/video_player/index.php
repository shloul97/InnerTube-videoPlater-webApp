<?php
include '../userdata.php';

$some = 1;
if($some){
	$likeuser = 0;
	$vidId = mysqli_real_escape_string($db,$_GET['contentId']);
	
	
	$sql = "select * from videos where videoId = $vidId";
	$result_videos = mysqli_query($db,$sql);
	$sql_getViews_result = mysqli_query($db,"select count(*) as total from views where videoId = $vidId");
	$count_row = mysqli_fetch_assoc($sql_getViews_result);
	$countView = $count_row['total'];
	$row_video = mysqli_fetch_assoc($result_videos);
	
	if($some){
	$sql_addView = "INSERT into views(videoId,userId) values ($vidId,$id)";
	mysqli_query($db,$sql_addView);
	$likeuser_res = mysqli_query($db,"select * from likes where userId = $id AND videoId = $vidId");
	$likeuser = mysqli_num_rows($likeuser_res);
	}
	
	$result_get_likes = mysqli_query($db,"select * from likes where videoId = $vidId");
	$get_likes = mysqli_num_rows($result_get_likes);
}
?>
<!DOCTYPE html>
<html>

   <head> 
      <title>Main</title>
	  <meta charset="utf-8">
	  <meta name="viewport" content ="width= device-width, initial-scale=1">
      <link rel="stylesheet" type="text/css" href="../All_files/all.css">
	  <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
	  <link href='https://css.gg/css' rel='stylesheet'>
	  <link href='https://unpkg.com/css.gg/icons/all.css' rel='stylesheet'>
	  <link href='https://cdn.jsdelivr.net/npm/css.gg/icons/all.css' rel='stylesheet'>
	  <link href="videojs/video-js.css" rel="stylesheet" />
	  <script src="videojs/video.min.js"></script>
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
	  <script type="text/javascript" charset="utf-8" async="" src="../All_files/1.js"></script>
	  <script type="text/javascript" charset="utf-8" async="" src="video.js"></script>
	  
	  <link href="https://unpkg.com/@silvermine/videojs-quality-selector/dist/css/quality-selector.css" rel="stylesheet">
	  <script src="https://unpkg.com/@silvermine/videojs-quality-selector/dist/js/silvermine-videojs-quality-selector.min.js"></script>
	  
	  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">
	  
	  
	  
	  
   </head>
   <body>
	
	<!-- start mobile header -->
	<div id="mheader" class="mheader">
		<div class="mheader-content">
			<div class="box-col">
			<i id="header-menu" class="gg-menu left"></i>
			</div>
			<div class="box-col">
			<a href="../home"><img src="../images/logo.png" id="logo"></img></a>
			</div>
			<div class="box-col">
				<div class="search-bar">
				<i class="gg-search right" id="search-header" style="margin-right:15px;"></i>
				<i class="gg-profile right" id="account-menu"></i>
				</div>
			</div>			
		</div>
		</div>
		
	</div>
	<!-- end mobile header -->
	
	<!-- start header -->
    <div id="header" class="header">
	 <div class="header-content">
         
            <div class="logo">
			<a href="../home">
            <img src="../images/logo.png"></img>
			</a>
         </div>
          
         <div class="box-col">
            <div>
            <div  id="search-form" class="box-col">
            <input id="searchInput" name="searchInput" class="search-input" type="text" placeholder="Search...">
            <button id="search-btn" class="search-btn">search</button>
            </div>
            </div>
         </div>         
         
         <div class="box-col">
            <div class="category-div">
         <a href="../category" class="nav-btn">Channels/Category</a>
         <a href="../plans" class="nav-btn">Plans</a>
        
          </div>
         </div>
         
         
       
		<div class="box1">
         <div class="box-col-login" >
         
         </div>
         <div class="box-col-login" style="">
         <div class="dropdown">
         <img id="account-menu" src="../images/account.png" style="height:40px; width:40px;"></img>
         <div class="dropdown-content">
         <a href="../profile">Account</a>
         <a href="../transaction">Transaction</a>
         <a href="#">Add Gems - fund</a>
         <a href="#">Logout</a>
         </div>
       </div>
       </div>
	   </div>
    </div>    
 </div>
     
      <!-- END OF HEADER -->

      <div class="body">
	 
	  	   <!-- start sidebar -->
		<div class="sidebar">
			<h2>Category</h2>
			<input type="text" placeholder="Quick Search" name="quick-search"/>
			<ul> 
			<li><a href="">Home</a></li>
			<li><a href="">Home</a></li>
			<li><a href="">Home</a></li>
			<li><a href="">Home</a></li>
			<li><a href="">Home</a></li>
			<li><a href="">Home</a></li>
			</ul>
		</div>
   <!-- end sidebar -->
	<div class="content">
		
		<div class="video-show">
			<div class="frame">
			
			<?php 
				if($some){
					
					echo '<video poster="'.$row_video['img_path'].'" type="video" class="video-js vjs-default-skin vjs-16-9" width="100%"  id="video-p" controls controlsList="nodownload">
					<source src="'.$row_video['vidPath'].'" label="1080p"></source>
					<source src="'.$row_video['path_720'].'" label="720p"></source>
					<source src="'.$row_video['path_480'].'" label="480p"></source>
					<source src="'.$row_video['path_360'].'" label="360p"></source>';
					echo '</video>';
			}			
			
			else {
					echo '<video poster="'.$row_video['img_path'].'" type="video" width="100%"  controls controlsList="nodownload">';
					echo '</video>';
					echo '<div class="above-vid"><p><strong>we\'re sorry !</strong></p><br>
						<p>you must get access to see content</p>
						<a href="../plans" class="btn1">Get Access!</a></div>';
					
				}
			?>
			</div>
			<div class="video-info">
			<?php
			echo
			'<h2>'.$row_video['video_name'].'</h2>';
			?>
			<div class="inside-vinfo">
			<div>
			<div class="color-grey">
			<?php echo '<p> <i class="bi bi-eye-fill"></i> '.$countView.'</p>'; ?>
			</div>
			</div>
			
			<div>
			<div class="color-grey">
			<p>
			<?php
			if($likeuser > 0){
				echo'
			<i id="like-btn" data-id="'.$vidId.'"class="bi bi-heart-fill" ></i>';
			}else{
				if($userset){
					echo'
				<i id="like-btn" data-id="'.$vidId.'"class="bi bi-heart" ></i>';
				}else {
					echo'
				<i id="like-btn-un" class="bi bi-heart" ></i>';
				}
				
			}
			
			?>
			<?php echo $get_likes; ?></p>
			</div>
			</div>
			</div>
			</div>
			
		</div>
		<div class="related-content" id="relate-vid">
			
		
		<?php
			/*for($i=0;$i<15;$i++){
				echo'<div class="vid-content">
			<img src="../test-img.jpg"></img>
			<span>Name of video</span>
			</div>';
			}*/
		?>
		</div>
	  <div class="bottom">
	  <div class="counter">
		<span>page : </span>
		<a href="">1</a>
		<a href="">2</a>
		<a href="">3</a>
		<a href="">4</a>
		<a href="">5</a>
		<span>...</span>
		<a href="">102</a>
	  </div>
	  </div>
	   </div>
    </div>
    <div class="overlay"></div>
    <div class="msearch-area" id="m-search">
	<i class="gg-close-o" id="close"></i>
		<div class="search-block">
			
				<input id="msearch-input"type="text" placeholder="Search ..."/>
				<button type="button" id="search-mob">Search</button>
			
			
			<!--<ul>
			<li><a href="#">Related search</a></li>
			<li><a href="#">Related search</a></li>
			<li><a href="#">Related search</a></li>
			<li><a href="#">Related search</a></li>
			<li><a href="#">Related search</a></li>
			</ul>-->
		</div>
    </div>
    <div class="m-user-area">
	<div class="account-content">
		<?php if(!$userset){
			echo'
		<div class="unreg">
			<button class="btn" id="register-btn">Register</button>
			<button class="btn" id="login-btn">Login</button>
		</div>';
		}
		else{
			echo '<div class="setting-area">
			<h2>'.$username.'</h2>
			<ul class="ul-content">
			<li><a href="../profile">Account Setting</a></li>
			<li><a href="../transaction">Transaction</a></li>
			<li><a href="../invoices">Invoices</a></li>
			<li><a href="../logout.php">Logout</a></li>
			</ul>
		</div>';
		}
		?>
		
		
		
   </div>
   </div>
    <div class="mside">
		<div class="side-content">
			<ul class="ul-content">
			<li><a href="../Category">Channels/Category<a></li>
			<li><a href="../plans">Plans<a></li>
			
			</ul>
		</div>
	</div>
   </body>
   <script>
	show_related();
	videojs('#video-p', {}, function() {
	var player = this;

	player.controlBar.addChild('QualitySelector');
	});
	
	
	
   </script>
</html>