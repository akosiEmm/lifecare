
<?php

include ('database.php');

	
	$username = $_POST['username'];
	$password=$_POST['password'];
    $email =$_POST['email'];

        if(empty($username)||empty($password)||empty($email)){
            echo '<script>alert("Please Input Fields!")</script>';
			echo "<script>window.location.href = 'signup.html'</script>";
        }
        else{
	$sql = "INSERT INTO tbl_signup (`username`,`email`,`password`) VALUES ('$username','$email',md5('$password'))";
	$result = $dbConnection->query($sql);
		if($result){
			echo '<script>alert("Successfully Inserted!")</script>';
            echo "<script>window.location.href = 'login.php'</script>";
		}
		else{
			echo 'error on saving';
		}
    }
	$dbConnection->close();

 ?>
                


