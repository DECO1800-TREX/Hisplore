<?php include("includes/layouts/session.php"); ?>
<?php require_once("includes/db_connection.php"); ?>
<?php require_once("includes/functions.php"); ?>
<?php 
		$username = '';
		$password = '';
		$re_pass = '';
		
		$errors = array();
		
		function valid_username($input){
			return $input and preg_match("^[a-zA-Z0-9_-]{3,20}$^", $input);
		}
		
		function valid_password($input){
			return strlen($input) >= 4;
		}
		function valid_same_pass($pass,$re_pass){
			return $pass == $re_pass;
		}
		if ($_SERVER["REQUEST_METHOD"] == "POST"){
			$username = get_input($_POST['username']);
			$password = get_input($_POST['password']);
			$re_pass =  get_input($_POST['re_pass']);
			if (!valid_password($password)){
				$errors['password'] = 'Minimum 4 character password please';
			}
			if (!valid_same_pass($password,$re_pass)){
				$errors['re_pass'] = 'Password not the same';
			}
			if (!valid_username($username)){
				$errors['username'] = 'Invalid username. Char and Num ony plz.';
			}
			
			
			if (empty($errors)){
				if (add_new_admin($username,password_encrypt($password))){
					redirect_to('index.php');
				}
				

			}
			
		}

?>
<DOCTYPE! html>
<html>
	<head>
		<title>HISPLORE: Make an Account</title>
		<!-- css -->
		<link rel="stylesheet" type="text/css" href="css/stylesheet_main.css"/>
		
		<script type="text/javascript" src="js/jquery-3.1.1.min.js"></script>
		<script type="text/javascript" src="js/site.js"></script>
		
		<!-- font style -->
		<link href="https://fonts.googleapis.com/css?family=Special+Elite" rel="stylesheet">
		<link href="https://fonts.googleapis.com/css?family=Oswald" rel="stylesheet">
		<style>
			.error{
				color:red;
			}
		</style>
	</head>
	
	<body>
		<header>
		<h1>HISPLORE</h1>
		</header>
		
		<!-- info and option button -->
		<div class="help_buttons">
			<button type="button" id="info_button">Info</button> 
			<button type="button" id="options_button">Options</a></button> 
		</div>
		
		<!-- login form -->
		<form method="post">
			<h2>Create an Account</h2>
			<label>Username:</label>
				<input type="text" class="username" placeholder="Enter a username" name="username" value="<?php echo $username ?>" />
				<p class="error"><?php echo array_key_exists('username',$errors) ? $errors['username']:'' ?></p> 
			<label>Password:</label>
				<input type="password" class="password" placeholder="Enter a password" name="password" /> 
				<p class="error"><?php echo array_key_exists('password',$errors) ? $errors['password']:'' ?></p>
			<label><em>Confirm</em> Password:</label>
				<input type="password" class="password" placeholder="Confirm your password" name="re_pass" />
				<p class="error"><?php echo array_key_exists('re_pass',$errors) ? $errors['re_pass']:'' ?></p>
			<button type="submit" class="account_create">I'm Ready!</button> 
		</form>
		
		
		
		<!-- info div -->
	<div id="info_close"><span id="close_info">Close</span></div>
		<div id="info" class="info_content">
			<div class="info_header">
					
			<h2>About HISPLORE</h2>
			</div>
				<h3>What is HISPLORE? </h3>
				
				<h3>How do we use it?</h3>
				
				<p>Click on a pin either on the timeline or on the map and the document preview should come up. You can decide whether you want to read it or save it for later. Scroll down to the account section and you will be able to know how to delete these saved items!</p>

			<h2>Options </h2>
				
				<h3>Reading</h3>
				<p>Do you have difficulty with reading? We have also design HISPLORE to be friendly with those who suffer from reading impairments. Simply click on the options button and select the settings under text-to-speech settings and font size settings to suit your needs.</p>


			<h2>Account </h2>
				<h3>Login </h3>
				<p>You can also login to HISPLORE! Simply login if you already have an account or create an account by just choosing a username and password. When you login, you will be directed to the main page as shown in the picture on the side. </p>


				<h3>Saving Documents </h3>
				<p>You can search through trove’s documents by selecting one of the preset searches. When you find something you like, just click on its pin and a save option will be at the bottom. You can save this to your account and see it later whenever you want! </p>


				<h3>Deleting Documents </h3>
				<p>When you look at your account on the account page, you can see a list of all of your saved items. If you wish to delete any - simple click on the trash can on the right side of the document. </p>


				<h3>Logging Out </h3>
				<p>
				If you wish to log out at any time, simply press the “LOG OUT” button on the top right hand corner and you will be able to log out of your account. <strong>Remember:</strong> you wont be able to use the application if you are logged out.</p>

		</div>
		
		
		
		
		<!-- Options Div -->
		<div id="options_close"><span id="close_options">Close</span></div>
		<div id="options" class="options_content">
			<div class="options_header">
			
			<h2>Options</h2>
			</div>
			<div class="content">
			<p><em>Here you can change the settings of the website to suit you!</em></p>
			
			<h3>Self-Reader</h3>
			<p><em>Do you have difficulty in reading? If you click on the button "Read for me" the text-to-speech application will turn on!</em></p>
			<button type="button" id="text-to-speech">Read for me!</button>
			<button type="button" id="text-to-speech">Don't read for me.</button>
			
			<h3>Text Size</h3>
			<p><em>Hard to read? Here you can change the size of the text!</em></p>
			<p id="smaller">A</p><h4>A</h4><h2 id="bigger">A</h2>
			
			<!-- insert function by js to change css font size-->
			</div>
		</div>
		
		
		
		<!-- footer -->
		<footer>
			<div class="copyright">
				<p>Copyright (c) T-REX 2016</p>
			</div>
		</footer>
	</body>
</html>
