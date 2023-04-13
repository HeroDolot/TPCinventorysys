<?php
    session_start();
    include '../connection.php';
    include '../components/header.php';
    include '../components/navbar.php';
    include '../components/sidebar.php';

    // Retrieve data from the database
    $sql = "SELECT * FROM supplier";
    $result = mysqli_query($conn, $sql);

    // Check if the form has been submitted
    if(isset($_POST['submit'])) {
        $supplier = $_POST['brands'];
        $sql_table = "SELECT * FROM items WHERE supplierName='$supplier'";
    } else {
        $sql_table = "SELECT * FROM items";
    }
    $result_table = mysqli_query($conn, $sql_table);

?>

<div class="container-fluid">
    <div class="content-wrapper">
        <div class="card">
            <div class="card-header text-primary text-xl mt-2 p-2">Items</div>
            <form action="" method="POST">
                <div class="row">
                    <select name="brands" id="brands" class="form-control col-md-2 m-2">
                        <?php
                        // Loop through the supplier data to create dropdown options
                            while ($row = $result->fetch_assoc()) {
                                echo '<option value="' . $row['supplier_name'] . '">' . strtoupper($row['supplier_name']) . '</option>';
                            }
                        ?>
                    </select>
                    <button type="submit" name="submit" class="btn btn-primary m-2 adjust-button col-md-2">Filter</button>
                </div>
            </form>
            <div class="row ml-2">
                <h6 class="text-primary p-3 text-lg">Add Item:
                    <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#addItemModal" style="width: 30px; height: 30px; padding: 0;">
                        <i class="fa-solid fa-square-plus" style="font-size: 16px;"></i>
                    </button>
                </h6>
            </div>
            <div class="table-responsive">
                <table class="table table-striped text-center">
                    <thead class="thead thead-dark">
                        <th>SUPPLIER NAME</th>
                        <th>CODE</th>
                        <th>ITEM NAME</th>
                        <th>CATEGORIES</th>
                        <th>CONDITION</th>
                        <th>UNIT PRICE</th>
                        <th>ACTION</th>
                        <th></th>
                    </thead>
                    <tbody>
                        <?php
                        // Loop through the item data to create table rows
                        while ($row_table = $result_table->fetch_assoc()) {
                            echo '<tr>';
                            echo '<td>' . $row_table['supplierName'] . '</td>';
                            echo '<td>' . $row_table['productCode'] . '</td>';
                            echo '<td>' . $row_table['itemName'] . '</td>';
                            echo '<td>' . $row_table['productCondition'] . '</td>';
                            echo '<td>' . $row_table['categories'] . '</td>';
                            echo '<td>' . number_format($row_table['unitPrice']) . '</td>';
                            echo '<td>
                            <form action="../CRUD/delete_items.php" method="POST">
                                <button class="btn btn-danger" name="itemID" value="'.$row_table['itemID'].'">
                                      <i class="fa-solid fa-trash"></i>
                                </button>
                                <input type="hidden" name="itemID" value="'.$row_table['itemID'].'">
                            </form>
                        </td>';
                    
                    echo '<td>
                            <form action="../CRUD/edit_items.php" method="GET">
                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#editItemModal'.$row_table['itemID'].'">
                                      <i class="fa-solid fa-pencil"></i>
                                </button>
                    
                                <div class="modal fade" id="editItemModal'.$row_table['itemID'].'" tabindex="-1" role="dialog" aria-labelledby="editItemModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-content" role="document">
                                        <div class="modal-header">
                                            <h5 class="modal-title text-primary" id="editItemModalLabel">Edit Item</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <input type="hidden" name="itemID" value="'.$row_table['itemID'].'">
                                            <input type="number" name="unitPrice" placeholder="EDIT UNIT PRICE" class="form-control">
                                        </div>
                                        <div class="modal-footer">
                                            <button type="submit" class="btn btn-primary">Update</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </td>';
                    
                    echo '</tr>';
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="addItemModal" tabindex="-1" role="dialog" aria-labelledby="addItemModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-content" role="document">
        <div class="modal-header">
            <h5 class="modal-title text-primary" id="addItemModalLabel">Add Item</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="../CRUD/add_items.php" method="POST">
                    <div class="form-group">
                        <?php 
                        $sql_supplier = "SELECT * FROM supplier";
                        $result_supplier = mysqli_query($conn, $sql_supplier);
                        ?>
                        <select name="supplierName" id="supplier" class="form-control">
                            <option value="" disabled selected>Select Supplier</option>
                            <?php
                            while ($row_supplier = $result_supplier->fetch_assoc()) {
                                echo '<option value="' . $row_supplier['supplier_name'] . '">' . strtoupper($row_supplier['supplier_name']) . '</option>';
                            }
                            ?>
                        </select>
                        <br>
                        <input type="text" class="form-control" id="addItem" placeholder="Code" name="productCode" required>
                        <br>
                        <input type="text" class="form-control" id="addItem" placeholder="Item Name" name="itemName" required>
                        <br>
                        <select name="productCondition" id="condition" class="form-control">
                            <option value="" disabled selected>Product Condition</option>
                            <option value="Brand New">Brand New</option>
                            <option value="Surplus">Surplus</option>
                        </select>
                        <br>
                        <?php
                            $sql_categories = "SELECT * FROM categories";
                            $result_categories = mysqli_query($conn, $sql_categories);
                        ?>
                        <select name="categories" id="categories" name="categoryName" class="form-control mb-2">
                           <option value="" disabled selected>Select Category</option>
                           <?php
                                while ($row_categories = $result_categories->fetch_assoc()) {
                                    echo '<option value="' . $row_categories['product_type'] . '">' . strtoupper($row_categories['product_type']) . '</option>';
                            }
                           ?>
                        </select>
                        <br>
                        <input type="number" class="form-control" id="addItem" placeholder="Unit Price" name="unitPrice" required>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Add Item</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    </div>

<?php
    include '../components/footer.php';
?>