<?php include("includes/layouts/session.php"); ?>
<?php require_once("includes/db_connection.php"); ?>
<?php require_once("includes/functions.php"); ?>
<?php 
	$username = '';
	$password = '';
	
	$errors = array();
	
	if ($_SERVER["REQUEST_METHOD"] == "POST"){
		$username = get_input($_POST['username']);
		$password = get_input($_POST['password']);
		
		$admin = attempt_login($username,$password);
		if ($admin){
			$_SESSION['username'] = $admin['username'];
			redirect_to('map.php');
		}
		else{
			$errors['login'] ="Username or password not correct";
		}
		
	}

?>
<DOCTYPE! html>
<html>
	<head>
		<title>HISPLORE: An Educational Tool</title>
		<!-- css -->
		<link rel="stylesheet" type="text/css" href="css/stylesheet_main.css"/>
		
		
		<script type="text/javascript" src="js/jquery-3.1.1.min.js"></script>
		<script type="text/javascript" src="js/site.js"></script>
			
		
		<!-- Font Style -->
		<link href="https://fonts.googleapis.com/css?family=Special+Elite" rel="stylesheet">
		<link href="https://fonts.googleapis.com/css?family=Oswald" rel="stylesheet">
		<style>
			.error{
				color:red;
			}
		</style>
	</head>
	
	<body>
		<div id="modal_background"></div>
		<h1>HISPLORE</h1>
		
		
		<!-- info and option button -->
		<div class="help_buttons">
			<button id="info_button">Info</button> 
			<button id="options_button">Options</button> 
		</div>
		
		<!-- login form -->
		<form method="post">
			<h2>Account Login</h2>
			<p class="error"><?php echo array_key_exists('login',$errors) ? $errors['login']:'' ?></p>
			<label>Username:</label>
				<input type="text" class="username" placeholder="Enter your username" name="username" value="<?php echo $username ?>" /> 

			<label>Password:</label>
				<input type="password" class="password" placeholder="Enter your password" name="password" /> 
			<button type="submit" class="login_button">Login</button> 
			<button type="button" class="create_account_button"><a href="signup.php">I don't have an account</a></button> 
		</form>
		
		
		
	   	<!--- info divs--->
		
		<div id="info" class="info_content">
			<div class="info_header">
				
			<h2>About HISPLORE</h2>
			</div>
				<h3>What is HISPLORE? </h3>
				<p>HISPLORE is an interactive timemap where our users can look through documents from trove (www.trove.nla.au). We know what you study a lot of Australian history at school so we designed an application that will allow you to search through the trove database for historical people in Australia. When the markers on the map are loaded, you will be able to view the birth date and place, occupation and articles on Australian historical people. Jump into Australian history with HISPLORE and learn something new about your country! </p>

				<h3>How do we use it?</h3>
				<p> By clicking on any region on the map whether it be Queensland, New South Wales or the Northern Territory, and then choosing a specific date on the timeline, you will be able to view the countless of documents on the map. Now you can click on a pin on the map and the document preview should come up. You can decide whether you want to read the documents of this person from Trove or save it for later.</p> <p>If you want to see or delete your saved searches simply click on the account tab and scroll down to view. On the right hand side of the saved documents there should be a delete button where you can easily remove the saved items you no longer want.</p>

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
				
			<h2>About Us</h2>
				<p>We are T-REX INC.,  a 5 person group who formed on the first day of contact sessions. We shared our vision together to create a timeline and geo-location scheme to visualise the data from Trove. </p>
				<p>We all had our fair share of work, where Thuan, Park and Jonas handled most of the coding for the mapping of data. Gabrielle did most of the html and css designing of the pages and Breanna has helped a lot with the assistance in all areas including large amounts of research. </p>
					
				<p>If you wish to submit some feedback or any enquiries, please email Gabrielle Burey on <strong>gabrielle.burey@uq.net.au</strong>.</p>
					
				
				<p>Members: Jonas Wong, Park Sang Ik, Thaun Duc Chu, Gabrielle Burey and Breanna Larkin</p>
				
				<p>Copyright &copy; 2016 TREX-INC.</p>

		</div>
		
		
		
		
		<!-- Options Div -->
		
		<div id="options" class="options_content">
			<div class="options_header">
			<h2>Options</h2>
			</div>
			<div class="content">
			<p>Here you can change the settings of the website's text size to suit you!</p>
			
			<h3>Text Size</h3>
			<p>Hard to read? Here you can change the size of the text!</p>
			<table id="tsize_table">
				<tr>
				<td><span id="small"><p>A</p></span></td>
				<td><span id="medium"><h4>A</h4></span></td>
				<td><span id="large"><h2>A</h2></span></td>
				</tr>
			</table>
			
			<!-- insert function by js to change css font size -->
			</div>
		</div>
		
		
	</body>
</html>