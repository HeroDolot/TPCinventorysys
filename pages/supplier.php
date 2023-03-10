<?php
    session_start();
    include '../connection.php';
    include '../components/header.php';
    include '../components/navbar.php';
    include '../components/sidebar.php';

    $sql = "SELECT COUNT(*) as total FROM supplier";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    $total_records = $row['total'];
    $records_per_page = 8;
    $total_pages = ceil($total_records / $records_per_page);
    $page = (isset($_GET['page']) && is_numeric($_GET['page'])) ? $_GET['page'] : 1;
    $offset = ($page - 1) * $records_per_page;

    $sql = "SELECT * FROM supplier LIMIT $offset, $records_per_page";
    $result = $conn->query($sql);

?>
<div class="content-wrapper">
    <div class="wrapper">
        <?php
            if(isset($_SESSION['success_message'])) {
                echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
                    '.$_SESSION['success_message'].'
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>';
                unset($_SESSION['success_message']);
          }
        ?>
        <div class="card">
            <li class="nav-icon nav">
                <div class="card-header text-xl text-info">Supplier</div>
            </li>
            <h6 class="text-primary p-3">Add supplier
                <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#addSupplierModal" style="width: 30px; height: 30px; padding: 0;">
                     <i class="fa-solid fa-square-plus" style="font-size: 16px;"></i>
                </button>
            </h6>
            <table class="table table-striped">
                <thead class="thead thead-dark text-center">
                    <th></th>
                    <th>Supplier Name</th>
                    <th>Contact</th>
                    <th>Action</th>
                </thead>
                <tbody class="tbody tbody-striped text-center">
                    <?php
                        while ($row = $result->fetch_assoc()){
                            echo '<form action="../CRUD/delete_supplier.php" method="get">';
                            echo '<input type="hidden" name="supplier_id" value="'.$row['supplier_id'].'">';
                            echo '<tr>';
                            echo '<td>'.$row['supplier_id'].'</td>';
                            echo '<td style="text-transform:uppercase;">'.$row['supplier_name'].'</td>';
                            echo '<td>'.$row['supplier_contact'].'</td>';
                            echo '<td><a href="../CRUD/delete_supplier.php?id='.$row['supplier_id'].'" class="btn btn-danger">Delete</a></td>';
                            echo '</tr>';
                            echo '</form>';
                        }
                    ?>
                </tbody>
            </table>
        </div>
        <ul class="pagination p-2">
                <?php for ($i=1; $i<=$total_pages; $i++) {
                  $active = ($i == $page) ? 'active' : '';
                  echo '<li class="page-item '.$active.'"><a class="page-link" href="?page='.$i.'">'.$i.'</a></li>';
                } ?>
        </ul>
    </div>
</div>
<div class="modal fade" id="addSupplierModal" tabindex="-1" role="dialog" aria-labelledby="addSupplierModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-content" role="document">
        <div class="modal-header">
                <h5 class="modal-title text-primary" id="addSupplierModalLabel">Add Supplier</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="../CRUD/add_supplier.php" method="post">
                    <div class="form-group">
                        <label for="supplierName">Company Name</label>
                        <input type="text" class="form-control" id="supplierName" placeholder="Enter Supplier Name" name="supplier_name" required>
                    </div>
                    <div class="form-group">
                        <label for="contact">Contact</label>
                        <input type="text" class="form-control" id="contact" placeholder="Enter Contact" name="supplier_contact" required>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Add Supplier</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?php
    include '../components/footer.php';
?>

