<?php

$servername = "localhost";

$username = "root";
$password = "divyansh@mysql";

// Creating connection
$conn = new mysqli($servername, $username, $password);

// Checking connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$conn->query("USE car");
?>
