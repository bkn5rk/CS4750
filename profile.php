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
session_start();

if (!isset($_SESSION['username']) || $_SESSION['username'] == ''){
  include('navbar.php'); 
}
else{
  include('navbar_loggedin.php');}

  require("connect-db.php");
// include("connect-db.php");

require("restaurant-db.php");

$user_id = ($_SESSION['id']);
$user = getOneProfileWithID($user_id);
?>
<div class="container">

<?php echo $user[0]['name']; ?>
<?php echo $user[0]['email']; ?>
<?php echo $user[0]['passwords'];  ?>

</div>

<form action="/CS4750/update.php" method = "POST">
<input type="submit" value="Update" class="btn btn-secondary" />
</form>
</body>
</html> 