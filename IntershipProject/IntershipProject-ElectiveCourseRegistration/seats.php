<?php

// Include your database connection code here
include 'config.php';

// Query to fetch remaining seats for each course
$sql = "SELECT name,seat from course";

$result = mysqli_query($data, $sql);
// Close the database connection
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Seats Available</title>
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
            .blog-right{
                font-size: 14px;
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

            <h1>Seats Available</h1>
        </section>

        <section class="blog-content">
            <div class="row">
                <div class="blog-left">
                    <img src="images/seat.jpg" alt="seat">
                    <h2>Seat Availability</h2>
                    <p>Seats for our courses are allocated on a first-come, first-served basis. Secure your spot early to ensure your place in the program of your choice.</p>


                    <div class="comment-box">
                        <h3>Leave a comment</h3>
                        <form class="comment-form">
                            <input type="text" placeholder="Enter name">
                            <input type="email" placeholder="Enter mail">
                            <textarea rows="5" placeholder="Your comment"></textarea>
                            <button type="submit" class="hero-btn red-btn">POST COMMENT

                            </button>
                        </form>
                    </div>
                </div>
                <div class="blog-right">
                    <h3>Subjects</h3>
                    <div>
                        <span><b>Subject</b></span>
                        <span><b>Seats</b>
                        </span>
                    </div>
                    <?php
                while ($info = $result->fetch_assoc()) {
                ?>
                        <div>
                            <span><?php echo "{$info['name']}"; ?></span>
                            <span><?php echo "{$info['seat']}"; ?></span>
                        </div>

                    <?php
                    }
                    ?>
                    
                    <!-- <div>
                        <span>Non-Conventional Energy Sources(18ME651)</span>
                        <span>100</span>
                    </div>
                    <div>
                        <span>Remote Sensing and GIS (18CV651)</span>
                        <span>100</span>
                    </div>
                    <div>
                        <span>Introduction to Operating Systems (18CS656)</span>
                        <span>100</span>
                    </div>
                    <div>
                        <span>PLC and SCADA (18EE652)</span>
                        <span>100</span>
                    </div>
                    <div>
                        <span>Renewable Energy Sources (18EE653)</span>
                        <span>100</span>
                    </div>
                    <div>
                        <span>Basic VLSI Design (18EC655)</span>
                        <span>100</span>
                    </div> -->
                </div>
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