<?php

    include '../connection.php';

    $itemID = $_GET['itemID'];
    $unitPrice = $_GET['unitPrice'];
    // var_dump($_GET);

    $pattern = '/[^a-zA-Z0-9 ]/u';
    $replacement = "";
    $clean_string = preg_replace($pattern, $replacement, $unitPrice);

    $sql = "UPDATE items SET unitPrice = $clean_string WHERE itemID = $itemID";

    $conn->query($sql);

    // Redirect the user back to the original page
    header("Location: ../pages/items.php");

?>
