<?php
session_start();

include("conn.php");

if(isset($_SESSION["email"])){
    header("location: dashboard.php");
    exit;
}

if (isset($_POST["email"])){
extract($_POST);

$sql = "SELECT * FROM tpcdata WHERE Email='$email' and password='$password' and role='$role'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  while($row = $result->fetch_assoc()) {
  
  $_SESSION["email"] = $row["email"];
  $_SESSION["password"] = $password;
  $_SESSION["role"] = $role;
  $_SESSION["username"] = $row["username"];
  
  
  switch ($role) {
      
  case "student":
  header("location: managejobs_php.php");
  header("location: dashboard.php");
  exit;
    break;
    
  case "tpo":
  header("location: admin.php");
  exit;
    break;
    
  case "hr":
  header("location: admin.php");
  exit;
    break;
}
  }
} else {
 $err = "1";
}

}
?>


<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Login | ProjectManager</title>
    <link rel="stylesheet" href="style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

 
  </head>
  <body>
    <div class="center">
      <h1>Login</h1>
      
      <?php if(isset($err)) { echo boost("<center>Invalid Credentials Details</center>", 4);} ?>
      
      <form method="post">
        <div class="txt_field">
          <input name="email" type="text" required>
          <span></span>
          <label>Email</label>
        </div>
        <div class="txt_field">
          <input name="password" type="password" required>
          <span></span>
          <label>Password</label>
        </div>
        <div>
        <select name="role" class="form-select" aria-label="Default select example" required>
  <option selected>Select Your Role</option>
  <option value="student">Student</option>
  <option value="tpo">TPO</option>
    <option value="hr">Company HR</option>
</select>
</div>
<br>
        <div><input type="submit" value="Login"></div>
        
        <div class="signup_link">
          Not a member? <a href="register.php">Signup</a>
        </div>
        
      </form>
    </div>
    
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  </body>
</html>
