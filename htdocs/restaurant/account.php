<?php include("includes/layouts/session.php"); ?>
<?php require_once("includes/db_connection.php") ?>
<?php require_once("includes/functions.php") ?>
<?php
	if (!$_SESSION['username']){
		redirect_to('index.php');
	}
	$username = $_SESSION['username'];
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<!-- Required documents and css styling -->
		<title>HISPLORE: My Account</title>
	
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
		<link rel="stylesheet" href="css/account_style.css" />
		
		
		<script type="text/javascript" src="js/jquery-3.1.1.min.js"></script>
		<script type="text/javascript" src="js/site.js"></script>
		
		<!-- Font style -->
		<link href="https://fonts.googleapis.com/css?family=Special+Elite" rel="stylesheet">
		<link href="https://fonts.googleapis.com/css?family=Oswald" rel="stylesheet">
	</head>
	
	<body>
		<!-- Navbar -->
		<header>
			<nav>
				<ul class="ul-left">
					<li><a href="map.php"><span class="glyphicon glyphicon-globe"></span></span> Map</a></li>
					<li><a href="" id="info_button"><span class="glyphicon glyphicon-info-sign"></span> Info</a></li>
					<li><a href="" id="options_button"><span class="glyphicon glyphicon-cog"></span> Options</a></li>
				</ul>
				<ul class="ul-right">
					<li><a href="logout.php"><span class="glyphicon glyphicon-off"></span> Logout</a></li>
				</ul>
			</nav>
		</header>
		
		<div id="account_body">
			<h2>Welcome: <?php echo $_SESSION['username'];  ?></h2>
			<h2> My Account!</h2>
			<div id="account_photo">
			<img src="images/account_photo.png" alt="account photo"></div>
			<br><br><br><br><br> <!-- puts the saved searches underneath image -->
			<h3>My Saved Searches:</h3>
			<ul>
				<?php  
					if (!$searches = get_saved_search_by_user($username)){
						echo 'Wrong Query';
					}
					while ($search = mysqli_fetch_assoc($searches)){
						display_search($search);
					}

				?>
			</ul>
			<tr>
				<td class="saved_search">Saved Search</td>
				<td><button type="button" class="bin_button"><span class="glyphicon glyphicon-trash"></span></button></td>
				
			<tr>
		</div>
		<!-- info div -->
		<div id="info" class="info_content">
			<div class="info_header">
			<button id="close_info">Close</button>		
			<h2>About HISPLORE</h2>
			</div>
				<h3>What is HISPLORE? </h3>
				<p>HISPLORE is an interactive timemap where our users can look through documents from trove (www.trove.nla.au). We know what you study at school so we designed preset searches based on what you need for your studies including Australian Novels and Australian Politics. </p>

				<h3>How do we use it?</h3>
				<p> Hisplore is to be used for your studies. Simply click on one of the preset buttons on the right hand side of the map and you will be able to see a countless amount of search items based on that topic. </p>

				<p>Click on a pin either on the timeline or on the map and the document preview should come up. You can decide whether you want to read it or save it for later. Scroll down to the account section and you will be able to know how to delete these saved items!</p>

			<h2>Options </h2>
				<h3>Colour</h3>
				<p>Do you have difficulty with colour? We have designed HISPLORE to be friendly to those suffering from colorblindness or any other vision-impairments. Simply click on the options button and select the right colour settings to suit your needs. </p>

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
		<div id="options" class="options_content">
			<div class="options_header">
			<button id="close_options">Close</button>
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
		
		
		
		<!---FOOTER--->
		<footer>
			<div class="copyright">
				<p>Copyright (c) T-REX 2016</p>
			</div>
		</footer>
		
	</body>
</html>