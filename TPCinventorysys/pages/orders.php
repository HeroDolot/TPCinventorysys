<?php
session_start();
include '../connection.php';
include '../components/header.php';
include '../components/navbar.php';
include '../components/sidebar.php';
?>
<?php
$total = 0.00;
$select_sql = "SELECT order_user.fullname, order_user.contact_no, order_user.delivery_type, order_user.status, order_user.date_now, order_user.ref_no,
               br.brand_name, ca.cart_quantity, ls.price, order_user.id FROM orders order_user
               LEFT JOIN users us ON order_user.user_id = us.id LEFT JOIN lists ls 
               ON order_user.list_id = ls.id LEFT JOIN cart ca ON ca.id = order_user.cart_id
               LEFT JOIN brands br ON br.brand_id = order_user.brand_id";
$result = mysqli_query($conn, $select_sql);
$id = "";
?>
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
            <?php if($row['status'] == 0) : ?>
            <div class="col-md-6 mb-4">
                <div class="card" style="width: 100%;">
                    <div class="card-body">
                        <h5 class="card-title"><?php echo $row['fullname']; ?></h5>
                        <br>
                        <hr>
                        <div class="font-weight-bold">
                            <p>Date: <?php echo $row['date_now']; ?></p>
                            <p>Pick up or cash delivery: <?php echo $delivery_type; ?></p>
                            <p>Reference Number: <?php echo $row['ref_no']; ?></p>
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
                        <form action="../CRUD/update_query_order.php" method="post">
                            <button type="submit" class="btn btn-success btn-block" name="status" value="1">Approve</button>
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
                                            <option value="<?php echo $row['id']; ?>"><?php echo $row['ref_no']; ?></option>
                                        </select>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" name class="btn btn-default" data-dismiss="modal">Cancel</button>
                                        <button type="submit" class="btn btn-danger" onclick="setDenyValue()">Deny</button>

                                        <input type="hidden" name="status" id="status" value="1">
                                        <input type="hidden" name="ref_no" value="<?php echo $row['ref_no']; ?>">
                                    </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php endif; ?>
    <?php endwhile; ?>
    <?php
    include '../components/footer.php';
    ?>

<script>
    function setDenyValue() {
        document.getElementById("status").value = "2";
    }
</script>