<?php
include '../../connection.php';

$uname = $_GET['uname'];
$contact = $_GET['contact'];
$email = $_GET['email'];
$address1 = $_GET['address1'];
$pword = password_hash($_GET['pword'], PASSWORD_DEFAULT);
$roles = "user";

$sql = "SELECT * FROM users WHERE uname = '$uname'";
$result = $conn->query($sql);

if ($result->num_rows == 0) {
  // output data of each row
  $sql = "INSERT INTO users (uname, contact, email, address1, pword, roles)
  VALUES ('$uname', '$contact', '$email', '$address1' ,'$pword', '$roles')";
  
  if (mysqli_query($conn, $sql)) {
    echo "New record created successfully";
        header("location: ../../index.php");
  } else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
  }
} else {
  echo "Username Already Exists";
}

// $stmt = $conn->prepare("SELECT uname FROM users WHERE uname=?");
// $stmt->bind_param("s", $uname);
// $stmt->execute();
// $result = $stmt->get_result();

// if (mysqli_num_rows($result) != 0) {
//     // echo "User is already taken";
//     header('location: ./../../pages/reg.php=?User is already taken"');
// } else {
//     $stmt = $conn->prepare("INSERT INTO users (uname, pword, email, address1, roles) VALUES (?, ?, ?, ?, ?)");
//     $stmt->bind_param("sssss", $uname, $pword, $email, $address, $roles);
//     if ($stmt->execute()) {
//         header("location: ../../index.php");
//     } else {
//         echo "Error: " . $stmt->error;
//     }
// }

// $stmt->close();
// $conn->close();


// for verification
// echo "awit" . $address . $email . $pword .$uname . $roles;
?>