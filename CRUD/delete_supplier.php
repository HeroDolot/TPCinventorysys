<?php

    include '../connection.php';

    $supplier_id = $_GET['id'];
    $sql = "DELETE FROM supplier WHERE supplier_id = '$supplier_id'";

    if ($conn->query($sql) === TRUE) {
        echo "Successfully Removed";
        header ('location: ../pages/supplier.php');
    }else {
        echo "Error" . $conn;
    }

    $conn->close();
?>
