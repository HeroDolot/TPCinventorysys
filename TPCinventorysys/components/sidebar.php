<?php
include '../connection.php';
$id = $_SESSION['user_id'];
// echo '<h1>'.$id. '</h1>';
$username = "";
$sql = "SELECT * FROM users WHERE id = '$id'";
$results = mysqli_query($conn, $sql);
while ($row = mysqli_fetch_assoc($results)) {
  $username = $row['uname'];
}
?>
<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <!-- Brand Logo -->
  <a href="../pages/dashboard.php" class="brand-link">
    <img src="../assets/images/tpclogo.jpg" alt="TPC Logo" class="brand-image img-circle elevation-3" style="opacity: 0.8" />
    <span class="brand-text font-weight-light">TPC<span class="color-surplus">surplus</span></span>
  </a>

  <div class="sidebar">
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      <div class="image">
        <img src="../assets/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image" />
      </div>
      <div class="info">
        <!-- <p class="text-white font-weight-bold">Welcome</p> -->
        <a href="../pages/dashboard.php" class="d-block font-weight-bold" style="text-transform: uppercase;">WELCOME | <?php echo $username; ?></a>
      </div>
    </div>

    <!-- Search bar -->
    <div class="form-inline">
      <div class="input-group" data-widget="sidebar-search">
        <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
        <div class="input-group-append">
          <button class="btn btn-sidebar">
            <i class="fas fa-search fa-fw"></i>
          </button>
        </div>
      </div>
    </div>

    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class
             with font-awesome or any other icon font library -->
        <li class="nav-item menu-open">
          <a href="#" class="nav-link bg-success">
            <i class="nav-icon fas fa-info"></i>
            <p>Information<i class="right fas fa-angle-left"></i></p>
          </a>
          <ul class="nav nav-treeview">
          <li class="nav-item">
              <a href="../pages/orders.php" class="nav-link">
                <i class="far fa fas fas fa-cash-register nav-icon" aria-hidden="true"></i>
                <p>Orders</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="../pages/customer.php" class="nav-link">
                <i class="far fa fa-users nav-icon" aria-hidden="true"></i>
                <p>Customers</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="../pages/supplier.php" class="nav-link">
                <i class="far fa fa-solid fa-boxes-packing nav-icon"></i>
                <p>Suppliers</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="../pages/inventory.php" class="nav-link">
                <i class="far fa fa-boxes-stacked nav-icon"></i>
                <p>Inventory</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="../pages/stocks.php" class="nav-link">
                <i class="far fa fa-boxes-stacked nav-icon"></i>
                <p>Stocks</p>
              </a>
            </li>
          </ul>
        </li>
        <!-- New dropdown -->
        <li class="nav-item ">
          <a href="#" class="nav-link bg-primary">
            <i class="nav-icon fas fa-shopping-cart"></i>
            <p>
              Purchasing
              <i class="fas fa-angle-left right"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
                <a href="../pages/procurement.php" class="nav-link">
                  <i class="far fa fa-file nav-icon"></i>
                  <p>Procurement</p>
                </a>
              </li>
            <li class="nav-item">
              <a href="receiving.php" class="nav-link">
                <i class="far fa fa-file nav-icon"></i>
                <p>Receiving</p>
              </a>
            </li>
          </ul>
        </li>
        <li class="nav-item ">
          <a href="#" class="nav-link bg-info">
            <i class="nav-icon fas fa-photo-video"></i>
            <p>
              Files
              <i class="fas fa-angle-left right"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
          <li class="nav-item">
              <a href="../pages/fileupload-items.php" class="nav-link">
                <i class="far fa fas fa-file-upload nav-icon"></i>
                <p>File Upload Items</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="../pages/fileupload.php" class="nav-link">
                <i class="far fa fas fa-file-upload nav-icon"></i>
                <p>Carousel File Upload</p>
              </a>
            </li>
          </ul>
        </li>

      </ul>
    </nav>
  </div>
</aside>