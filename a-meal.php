<?php
session_start();
require("connect-db.php");
// include("connect-db.php");

require("restaurant-db.php");
$list_of_restaurants = getAllRestaurants();
$mealid=$_GET['mealid'];
$current_meal=getOneMeal($mealid);
$restid=$current_meal[0]['restaurant_id'];
$current_restaurant=getOneRestaurant($restid);





if ($_SERVER['REQUEST_METHOD']=='POST')
{
  if (!empty($_POST['addReviewBtn']))
  {
    addReview($_POST['reviewrating'], $_POST['reviewtext'], $mealid, $restid, $_SESSION['id']);
    $reviews=getReviews($mealid);
  }
 
  if (!empty($_POST['deleteReviewBtn']))
  {
    deleteReview($_POST['reviewid_to_delete']);
    $reviews=getReviews($mealid);
  }
  
   if (!empty($_POST['confirmUpdateBtn']))
  {
    updateReview($_POST['reviewrating'], $_POST['reviewtext'],  $_POST['reviewid_to_update']);
    $reviews=getReviews($mealid);
  }
 
}

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

<?php 
$currentPage='restaurants'; 
$loggedIn = isset($_SESSION['username']) && $_SESSION['username'] != '';
include('navbar.php'); 
?>

<?php if (!isset($_SESSION['username']) || $_SESSION['username'] == '' || checkCus($_SESSION['id'])==false): ?>
<div class="container">
  <h2><?php echo $current_meal[0]['meal_name'] . " - " . $current_restaurant[0]['rest_name']; ?></h2>
  <h4><?php echo "$" . number_format($current_meal[0]['price'], 2, '.', ','); ?></h4>
    <h5><?php echo $current_meal[0]['description']; ?></h5>

  <?php else: ?>
    <div class="container">
  <h2><?php echo $current_meal[0]['meal_name'] . " - " . $current_restaurant[0]['rest_name']; ?></h2>
  <h4><?php echo "$" . number_format($current_meal[0]['price'], 2, '.', ','); ?></h4>
    <h5><?php echo $current_meal[0]['description']; ?></h5>

  <form name="mainForm" method="post">
    <div class="form-group">
      <label for="rating">Rating (1-5):</label>
      <input type="number" class="form-control" id="reviewrating" placeholder="Enter rating (1-5)" name="reviewrating" min="1" max="5" required
      value="<?php echo $_POST['reviewrating_to_update']; ?>">
    </div>
    <div class="form-group">
      <label for="">Review:</label>
      <input type="text" class="form-control" id="reviewtext" placeholder="Enter review" name="reviewtext" required
      value="<?php echo $_POST['reviewtext_to_update']; ?>">
    </div>
    <input type="hidden" name="reviewid_to_update" value="<?php echo $_POST['reviewid_to_update']; ?>"/>
    <input type="submit" name="addReviewBtn" class="btn btn-primary" value="Leave a review" />
    <input type="submit" value="Confirm update" name="confirmUpdateBtn" 
                class="btn btn-warning" title="Update a review" />
  </form>

  <?php endif; ?>
         
  <table class="table table-hover">
    <thead>
      <tr>
        <th>Name</th>
        <th>Rating</th>
        <th>Review</th>
      </tr>
    </thead>
    <tbody>
    <?php foreach ($reviews as $rev): ?>
  <tr>
     <td><?php echo $rev['name']; ?></td>
     <td><?php echo str_repeat("★", intval($rev['rating'])) . str_repeat("☆", 5 - intval($rev['rating'])); ?></td>
     <td><?php echo $rev['review_text']; ?></td>
     <?php if (!isset($_SESSION['username']) || $_SESSION['username'] == ''): ?>
     
      <?php elseif ($_SESSION['id']==$rev['user_id']): ?>
        <td>
      <form method="post">
     <input type="submit" value="Update" name="updateReviewBtn" class ="btn btn-warning" />
     <input type="hidden" name="reviewid_to_update" value="<?php echo $rev['review_id']; ?>"/>
     <input type="hidden" name="reviewrating_to_update" value="<?php echo $rev['rating']; ?>"/>
     <input type="hidden" name="reviewtext_to_update" value="<?php echo $rev['review_text']; ?>"/>
</form>
    </td> 
     <td>
     <form method="post">
      <input type="submit" value="Delete" name="deleteReviewBtn" class="btn btn-danger" />
      <input type="hidden" name="reviewid_to_delete" value="<?php echo $rev['review_id']; ?>"/>
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
