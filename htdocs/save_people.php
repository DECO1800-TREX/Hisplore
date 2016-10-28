<?php include("includes/layouts/session.php"); ?>
<?php require_once("includes/db_connection.php") ?>
<?php require_once("includes/functions.php") ?>
<?php
  if (!$_SESSION['username']){
    redirect_to('index.php');
  }
  global $conn;
  $username = $_SESSION['username'];
  $term = $_POST['term'];
  $term = mysqli_real_escape_string($conn,$_POST['term']);
  // if (!$term){
  //  echo 'ahuhu';
  // }
  // else{
  //  echo $term;
  // }

  $query  = "insert into search(username,term) ";
  $query .= "values ('{$username}','{$term}')";
  if (mysqli_query($conn,$query)){
    echo 'Success save';
  }
  else{
    echo 'You have already save this search!';
  }
?>


