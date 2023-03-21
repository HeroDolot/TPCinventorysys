<?php
session_start();
include '../connection.php';


    $name = $_POST['name'];
    $quantity = $_POST['quantity'];
    $price = $_POST['price'];
    $subtotal = $_POST['subtotal'];

    $merge = array(
        "item" => $name,
        "quantity" => $quantity,
        "price" => $price,
        "subtotal" => $subtotal
        );
//        echo '<pre>';
//        print_r($merge)
    $sql = " ";
    for ($i = 0; $i < count($merge['item']); $i++) {
        $item = mysqli_real_escape_string($conn, $merge['item'][$i]);
        $quantity = mysqli_real_escape_string($conn, $merge['quantity'][$i]);
        $price = mysqli_real_escape_string($conn, $merge['price'][$i]);
        $subtotal = mysqli_real_escape_string($conn, $merge['subtotal'][$i]);

        $sql = "INSERT INTO procurement (item, quantity, unit_price, total_price) VALUES ('$item', '$quantity', '$price', '$subtotal')";
    }

    if (mysqli_query($conn, $sql)) {
        echo "Procurement data saved successfully";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
 ?>
