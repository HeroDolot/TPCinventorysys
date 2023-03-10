<?php
include '../components/header.php';
include '../components/navbar-unlog.php';
include '../components/sidebar-unlog.php';
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
            <div class="row pl-5">
          </div><!-- /.col -->
          <div class="row">
            <ol class="breadcrumb float-sm-right p-3">
              <li class="breadcrumb-item"><a href="#">Services</a></li>
              <li class="breadcrumb-item active">TPC<span class="color-surplus">Surplus</span</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
        <div class="row">
        <h1 class="text-success col-md-12 text-center mb-5 text-xl">Services</h1>
      </div>
        <div class="d-flex justify-content-center align-items-center">
            <div class="row pl-1 d-flex">
            <span class="fa-stack fa-3x">
              <i class="fas fa-circle fa-stack-2x" style="color: #42ba96;"></i>
              <i class="fas fa-computer fa-stack-1x fa-inverse"></i>
            </span>
            </div>
            <div class="row">
            <span>
              <ol>
                <li><p class="text-sm">Computer Assemble</p></li>
                <li><p class="text-sm">Computer Repair</p></li> 
                <li><p class="text-sm">Computer Maintenance</p></li> 
              </ol>
            </span>
          </div>
          <div class="row pl-5 d-flex">
            <span class="fa-stack fa-3x">
              <i class="fas fa-circle fa-stack-2x" style="color: #42ba96;"></i>
              <i class="fa-solid fa-laptop-file fa-stack-1x fa-inverse"></i>
            </span>
            </div>
            <div class="row">
            <span>
              <ol>
                <li><p class="text-sm">File Recovery</p></li>
                <li><p class="text-sm">Reformat</p></li> 
                <li><p class="text-sm">Applications</p></li> 
              </ol>
            </span>
          </div>
        </div>
        <br>
        <br>
        <div class="d-flex">
            <div class="row pl-5 d-flex">
            <span class="fa-stack fa-3x">
              <i class="fas fa-circle fa-stack-2x" style="color: #42ba96;"></i>
              <i class="fa-solid fa-video fa-stack-1x fa-inverse"></i>
            </span>
            </div>
            <div class="row">
            <span>
              <ol>
                <li><p class="text-sm">CCTV Installation</p></li>
                <li><p class="text-sm">CCTV Maintenance</p></li> 
                <!-- <li><p class="text-sm">Computer Maintenance</p></li>  -->
              </ol>
            </span>
          </div>
          <div class="row pl-5 d-flex">
            <span class="fa-stack fa-3x">
              <i class="fas fa-circle fa-stack-2x" style="color: #42ba96;"></i>
              <i class="fa-solid fa-mobile-screen-button fa-stack-1x fa-inverse"></i>
            </span>
            </div>
            <div class="row">
            <span>
              <ol>
                <li><p class="text-sm">Phone Repair</p></li>
                <li><p class="text-sm">Recovery</p></li> 
                <li><p class="text-sm">Unlocking</p></li> 
              </ol>
            </span>
          </div>
        </div>


      </div><!-- /.container-fluid -->
    </div>
 </div>

<?php
include '../components/footer.php';
?>