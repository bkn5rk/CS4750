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
  
<?php 
$currentPage='add_restaurantp2'; 
session_start();
$loggedIn = isset($_SESSION['username']) && $_SESSION['username'] != '';
include('navbar.php'); 
?>
<?php
require("connect-db.php");
// include("connect-db.php");

require("restaurant-db.php");

$user_id = ($_SESSION['id']);
var_dump($_POST);
echo ($_POST["Own"]);
addRestaurants($user_id, $_POST["Own"]);

#header("Location: profile.php");
?>
</body>
</html> 