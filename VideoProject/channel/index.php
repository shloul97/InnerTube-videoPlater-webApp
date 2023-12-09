<?php
include '../userdata.php' ;

if(isset($_GET['channel_id'])){
	$page = 0;
	$channel_id = $_GET['channel_id'];
	if(isset($_GET['page'])){
		$page = $_GET['page'];
	}
	$count_page = $page *10;
	$sql_rows = "select * from videos where channelId = $channel_id";
	$result_rows = mysqli_query($db,$sql_rows);
	$num_pages = ceil(mysqli_num_rows($result_rows)/10);
	$sql_channel = $sql_rows . " order by videoId limit $count_page,10";
	$result_channel = mysqli_query($db,$sql_channel);
	$sql_channelData = "select * from channel where channelId = $channel_id";
	$row_chData = mysqli_fetch_assoc(mysqli_query($db,$sql_channelData));
}
else {
	header('Location:../category');
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
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
	  <script type="text/javascript" charset="utf-8" async="" src="../All_files/1.js"></script>
	  <script src="https://code.jquery.com/jquery-1.11.1.min.js"></script>
	  <script src="https://code.jquery.com/ui/1.11.1/jquery-ui.min.js"></script>
	  
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
		<div class="channel-head">
			<div class="head-content">
				<img src="../profile.jpg"></img>
			</div>
			<div class="head-content">
			<?php echo '<p>'.$row_chData['channelName'].'</p>';?>
			</div>
			
		</div>
		<div class="videos-area" id="video-channel">
		<?php
		while($row_videos = mysqli_fetch_assoc($result_channel)){
			$videoId = $row_videos['videoId'];
			$sql_view = "select count(*) as total from views where videoId = $videoId";
			$row_view = mysqli_fetch_assoc(mysqli_query($db,$sql_view));
			echo '<div class="vidSpace" id="'.$row_videos['videoId'].'">
				<div class="vid-div">
				<div>
				<a href="../video_player?contentId='.$row_videos['videoId'].'">
				<img src="'.$row_videos['img_path'].'">
				</a>
				</div>
				<div class="vid-content">
				<a href="../video_player?contentId='.$row_videos['videoId'].'">'.$row_videos['video_name'].'</a>
				<div>
				<p> <i class="bi bi-eye-fill"></i> '.$row_view['total'].'</p>
				</div>
				</div>
				</div>
				</div>';
		}
		
		?>
	  </div>
	   <div class="bottom">
	   <div class="counter">
	   <a href="#"  class="page-num">&lt&lt</a>
	   <?php 
	   for($i = 1 ; $i <= $num_pages ; $i++){
		   $page1 = $i - 1;
		   echo '<a  href="index.php?channel_id='.$channel_id.'&page='.$page1.'" class="page-num active">'.$i.'</a>';
	   }
	   ?>
	   <a href="#"  class="page-num">&gt&gt</a>
	   </div>
	   </div>
			<!--<div class="channel-head">
			<div class="head-list">
			<a href="#" >Videos</a>
			<a href="#">Playlists/Category</a>
			<a href="#">About</a>
			</div>
			</div> -->
	</div>
    </div>
    <div class="overlay"></div>
	<div class="pop"></div>
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

   </script>
</html>