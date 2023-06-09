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

// Insert message
$sql = "INSERT INTO chat (username, message) VALUES (?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ss", $_POST["username"], $_POST["message"]);
$stmt->execute();

// Close connection
$stmt->close();
$conn->close();

?>
