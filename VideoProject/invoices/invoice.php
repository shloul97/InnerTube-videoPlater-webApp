<?php
include 'getInvoicesdata.php';

if(isset($_GET['inv_id'])){
	$inv_id = $_GET['inv_id'];
	
	$id_set = new getInvoice($inv_id);
	$data_arr1 = $id_set->get_data();
	
	//echo $data_arr1['type'];
	/*$sql_inv = "SELECT * from invoices, plans where invoices.inv_id = $inv_id
	AND invoices.planId = plans.planId";
	$row_total = mysqli_fetch_assoc(mysqli_query($db,$sql_inv));
	$planId = $row_total['planId'];
	$amount = $row_total['amount'];
	$type = $row_total['type'];
	$price = new coinAPI($type);
	$total_amount = round(($amount/$price->get_rate()),6);
	
	$ext_wallet;
	switch($type){
		case 'btc' : 
		$ext_wallet = $wallet_btc;
		break;
		case 'ltc' :
		$ext_wallet = $wallet_ltc;
		break;
		case 'dog' :
		$ext_wallet = $wallet_dog;
		break;
	}*/
	
	
}
elseif(isset($_GET['planId'])){
	$type = $_GET['type'];
	$planId = $_GET['planId'];
	$sql_getId = "select * from invoices where planId = $planId AND type = '$type' AND userId = $id";
	$row_id = mysqli_fetch_assoc(mysqli_query($db,$sql_getId));
	$inv_id = $row_id['inv_id'];
	$id_set = new getInvoice($inv_id);
	$data_arr1 = $id_set->get_data();
}
else {
	header('Location: ../account-log');
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
	  
	  
   </head>
   <body id="home-body">
	
	<!-- start mobile header -->
	<div id="mheader" class="mheader">
		<div class="mheader-content">
			<div class="box-col">
			<i id="header-menu" class="gg-menu left"></i>
			</div>
			<div class="box-col">
			<a href="#">LOGO</a>
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
            <img src="../images/logo.png"></img>
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
         <a href="#" class="nav-btn">Category</a>
         <a href="#" class="nav-btn">News</a>
         <a href="../plans" class="nav-btn">Plans</a>
         <a href="#" class="nav-btn">FAQ</a>
          </div>
         </div>
         
         <div class="box-col" style="display:none;">
         <span>Credit : 0$</span>
         <div class="center-of">
         <div class="gem-area">
         <ul class="gem-ul">
         <li><img name="gem-icon" style="width: 25px; height: 20px;" src="../images/gem.png"/></li>
         <li><span>0</span></li>
         </ul>
         </div>
         </div>
		 </div>
         
       
		<div class="box1">
         <div class="box-col-login" >
         
         </div>
         <div class="box-col-login" style="">
         <div class="dropdown">
         <img id="account-menu" src="../images/account.png" style="height:40px; width:40px;"></img>
         <div class="dropdown-content">
         <a href="#">Account</a>
         <a href="#">Change Password</a>
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
		
   <!-- end sidebar -->
	<div class="invoice-content" id="invoice-content">
	
	<div class="billing">
		<?php
		echo'
		 
			<div class="billing-content">
			<div class="billing-info">
			<h2>Invoice NO. : '.$data_arr1['inv_id'].'</h2>
			</div>
			<div id="wlt-in">
			<div class="billing-info">
			<p id="warning"> **IF Credit Not adding to your account automatically
			please after send money click on <b>"Verify"</b> to add credit to your account**</p>
			</div>
			<div class="billing-info">
			<img src="https://api.qrserver.com/v1/create-qr-code/?data='.$data_arr1['wallet'].'" alt="" title="" id="wallet-img">
			</img>
			</div>
			<div class="billing-info">
			<input type="text" value="'.$data_arr1['wallet'].'" readonly/>
			</div>
			
			<div class="billing-info">
			<p>Amount : '.$data_arr1['amount'].' - '.$data_arr1['type'].'</p>
			</div>
			<div class="billing-info">
			<button href="checkbalance.php?inv_id='.$data_arr1['inv_id'].'&type='.$data_arr1['type'].'" class="btn1" id="verify-btn">Verify</button>
			</div>
			</div>
			</div>';
		?>
	</div>
	</div>
    </div>
    <div class="overlay"></div>
	<div class="pop"></div>
    <div class="msearch-area" id="m-search">
	<i class="gg-close-o" id="close"></i>
		<div class="search-block">
			<form>
				<input id="msearch-input"type="text" placeholder="Search ..."/>
				<button type="submit">Search</button>
			</form>
			
			<ul>
			<li><a href="#">Related search</a></li>
			<li><a href="#">Related search</a></li>
			<li><a href="#">Related search</a></li>
			<li><a href="#">Related search</a></li>
			<li><a href="#">Related search</a></li>
			</ul>
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
			<li><a href="#">Account Setting</a></li>
			<li><a href="#">Tickets</a></li>
			<li><a href="#">Change password</a></li>
			<li><a href="#">Logout</a></li>
			</ul>
		</div>';
		}
		?>
		
		
		
   </div>
   </div>
    <div class="mside">
		<div class="side-content">
			<a href="#">LOGO</a>
			<ul class="ul-content">
			<li><a href="#">Category<a></li>
			<li><a href="#">Channels<a></li>
			<li><a href="#">Plans<a></li>
			<li><a href="#">About<a></li>
			</ul>
		</div>
	</div>
   </body>
   <script>
   $(document).ready(function(){
	   
   });
	
   </script>
</html>