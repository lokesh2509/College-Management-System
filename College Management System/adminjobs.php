<?php
error_reporting(E_ALL);

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
        
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            extract($_POST);
            
            if(!empty($_FILES["details"]["name"])){
                $filename = 'upload/'.$_FILES['details']['name'];
                
                $sqlo = "INSERT INTO `companies` (`name`, `designation`, `address`, `package`, `details`) VALUES ('$name','$jrole','$address','$salary','$filename')";
                $resulto = $conn->query($sqlo);
                
                move_uploaded_file($_FILES['details']['tmp_name'], $filename);
                
                echo "<script>alert('Company Details Uploaded!');</script>";
            }
        


        }
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
    <link rel="stylesheet" href="all.css">
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
                    <a href="#">
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
  
  <div class="ucheading">
    <p>Upload Company</p>
  </div>  
  
<div class="formsize">
  <form action="" method="post" enctype="multipart/form-data">
  <label for="username">Company Name</label>
  <input type="text" id="cname" name="name" placeholder="Enter Company Name" required>
  
  <label for="comadd">Company Address </label>
  <input type="text" id="comadd" name="address" placeholder="Enter Company Address" required>
    
  <label for="jrole">Job Designation </label>
  <input type="text" id="jrole" name="jrole" placeholder="Job Role Offered" required>

    <label for="salary">Annual Package (in LPA) </label>
  <input type="text" id="salary" name="salary" placeholder="Package Offered in LPA" required>
    
    <label for="recdet">Recruitment Details</label>
    <input type="file" id="recfile" name="details" placeholder="Upload">
    <br>
    <br>
  
  <input type="submit" value="Save">
</form>
  </div>
  
<script>
    var hamburger = document.querySelector(".hamburger");
    hamburger.addEventListener("click", function(){
    document.querySelector("body").classList.toggle("active");
})
</script>
</body>
</html>