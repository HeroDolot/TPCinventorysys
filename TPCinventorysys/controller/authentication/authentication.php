<?php
    include '../../connection.php';
    $username = $_POST['username'];
    $password = $_POST['password'];

    session_start();

    $sql = "SELECT * FROM users WHERE uname='$username'";
    $result = $conn->query($sql);
    // var_dump($result);
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            if (password_verify($password, $row['pword'])) {
            // echo $row["roles"];
                if ($row["roles"] == "admin") {
                    // return "true";  
                    $_SESSION['adminTPC'] = "abc123";
                    $_SESSION["user_id"] = $row["id"];
                    header('location:../../pages/dashboard.php');
                } else {
                    $_SESSION['authentication'] = "abc123";
                    header('location:../../pages/landingpage.php');
                    $_SESSION["user_id"] = $row["id"];
                }
            }
            else {
            echo "invalid password";
            }
        }
        
    }
    $conn->close();
?>
