<?php
session_start();
include '../connection.php';
include '../components/header.php';
include '../components/navbar.php';
include '../components/sidebar.php';
?>
<?php
$total = 0.00;
$select_sql = "SELECT order_user.fullname, order_user.contact_no, order_user.delivery_type, order_user.status, order_user.date_now,
               br.brand_name, ca.cart_quantity, ls.price, order_user.id FROM orders order_user
               LEFT JOIN users us ON order_user.user_id = us.id LEFT JOIN lists ls 
               ON order_user.list_id = ls.id LEFT JOIN cart ca ON ca.id = order_user.cart_id
               LEFT JOIN brands br ON br.brand_id = order_user.brand_id";
$result = mysqli_query($conn, $select_sql);
$id = "";
?>
<!--<div class="container-fluid">-->
<!--    <div class="content-wrapper">-->
<!--        <div class="card p-3 mt-3">-->
<!--            <div class="card-header text-xl text-primary">Receiving</div>-->
<!--            <div class="p-4">-->
<!--                <table class="table table-striped text-center">-->
<!--                    <thead>-->
<!--                    <tr>-->
<!--                        <th>DATE</th>-->
<!--                        <th>ITEMS</th>-->
<!--                        <th>QUANTITY</th>-->
<!--                        <th>UNIT PRICE</th>-->
<!--                        <th>TOTAL PRICE</th>-->
<!--                        <th>Type Of Delivery</th>-->
<!--                        <th>Status</th>-->
<!--                    </tr>-->
<!--                    </thead>-->
<!--                    <tbody class="tbody tbody-striped text-center">-->
<!--                    --><?php //while ($row = $result->fetch_assoc()) : ?>
<!--                        --><?php
//                        $total_price = $row['cart_quantity'] * $row['price'];
//                        $delivery_type = $row['delivery_type'] == 1 ? "Pick Up" : "Cash on Delivery";
//                        $total += $total_price;
//                        $id = $row['id'];
//                        ?>
<!--                        <tr>-->
<!--                            <td> --><?php //echo $row['date_now']; ?><!-- </td>-->
<!--                            <td> --><?php //echo $row['brand_name']; ?><!--</td>-->
<!--                            <td> --><?php //echo $row['cart_quantity']; ?><!--</td>-->
<!--                            <td> ₱ --><?php //echo number_format($row['price']); ?><!-- </td>-->
<!--                            <td> ₱ --><?php //echo number_format($total_price); ?><!--</td>-->
<!--                            <td> --><?php //echo $delivery_type; ?><!--</td>-->
<!--                            --><?php //if ($row['status'] == 0) : ?>
<!--                                <td> <button id="open-dialog" data-toggle="modal" data-target="#modalconfirm" class="btn btn-success" data-order-id="--><?php //echo $row['id']; ?><!--">Received</button></td>-->
<!--                            --><?php //else: ?>
<!--                                <td><button class="btn btn-secondary" disabled>Received</button></td>-->
<!--                            --><?php //endif; ?>
<!--                        </tr>-->
<!--                    --><?php //endwhile; ?>
<!--                    </tbody>-->
<!--                    <tfoot>-->
<!--                    <tr>-->
<!--                        <td colspan="4"></td>-->
<!--                        <td>Total: <span id="totalAmount">--><?php //echo number_format($total); ?><!--</span></td>-->
<!--                        <td></td>-->
<!--                    </tr>-->
<!--                    </tfoot>-->
<!--                </table>-->
<!--            </div>-->
<!--        </div>-->
<!--    </div>-->
<!--</div>-->
<!---->
<!--<div class="modal fade" id="modalconfirm" tabindex="-1" role="dialog" aria-labelledby="modalconfirm" aria-hidden="true">-->
<!--    <div class="modal-dialog" role="document">-->
<!--        <div class="modal-content">-->
<!--            <div class="modal-header">-->
<!--                <h5 class="modal-title" id="modalconfirm">Confirm Dialog</h5>-->
<!--                <button type="button" class="close" data-dismiss="modal" aria-label="Close">-->
<!--                    <span aria-hidden="true">&times;</span>-->
<!--                </button>-->
<!--            </div>-->
<!--            <div class="modal-body">-->
<!--                <form method="POST" action="../CRUD/update_query_order.php">-->
<!--                    <input type="hidden" name="orderId" id="orderIdInput" value="--><?php //echo $id; ?><!--">-->
<!--                    <div class="form-group">-->
<!--                        <label for="input-field">Please Type "YES" to confirm received order</label>-->
<!--                        <input type="text" class="form-control" id="input-field" name="input-field" onkeyup="checkInput()">-->
<!--                    </div>-->
<!--                    <div class="modal-footer">-->
<!--                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>-->
<!--                        <button type="submit" class="btn btn-primary" name="submit">Confirm</button>-->
<!--                    </div>-->
<!--                </form>-->
<!--            </div>-->
<!--        </div>-->
<!--    </div>-->
<!--</div>-->
<!--</div>-->

