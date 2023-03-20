<?php
$email = $_POST["forget_email"];
$pass = $_POST["forget_pass"];
$mysqli = new mysqli("localhost", "root", "", "tpcstudentdata");

if($mysqli === false){
	die("ERROR: Could not connect. "
			. $mysqli->connect_error);
}

$sql = "UPDATE tpcdata SET password='$pass' WHERE email='$email'";
if($mysqli->query($sql) === true){
	echo "Records was updated successfully.";
} else{
	echo "ERROR: Could not able to execute $sql. "
										. $mysqli->error;
}
$mysqli->close();
?>
