<?php
session_start();
$status = $_POST['status'];
$ref_no = $_POST['ref_no'];
$approve_or_deny = $status == 1 ? '1' : '2';

include '../connection.php';

$sql = "UPDATE orders set STATUS = '$approve_or_deny' WHERE ref_no='$ref_no'";
mysqli_query($conn, $sql);

if ($sql != "") {
    echo "Successfully update record orders";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}