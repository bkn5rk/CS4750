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



if ($_SERVER['REQUEST_METHOD']=='POST')
{
  if (!empty($_POST['addReviewBtn']))
  {
    addReview($_POST['reviewrating'], $_POST['reviewtext'], $mealid, $restid, 41);
  }
 
}





?>

<!DOCTYPE html>
<html>
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
  <h1>Add A Review - <?php echo $current_meal[0]['meal_name']; ?></h1> 

  <!-- <a href="simpleform.php">Click to open the next page</a> -->
 
  <form name="mainForm" method="post">   
      <div class="row mb-3 mx-3">
        Rating (1-5):
        <input type="number" class="form-control" name="reviewrating" required 
        />        
      </div>  
      <div class="row mb-3 mx-3">
        Review:
        <input type="text" class="form-control" name="reviewtext" required 
        />        
      </div>  
      <div class="row mb-3 mx-3">
        <input type="submit" value="Add review" name="addReviewBtn" 
                class="btn" style="background-color:#33C5FF; border-color:black; height:50px;width:150px; margin-top:5px;" title="Insert a review" />
      </div>  
    </form> 
    
     
  
</div>    
</body>
</html>