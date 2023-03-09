<?php
    include '../connection.php';
    $id = $_GET['id'];
    $sql = "DELETE FROM cart WHERE id='$id'";

    if ($conn->query($sql) === TRUE) {
        echo "Successfully Removed";
        header ('location: ../pages/cart.php');
    }else {
        echo "Error" . $conn;
    }

    $conn->close();

?>