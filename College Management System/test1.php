<?php
$comp_name = $_POST['comp_name'];
$status = $_POST['myfield'];

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "tpcstudentdata";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "UPDATE tpcjobs SET status='$status' WHERE desig='$comp_name'";

if ($conn->query($sql) === TRUE) {
  echo "Record updated successfully";
} else {
  echo "Error updating record: " . $conn->error;
}

$conn->close();
?>



