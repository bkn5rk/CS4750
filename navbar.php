<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">Meal Review</a>
    </div>
    <ul class="nav navbar-nav">
      <li <?php if ($currentPage === 'home') {echo 'class="active"';} ?>><a href="/CS4750/homepage.php">Home</a></li>
      <li <?php if ($currentPage === 'restaurants') {echo 'class="active"';} ?>><a href="/CS4750/restaurants.php">Restaurants</a></li>
      <li <?php if ($currentPage === 'profile') {echo 'class="active"';} ?>>
        <a href=<?php if ($loggedIn) echo '"/CS4750/profile.php"'; else echo '"/CS4750/login.php"';?>>Profile</a>
      </li>
    </ul>
    <ul class="nav navbar-nav navbar-right">
      <?php if ($loggedIn) { ?>
        <li><a href="/CS4750/logout.php"><span class="glyphicon glyphicon-log-in"></span> Logout</a></li>
      <?php } else { ?>
      <li <?php if ($currentPage === 'signup') {echo 'class="active"';} ?>><a href="/CS4750/signup.php"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
      <li <?php if ($currentPage === 'login') {echo 'class="active"';} ?>><a href="/CS4750/login.php"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
      <?php } ?>
    </ul>
  </div>
</nav>