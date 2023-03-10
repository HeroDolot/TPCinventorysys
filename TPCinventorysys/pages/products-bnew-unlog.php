<?php
include '../components/header.php';
include '../components/navbar-unlog.php';
include '../components/sidebar-unlog.php';

include '../connection.php';
$sql = "SELECT * FROM carousel WHERE foldername ='BrandNew'";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);

?>

<style> 
a.thumbnail {
    width: 210px;
    height: 200px;
    display: flex;
}
</style>

 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-danger">Brand New</h1>
            <div class="row pl-5">
              <div class="col-xs-6 col-md-3 p-2  d-flex">
                <a href="#" class="thumbnail">
                  <img src="../assets/images/user1.png" id="img-1" alt="...">
                </a>
                <div>
                  <a href="#" class="thumbnail">
                    <img src="../assets/images/user1.png" id="img-2" alt="...">
                  </a>
                </div>
              </div>
            </div>
            <div class="row pl-5">
              <div class="col-xs-6 col-md-3 p-2 d-flex">
                <a href="#" class="thumbnail">
                  <img src="../assets/images/user1.png" id="img-3" alt="...">
                </a>
                <div>
                  <a href="#" class="thumbnail">
                    <img src="../assets/images/user1.png" id="img-4" alt="...">
                  </a>
                </div>
              </div>
            </div>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right p-3">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">TPC<span class="color-surplus">Surplus</span</li>
            </ol>
            <div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
  <ol class="carousel-indicators">
    <?php
    $i = 0;
    while($row = mysqli_fetch_assoc($result)){
    ?>
    <li data-target="#carouselExampleCaptions" data-slide-to="<?php echo $i; ?>" <?php echo $i == 0 ? 'class="active"' : ''; ?>></li>
    <?php
    $i++;
    }
    ?>
  </ol>
  <div class="carousel-inner">
    <?php
    $i = 0;
    mysqli_data_seek($result, 0); // rewind the result set cursor to start
    while($row = mysqli_fetch_assoc($result)){
    ?>
    <div class="carousel-item <?php echo $i == 0 ? 'active' : ''; ?>">
      <img src="<?='../assets/images/BrandNew'."/".$row['names'];?>" class="d-block w-100" alt="...">
      <div class="carousel-caption d-none d-md-block">
        <?php
        echo "<h5 class='text-white'>".$row['label'] . " " . "</h5>";
        echo "<p class='text-white'>".$row['descriptions'] . " " . "</p>";
        ?>
      </div>
    </div>
    <?php
    $i++;
    }
    ?>
  </div>
  <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
 </div>

<?php
include '../components/footer.php';
?>