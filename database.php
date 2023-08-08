<?php
$server = "localhost";
$userName = "root";
$password = "";
$dbName = "educaid";

$dbConnection = new mysqli($server, $userName, $password, $dbName);


if ($dbConnection->connect_error) {
    die("Connection failed: " . $dbConnection->connect_error);
}
else{
    // echo'Successful';
}


?>
