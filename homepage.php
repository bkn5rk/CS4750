<!DOCTYPE html>
<html lang="en">
<head>
  <title>Home Page</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>
<?php
  session_start();
#var_dump($_SESSION);
?>

<?php $currentPage='home'; 
$loggedIn = isset($_SESSION['username']) && $_SESSION['username'] != '';
include('navbar.php'); 
  ?>

<div class="container">
  <h2>Welcome to our restaurant database!</h2>

  <div id="myCarousel" class="carousel slide" data-ride="carousel">
    <!-- Indicators -->
    <ol class="carousel-indicators">
      <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
      <li data-target="#myCarousel" data-slide-to="1"></li>
      <li data-target="#myCarousel" data-slide-to="2"></li>
    </ol>

    <!-- Wrapper for slides -->
    <div class="carousel-inner">

      <div class="item active">
        <img src="https://youaligned.com/wp-content/uploads/2022/05/7-healthy-food-blogs-feature.jpg" alt="Food restaurant name" style="width:100%;">
        <div class="carousel-caption">
          <h3>food</h3>
          <p>recommend this restaurant</p>
        </div>
      </div>

      <div class="item">
        <img src="https://cdn.outsideonline.com/wp-content/uploads/2022/01/GettyImages-1318912156.jpg" alt="something" style="width:100%;">
        <div class="carousel-caption">
        </div>
      </div>
    
      <div class="item">
        <img src="https://images.squarespace-cdn.com/content/v1/62990964f4b3114da7e5aafe/c7e13597-a527-43ab-8d2d-0932cfc0d612/RCC_PAMSummer23-87.jpg" alt="New York" style="width:100%;">
        <div class="carousel-caption">
        </div>
      </div>
  
    </div>

    <!-- Left and right controls -->
    <a class="left carousel-control" href="#myCarousel" data-slide="prev">
      <span class="glyphicon glyphicon-chevron-left"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#myCarousel" data-slide="next">
      <span class="glyphicon glyphicon-chevron-right"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>
</div>
  
<div class="container">
<div class="jumbotron">
  <h1>Home Page</h1>
  <p>This is a restaurant database.</p> 
  <blockquote>
	<p>(Insert slogan here)</p>  
  </blockquote>         
</div>
</div>

<div class="container">
  <h2>Restaurant Gallery</h2>
  <p>Click on the images to enlarge them.</p>
  <div class="row">
    <div class="col-md-4">
      <div class="thumbnail">
        <a href="https://scx2.b-cdn.net/gfx/news/2020/healthyfood.jpg" target="_blank">
          <img src="https://scx2.b-cdn.net/gfx/news/2020/healthyfood.jpg" alt="Lights" style="width:100%">
          <div class="caption">
            <p>something restaurant</p>
          </div>
        </a>
      </div>
    </div>
    <div class="col-md-4">
      <div class="thumbnail">
        <a href="https://dining.uga.edu/_resources/images/news/plating_1.jpg" target="_blank">
          <img src="https://dining.uga.edu/_resources/images/news/plating_1.jpg" alt="Nature" style="width:100%">
          <div class="caption">
            <p>restaurant name</p>
          </div>
        </a>
      </div>
    </div>
    <div class="col-md-4">
      <div class="thumbnail">
        <a href="https://assets.technologynetworks.com/production/dynamic/images/content/342559/why-do-consumers-perceive-pretty-food-as-being-healthier-342559-960x540.jpg?cb=10970504" target="_blank">
          <img src="https://assets.technologynetworks.com/production/dynamic/images/content/342559/why-do-consumers-perceive-pretty-food-as-being-healthier-342559-960x540.jpg?cb=10970504" alt="Fjords" style="width:100%">
          <div class="caption">
            <p>other restaurant</p>
          </div>
        </a>
      </div>
    </div>
  </div>
</div>

</body>
</html>