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
    <p>Add HR</p>
  </div>  
  
<div class="formsize">
  <form action="addhr_php.php" method="post">
  <label for="username">HR ID:</label>
  <input type="text" id="cname" name="hr_id" placeholder="Enter HR ID" required>
  
  <label for="comadd">HR Username: </label>
  <input type="text" id="comadd" name="hr_name" placeholder="Enter HR Username" required>
    
  <label for="jrole">Email: </label>
  <input type="text" id="jrole" name="hr_email" placeholder="Enter Email of HR" required>

    <label for="salary">Password: </label>
  <input type="text" id="salary" name="hr_pass" placeholder="Enter the password" required>

    <br>
    <br>
  
  <input type="submit" value="Save">
</form>
  </div>
  

</body>
</html>