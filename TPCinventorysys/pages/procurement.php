<?php
session_start();
include '../connection.php';
include '../components/header.php';
include '../components/navbar.php';
include '../components/sidebar.php';

$supplier_name = 'supplier_name';
$supplier_id = 'supplier_id';

// $sql = "SELECT * FROM supplier";
$sql = "SELECT supplier.*, categories.product_type AS item_name
    FROM supplier
    LEFT JOIN categories ON supplier.supplier_id=categories.id WHERE supplier_name = $supplier_name;";
// $sql = "SELECT supplier.*, items.item_name AS item_name
//         FROM supplier
//         LEFT JOIN items ON supplier.supplier_id=items.itemID
//         WHERE supplier_name = '$supplier_name';";

$result = mysqli_query($conn, $sql);

?>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>



<div class="content-wrapper">
    <div class="wrapper">
        <div class="card">
            <div class="card-header text-xl text-primary">Procurement</div>
            <div class="col-md-2 form-group">
                <label for="date">DATE</label>
                <input type="date" class="form-control" value="<?php echo date('Y-m-d'); ?>" />
            </div>
                <!-- <form> -->
                <?php
                echo '<form method="POST" name="procurement">
                        <div class="col-md-4 form-group">
                            <label for="code">Purchase Order Number</label>
                            <div class="input-group">
                                <div class="input-group-append">
                                    <input type="text" class="form-control" id="result" name="po_code">
                                    <button type="button" id="generateButton" class="btn btn-info">Generate</button>
                                </div>
                            </div>
                                <input type="hidden" id="lengthInput" value="7">
                        </div>
                        <div class="card-body">
                    <div class="row" style="text-transform:uppercase;">
                    <div class="col-md-4 form-group">
                    <label for="supplier">Supplier</label>
                    <select name="supplier_name" id="supplier_name" class="form-control" style="text-transform:uppercase;">';
                    while ($row = $result->fetch_assoc()) {
                        echo '<option value="' . $row['supplier_name'] . '">' . $row['supplier_name'] . '</option>';
                    }
                    echo '</select>
                </div>
                   <div class="col-md-4 form-group">
                    <label for="number_input">Contact Number</label>
                    <select name="supplier_contact" id="supplier_contact" class="form-control">
                    </select>
                    </div>
                    </div>
                   <div class="row" style="text-transform:uppercase;">
                  <div class="col-md-4 form-group">
                    <label for="item_name">Item Name</label>
                    <select name="item_name" id="product_type" class="form-control">';
                        $sql_items = "SELECT * FROM items";
                        $results_items = mysqli_query($conn, $sql_items);
                        while ($row_items = mysqli_fetch_assoc($results_items)) {
                            echo '<option value="' . $row_items['itemName'] . '">' . $row_items['itemName'] . '</option>';
                        }
                        echo '</select>
                   </div>
                   <div class="col-md-2 form-group">
                    <label for="quantity">Quantity</label>
                    <input type="number" class="form-control" id="quantity" name="quantity">
                   </div>
                   <div class="col-md-2 form-group">';
                        $sql_price = "SELECT * FROM items";
                        $result_price = mysqli_query($conn, $sql_price);
                    echo  '<label for="unit_price">Unit Price</label>
                    <input type="number" class="form-control" id="unit_price" name="unit_price" step="0.01" readonly>
                   </div>
                   <div class="col-md-2 form-group">
                    <label for="total_price">Total Price</label>
                    <input type="number" class="form-control" id="total_price" name="total_price" readonly>
                   </div>
                  </div>
                  <div class="row">
                    <div class="col-md-12 text-right">
                        <button type="button" class="btn btn-info" id="generateTotal" onclick="addItem()">Add Item</button>
                    </div>
                   </div>
                    <table class="table m-2" id="procurementTable">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Quantity</th>
                                <th>Price</th>
                                <th id="subTotal">Subtotal</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                        <tfoot>
                            <tr>
                                <td colspan="4"></td>
                                <td>Total: <span id="totalAmount"></span></td>
                                <td></td>
                            </tr>
                        </tfoot>
                    </table>
                   <div class="row">
                    <div class="col-md-12 text-right">
                        <button type="submit" class="btn btn-primary" name="save_procument" formaction="../CRUD/procurement-insert.php">Save</button>
                        <button type="submit" class="btn btn-secondary" id="clearTable">Clear</button>
                    </div>
                   </div>
                   </form>';
                    ?>
                <!-- </form> -->
            </div>
        </div>
    </div>
</div>

<?php
include '../components/footer.php';
?>

<script src="../assets/jsmine/js/procurement1.js"></script>
