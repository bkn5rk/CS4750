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
  
<?php $currentPage='updatep2'; 
session_start();

if (!isset($_SESSION['username']) || $_SESSION['username'] == ''){
  include('navbar.php'); 
}
else{
  include('navbar_loggedin.php');}
?>
<?php
require("connect-db.php");
// include("connect-db.php");

require("restaurant-db.php");


#var_dump($_POST);
$user_id = ($_SESSION['id']);

echo $_SESSION['id'];
echo $_POST['name'];
echo $_POST['email'];
echo $_POST['pwd'];

updateProfile($user_id, $_POST['name'], $_POST['email'], $_POST['pwd']);

$user = getOneProfileWithID($user_id);

echo $user[0]['name'];
echo $user[0]['email']; 
echo $user[0]['passwords'];  

header("Location: profile.php");
?>
</body>
</html> 