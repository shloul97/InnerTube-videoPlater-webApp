<?php
include '../userdata.php';

?>
<!DOCTYPE html>
<html>

   <head> 
      <title>Main</title>
	  <meta name="keywords" content="porn,pornoopo,pornhub,brazzers,brazzerz,vixen,vexin,vexen,deeper,tuchi,blacked,sex
	  puretaboo,xHamster,youporn,reality kings,adultTime,adult time,mofos,family stroker, family pies,sislovesme,sisloveme,spizo,pornpros,twistys,naughtyamerica,naughty america,
	  private,best porn,porno,bangbros" />
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

      <div class="body" id="body-test">
	 
	  	   <!-- start sidebar -->
		<div class="sidebar">
			<h2>Category</h2>
			
			<ul id="category-ul">
			</ul>
		</div>
   <!-- end sidebar -->
	<div class="content" id="home-content">
		
		<div class="videos-area" id="video-home">
		<div class="vidSpace" >
	<div class="vid-div">
		<div>
         <a href="../video_player?video-id=id">
         <iframe src=""></iframe>
         </a>
		 </div>
         <div class="vid-content">
		
         <a href="../video_player?vidId=id">Name of videoaa aaaa aaaaaa aaaaaaa aaaaaa aaaaaa aaaaaa</a>
		
         <div>
         <span name="views">views : 198k</span>
         <span name="rate">rate 98%</span>
         </div>
         </div>
      </div>
	</div>
	  
	  </div>
	  <div class="bottom" id="page-counter"><!--<div class="counter">
      
		<a href=""class="page-num">&lt&lt</a>
		<a href=""class="page-num">&lt</a>
		<a href="" class="page-num active">1</a>
		<a href="" class="page-num">2</a>
		<a href="" class="page-num">3</a>
		<a href="" class="page-num">4</a>
		<a href="" class="page-num">5</a>
		<a href=""class="page-num">&gt</a>
		<a href=""class="page-num">&gt&gt</a>
	
</div>-->
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
   $(document).ready(function(){
	   
   });
	
   </script>
</html>