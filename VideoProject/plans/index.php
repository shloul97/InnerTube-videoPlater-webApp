<?php
include '../userdata.php';
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
		
   <!-- end sidebar -->
	<div class="content-plans">
		
		<div class="plans-area">
		<div>
			<h1>Get Access Now</h1>
			
		</div>
	<div class="plan-content">
		<div class="plan-element">
		<p>30 Day</p>
		<p>0.8$ / Day</p>
		</div>
		<div class="plan-element">
		<p>Totally</p>
		<p>24.99$ / Month</p>
		</div>
		
		<div class="join-btn">
		<a href="../billing/index.php?planId=24589" class="link-dec"><p>JOIN</p></a>		
		</div>
	</div>
	<div class="plan-content">
		<div class="plan-element">
		<p>90 Day</p>
		<p>19.99$/Month</p>
		</div>
		<div class="plan-element">
		<p>Totally</p>
		<p>59.97$/3 Month</p>
		</div>
		
		<div class="join-btn">
		<a href="../billing/index.php?planId=25595" class="link-dec"><p>JOIN</p></a>		
		</div>
	</div>
	<div class="plan-content">
		<div class="plan-element">
		<p>1 Year</p>
		<p>12$ / Month</p>
		</div>
		<div class="plan-element">
		<p>Totally</p>
		<p>144$ / Year</p>
		</div>
		
		<div class="join-btn">
		<a href="../billing/index.php?planId=26573" class="link-dec"><p>JOIN</p></a>		
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
	
   </script>
</html>