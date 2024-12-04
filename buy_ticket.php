<?php
$servername = "localhost";
$username = "root"; // Replace with your database username
$password = ""; // Replace with your database password
$dbname = "boston_ticket_resale";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Mark ticket as sold
if (isset($_POST['buy_ticket_id'])) {
    $ticket_id = $_POST['buy_ticket_id'];
    $sql = "UPDATE tickets SET sold = 1 WHERE id = $ticket_id";

    if ($conn->query($sql) === TRUE) {
        echo "Ticket purchased successfully!";
    } else {
        echo "Error updating record: " . $conn->error;
    }
}

// Fetch available tickets
$sql = "SELECT * FROM tickets WHERE sold = 0";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buy Tickets</title>
</head>
<body>
    <h1>Available Tickets</h1>
    <?php
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "<div>";
            echo "<h2>" . htmlspecialchars($row['event_name']) . "</h2>";
            echo "<p>Date: " . htmlspecialchars($row['event_date']) . "</p>";
            echo "<p>Price: $" . htmlspecialchars($row['price']) . "</p>";
            echo "<p>Description: " . htmlspecialchars($row['description']) . "</p>";
            echo "<form method='post' action='buy_ticket.php'>";
            echo "<input type='hidden' name='buy_ticket_id' value='" . $row['id'] . "'>";
            echo "<button type='submit'>Buy Ticket</button>";
            echo "</form>";
            echo "</div><hr>";
        }
    } else {
        echo "<p>No tickets available.</p>";
    }
    $conn->close();
    ?>
</body>
</html>
