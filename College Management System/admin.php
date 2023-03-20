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
<html lang="en">
<head>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="sdashboard.css">
    <style>

    </style>
</head>
<body>
   
    <div class="wrapper">
       <div class="section">
		<div class="top_navbar">
			<div class="hamburger">
				<a href="#">
					<i class="fas fa-bars"></i>
				</a>
			</div>
		</div>
		<div class="container">
			
		</div>
	</div>
        <div class="sidebar">
            <div class="profile">
                <img src="https://www.asiamediajournal.com/wp-content/uploads/2022/11/One-Piece-Roronoa-Zoro-PFP.jpg" alt="profile_picture">
                <h3>Company HR</h3>
            </div>
            <ul>
                <li>
                    <a href="admin.php" class="active">
                        <span class="icon"><i class="fas fa-home"></i></span>
                        <span class="item">Dashboard</span>
                    </a>
                </li>
                <li>
                    <a href="adminjobs.php">
                        <span class="icon"><i class="fas fa-desktop"></i></span>
                        <span class="item">Upload Company</span>
                    </a>
                </li>
                <li>
                    <a href="viewjobs.php">
                        <span class="icon"><i class="fas fa-user-friends"></i></span>
                        <span class="item">View Job Status</span>
                    </a>
                </li>
                <li>
                    <a href="logout.php">
                        <span class="icon"><i class="fas fa-regular fa-power-off"></i></span>
                        <span class="item">Logout</span>
                    </a>
                </li>
            </ul>
        </div>
        
</div>
  <div>
<table>
  <tr>
    <th>First Name</th>
    <th>Surname</th>
    <th>Email</th>
    <th>Phone No.</th>
    <th>Profile Picture</th>
    <th>Resume</th>
    <th>Department</th>
    <th>Current Semester</th>
    <th>SSC %</th>
    <th>HSC %</th>
    <th>Previous Backlogs</th>
    <th>Average CGPA</th>
  </tr>     
        <?php 
        
$sql = "SELECT * FROM `studentdashboard`";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
      
      $name = $row["First Name"];
      $surname = $row["Surname"]; 
      $email = $row["Email"];
      $phone = $row["Phone No."]; 
      $ssc = $row["10th %age"]; 
      $hsc = $row["12th %age"]; 
      $degree = $row["Degree %age"]; 
      $backlogs = $row["History Of Backlogs"]; 
      $semester = $row["Current Semester"];
      $department = $row["Department"];
      $photo = $row["Profile Photo"];
      $resume = $row["CV/Resume"];
      
      echo "<tr><td>$name</td><td>$surname</td><td>$email</td><td>$phone</td><td><a href='$photo'>View Profile</a></td><td><a href='$resume'>View Resume</a></td><td>$department</td><td>$semester</td><td>$ssc</td><td>$hsc</td><td>$backlogs</td><td>$degree</td></tr>";
    
  }}
  
  ?>
          
      </table>
      </div>
<script>
    var hamburger = document.querySelector(".hamburger");
    hamburger.addEventListener("click", function(){
    document.querySelector("body").classList.toggle("active");
})
</script>
</body>
</html>