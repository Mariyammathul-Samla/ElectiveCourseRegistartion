<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("location:login.php");
} elseif ($_SESSION['usertype'] == 'admin') {
    header("location:login.php");
}
include 'config.php';
$sql1 = "SELECT * FROM course";
$result1 = mysqli_query($data, $sql1);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <title>Dashboard</title>
    <?php
    include 'studentcss.php'
    ?>
    <style>
        body {
            overflow: hidden;
        }

        .main-skills {
            display: flex;
            flex-wrap: wrap;
            margin-top: 20px;
        }

        .main-skills .card {
            width: 250px;
            height: 250px;
            margin: 10px 10px;
            background: #fff;
            text-align: center;
            border-radius: 20px;
            padding: 10px;
            box-shadow: 0 20px 35px rgba(0, 0, 0, 0.1);
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            align-items: center;
        }

        .main-skills .card button {

            background: #f44336;
            color: #fff;
            padding: 7px 15px;
            width: 150px;
            border-radius: 10px;
            margin-bottom: 2px;
            cursor: pointer;
        }

        .main-skills .card a {
            text-decoration: none;
            /* Remove underline */
            padding: 0;
            /* Remove padding */
        }

        .main-skills .card a:hover {
            background: none;
            /* Remove background color on hover */
        }
    </style>
</head>

<body>
    <div class="container">
        <?php
        include 'studentsidebar.php';
        ?>

        <section class="main">
            <div class="main-top">
                <h1>COURSES</h1>
                <i class="fas fa-user-cog"></i>
            </div>
            <div class="main-skills">
                <?php
                while ($info = $result1->fetch_assoc()) {

                ?>
                    <div class="card">
                        <i class="fas fa-laptop-code"></i>

                        <h3><?php echo "{$info['name']}"; ?></h3>
                        <!-- <p>Join over students </p> -->
                        <a href="register.php">
                            <button>Get Started</button>
                        </a>


                    </div>
                <?php
                }

                ?>
                <!-- <div class="card">
                    <i class="fab fa-wordpress"></i>
                    <h3>Remote Sensing and GIS</h3>
                    <p>Join Over 3 million Students.</p>
                    <button>Get Started</button>
                </div> -->
                <!-- <div class="card">
                    <i class="fas fa-palette"></i>
                    <h3>Introduction to Operating Systems</h3>
                    <p>Join Over 2 million Students.</p>
                    <button>Get Started</button>
                </div> -->
                <!-- <div class="card">
                    <i class="fab fa-app-store-ios"></i>
                    <h3>PLC and SCADA</h3>
                    <p>Join Over 1 million Students.</p>
                    <button>Get Started</button>
                </div> -->
            </div>

            <!-- <div class="main-skills">
                <div class="card">
                    <i class="fab fa-app-store-ios"></i>
                    <h3>Renewable Energy Sources</h3>
                    <p>Join Over 1 million Students.</p>
                    <button>Get Started</button>
                </div>
                <div class="card">
                    <i class="fab fa-app-store-ios"></i>
                    <h3>Basic VLSI Design</h3>
                    <p>Join Over 1 million Students.</p>
                    <button>Get Started</button>
                </div>
            </div> -->

            <!-- <section class="main-course">
                <h1>My courses</h1>
                <div class="course-box">
                    <ul>
                        <li class="active">In progress</li>
                        <li>explore</li>
                        <li>incoming</li>
                        <li>finished</li>
                    </ul>
                    <div class="course">
                        <div class="box">
                            <h3>HTML</h3>
                            <p>80% - progress</p>
                            <button>continue</button>
                            <i class="fab fa-html5 html"></i>
                        </div>
                        <div class="box">
                            <h3>CSS</h3>
                            <p>50% - progress</p>
                            <button>continue</button>
                            <i class="fab fa-css3-alt css"></i>
                        </div>
                        <div class="box">
                            <h3>JavaScript</h3>
                            <p>30% - progress</p>
                            <button>continue</button>
                            <i class="fab fa-js-square js"></i>
                        </div>
                    </div>
                </div>
            </section> -->
        </section>
    </div>
</body>

</html>