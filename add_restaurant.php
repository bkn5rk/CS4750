<?php
session_start();
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

<?php 
$currentPage = 'add_restaurants'; 
$loggedIn = isset($_SESSION['username']) && $_SESSION['username'] != '';
include('navbar.php'); 
?>

<div class="container">
  <h2>Restaurants List</h2>
  <p>Type a name in the input field to search for a specific restaurant:</p>
  <input class="form-control" id="myInput" type="text" placeholder="Search..">
  <br>
  <div id="myDIV">
  <p>The restaurants in the database are listed below:</p>            
  <table class="table table-hover">
    <thead>
      <tr>
        <th>Name</th>
        <th>Location</th>
        <th>Category</th>
        <th>You Own </th>
      </tr>
    </thead>
    <tbody>
    <form action="/CS4750/add_restaurantp2.php" method = "POST"> 

    <?php foreach ($list_of_restaurants as $restaurant): ?>
    <tr id="<?php echo $restaurant['rest_name']?>">
     <td><a href="/CS4750/a-restaurant.php?restid=<?php echo $restaurant['restaurant_id']; ?>"><?php echo $restaurant['rest_name']; ?> </a></td>
     <td><?php echo $restaurant['location']; ?></td>
     <td><?php 
            $rest_categories=getCategories($restaurant['restaurant_id']); 
            $categories = [];
            foreach($rest_categories as $category) {
              $categories[] = $category['category'];
            }
            echo join(', ', $categories); 
          ?></td>
    <td> <input type="checkbox" id= 'Own' name= 'Own[]' value=<?php echo $restaurant['restaurant_id'] ?>>

    </tr>
<?php endforeach; ?>
    </tbody>
  </table>
  <input type="submit" value="Add Restaurant that you Own" class="btn btn-info" />            
    </form>
</div>
</div>

<script>
$(document).ready(function(){
  $("#myInput").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#myDIV *").filter(function() {
      if ($(this).is("tr") && $(this).is("[id]")) {
        $(this).toggle($(this).attr("id").toLowerCase().indexOf(value) > -1);
      }
    });
  });
});
</script>

</body>
</html>

