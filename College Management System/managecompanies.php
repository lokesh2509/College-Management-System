<?php
session_start();
include("conn.php");

if (isset($_SESSION["email"])) {
  $email = $_SESSION["email"];
  $password = $_SESSION["password"];
  $role = $_SESSION["role"];
  
  $sql = "SELECT * FROM tpcdata WHERE Email='$email' and password='$password' and role='$role'";
  $result = $conn->query($sql);

  if ($result->num_rows > 0) {
          while ($row = $result->fetch_assoc()) {
        $username = $row["username"];
        
        
          }
} else {
  header('Location: logout.php');
}

} else {
  header('Location: logout.php');
}
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="tablecss.css">
    <!-- Boxicons CDN Link -->
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <!----======== CSS ======== -->
    <link rel="stylesheet" href="">
     
    <!----===== Iconscout CSS ===== -->
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">

    <!--<title>Responsive Regisration Form </title>--> 
   </head>
<body >
  <div class="sidebar">
    <div class="logo-details">
      
      <span class="logo_name">&nbsp; &nbsp;<?php echo $username; ?></span>
    </div>
      <ul class="nav-links" style="padding-left: 0px;">
        <li>
          <a href="dashboard.php" class="active">
            <i class='bx bx-grid-alt' ></i>
            <span class="links_name">Dashboard</span>
          </a>
        </li>
        <li>
          <a href="managecompanies.php">
            <i class='bx bx-box' ></i>
            <span class="links_name">Manage Companies</span>
          </a>
        </li>
        <li>
          <a href="managejobs.php">
            <i class='bx bx-list-ul' ></i>
            <span class="links_name">Manage Jobs</span>
          </a>
        </li>

        <li class="log_out">
          <a href="logout.php">
            <i class='bx bx-log-out'></i>
            <span class="links_name">Log out</span>
          </a>
        </li>
      </ul>
  </div>
  <section class="home-section">
    <nav>
      <div class="sidebar-button">
        <i class='bx bx-menu sidebarBtn'></i>
        <span>View Companies </span>
      </div>
      <div class="tablesize">      
      <table class="table">
        <thead class="tsize">
            <tr>
             <th>Company Name</th>
             <th>Designation</th>
             <th>Company Location</th>
             <th>Salary</th>
             <th>Recruitment Notice</th>
            </tr>
        </thead>
        <tbody>
      
      <?php 
        
$sql = "SELECT * FROM `companies`";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
      
      $name = $row["name"];
      $address = $row["address"]; 
      $package = $row["package"];
      $details = $row["details"];
      $jrole = $row["designation"];
      
      echo "<tr><td>$name</td><td>$jrole</td><td>$address</td><td>$package</td><td><a href='$details'>View Recruitment Details</a></td></tr>";
    
  }}
  
  ?>
      
      
    </tbody>
  </table>

  </div>
</body>
</html>