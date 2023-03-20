<?php
$hr_id = $_POST["hr_id"];
$hr_name = $_POST["hr_name"];
$hr_email = $_POST["hr_email"];
$hr_pass =  $_POST["hr_pass"];

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
$sql = "INSERT INTO tpcdata VALUES ('$hr_id', '$hr_name', '$hr_email', '$hr_pass', 'hr')";

if ($conn->query($sql) === TRUE) {
  echo "New record created successfully";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();


?>