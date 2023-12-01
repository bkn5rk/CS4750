<?php
require("connect-db.php");
// include("connect-db.php");

require("restaurant-db.php");
$list_of_restaurants = getAllRestaurants();
$mealid=$_GET['mealid'];
$current_meal=getOneMeal($mealid);
$restid=$current_meal[0]['restaurant_id'];
$current_restaurant=getOneRestaurant($restid);
$reviews=getReviews($mealid);






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
  <h2><?php echo $current_meal[0]['meal_name'] . " - " . $current_restaurant[0]['rest_name']; ?></h2>
  <h4><?php echo "$" . $current_meal[0]['price']; ?></h4>
    <h5><?php echo $current_meal[0]['description']; ?></h5>
         
  <table class="table table-hover">
    <thead>
      <tr>
        <th>Rating</th>
        <th>Review</th>
      </tr>
    </thead>
    <tbody>
    <?php foreach ($reviews as $rev): ?>
  <tr>
     <td><?php echo $rev['rating']; ?></td>
     <td><?php echo $rev['review_text']; ?></td>                     
  </tr>
<?php endforeach; ?>
    </tbody>
  </table>
</div>

</body>
</html>
