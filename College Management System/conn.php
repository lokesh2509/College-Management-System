<?php
error_reporting(E_ALL);
ini_set('display errors','1');

$host = "localhost";
$user = "root";
$password = "";
$database = "tpcstudentdata";
// Create connection


$conn = new mysqli($host, $user, $password, $database);

function boost($msg, $code) {
    switch ($code) {
  case "1":
    $stat = "alert alert-success";
    break;
  case "2":
    $stat = "alert alert-info";
    break;
  case "3":
    $stat = "alert alert-warning";
    break;
  case "4":
    $stat = "alert alert-danger";
  break;    
    }
    $result = '<div class="'.$stat.'">'.$msg.'</div>';
    
    return $result;
}

?>