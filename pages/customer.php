<?php
session_start();
include '../connection.php';
include "../components/header.php";
include "../components/navbar.php";
include "../components/sidebar.php";

$count = 0;
$total_records_per_page = 10;
$offset = 0;
$limit = $total_records_per_page;
$total_records = 0;
$total_pages = 0;

if (isset($_GET['page_no']) &&  $_GET['page_no'] !== "") {
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

$sql = "SELECT * FROM users LIMIT $offset, $limit";
$result = $conn->query($sql);

echo '<div class="content-wrapper">
    <div class="content">
    <div class="container">
        <div class="card">
             <div class="card-header font-weight-bold text-xl text-primary">Account Details</div>
             <div class="card-body">
                <table class="table table-striped">
<thead class="thead-dark">
<tr>
  <th scope="col">ID</th>
  <th scope="col">Username</th>
  <th scope="col">Contact Number</th>
  <th scope="col">Email Address</th>
  <th scope="col">Address</th>
  <th scope="col">Role</th>
  <th scope="col">Action</th>
</tr>
</thead>
<tbody>';

// $count = 1;
while ($row = $result->fetch_assoc()) {
    echo '<tr>
            <td>'.$row['id'].'</td>
            <td>'.$row['uname'].'</td>
            <td>'.$row['contact'].'</td>
            <td>'.$row['email'].'</td>
            <td>'.$row['address1'].'</td>
            <td>'.$row['roles'].'</td>
            <td>
                <form action="#" method="get">
                    <a href="#" class="btn btn-info">UPDATE</a>
                    <button type="submit" class="btn btn-danger">DELETE</button>
                </form>
            </td>
        </tr>';
$count++;
}

echo '
      </tbody>
        </table>
        <nav aria-label="Page navigation example">
        <ul class="pagination pagination p-3">';
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
