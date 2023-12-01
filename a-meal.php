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
 
  if (!empty($_POST['deleteReviewBtn']))
  {
    deleteReview($_POST['reviewid_to_delete']);
    $reviews=getReviews($mealid);
  }
 
}




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
  <h2><?php echo $current_meal[0]['meal_name'] . " - " . $current_restaurant[0]['rest_name']; ?></h2>
  <h4><?php echo "$" . number_format($current_meal[0]['price'], 2, '.', ','); ?></h4>
    <h5><?php echo $current_meal[0]['description']; ?></h5>

  <form name="mainForm" method="post">
    <div class="form-group">
      <label for="rating">Rating (1-5):</label>
      <input type="number" class="form-control" id="reviewrating" placeholder="Enter rating (1-5)" name="reviewrating" min="1" max="5" required>
    </div>
    <div class="form-group">
      <label for="">Review:</label>
      <input type="text" class="form-control" id="reviewtext" placeholder="Enter review" name="reviewtext" required>
    </div>
    <button type="submit" class="btn btn-primary">Leave a review</button>
  </form>
         
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
     <td>
     <form method="post">
      <input type="submit" value="Delete" name="deleteReviewBtn" class ="btn btn-danger" />
      <input type="hidden" name="reviewid_to_delete" value="<?php echo $rev['review_id']; ?>"/>
</form>
    </td>                     
  </tr>
<?php endforeach; ?>
    </tbody>
  </table>
</div>

</body>
</html>
