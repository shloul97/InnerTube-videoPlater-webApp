<?php 
include '../userdata.php';
require_once('../block_io.php');
include '../coinAPI.php';



if($userset){
include '../keys.php';

	if(isset($_GET['planId'])){
	
		$planId = $_GET['planId'];
		$sql_get_amount = "select amount from plans where planId = $planId";
		$result_amount = mysqli_query($db,$sql_get_amount);
		$row_amount = mysqli_fetch_assoc($result_amount);
		$amount = $row_amount['amount'];
		
		$exist = false;
		$date_create = date('Y/m/d');		
		$sql_check_if_exist = "select * from invoices where userId = $id and planId = $planId";
		if(isset($_GET['type'])) {
			$type1 = $_GET['type'];
			$sql_check_if_exist .= " AND type = '$type1'";
			//------
			$price = new coinAPI($type1);
			$total_amount = round(($amount/$price->get_rate()),6);
			//------
			$result_check_exist = mysqli_query($db,$sql_check_if_exist);
			$row_exist = mysqli_fetch_assoc($result_check_exist);
		
			if(mysqli_num_rows($result_check_exist) > 0){
			$exist = true;
			}	
			if(!$exist){		
				$type = mysqli_real_escape_string($db,$_GET['type']);
				$sql_add_invoice = "INSERT INTO invoices(type,create_date,planId,userId,crypto_amount)
					VALUES ('$type','$date_create',$planId,$id,";
				$sql_add_invoice.= "$total_amount)";
				mysqli_query($db,$sql_add_invoice);
				switch($type){
					case 'btc' :
					$address = $block_io_btc->get_new_address();
					$new_btc_wallet = $address->data->address;
					if($wallet_btc == NULL){
					$sql_add_btc = "update user set wallet = '$new_btc_wallet' where userID = $id";
					mysqli_query($db,$sql_add_btc);
					}
					header('location:../invoices/invoice.php?planId='.$planId.'&type='.$type);
					break;
					case 'ltc' :
					$address = $block_io_ltc->get_new_address();
					$new_ltc_wallet = $address->data->address;
					if($wallet_ltc == NULL){
					$sql_add_ltc = "update user set ltc_wallet = '$new_ltc_wallet' where userID = $id";
					mysqli_query($db,$sql_add_ltc);
					}
					header('location:../invoices/invoice.php?planId='.$planId.'&type='.$type);
					break;
					case 'dog' :
					$address = $block_io_dog->get_new_address();
					$new_dog_wallet = $address->data->address;
					if($wallet_dog == NULL){
					$sql_add_dog = "update user set dog_wallet = '$new_dog_wallet' where userID = $id";
					mysqli_query($db,$sql_add_dog);
					}
					header('location:../invoices/invoice.php?planId='.$planId.'&type='.$type);
					break;
				}
				
			}
			else{
				echo '<script language="JavaScript">
					alert("You already have an invoice with this plan and currency");
					window.location.href="../invoices";
				</script>';
			}
		}
	}
}
else {
	header("location:../account-log");
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
	<div class="content">
		<div class="billing">
			<div class="billing-header">
				<div class="select-coin" id="btc">
				<p>BitCoin</p>
				</div>
				<div class="select-coin" id="ltc">
				<p>LiteCoin</p>
				</div>
				<div class="select-coin" id="dog">
				<p>DogCoin</p>
				</div>
			</div>
			<div class="billing-content hide" id="btc-pl">
			<div class="billing-info">
			<p>Amount : <?php echo $amount; ?></p>
			</div>
			<div class="billing-info">
			<form action="index.php?planId=<?php echo $planId; ?>&type=btc" method="GET" >
			<button href="index.php?planId=<?php echo $planId; ?>&type=btc" class="btn1" id="verify-btn">Create Invoice</button>
			</form>
			</div>
			</div>
			
			<div class="billing-content hide" id="ltc-pl">
			<?php
			echo '
			<div class="billing-info">
			<p>Amount : '.$amount.' </p>
			</div>
			<div class="billing-info">
			<form action="index.php?planId='.$planId.'&type=ltc" method="GET" >
			<button href="index.php?planId='.$planId.'&type=ltc" class="btn1" id="verify-btn">Create Invoice</button>
			</form>
			</div>';
			?>
			</div>
			
			<div class="billing-content hide" id="dog-pl">
			<div class="billing-info">
			<p>Amount : <?php echo $amount; ?></p>
			</div>
			<div class="billing-info">
			<form action="index.php?planId=<?php echo $planId; ?>&type=dog" method="GET" >
			<button href="index.php?planId=<?php echo $planId; ?>&type=dog" class="btn1" id="verify-btn">Create Invoice</button>
			</form>
			</div>
			</div>
			
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
		
   </script>
</html>