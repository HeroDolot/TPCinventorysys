<?php
session_start();

    include '../connection.php';

    $itemID = $_POST['itemID'];
    // var_dump($itemID);
    $sql = "DELETE FROM items WHERE itemID = '$itemID'";

    if ($conn->query($sql) === TRUE) {
        $_SESSION['success_message'] = "Successfully Removed";
        header('location: ../pages/items.php');
    }else {
        $_SESSION['error_message'] = "Error: " . $sql . "<br>" . $conn->error;
        header('location: ../pages/items.php');
    }

    // $conn->close();

?>