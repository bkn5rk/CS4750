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

<?php 
$currentPage='add_phone'; 
session_start();
$loggedIn = isset($_SESSION['username']) && $_SESSION['username'] != '';
include('navbar.php'); 

  require("connect-db.php");
// include("connect-db.php");

require("restaurant-db.php");
#var_dump($_SESSION);
$list_of_restaurants = getAllRestaurants();


?>
 
 <div class="container">
  <h2>Restaurants List</h2>
  <?php echo $_SESSION['username']; ?>
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
  <tr>
     <td><?php echo $restaurant['rest_name']; ?> </td>
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

</body>
</html>