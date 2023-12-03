<?php
session_start();
require("connect-db.php");
// include("connect-db.php");

require("restaurant-db.php");
$list_of_restaurants = getAllRestaurants();
$restid=$_GET['restid'];
$current_restaurant=getOneRestaurant($restid);
$rest_categories=getCategories($restid);
$current_rest_owner=getRestaurantOwner($restid);


if ($_SERVER['REQUEST_METHOD']=='POST')
{
  if (!empty($_POST['addMealBtn']))
  {
    addMeal($_POST['newmealname'], $_POST['newmealprice'], $_POST['newmealdesc'], $restid);
    $restmeals=getRestMeals($restid);
  }

  if (!empty($_POST['deleteMealBtn']))
  {
    deleteMeal($_POST['mealid_to_delete']);
    $restmeals=getRestMeals($restid);
  }
}

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

<?php $currentPage='restaurants'; 
$loggedIn = isset($_SESSION['username']) && $_SESSION['username'] != '';
include('navbar.php'); 
?>



<div class="container">
  <h2><?php echo $current_restaurant[0]['rest_name']; ?></h2>
  <h4><?php echo $current_restaurant[0]['location']; ?></h4>
  <?php foreach ($rest_categories as $category): ?>
    <h5><?php echo $category['category']; ?></h5>
  <?php endforeach; ?> 
  
  <?php if (!isset($_SESSION['username']) || $_SESSION['username'] == ''): ?>

<?php elseif ($_SESSION['id']==$current_rest_owner[0]['user_id']): ?>
  <div class="container">
<form name="mainForm" method="post">
  <div class="form-group">
    <label for="">Meal Name:</label>
    <input type="text" class="form-control" id="newmealname" placeholder="Enter meal name" name="newmealname" required>
  </div>
  <div class="form-group">
    <label for="">Meal Price:</label>
    <input type="number" step="0.01" class="form-control" id="newmealprice" placeholder="Enter meal price" name="newmealprice" min="0.00" required>
  </div>
  <div class="form-group">
    <label for="">Meal Description:</label>
    <input type="text" class="form-control" id="newmealdesc" placeholder="Enter meal description" name="newmealdesc" required>
  </div>
  <input type="submit" name="addMealBtn" class="btn btn-primary" value="Add a meal" />
</form>

<?php endif; ?>


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
     <?php if (!isset($_SESSION['username']) || $_SESSION['username'] == ''): ?>
     
     <?php elseif ($_SESSION['id']==$current_rest_owner[0]['user_id']): ?>
    <td>
    <form method="post">
     <input type="submit" value="Delete" name="deleteMealBtn" class="btn btn-danger" />
     <input type="hidden" name="mealid_to_delete" value="<?php echo $meal['meal_id']; ?>"/>
</form>
   </td>   
   <?php endif; ?>                         
  </tr>
<?php endforeach; ?>
    </tbody>
  </table>
</div>

</body>
</html>
