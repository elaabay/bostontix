<?php
$servername = "localhost"; // Use your SiteGround hostname for remote hosting
$username = "your_db_username";
$password = "your_db_password";
$database = "boston_ticket_resale";

$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully!";
?>
