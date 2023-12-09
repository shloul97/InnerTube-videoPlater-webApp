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
     <div class="body">
	 <div id="test"></div>
	 <div class="log-reg">
	 <div class="log-container">
			<div class="log-field" id="login-fld"><p>Login</p></div>
			<div class="log-field" id="reg-fld"><p>Register</p></div>
			</div>
		<div class="all-forms" id="register">
			
			<h1 value="reg">Register</h1>
			<div id="message-reg" class="messages-reg hide" >
			<p id="password-match"></p>
			</div>
			
			<form id="register-form" data-id="register" action="#" method="post">
				<div class="field">
				<input type="text" name="username" placeholder="Username" required >
				</div><div class="field">
				<input id="password-reg" minlength="8" type="password" name="password" placeholder="Password" required >
				</div>
				<div class="field">
				<input id="conf-password-reg" type="password" name="conf-password" placeholder="Confirm Password" required >
				</div>
				<div class="field">
				<input type="email" name="email" placeholder="E-mail">
				</div>
				<div class="field">
				<input value="Register" data-id="register" id="reg-submit" type="button" class="submit-input" />
				
				</div>
				<div class="field">
				<a href="#" id="redirect">Already have an account ?</a>
				</div>
			</form>
		</div>
		<div class="all-forms" id="login">
			<h1 value="reg">Login</h1>
			<div id="message-log" class="messages-reg"  style="display:none;">
			<p id="msg-login"></p>
			</div>
			<form  id="login-form" data-id="login" action="#" method="post">
				<div class="field">
				<input type="text" name="username" placeholder="Username" required />
				</div><div class="field">
				<input type="password" name="password" placeholder="Password" required />
				</div><div class="field">
				<input value="Login" type="button" id="log-submit" class="submit-input" />
				</div>
				<div class="field">
				<a href="#" name="forgot" id="forgot">Forgot Password ?</a>
				</div>
			</form>
		</div>
	 </div>
    <div class="overlay"></div>
    </div>
   </body>
   <script>
	
   </script>
</html>