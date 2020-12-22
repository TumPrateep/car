<?php
$mysqli = new mysqli("localhost","root","","culture");

// Check connection
if ($mysqli->connect_errno) {
  echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
  exit();
}

$mysqli->set_charset("utf8");

$sql = "SELECT * FROM culture";

$result = $mysqli->query($sql);

// Fetch all
$data = $result->fetch_all(MYSQLI_ASSOC);

echo json_encode($data);

$mysqli->close();

?>