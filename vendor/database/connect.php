<?php
$servername = "localhost";
$dbusername = "root";
$password = "";
$dbnmae = "kopwar";

// Create connection
$conn = mysqli_connect($servername, $dbusername, $password, $dbnmae);
// Check connection
if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
    die();
}
//echo "Connected successfully";
