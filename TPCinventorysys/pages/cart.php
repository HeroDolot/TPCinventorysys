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


?>

<?php

echo '<section class="content">

<div class="container-fluid">
  <div class="row">
    <div class="col-sm-12" id="content">
      <!-- content will be loaded here -->
    </div>
  </div>
</div>

<div class="container-fluid">
    <div class="content-wrapper p-1">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <nav class="navbar navbar-expand-lg navbar-light bg-light nav-without-loading-page">
                            <a class="navbar-brand text-info" href="cart.php">Your Cart</a>
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarNav">
                            <ul class="navbar-nav">
                        <li class="nav-item">
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="pending.php" data-target="receive">Pending</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="receive.php" data-target="receive">Received</a>
                        </li>
                        </ul>
                       </div>
                        </nav>
                        <h1 class="card-title text-info text-xl">Your cart<h1>
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
</div>'
?>
</div>
</div>
</div>
</div>
</section>';
<?php
include '../components/footer.php';
?>
<script src="../assets/jsmine/js/cart.js"></script>
