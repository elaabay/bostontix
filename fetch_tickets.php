<?php
$servername = "localhost";
$username = "root"; // Replace with your DB username
$password = ""; // Replace with your DB password
$dbname = "boston_ticket_resale";

// Connect to the database
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch available tickets (e.g., unsold tickets)
$sql = "SELECT id, event_name, event_date, price, description FROM tickets WHERE sold = 0";
$result = $conn->query($sql);

$tickets = [];
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $tickets[] = $row;
    }
}

header('Content-Type: application/json');
echo json_encode($tickets);

$conn->close();
?>
