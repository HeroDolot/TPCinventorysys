<?php

    include '../connection.php';

    $supplierName = $_POST['supplierName'];
    $productCode = $_POST['productCode'];
    $itemName = $_POST['itemName'];
    $productCondition = $_POST['productCondition'];
    $categories = $_POST['categories'];
    $unitPrice = $_POST['unitPrice'];

    // var_dump($_POST);   

    $sql = "INSERT INTO items (supplierName, productCode, itemName, productCondition, categories, unitPrice) 
    VALUES ('$supplierName', '$productCode', '$itemName', '$productCondition', '$categories', '$unitPrice')";

    $result = mysqli_query($conn,$sql);
    header('location:../pages/items.php');
      
    $conn->close();


?>