<?php
require("connect-db.php");
// include("connect-db.php");

require("restaurant-db.php");
$list_of_restaurants = getAllRestaurants();






?>








<!DOCTYPE html>
<html lang="en">
<head>
  <title>Restaurants</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>

<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">WebSiteName</a>
    </div>
    <ul class="nav navbar-nav">
      <li class="active"><a href="https://www.cs.virginia.edu/~mec5fy/CS4750/homepage.php">Home</a></li>
      <li><a href="https://www.cs.virginia.edu/~mec5fy/CS4750/restaurants.php">Restaurants</a></li>
      <li><a href="#">Menus</a></li>
      <li><a href="#">Profile</a></li>
      <li><a href="#">Reviews</a></li>
    </ul>
    <ul class="nav navbar-nav navbar-right">
      <li><a href="https://www.cs.virginia.edu/~mec5fy/CS4750/signup.php"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
      <li><a href="#"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
    </ul>
  </div>
</nav>


<div class="container">
  <h2>Restaurants List</h2>
  <p>The restaurants in the database are listed below:</p>            
  <table class="table table-hover">
    <thead>
      <tr>
        <th>Name</th>
        <th>Location</th>
        <th>Category</th>
      </tr>
    </thead>
    <tbody>
    <?php foreach ($list_of_restaurants as $restaurant): ?>
  <tr>
     <td><a href="https://www.cs.virginia.edu/~mec5fy/CS4750/a-restaurant.php?restid=<?php echo $restaurant['restaurant_id']; ?>"><?php echo $restaurant['rest_name']; ?> </a></td>
     <td><?php echo $restaurant['location']; ?></td>
     <td><?php $rest_categories=getCategories($restaurant['restaurant_id']); foreach ($rest_categories as $category){ echo $category['category'] . ". ";} ?></td>

  </tr>
<?php endforeach; ?>
    </tbody>
  </table>
</div>

</body>
</html>

