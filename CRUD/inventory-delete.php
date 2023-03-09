<?php
    include '../connection.php';
    $id = $_GET['id'];
    // var_dump($id);
    $sql = "DELETE FROM lists WHERE id='$id'";

    if ($conn->query($sql) === TRUE) {
        echo "Successfully Removed";
        header ('location: ../pages/inventory.php');
    }else {
        echo "Error" . $conn;
    }

    $conn->close();

?>