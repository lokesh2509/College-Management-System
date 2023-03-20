
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