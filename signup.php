<!DOCTYPE html>
<html lang="en">
<head>
  <title>Create a Profile</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>

<?php $currentPage='signup'; include('navbar.php'); ?>

<div class="container">
  <h2>Signup Form</h2>
  <form action="/CS4750/signupp2.php" method = "POST">
    <div class="form-group">
      <label for="name">Name:</label>
      <input type="name" class="form-control" id="name" placeholder="Enter name" name="name">
    </div>
    <div class="form-group">
      <label for="email">Email:</label>
      <input type="email" class="form-control" id="email" placeholder="Enter email" name="email">
    </div>
    <div class="form-group">
      <label for="pwd">Password:</label>
      <input type="password" class="form-control" id="pwd" placeholder="Enter password" name="pwd">
    </div>
    <div class="form-group">
      <label for="phone_number">Phone Number:</label>
      <input type="phone_number" class="form-control" id="phone_number" placeholder="Enter phone_number" name="phone_number">
    </div>
    <div class="form-group">
    <label for="User Type">Choose a User Type:</label>
      <select id="type" name="type">
      <option value="Customer">Customer</option>
      <option value="Owner">Owner</option>
      </select>
      </div>
    <button type="submit" class="btn btn-default">Submit</button>
  </form>
</div>

</body>
</html>
