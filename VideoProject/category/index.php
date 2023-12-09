<?php

include '../userdata.php';
$sql_category = "select * from category";
$result_cat = mysqli_query($db,$sql_category);

$sql_channel = "select * from channel";
$result_chan = mysqli_query($db,$sql_channel);
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
	  
   </head>
   <body id="home-body">
	
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
		
   <!-- end sidebar -->
	<div class="content-category">
	
		<div>
		
		</div>
		<div class="category-box">
		<div class="header-cat">
		<h1>Channel</h1>
		</div>
		<?php
		while($row_channel = mysqli_fetch_assoc($result_chan)){
		echo '<div class="left"><a href="../channel/index.php?channel_id='.$row_channel['channelId'].'"><div class="">
            <div class="head-content">
                  <img src="'.$row_channel['channel_img'].'"></img>
            </div>
            <div>
               <a href="../channel/index.php?channel_id='.$row_channel['channelId'].'" class="link-dec">'.$row_channel['channelName'].'</a>
            </div>
         </div></a></div>';
		}
			
		?>
		
		</div>
		
		<div class="category-box">
		<div class="header-cat">
		<h1>Category</h1>
		</div>
		<ul>
		
		<?php
		$i = 0;
		$j = 1;
		echo '<div class="left">';
		$rowNum = mysqli_num_rows($result_cat);
		while($row_cat = mysqli_fetch_assoc($result_cat)){
			
			
			if($j == 6){
				echo '</div>';
			}
			if($i == 5 ){
			echo '<div class="left">';
			}
			echo '
				<li><a class="link-dec" href="#" onclick="categoryDis('.$row_cat['categoryId'].')"> '.$row_cat['type'].'</a></li>
				';
			if($i == 9){
			$i = 4;
			echo '</div>'; 
			}
			$i++;
			$j++;
			
		}
		
		
		?>
		
		</ul>
		</div>
	
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
	function categoryDis(chanId){
		display_videos(null,chanId,0);
		window.location.href = "../home";
	}
   </script>
</html>