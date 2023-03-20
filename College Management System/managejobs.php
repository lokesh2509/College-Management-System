<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="tablecssmj.css">
    <!-- Boxicons CDN Link -->
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <!----======== CSS ======== -->
    <link rel="stylesheet" href="">

    <!----===== Iconscout CSS ===== -->
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">

    <!--<title>Responsive Regisration Form </title>-->
</head>

<body>
    <div class="sidebar">
        <div class="logo-details">

            <!-- <span class="logo_name">&nbsp; &nbsp;<?php echo $username; ?></span> -->
        </div>
        <ul class="nav-links" style="padding-left: 0px;">
            <li>
                <a href="dashboard.php" class="active">
                    <i class='bx bx-grid-alt'></i>
                    <span class="links_name">Dashboard</span>
                </a>
            </li>
            <li>
                <a href="managecompanies.php">
                    <i class='bx bx-box'></i>
                    <span class="links_name">Manage Companies</span>
                </a>
            </li>
            <li>
                <a href="managejobs.html">
                    <i class='bx bx-list-ul'></i>
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
                <table>
                    <tr>
                        <td>Company Name</td>
                        <td>Job Designation</td>
                        <td>Status</td>
                    </tr>

                    <form action="managejobs_php.php" method="post">

                        <?php


                        // $class = $_POST["std_class"];
                        // $div = $_POST["std_div"];
                        // $date = $_POST["date"];


                        error_reporting(E_ERROR | E_PARSE);

                        $servername = "localhost";
                        $username = "root";
                        $password = "";
                        $dbname = "tpcstudentdata";

                        // Create connection
                        $conn = mysqli_connect($servername, $username, $password, $dbname);
                        // Check connection
                        if (!$conn) {
                            die("Connection failed: " . mysqli_connect_error());
                        }

                        $sql = "SELECT * FROM companies";
                        $result = mysqli_query($conn, $sql);

                        if (mysqli_num_rows($result) > 0) {
                            // output data of each row
                            while ($row = mysqli_fetch_assoc($result)) {
                                $sql2 = "SELECT * FROM tpcjobs";
                                $result2 = mysqli_query($conn, $sql2);

                                echo "<tr>
                                <td>" . $row["name"] . "<input type=\"hidden\" name=\"comp\" value=" . $row["name"] . ">"  . "</td>
                                <td>" . $row["designation"] . "<input type=\"hidden\" name=\"desig\" value=" . $row["designation"] . ">" . "</td>
                                <td> <input type=\"submit\" class=\"button\" value=\"Apply\"></td>
                                </tr>";
                            }
                        } else {
                            echo "0 results";
                        }

                        mysqli_close($conn);
                        ?>
                    </form>
                </table>

            </div>
</body>

</html>