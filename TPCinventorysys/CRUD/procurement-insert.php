<?php
session_start();
include '../connection.php';


    $name = $_POST['name'];
    $quantity = $_POST['quantity'];
    $price = $_POST['price'];
    $subtotal = $_POST['subtotal'];
    $po_code = $_POST['po_code'];

    $merge = array(
        "item" => $name,
        "quantity" => $quantity,
        "unit_price" => $price,
        "total_price" => $subtotal,
        "po_code" => $po_code
        );
//        echo '<pre>';
//        print_r($merge)
    $sql = " ";

    if( $po_code !== null) {
        $sql_po_code = "INSERT INTO procurement_number(po_code) VALUES ('$po_code')";
        mysqli_query($conn, $sql_po_code);
    }

    for ($i = 0; $i < count($merge['item']); $i++) {
        $item = mysqli_real_escape_string($conn, $merge['item'][$i]);
        $quantity = mysqli_real_escape_string($conn, $merge['quantity'][$i]);
        $unit_price = mysqli_real_escape_string($conn, $merge['unit_price'][$i]);
        $total_price = mysqli_real_escape_string($conn, $merge['total_price'][$i]);
        $sql = "INSERT INTO procurement (item, quantity, unit_price, total_price, po_code) VALUES ('$item', '$quantity', '$unit_price', '$total_price', '$po_code')";
    }

    if (mysqli_query($conn, $sql)) {
        echo "Procurement data saved successfully";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
 ?>
