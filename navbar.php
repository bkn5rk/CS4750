<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">WebSiteName</a>
    </div>
    <ul class="nav navbar-nav">
      <li <?php if ($currentPage === 'home') {echo 'class="active"';} ?>><a href="/CS4750/homepage.php">Home</a></li>
      <li <?php if ($currentPage === 'restaurants') {echo 'class="active"';} ?>><a href="/CS4750/restaurants.php">Restaurants</a></li>
      <li><a href="#">Menus</a></li>
      <li><a href="#">Profile</a></li>
      <li><a href="#">Reviews</a></li>
    </ul>
    <ul class="nav navbar-nav navbar-right">
      <li <?php if ($currentPage === 'signup') {echo 'class="active"';} ?>><a href="/CS4750/signup.php"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
      <li><a href="#"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
    </ul>
  </div>
</nav>