<?php include("includes/layouts/session.php"); ?>
<?php require_once("includes/db_connection.php") ?>
<?php require_once("includes/functions.php") ?>
<?php
  if (!$_SESSION['username']){
    redirect_to('index.php');
  }
  $username = $_SESSION['username'];
  $term = $_SESSION['term'];

  	global $conn;
	$query  = "insert into search(username,term) ";
	$query .= "values ('{$username}','{$term}')";
	mysqli_query($conn,$query);
?>


