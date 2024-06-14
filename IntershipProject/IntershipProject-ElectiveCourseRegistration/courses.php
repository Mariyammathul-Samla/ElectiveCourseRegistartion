<?php
include 'config.php';

$sql = "SELECT * FROM teacher";
$result = mysqli_query($data, $sql);
$sql1 = "SELECT * FROM course";
$result1 = mysqli_query($data, $sql1);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Courses</title>
</head>

<body>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Elective Course Registration</title>
        <link rel="stylesheet" href="css/style.css">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <style>
            .teacher-image {
                width: 100%;
                height: 200px;
                /* Set the desired height for the image within the card */
                object-fit: cover;
                /* Makes the image cover the entire container while maintaining its aspect ratio */
            }

            .custom-margin {
                margin-bottom: 90px;
                /* Adjust the value to control the margin as per your preference */
            }
            .row{
                flex-wrap: wrap;
            }
        </style>
    </head>

    <body>
        <section class="sub-header">
            <nav>
                <a href="index.php"><img src="images/logoSdm.png" alt="sdm"></a>
                <label class="label">SDMIT</label>
                <div class="nav-links" id="navLinks">
                    <i class="fa fa-times" onclick="hideMenu()"></i>
                    <ul>
                        <li><a href="index.php">Home</a></li>
                        <li><a href="about.php">About</a></li>
                        <li><a href="courses.php">Course</a></li>
                        <li><a href="seats.php">Seats</a></li>
                        <li><a href="contact.php">Contact</a></li>
                        <li><a href="login.php">Login</a></li>
                    </ul>
                </div>
                <i class="fa fa-bars" onclick="showMenu()"></i>
            </nav>

            <h1>Courses</h1>
        </section>

        <!-- course -->
        <!-- <section class="course">
        <h1>Courses Available</h1>
        <p>Discover a variety of available courses for your learning journey</p>
    
        <div class="row">
            <div class="course-column">
                <h3>Non-Conventional Energy Sources(18ME651)</h3>
                <p>Tap To Know More </p>
                <div class="layer">
                <p> comprehensive study of alternative and renewable energy technologieswith a focus on their practical applications and environmental impact.
                </p>
                </div>
                
            </div>
            <div class="course-column">
                <h3>Remote Sensing and GIS (18CV651)</h3>
                <p>Tap To Know More </p>
                <div class="layer">
                <p>Delve into geospatial data analysis and mapping techniques in the Remote Sensing and GIS course (18CV651).
                </p>
                </div>
            </div>
            <div class="course-column">
                <h3>Introduction to Operating Systems (18CS656)</h3>
                <p>Tap To Know More </p>
                <div class="layer">
                <p>Get acquainted with fundamental concepts of operating systems in the course Introduction to Operating Systems (18CS656).
                </p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="course-column">
                <h3>PLC and SCADA (18EE652)</h3>
                <p>Tap To Know More </p>
                <div class="layer">
                <p>Explore industrial automation through PLC and SCADA systems in the course 18EE652."
                </p>
                </div>
            </div>
            <div class="course-column">
                <h3>Renewable Energy Sources (18EE653)</h3>
                <p>Tap To Know More </p>
                <div class="layer">
                <p>Dive into the world of sustainable energy technologies in the course Renewable Energy Sources (18EE653)
                </p>
                </div>
            </div>
            <div class="course-column">
                <h3>Basic VLSI Design (18EC655)</h3>
                <p>Tap To Know More </p>
                <div class="layer">
                <p>Discover the essentials of VLSI chip design in the course Basic VLSI Design (18EC655)
                </p>
                </div>
            </div>
        </div>
    </section> -->
    <section class="course">
        <h1>Courses Available</h1>
        <p>Discover a variety of available courses for your learning journey</p>

        <!-- <div class="row">
            <div class="course-column">

                <h3 style=" font-size: 20px;">Non-Conventional Energy Sources(18ME651)</h3>
                <p>Tap To Know More </p>
                <div class="layer">
                    <p> comprehensive study of alternative and renewable energy technologieswith a focus on their practical applications and environmental impact.
                    </p>
                </div>

            </div>
            <div class="course-column">
                <h3 style=" font-size: 20px;">Remote Sensing and GIS (18CV651)</h3>
                <p>Tap To Know More </p>
                <div class="layer">
                    <p>Delve into geospatial data analysis and mapping techniques in the Remote Sensing and GIS course (18CV651).
                    </p>
                </div>
            </div>
            <div class="course-column">
                <h3 style=" font-size: 20px;">Introduction to Operating Systems (18CS656)</h3>
                <p>Tap To Know More </p>
                <div class="layer">
                    <p>Get acquainted with fundamental concepts of operating systems in the course Introduction to Operating Systems (18CS656).
                    </p>
                </div>
            </div>
        </div> -->
        <!-- <div class="row">
            <div class="course-column">
                <h3 style=" font-size: 20px;">PLC and SCADA (18EE652)</h3>
                <p>Tap To Know More </p>
                <div class="layer">
                    <p>Explore industrial automation through PLC and SCADA systems in the course 18EE652."
                    </p>
                </div>
            </div>
            <div class="course-column">
                <h3 style=" font-size: 20px;">Renewable Energy Sources (18EE653)</h3>
                <p>Tap To Know More </p>
                <div class="layer">
                    <p>Dive into the world of sustainable energy technologies in the course Renewable Energy Sources (18EE653)
                    </p>
                </div>
            </div>
            <div class="course-column">
                <h3 style=" font-size: 20px;">Basic VLSI Design (18EC655)</h3>
                <p>Tap To Know More </p>
                <div class="layer">
                    <p>Discover the essentials of VLSI chip design in the course Basic VLSI Design (18EC655)
                    </p>
                </div>
            </div>
        </div> -->
        <div class="row">
            <?php
            while ($info = $result1->fetch_assoc()) {

            ?>
                <div class="course-column">
                    <h3 style=" font-size: 20px;"><?php echo "{$info['name']}"; ?></h3>
                    <p>Tap To Know More </p>
                    <div class="layer">
                        <p><?php echo "{$info['description']}"; ?>
                        </p>
                    </div>
                </div>


            <?php
            }

            ?>


        </div>
    </section>
        <!-- <section class="footer">

            <p>
                Copyright &#169 mariyammathul-samla | All Rights Reserved | Designed by:sdmit
            </p>
            <div class="icons">
                <i class="fa fa-twitter"></i>

                <i class="fa fa-instagram"></i>
                <i class="fa fa-linkedin"></i>
                <i class="fa fa-envelope"></i>
            </div>
            <p>Made with <i class="fa fa-heart-o"></i> By Samla</p>

        </section> -->
        
<?php
include 'footer.php';
?>

        <script src="script.js"></script>
    </body>

    </html>
</body>

</html>