<?php
error_reporting(E_ALL);
ini_set('display errors','1');
session_start();

include("conn.php");

if (isset($_SESSION["email"])) {
  header("location: dashboard.php");
  exit;
}

if (isset($_POST["email"])) {
  extract($_POST);

  $role = "student";
  if ($password == $conpassword) {
    $sql = "SELECT * FROM tpcdata WHERE Email='$email' or username='$username'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
      while ($row = $result->fetch_assoc()) {
        $err = 001;
      }
    } else {
      $sql = "INSERT INTO `tpcdata` (`username`, `email`, `password`, `role`) VALUES ('$username', '$email', '$password', '$role')";
      // $sql = "insert into tpcdata values('$username', '$email', '$password', '$role')";
      $result = $conn->query($sql);

      $date = date("l jS \of F Y h:i:s A");
      $sqlo = "INSERT INTO `studentdashboard` (`First Name`, `Surname`, `Email`, `Phone No.`, `Current Semester`, `Department`, `10th %age`, `12th %age`, `History Of Backlogs`, `Degree %age`, `Profile Photo`, `CV/Resume`, `Registration Date`) VALUES ('', '', '$email', '', '0', '0', '', '', '0', '', '', '', '$date')";

      $conn->query($sqlo);
      $err = "100";
    }
  } else {
    $err = "pass";
  }
}
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <meta charset="utf-8">
  <title>Student Sign Up</title>
  <link rel="stylesheet" href="style.css">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">


</head>

<body>
  <div class="center">
    <h1>Student Sign Up</h1>

    <?php if (isset($err)) {
      switch ($err) {
        case "100":
          echo boost("<center>Your account has been registered successfully. go to login page and login.</center>", 1);
          break;
        case "pass":
          echo boost("<center>Password Does not matched.</center>", 4);
          break;
        case "role":
          echo boost("<center>You must select appropiate role</center>", 4);
          break;
      }
    } ?>

    <form method="post">
      <div class="txt_field">
        <input name="username" type="text" required>
        <span></span>
        <label>Username</label>
      </div>
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
      <div class="txt_field">
        <input name="conpassword" type="password" required>
        <span></span>
        <label>Re-Enter Your Password</label>
      </div>
      <br>
      <div><input type="submit" value="Sign Up"></div>

      <div class="signup_link">Already Have An Account? <a href="login.php">Login Here</a>
      </div>

    </form>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>