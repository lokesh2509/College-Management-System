<?php
$desig = $_POST["desig"];
$comp = $_POST["comp"];
session_start();
$std_name = $_SESSION['username'];


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

$sql = "INSERT INTO tpcjobs VALUES ('$std_name', '$comp', '$desig', 'Applied')";

if ($conn->query($sql) === TRUE) {
  echo "New record created successfully";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
