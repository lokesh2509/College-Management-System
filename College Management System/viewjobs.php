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
    <div>
            <table>
        <form action="test1.php" method="post">
                <tr>
                    <th>Student Name</th>
                    <th>Company Name</th>
                    <th>Designation</th>
                    <th>Status</th>
                </tr>
                <?php

                include("conn.php");

                $sql = "SELECT * FROM `tpcjobs`";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    // output data of each row
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr><td>" . $row["std_name"] . "</td><td>" . $row["company_name"]. "</td><td>" . $row["desig"]."<input type=\"hidden\" name=\"comp_name\" value=".$row["desig"].">" . "</td><td>" . "<select name=\"myfield\" onchange=\'this.form.submit()\'>

                    <option selected value=\"Applied\">Applied</option>
                  
                    <option value=\"Rejected\">Rejected</option>
                  
                    <option value=\"Processing\">Processing</option>

                    <option value=\"Accepted\">Accepted</option>
                  
                  </select>" . "</td></tr>";
                    }
                }

                ?>
                <!-- <noscript><input type="submit" value="Submit"></noscript> -->
            </table>
                <input type="submit" value="Changes" style="width:fit-content;float:right;margin-right:40px;margin-top:10px">
        </form>
            
    </div>
    <script>
        var hamburger = document.querySelector(".hamburger");
        hamburger.addEventListener("click", function() {
            document.querySelector("body").classList.toggle("active");
        })
    </script>
</body>

</html>