<div class="container-fluid mt-3">
    <div class="content-wrapper">
        <div class="card-header text-xl text-primary mb-3">
            Pending Orders
        </div>

        <div class="row">
            <?php while ($row = $result->fetch_assoc()) :  ?>
                <?php
                    $total_price = $row['cart_quantity'] * $row['price'];
                    $delivery_type = $row['delivery_type'] == 1 ? "Pick Up" : "Cash on Delivery";
                    $total += $total_price;
                    $id = $row['id'];
                ?>
            <div class="col-md-6 mb-4">
                <div class="card" style="width: 100%;">
                    <div class="card-body">
                        <h5 class="card-title"><?php echo $row['fullname']; ?></h5>
                        <br>
                        <hr>
                        <div class="font-weight-bold">
                            <p>Date: <?php echo $row['date_now']; ?></p>
                            <p>Pick up or cash delivery: <?php echo $delivery_type; ?></p>
<!--                            <p>Reference Number:</p>-->
                        </div>
                    </div>
                    <div class="card-header bg-secondary text-white">
                        ITEMS ORDERED
                    </div>
                    <table class="table table-striped table-hover">
                        <thead class="thead-dark text-center">
                            <tr>
                                <th>ITEM NAME</th>
                                <th>Quantity</th>
                                <th>Price</th>
                                <th>SubTotal</th>
                            </tr>
                        </thead>
                        <tbody class="text-center">
                            <tr>
                                <td><?php echo $row['brand_name']; ?></td>
                                <td><?php echo $row['cart_quantity']; ?></td>
                                <td><?php echo number_format($row['price']); ?></td>
                                <td><?php echo number_format($total_price); ?></td>
                            </tr>
                        </tbody>
                        <tfoot>
                            <tr>
                                <td colspan="3" align="right"><strong>Total: <?php echo number_format($total_price);  ?></strong></td>
                            </tr>
                        </tfoot>
                    </table>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-success btn-block">Approve</button>

                        <button type="button" class="btn btn-danger btn-block" data-toggle="modal" data-target="#myModal">Deny</button>

                        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h4 class="modal-title" id="myModalLabel">Deny Request</h4>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                    </div>
                                    <div class="modal-body">
                                        <p>Are you sure you want to deny this request?</p>
                                        <select name="" id="" class="form-control">
                                            Reason of Denying
                                            <option value="">Invalid Reference Number</option>
                                        </select>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                                        <button type="button" class="btn btn-danger">Deny</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    <?php endwhile; ?>
    <?php
    include '../components/footer.php';
    ?>

<script>
    function checkInput() {
        var input = document.getElementById("input-field");
        var confirmBtn = document.querySelector("#modalconfirm .modal-footer button.btn-primary");
        if (input.value.toUpperCase() === "YES") {
            confirmBtn.disabled = false;
        } else {
            confirmBtn.disabled = true;
        }
    }

    function submitForm() {
        var input = document.getElementById("input-field").value;
        if (input === "YES") {
            var orderId = document.querySelector("#modalconfirm .modal-footer button.btn-success").getAttribute("data-order-id");
            var form = document.createElement("form");
            form.setAttribute("method", "POST");
            form.setAttribute("action", "../CRUD/update_query_order.php");
            var inputField = document.createElement("input");
            inputField.setAttribute("type", "hidden");
            inputField.setAttribute("name", "orderId");
            inputField.setAttribute("value", orderId);
            form.appendChild(inputField);
            document.body.appendChild(form);
            form.submit();
        }
    }
</script>
