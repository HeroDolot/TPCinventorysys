<?php
    session_start();
    include '../connection.php';
    include '../components/header.php';
    include '../components/navbar.php';
    include '../components/sidebar.php';

    $supplier_name = 'supplier_name';
    $supplier_id = 'supplier_id';

    // $sql = "SELECT * FROM supplier";
    $sql = "SELECT supplier.*, categories.product_type
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
                            <input type="date" class="form-control" id="date" name="date">
                        </div>
            <div class="card-body">
                <!-- <form> -->
                    <form action="../ajax/get_item.php" method="get">
                    <div class="row" style="text-transform:uppercase;">
                        <div class="col-md-4 form-group">
                            <label for="supplier">Supplier</label>
                            <select name="supplier_name" id="supplier_name" class="form-control" style="text-transform:uppercase;">
                                <?php while ($row = $result->fetch_assoc()) { ?>
                                    <option value="<?= $row['supplier_name'] ?>"><?= $row['supplier_name'] ?></option>
                                    
                                <?php } ?>
                            </select>
                        </div>
                        <div class="col-md-4 form-group">
                            <label for="number_input">Contact Number</label>
                            <select name="supplier_contact" id="supplier_contact" class="form-control">
                            </select>
                        </div>
                        <div class="col-md-4 form-group">
                            <label for="code">Code</label>
                            <div class="input-group">
                                <input type="text" class="form-control" id="result" name="code">
                                <div class="input-group-append">
                                    <button type="button" id="generateButton" class="btn btn-info">Generate</button>
                                </div>
                            </div>
                            <input type="hidden" id="lengthInput" value="7">
                        </div>
                    </div>
                    <!-- <hr> -->
                    <div class="row" style="text-transform:uppercase;">
                        <div class="col-md-4 form-group">
                            <label for="item_name">Item Name</label>
                            <select name="product_type" id="product_type" class="form-control" id="">
                                <?php
                                    $results = mysqli_query($conn, $sql);
                                    while ($row = mysqli_fetch_assoc($results)) {
                                        echo '<option value="' . $row['product_type'] . '">' . $row['product_type'] . '</option>';
                                    }
                                ?>
                            </select>
                        </div>
                        <div class="col-md-2 form-group">
                            <label for="item_code">Item Code</label>
                            <input type="text" class="form-control" id="item_code" name="item_code">
                        </div>
                        <div class="col-md-2 form-group">
                            <label for="quantity">Quantity</label>
                            <input type="number" class="form-control" id="quantity" name="quantity">
                        </div>
                        <div class="col-md-2 form-group">
                            <label for="unit_price">Unit Price</label>
                            <input type="number" class="form-control" id="unit_price" name="unit_price" step="0.01">
                        </div>
                        <div class="col-md-2 form-group">
                            <label for="total_price">Total Price</label>
                            <input type="number" class="form-control" id="total_price" name="total_price" readonly>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 text-right">
                            <button type="button" class="btn btn-info" onclick="addItem()">Add Item</button>
                        </div>
                    </div>
                    <table class="table m-2" id="procurementTable">
                        <thead>
                            <tr>
                            <th>Code</th>
                            <th>Name</th>
                            <th>Quantity</th>
                            <th>Price</th>
                            <th id="subTotal">Subtotal</th>
                            <th>Action</th>
                            </tr>
                        </thead>
                        <tbody id="itemsTableBody">
                        </tbody>
                        <tfoot>
                            <tr>
                            <td colspan="4"></td>
                            <td>Total: <span id="totalAmount">0.00</span></td>
                            <td></td>
                            </tr>
                        </tfoot>
                     </table>
                    <div class="row">
                        <div class="col-md-12 text-right">
                            <button type="submit" class="btn btn-primary">Save</button>
                            <button type="button" class="btn btn-secondary" id="clearTable">Clear</button>
                        </div>
                    </div>
                </form>
                <!-- </form> -->
            </div>
        </div>
    </div>
</div>

<?php
    include '../components/footer.php';
?>

<script src="../assets/jsmine/js/procurement1.js"></script>


