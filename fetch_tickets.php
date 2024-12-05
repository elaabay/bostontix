<?php
$servername = "localhost";
$username = "uumt9974yj6tk";
$password = "2b1p%7@1@1%2";
$dbname = "dbqgftcngor4ju";

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
