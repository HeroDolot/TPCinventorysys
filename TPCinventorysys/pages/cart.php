<?php
// phpinfo();
session_start();
include '../components/header.php';
include '../components/navbar-logged.php';
include '../components/sidebar-logged.php';
include '../connection.php';

$userid = $_SESSION['user_id'];
$total = 0;

$sql = "SELECT brands.brand_name AS brand, cart.id AS cart_id, lists.names AS img, lists.ptype AS types, cart.cart_quantity AS quantity, lists.label AS labels, lists.price AS price, lists.product_code AS product_code FROM cart LEFT JOIN lists ON cart.lists_id = lists.id JOIN brands ON brands.brand_id = lists.brand_id WHERE cart.userid = '$userid'";
$result = mysqli_query($conn, $sql);

echo '<section class="content">
<div class="container-fluid">
    <div class="content-wrapper p-1">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h1 class="card-title text-info text-xl">Your Cart<h1>
                    </div>
                    <div class="card-body">
                        <table id="example2" class="table table-dark table-striped table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>P.CODE</th>
                                    <th>IMAGE</th>
                                    <th>BRAND</th>
                                    <th>TYPE</th>
                                    <th>QUANTITY</th>
                                    <th>PRICE</th>
                                    <th>SUBTOTAL</th>
                                    <th>ACTION</th>
                                </tr>
                            </thead>
                            <tbody>';
while ($row = $result->fetch_assoc()) {
    $subtotal = intval($row['quantity']) * floatval($row['price']);
    $total += $subtotal;
    echo '<tr>
            <td>' . $row['product_code'] . '</td>
            <td>
                <img src="../assets/images/AddItem/' . $row['img'] . '" class="card-img-top" alt="..." style="width: 250px;"><br>
                <center><h4>' . $row['labels'] . '</center></h4>
            </td>
            <td>' . $row['brand'] . '</td>
            <td>' . $row['types'] . '</td>
            <td>' . $row['quantity'] . '</td>
            <td>₱' . number_format($row['price']) . '</td>
            <td>₱' . number_format($subtotal) . '</td>
            <td>
                <a href="./quantity-edit.php?lists_id=' . $row['cart_id'] . '" class="btn btn-info">EDIT</a>
                <a href="../CRUD/cart-delete.php?id=' . $row['cart_id'] . '" class="btn btn-danger">DELETE</a>
            </td>
        </tr>';
}

echo '</tbody>
    <tfoot>
        <tr>
            <td colspan="6" align="right"><strong>TOTAL:</strong></td>
            <td>₱' . number_format($total) . '</td>
            <td></td>
        </tr>
        <tr>
            <td colspan="8" align="right">
                <a href="./checkout.php" class="btn btn-success">Checkout</a>
            </td>
        </tr>
    </tfoot>
</table>
</div>
</div>
</div>
</div>
</div>
</section>';

include '../components/footer.php';
?>
