<?php

include ('database.php');
session_start();

    
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $email = $_POST['email'];
        $password = $_POST['password'];

        if(empty($email)||empty($password)){
            echo '<script>alert("Please Input Fields!")</script>';
            echo "<script>window.location.href = 'signup.html'</script>";
        }
        else{
        // Validate the submitted username and password, and perform database query
        $stmt = $dbConnection->prepare("SELECT * FROM tbl_signup WHERE email = ?");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows === 1) {
            $row = $result->fetch_assoc();

            // Compare the hashed passwords
            if (md5($password) === $row['password']) {
                // Password is correct, proceed with login
                $_SESSION['user'] = $row;
                header("Location: index.html");
                exit();
            } else {
                // Invalid password
                header("Location: login.html");
                
            }
        } else {
            // Invalid username
           
            header("Location: login.html");
            
        }
    }
}


?>