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
$phone_list = findPhone($user_id);
?>
<div class="container">

<?php echo "Name: ". $user[0]['name']; ?>
<br>

<?php echo "Email: ". $user[0]['email']; ?>
<br>

<button onclick="myFunction()">Show</button>

<div id="password", style = "display: none">
  <?php echo "Password: ". $user[0]['passwords'];  ?>
</div>
<script>
  function myFunction() {
  var x = document.getElementById("password");
  if (x.style.display === "none") {
    x.style.display = "block";
  } else {
    x.style.display = "none";
  }
}
</script>
<br>
<?php foreach ($phone_list as $phone): ?>
 <tr>
 <td><?php echo "phone number: ". $phone['phone_number']; ?></td>
 <br>
</tr>
<?php endforeach; ?>   


</div>

<form action="/CS4750/update.php" method = "POST">
<input type="submit" value="Update Profile" class="btn btn-secondary" />
</form>
<form action="/CS4750/update_phone.php" method = "POST">
<input type="submit" value="Update Phone" class="btn btn-secondary" />
</form>
<form action="/CS4750/add_phone.php" method = "POST">
<input type="submit" value="add new Phone number" class="btn btn-secondary" />
</form>
</body>
</html> 