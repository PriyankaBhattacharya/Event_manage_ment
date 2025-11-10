<?php
$host = "localhost";
$user = "root"; // Change if your MySQL username is different
$pass = "";     // Add password if any
$dbname = "event_management";

$conn = new mysqli($host, $user, $pass, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
