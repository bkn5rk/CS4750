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
$currentPage='singupp2'; 
session_start();
$loggedIn = isset($_SESSION['username']) && $_SESSION['username'] != '';
include('navbar.php'); 
?>
<?php
require("connect-db.php");
// include("connect-db.php");

require("restaurant-db.php");

$user_id = findUserNum();
$num = $user_id[0]['num'] + 1;
addUser($num, $_POST['name'], $_POST['email'], $_POST['pwd']);

$user = getOneProfile($_POST['name'], $_POST['email'], $_POST['pwd']);

#var_dump($user);
#echo $_POST['type'];

addUserType($user[0]['user_id'], $_POST['type']);
addPhoneNumber($user[0]['user_id'], $_POST['phone_number']);

$_SESSION['loggedin'] = true; $_SESSION['id'] = $user[0]['user_id']; $_SESSION['username'] = $user[0]['email']; 

header("Location: profile.php");
?>
</body>
</html> 