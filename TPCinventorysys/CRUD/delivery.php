<?php
session_start();
$userid = $_SESSION['user_id'];
$contact_number = $_GET['contact_no'];
$delivery_pickup = isset($_GET['delivery_type_pickup']) ? '1' : '0';
$delivery_cash_delivery = isset($_GET['delivery_type_cash_delivery']) ? '2' : '0';
$date = date('Y-m-d H:i:s');
$fullname = $_GET['full_name'];
include '../connection.php';

$insert_sql_orders = " ";
$sql = "SELECT brands.brand_name AS brand, cart.id AS cart_id, lists.names AS img, lists.ptype AS types, cart.cart_quantity AS quantity, lists.label AS labels, lists.price AS price, lists.product_code AS product_code, lists.id AS lists_id, brands.brand_id FROM cart LEFT JOIN lists ON cart.lists_id = lists.id JOIN brands ON brands.brand_id = lists.brand_id WHERE cart.userid = '$userid'";
$result = mysqli_query($conn, $sql);

$insert_sql_orders = " ";
while ($row = $result->fetch_assoc()) {
//    echo '<pre>';
//    print_r($row);
    $cart_id = $row['cart_id'];
    $list_id = $row['lists_id'];
    $brand_id = $row['brand_id'];
    if ($delivery_pickup == 1) {
        $insert_sql_orders = "INSERT INTO orders (fullname, contact_no, delivery_type, date_now, brand_id, user_id, cart_id, list_id) 
                              VALUES ('$fullname','$contact_number','$delivery_pickup','$date','$brand_id','$userid','$cart_id','$list_id');";
        mysqli_query($conn, $insert_sql_orders);
    } elseif ($delivery_cash_delivery == 2) {
        $insert_sql_orders = "INSERT INTO orders (fullname, contact_no, delivery_type, date_now, brand_id, user_id, cart_id, list_id) 
                              VALUES ('$fullname','$contact_number','$delivery_cash_delivery','$date','$brand_id','$userid','$cart_id','$list_id');";
        mysqli_query($conn, $insert_sql_orders);
    }else{
        echo "Something Went Wrong";
    }
}

if ($insert_sql_orders != "") {
    echo "<h1>Thank you!</h1><br>Successfully saved your orders <br/> Please wait approve your orders";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

?>