<?php
session_start();
include '../components/header.php';
include '../components/navbar-logged.php';
include '../components/sidebar-logged.php';
include '../connection.php';
$userid = $_SESSION['user_id'];
$total = 0;

$sql= "SELECT order_user.fullname, order_user.contact_no, order_user.delivery_type, order_user.status, 
       order_user.date_now, br.brand_name, ca.cart_quantity, ls.price, order_user.id, ls.names, 
       ls.product_code, ls.ptype, ls.label FROM orders order_user LEFT JOIN users us 
       ON order_user.user_id = us.id LEFT JOIN lists ls ON order_user.list_id = ls.id 
       LEFT JOIN cart ca ON ca.id = order_user.cart_id LEFT JOIN brands br ON 
        br.brand_id = order_user.brand_id WHERE STATUS = 0 AND us.id = '$userid'";
$result = mysqli_query($conn, $sql);
?>

<section class="content">
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
                                </tr>
                                </thead>
                                <tbody>';
                                <?php while ($row = $result->fetch_assoc()) :
                                $subtotal = intval($row['cart_quantity']) * floatval($row['price']);
                                $total += $subtotal;
                                ?>
                                 <tr>
                                    <td> <?php echo $row['product_code']; ?></td>
                                    <td>
                                        <img src="../assets/images/AddItem/<?php echo $row['names']; ?>" class="card-img-top" alt="..." style="width: 250px;"><br>
                                        <center><h4> <?php $row['label']; ?></center></h4>
                                    </td>
                                    <td>  <?php echo $row['brand_name']; ?></td>
                                    <td>  <?php echo $row['ptype']; ?></td>
                                    <td>  <?php echo $row['cart_quantity']; ?></td>
                                    <td>₱ <?php echo number_format($row['price']); ?></td>
                                    <td>₱ <?php echo number_format($subtotal); ?></td>
                                </tr>
                                <?php endwhile; ?>
                                </tbody>
                                <tfoot>
                                <tr>
                                    <td colspan="6" align="right"><strong>TOTAL:</strong></td>
                                    <td> <?php echo number_format($total); ?></td>
                                </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</section>
