<?php
$servername = "localhost";
$username = "root"; // Replace with your DB username
$password = ""; // Replace with your DB password
$dbname = "boston_ticket_resale";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// SQL query to alter the table
$sql = "ALTER TABLE tickets ADD COLUMN sold BOOLEAN DEFAULT 0";

if ($conn->query($sql) === TRUE) {
    echo "Table altered successfully!";
} else {
    echo "Error altering table: " . $conn->error;
}

$conn->close();
?>
