<!DOCTYPE html>
<html lang="en">
<head>
  <title>Login</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>

<body>

<?php $currentPage='profile'; 
$loggedIn = isset($_SESSION['username']) && $_SESSION['username'] != '';
include('navbar.php'); 
?>
<?php
require("connect-db.php");
// include("connect-db.php");

require("restaurant-db.php");

$user = getOneProfile($_POST['name'], $_POST['email'], $_POST['pwd']);
session_start();
$_SESSION['loggedin'] = true; $_SESSION['id'] = $user[0]['user_id']; $_SESSION['username'] = $user[0]['email']; 

#echo "Welcome to the restaurant databases: ";
#echo $userid = $user[0]['name'];

#var_dump($_SESSION);
header("Location: homepage.php");
?>
</body>
</html> 