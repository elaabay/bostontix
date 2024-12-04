<?php
$server = "localhost";
$username = "your_username";
$password = "your_password";
$database = "boston_ticket_reseller";

$conn = new mysqli($server, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$event_name = $_POST['event_name'];
$event_date = $_POST['event_date'];
$price = $_POST['price'];
$description = $_POST['description'];

$sql = "INSERT INTO tickets (event_name, event_date, price, description) VALUES ('$event_name', '$event_date', '$price', '$description')";

if ($conn->query($sql) === TRUE) {
    echo "Ticket added successfully!";
} else {
    echo "Error: " . $conn->error;
}

$conn->close();
?>
