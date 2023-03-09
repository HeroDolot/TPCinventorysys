<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $name = $_POST["name"];
  $email = $_POST["email"];
  $message = $_POST["message"];

  if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $to = $email;
    $subject = "Contact Us Message";
    $headers = "From: $email";
    mail($to, $subject, $message, $headers);
    header('location: ../../pages/contact-us.php');
  } else {
    echo "Invalid email address. Please enter a valid email address.";
  }
}

?>