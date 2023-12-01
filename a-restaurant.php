<?php
require("connect-db.php");
// include("connect-db.php");

require("restaurant-db.php");
$list_of_restaurants = getAllRestaurants();
$restid=$_GET['restid'];
$current_restaurant=getOneRestaurant($restid);
$rest_categories=getCategories($restid);
$rest_meals=getRestMeals($restid);





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

<?php $currentPage='restaurants'; include('navbar.php'); ?>

<div class="container">
  <h2><?php echo $current_restaurant[0]['rest_name']; ?></h2>
  <h4><?php echo $current_restaurant[0]['location']; ?></h4>
  <?php foreach ($rest_categories as $category): ?>
    <h5><?php echo $category['category']; ?></h5>
  <?php endforeach; ?>            
  <table class="table table-hover">
    <thead>
      <tr>
        <th>Name</th>
        <th>Price</th>
        <th>Description</th>
      </tr>
    </thead>
    <tbody>
    <?php foreach ($rest_meals as $meal): ?>
  <tr>
     <td><a href="/CS4750/a-meal.php?mealid=<?php echo $meal['meal_id']; ?>"><?php echo $meal['meal_name']; ?></a></td>
     <td><?php echo "$" . number_format($meal['price'], 2, '.', ','); ?></td>
     <td><?php echo $meal['description']; ?></td>                     
  </tr>
<?php endforeach; ?>
    </tbody>
  </table>
</div>

</body>
</html>
