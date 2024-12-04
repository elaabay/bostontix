<?php
// Database connection
$host = "localhost";
$username = "root"; // Replace with your database username
$password = "";     // Replace with your database password
$dbname = "boston_ticket_resale"; // Replace with your database name

$conn = new mysqli($host, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Retrieve form data
$event_name = $_POST['event_name'];
$event_date = $_POST['event_date'];
$price = $_POST['price'];
$description = $_POST['description'];

// Insert into database
$sql = "INSERT INTO tickets (event_name, event_date, price, description)
        VALUES ('$event_name', '$event_date', '$price', '$description')";

if ($conn->query($sql) === TRUE) {
    echo "Ticket listed successfully!";
    echo "<br><a href='index.html'>Return to Home</a>";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
