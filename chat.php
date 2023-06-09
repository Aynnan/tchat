<?php
$servername = "localhost";
$username = "id20873518_username";
$password = "13371337Aa!";
$dbname = "id20873518_mydb";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Fetch messages
$sql = "SELECT username, message FROM chat ORDER BY id ASC";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Output each message
    while($row = $result->fetch_assoc()) {
        echo "<p><strong>" . htmlspecialchars($row["username"]) . ":</strong> " . htmlspecialchars($row["message"]) . "</p>";
    }
} else {
    echo "No messages";
}

// Close connection
$conn->close();
?>
