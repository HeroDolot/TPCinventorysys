<?php
session_start();
$order_id = $_POST['orderId'];
//echo $order_id;
include '../connection.php';

$sql = "UPDATE orders set STATUS = 1 WHERE id=".$order_id."";
mysqli_query($conn, $sql);

if ($sql != "") {
    echo "Successfully update record orders";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}