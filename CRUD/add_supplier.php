<?php
    session_start();
    include '../connection.php';

    $supplier_name = $_POST['supplier_name'];
    $supplier_contact = $_POST['supplier_contact'];

    $stmt = $conn->prepare("INSERT INTO supplier (supplier_name, supplier_contact) VALUES (?, ?)");
    $stmt->bind_param("ss", $supplier_name, $supplier_contact);

    if ($stmt->execute()) {
        $_SESSION['success_message'] = "New record created successfully";
    } else {
        $_SESSION['error_message'] = "Error: " . $stmt->error;
    }

    header("location: ../pages/supplier.php");
    exit();
?>
