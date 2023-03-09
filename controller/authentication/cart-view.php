<?php
  include '../../connection.php';
  session_start();
  $user_id = $_SESSION['user_id'];
  $lists_id = $_GET['lists_id'];
  $cart_quantity = $_GET['cart_quantity'];

  $sql = "INSERT INTO cart (userid, lists_id, cart_quantity) VALUES ('$user_id', '$lists_id', '$cart_quantity')";
    
  if (mysqli_query($conn, $sql)) {
    header("location: ../../pages/items-logged.php");
  } else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
  }
  $conn->close();
  
?>
