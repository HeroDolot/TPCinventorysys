<?php
session_start();
include '../connection.php';
include '../components/header.php';
include '../components/navbar.php';
include '../components/sidebar.php';

$count = 0;
$total_records_per_page = 5;
$offset = 0;
$limit = $total_records_per_page;
$total_records = 0;
$total_pages = 0;
$ptype_filter = "";

if (isset($_GET['page_no']) && $_GET['page_no'] !== "") {
  $page_no = $_GET['page_no'];
}else {
  $page_no = 1;
}

$offset = ($page_no - 1) * $total_records_per_page;

$sql = "SELECT COUNT(*) as total FROM users";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
$total_records = $row['total'];
$total_pages = ceil($total_records / $total_records_per_page);

if (isset($_GET['ptype']) && $_GET['ptype'] !== "") {
  $ptype_filter = $_GET['ptype'];
  if ($ptype_filter === "Brand New" || $ptype_filter === "Surplus") {
    $sql = "SELECT lists.*, brands.brand_name FROM lists JOIN brands ON brands.brand_id = lists.brand_id WHERE lists.ptype='$ptype_filter' LIMIT $offset, $limit";
  } else {
    // handle invalid filter value
    echo "Invalid filter value";
    exit();
  }
} else {
  $sql = "SELECT lists.*, brands.brand_name FROM lists JOIN brands ON brands.brand_id = lists.brand_id LIMIT $offset, $limit";
}


$result = $conn->query($sql);
echo '<div class="content-wrapper">
    <div class="content">
    <div class="container">
        <div class="card">
             <div class="card-header font-weight-bold text-info text-xl">Stocks</div>
             <div class="card-body"></div>

             <form method="get" action="">
                <select name="ptype" id="ptype" class="form-control col-md-2 mb-3">
                  <option value="" disabled selected>Select your option</option>
                  <option>Brand New</option> 
                  <option>Surplus</option> 
                </select>

                <button type="submit" name="submit" class="btn btn-primary mb-3 adjust-button">Filter</button>
              </form>

                <table class="table table-striped table-dark">
            <thead class="thead-dark">
            <tr>
              <th scope="col">P.C</th>
              <th scope="col">IMAGE</th>
              <th scope="col">Folder Name</th>
              <th scope="col">Names</th>
              <th scope="col">Type</th>
              <th scope="col">Category</th>
              <th scope="col">Brand</th>
              <th scope="col">Quantity</th>
              <th scope="col">Price</th>
              <th scope="col">Action</th>
            </tr>
            </thead>
            <tbody>';

        


while ($row = $result->fetch_assoc()) {
  echo '<tr>';
  echo '<form action="../CRUD/inventory-edit.php" method="get">';
  echo '<input type="hidden" name="id" value="'.$row['id'].'">';
  echo '<td>'.$row['product_code'].'</td>';
  echo '<td><img src="../assets/images/'.$row['foldername'].'/'.$row['names'].'" width="150px "></img></td>';
    echo '<td>'.$row['foldername'].'</td>';
    echo '<td>'.$row['names'].'</td>';
    echo '<td>'.$row['ptype'].'</td>';
    echo '<td>'.$row['category'].'</td>';
    echo '<td>'.$row['brand_name'].'</td>';
    echo '<td>'.$row['quantity'].'</td>';
    echo '<td>'.number_format($row['price']).'</td>';
    echo '<td>
           <button type="submit" class="btn btn-info">UPDATE</button>
           <a href="../CRUD/inventory-delete.php?id=' . $row['id'] . '" class="btn btn-danger">DELETE</a>
          </td>';
    echo '</form>';
    echo '</tr>';
  $count++;
}

echo '
      </tbody>
        </table>
        <nav aria-label="Page navigation example">
        <ul class="pagination pagination">';
        if($page_no > 1){
          echo "<li  class='page-item'><a  class='page-link' href='?page_no=1'>First Page</a></li>";
          echo "<li  class='page-item'><a  class='page-link' href='?page_no=".($page_no - 1)."'>Previous</a></li>";
        }
                for($i=1;$i<=$total_pages;$i++){
          if($i==$page_no) {
              echo "<li class='page-item active'><a class='page-link'>".$i."</a></li>";
          } else {
              echo "<li  class='page-item'><a  class='page-link' href='?page_no=".$i."'>".$i."</a></li>";
          }
        }
        if($page_no<$total_pages){
          echo "<li  class='page-item'><a  class='page-link' href='?page_no=".($page_no + 1)."'>Next</a></li>";
          echo "<li  class='page-item'><a  class='page-link' href='?page_no=".$total_pages."'>Last Page</a></li>";
        }
        echo '</ul>
        </nav>
                 </div>
            </div>
        </div>
    </div>
</div>';


include "../components/footer.php";


?>

<!-- <head>
<link rel ="stylesheet" href="../assets/dist/css/adminlte.min.css">
</head> -->






