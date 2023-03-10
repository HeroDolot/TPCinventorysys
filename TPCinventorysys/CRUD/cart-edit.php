<?php
    include '../connection.php';
    $cart_quantity = $_GET['quantity']; 
    $id = $_GET['lists_id'];

    // echo $cart_quantity;
    // $id = $_GET['id'];
    // var_dump($cart_quantity);
    // echo $id;
    $sql = "UPDATE cart SET cart_quantity = '$cart_quantity' WHERE id ='$id'";

    if ($conn->query($sql) === TRUE) {
    echo "Record updated successfully";
    header("location: ../pages/cart.php");

  } else {
    echo "Error updating record: " . $conn;
  }
  
  $conn->close();

?>