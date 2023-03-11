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
            <div class="col-md-4 form-group">
                <label for="code">Purchase Order Number</label>
                <div class="input-group">
                    <form action="../CRUD/po_insert.php" method="get">
                    <div class="input-group-append">
                        <input type="text" class="form-control" id="result" name="po_code">
                            <button type="button" id="generateButton" class="btn btn-info">Generate</button>
                            <button type="submit" class="btn btn-primary">Save</button>
                        </div>
                    </form>
                </div>
                <input type="hidden" id="lengthInput" value="7">
            </div>
            <div class="card-body">
                <!-- <form> -->
                <?php
                    echo '<form action="../CRUD/procurement-insert.php" method="get">';
                    echo '<div class="row" style="text-transform:uppercase;">';
                    echo '<div class="col-md-4 form-group">';
                    echo '<label for="supplier">Supplier</label>';
                    echo '<select name="supplier_name" id="supplier_name" class="form-control" style="text-transform:uppercase;">';
                    while ($row = $result->fetch_assoc()) {
                        echo '<option value="' . $row['supplier_name'] . '">' . $row['supplier_name'] . '</option>';
                    }
                    echo '</select>';
                    echo '</div>';
                    echo '<div class="col-md-4 form-group">';
                    echo '<label for="number_input">Contact Number</label>';
                    echo '<select name="supplier_contact" id="supplier_contact" class="form-control">';
                    echo '</select>';
                    echo '</div>';
                    echo '</div>';
                    echo '<div class="row" style="text-transform:uppercase;">';
                    echo '<div class="col-md-4 form-group">';
                    echo '<label for="item_name">Item Name</label>';
                    echo '<select name="item_name" id="product_type" class="form-control">';
                    $results = mysqli_query($conn, $sql);
                    while ($row = mysqli_fetch_assoc($results)) {
                        echo '<option value="' . $row['item_name'] . '">' . $row['item_name'] . '</option>';
                    }
                    echo '</select>';
                    echo '</div>';
                    echo '<div class="col-md-2 form-group">';
                    echo '<label for="quantity">Quantity</label>';
                    echo '<input type="number" class="form-control" id="quantity" name="quantity">';
                    echo '</div>';
                    echo '<div class="col-md-2 form-group">';
                    echo '<label for="unit_price">Unit Price</label>';
                    echo '<input type="number" class="form-control" id="unit_price" name="unit_price" step="0.01">';
                    echo '</div>';
                    echo '<div class="col-md-2 form-group">';
                    echo '<label for="total_price">Total Price</label>';
                    echo '<input type="number" class="form-control" id="total_price" name="total_price" readonly>';
                    echo '</div>';
                    echo '</div>';
                    echo '<div class="row">';
                    echo '<div class="col-md-12 text-right">';
                    echo '<button type="button" class="btn btn-info" onclick="addItem()">Add Item</button>';
                    echo '</div>';
                    echo '</div>';
                    echo '<table class="table m-2" id="procurementTable">';
                    echo '<thead>';
                    echo '<tr>';
                    echo '<th>Name</th>';
                    echo '<th>Quantity</th>';
                    echo '<th>Price</th>';
                    echo '<th id="subTotal">Subtotal</th>';
                    echo '<th>Action</th>';
                    echo '</tr>';
                    echo '</thead>';
                    echo '<tbody id="itemsTableBody">';
                    echo '</tbody>';
                    echo '<tfoot>';
                    echo '<tr>';
                    echo '<td colspan="4"></td>';
                    echo '<td>Total: <span id="totalAmount">0.00</span></td>';
                    echo '<td></td>';
                    echo '</tr>';
                    echo '</tfoot>';
                    echo '</table>';
                    echo '<div class="row">';
                    echo '<div class="col-md-12 text-right">';
                    echo '<button type="submit" class="btn btn-primary">Save</button>';
                    echo '<button type="button" class="btn btn-secondary" id="clearTable">Clear</button>';
                    echo '</div>';
                    echo '</div>';
                    echo '</form>';
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