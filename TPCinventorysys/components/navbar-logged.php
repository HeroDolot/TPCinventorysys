<!-- Navbar -->
<?php
    include '../connection.php';
?>
<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="../pages/landingpage.php" class="nav-link">Home</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="../controller/authentication/logout.php" class="nav-link">Log Out</a>
      </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <li class="nav-item">
        <a class="nav-link text-blue" href="../pages/cart.php">
          <i class="fa-solid fa-cart-shopping"></i>
        </a>
      </li>
    </ul>
      <!-- Messages Dropdown Menu -->
  </nav>
  <!-- /.navbar -->