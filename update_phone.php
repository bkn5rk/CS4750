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

<?php $currentPage='update'; 
session_start();
$loggedIn = isset($_SESSION['username']) && $_SESSION['username'] != '';
include('navbar.php'); 

  require("connect-db.php");
// include("connect-db.php");

require("restaurant-db.php");
#var_dump($_SESSION);

$phone_list = findPhone($_SESSION['id']);


?>
<div class="container">
  <h2>Update Phone Form</h2>
  <h5> Your Phone Numbers: </h5>
    <?php foreach ($phone_list as $phone): ?>
    <tr>
    <td><h5><?php echo $phone['phone_number']; ?></h5></td>
    </tr>
    <?php endforeach; ?> 
  <form action="/CS4750/update_phonep2.php" method = "POST">
    <div class="form-group">
      <label for="name">Old Phone Number:</label>
      <input type="phone_number_old" class="form-control" id="phone_number_old" placeholder="Enter phone_number" name="phone_number_old">
    </div>
    <div class="form-group">
      <label for="phone_number">New Phone Number:</label>
      <input type="phone_number" class="form-control" id="phone_number" placeholder="Enter phone_number" name="phone_number">
    </div>
    <button type="submit" class="btn btn-default">Submit</button>
  </form>
</div>

</body>
</html>