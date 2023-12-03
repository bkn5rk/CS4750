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
  $currentPage='profile'; 
  session_start();
  $loggedIn = isset($_SESSION['username']) && $_SESSION['username'] != '';
  include('navbar.php'); 

    require("connect-db.php");
  // include("connect-db.php");

  require("restaurant-db.php");

  $user_id = ($_SESSION['id']);
  $user = getOneProfileWithID($user_id);
  $phone_list = findPhone($user_id);
  $user_type = findUserType($user_id);
  ?>

    <div class="container">

      <h1><?php echo $user[0]['name'] . "'s profile page"; ?></h1>
      <hr>

      <h3><?php echo ucfirst($user_type); ?> profile</h3>

      <h5><?php echo "Email: ". $user[0]['email']; ?></h5>

      <?php foreach ($phone_list as $phone): ?>
        <tr>
          <td><h5><?php echo "Phone number: ". $phone['phone_number']; ?></h5></td>
        </tr>
      <?php endforeach; ?>   
      
      <hr>

      <h3>Edit profile</h3>

      <div class="btn-toolbar" role="toolbar">
        <div class="btn-group" role="group">
          <form action="/CS4750/update.php" method = "POST">
            <input type="submit" value="Update profile" class="btn btn-info" />
          </form>
        </div>
        <div class="btn-group" role="group">
          <form action="/CS4750/update_phone.php" method = "POST">
            <input type="submit" value="Update phone" class="btn btn-info" />
          </form>
        </div>
        <div class="btn-group" role="group">
          <form action="/CS4750/add_phone.php" method = "POST">
            <input type="submit" value="Add new phone number" class="btn btn-info" />
          </form>
        </div>
        <?php if (ucfirst($user_type) == "Owner"):?>
          <div class="btn-group" role="group">
          <form action="/CS4750/add_restaurant.php" method = "POST">
            <input type="submit" value="Add Restaurant that you Own" class="btn btn-info" />
          </form>
        </div>
        <?php endif ?>
      </div>

    </div>
  </body>
</html> 