<?php

    include "../connection.php";

    $po_code = $_GET['po_code'];

    // var_dump($po_code);

    $sql = "INSERT INTO procurement_number (po_code) VALUES ('$po_code')";
    $result = mysqli_query($conn,$sql);
    header('location:../pages/procurement.php');

    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
      } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
      }
      
      $conn->close();


?>