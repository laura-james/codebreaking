<?php
$servername = "localhost";
$username = "laura_james";
$password = "";
$dbname = "c9";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}else{
    //echo "connected";
    //print_r($conn);
} 
?>