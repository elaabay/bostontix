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

// Get ticket ID from the form
if (isset($_POST['ticket_id'])) {
    $ticket_id = intval($_POST['ticket_id']);

    // Mark the ticket as sold
    $sql = "UPDATE tickets SET sold = 1 WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $ticket_id);

    if ($stmt->execute()) {
        echo "Ticket purchased successfully!";
    } else {
        echo "Error purchasing ticket: " . $conn->error;
    }

    $stmt->close();
}

$conn->close();
?>
