<?php
session_start();
include '../connection.php';

$supplier_name = $_GET['supplier_name'];
$supplier_contact = $_GET['supplier_contact'];
$item_name = $_GET['item_name'];

var_dump($item_name);
// $quantity = $_GET['quantity'];
// $unit_price = $_GET['unit_price'];
// $total_price = $_GET['total_price'];

// // Insert procurement data into the database
// if (!empty($item_name) && is_array($item_name)) {
//     $sql = "INSERT INTO procurement (supplier_name, supplier_contact, item_name, quantity, unit_price, total_price) VALUES ";
//     $values = array();
//     for ($i = 0; $i < count($item_name); $i++) {
//         $values[] = "('$supplier_name', '$supplier_contact', '{$item_name[$i]}', '{$quantity[$i]}', '{$unit_price[$i]}', '{$total_price[$i]}')";
//     }
//     $sql .= implode(",", $values);
//     if (mysqli_query($conn, $sql)) {
//         echo "Procurement data saved successfully";
//     } else {
//         echo "Error: " . $sql . "<br>" . mysqli_error($conn);
//     }
// } else {
//     echo "Error: No items selected";
// }

// // Update the supplier's contact number if necessary
// $sql = "UPDATE supplier SET contact_number='$supplier_contact' WHERE supplier_name='$supplier_name'";
// mysqli_query($conn, $sql);

// mysqli_close($conn);
// ?>
