<?php
session_start();
include("conn.php");


error_reporting(E_ERROR | E_PARSE);

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
    
    
if(!empty($_FILES["photo"]["name"])){
$photo = 'upload/'.$_FILES['photo']['name'];
move_uploaded_file($_FILES['photo']['tmp_name'],$photo);

$sql = "UPDATE `studentdashboard` SET `Profile Photo`='$photo' WHERE Email = '$email'";
$conn->query($sql);
}

if(!empty($_FILES["resume"]["name"])){
$resume = 'upload/'.$_FILES['resume']['name'];
move_uploaded_file($_FILES['resume']['tmp_name'],$resume);

$sql = "UPDATE `studentdashboard` SET `CV/Resume`='$resume' WHERE Email = '$email'";

$conn->query($sql);
}    
    
        $sql = "UPDATE `studentdashboard` SET `First Name`='$name',`Surname`='$surname',`Phone No.`='$phone',`Current Semester`='$semester',`Department`='$department',`10th %age`='$ssc',`12th %age`='$hsc',`History Of Backlogs`='$backlogs',`Degree %age`='$degree' WHERE Email = '$email'";
    
        $conn->query($sql);
        
        
        $err = 1;
}

$sql = "SELECT * FROM `studentdashboard` WHERE `Email` = '$email' LIMIT 1";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
      $name = $row["First Name"];
      $surname = $row["Surname"]; 
      $phone = $row["Phone No."]; 
      $ssc = $row["10th %age"]; 
      $hsc = $row["12th %age"]; 
      $degree = $row["Degree %age"]; 
      $backlogs = $row["History Of Backlogs"]; 
      $semester = $row["Current Semester"];
      $department = $row["Department"];
      $photo = $row["Profile Photo"];
      $resume = $row["CV/Resume"];
  }
}
    }
  } else {
    header('Location: logout.php');
  }
  
  
  $conn->close();
  
  
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
    <link rel="stylesheet" href="css/styles1.css">
    <!-- Boxicons CDN Link -->
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <!----======== CSS ======== -->
    <link rel="stylesheet" href="css/dashstyle.css">
     
    <!----===== Iconscout CSS ===== -->
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">

    <!--<title>Responsive Regisration Form </title>--> 
   </head>
<body >
  <div class="sidebar">
    <div class="logo-details">
      
      <span class="logo_name">&nbsp; &nbsp;<?php echo $username; ?></span>
    </div>
      <ul class="nav-links">
        <li>
          <a href="sdash1.php" class="active">
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
        <span class="dashboard">Dashboard</span>
      </div>
    <div class="container">
        <header>Registration</header>
        
        <br>
              <?php if(isset($err)) { echo boost("<center>Your Data has been updated!</center>", 1);} ?>
      

        <form action="" method="post" enctype="multipart/form-data">
            <div class="form first">
                <div class="details personal">
                    <span class="title">Personal Details</span>

                    <div class="fields">
                        <div class="input-field">
                            <label>First Name</label>
                            <input value="<?php echo $name; ?>" type="text" placeholder="Enter your first name" name="name" required>
                        </div>
                        <div class="input-field">
                          <label>Last Name</label>
                          <input value="<?php echo $surname; ?>" type="text" placeholder="Enter your Surname" name="surname" required>
                      </div>
                      <div class="input-field">
                        <label>Email</label>
                        <input value="<?php echo $email; ?>" type="text" placeholder="Enter your email" name="email" disabled>
                      </div>
                        <div class="input-field">
                            <label>Mobile Number</label>
                            <input value="<?php echo $phone; ?>" type="number" placeholder="Enter mobile number" name="phone" required>
                        </div>
                        <div class="input-field">
                          <label for="myfile">Upload Your Photo: <a href="<?php echo $photo; ?>">View Photo</a></label>
                          <input type="file" id="photo" name="photo">
                      </div>
                      <div class="input-field">
                        <label for="myfile">Upload Your Resume: <a href="<?php echo $resume; ?>">View Resume/CV</a></label>
                        <input type="file" id="resume" name="resume">
                    </div>
                </div>

                <div class="details ID">
                    <span class="title">Academic Details</span>

                    <div class="fields">
                        <div class="input-field">
                            <label>Department</label>
                              <select id="department" name="department" required>
                                  <option value="0" selected>Select Department</option>
                                  <option value="information technology">Information Technology</option>
                                  <option value="computer science">Computer Science</option>
                                  <option value="data science">Data Science</option>
                              </select>
                          </div>
                        <div class="input-field">
                          <label>Current Semester</label>
                          <select id="semester" name="semester" required>
                            <option value="0" selected>Select Semester</option>
                            <option value="semester 1">Semester I</option>
                            <option value="semester 2">Semester II</option>
                            <option value="semester 3">Semester III</option>
                            <option value="semester 4">Semester IV</option>
                            <option value="semester 5">Semester V</option>
                            <option value="semester 6">Semester VI</option>
                        </select>
                    </div>
                        <div class="input-field">
                            <label>SSC Percentage</label>
                            <input value="<?php echo $ssc; ?>" name="ssc" type="text" placeholder="Enter 10th Percentage" required>
                        </div>

                        <div class="input-field">
                            <label>HSC Percentage</label>
                            <input value="<?php echo $hsc; ?>" name="hsc" type="text" placeholder="Enter 12th Percentage" required>
                        </div>

                        <div class="input-field">
                            <label>History Of Backlogs</label>
                            <select id="backlogs" name="backlogs" required>
                              <option value="0" selected>Select Y/N</option>
                              <option value="yes">Yes</option>
                              <option value="no">No</option>
                          </select>
                      </div>
                      <div class="input-field">
                        <label>Average CGPA</label>
                        <input id="degree" value="<?php echo $degree; ?>" name="degree" type="text" placeholder="Enter Deg.Agg Percentage" required>
                    </div>
                    </div>
                        <button class="nextBtn">
                          <input type="submit" value="Save" name="submit" class="btnText">
                        <i class="uil uil-navigator"></i>
                    </button>
                </div> 
            </div>

            

            
    <!--<script src="script.js"></script>-->
      </div>
      </div>
    </nav>

 
</form>

<?php
      echo "<script>
      document.querySelector('#backlogs').value = '$backlogs';
      document.querySelector('#department').value = '$department';
      document.querySelector('#semester').value = '$semester';
      </script>";

?>
</body>
</html>