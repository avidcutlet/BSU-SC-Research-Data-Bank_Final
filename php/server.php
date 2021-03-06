<?php
$servername = "localhost";
$username = "id15978683_admin123";
$password = "@Password1234";
$db = "id15978683_bsusc_research_databank";

// Create connection
$conn = new mysqli($servername, $username, $password, $db);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
?>