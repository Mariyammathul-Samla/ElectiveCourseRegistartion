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
    <title>Elective Course Registration</title>
    <!-- Add Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
    <!-- <link rel="stylesheet" href="css/footer.css"> -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <style>
        .teacher-image {
            width: 100%;
            height: 200px;
            object-fit: cover;
        }

        .custom-margin {
            margin-bottom: 90px;
        }

        .hero-btn:hover {
            text-decoration: none;
            color: #fff;
            border: 1px solid #f44336;
            background: #f44336;
            transition: 1s;
        }
    </style>

</head>

<body>
    <section class="header">
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

        <div class="text-box">
            <h1>SDM Institue Of Technology</h1>
            <h3> Elevate Your Future with Elective Courses</h3>
            <p>At SDMIT, we offer a wide range of elective courses designed to empower students with the knowledge <br> and skills they need to excel in the rapidly evolving world of technology. </p>
            <a href="login.php" class="hero-btn">Register Now</a>
        </div>
    </section>


    <!-- course -->
    <section class="course">
        <h1>Courses Available</h1>
        <p>Discover a variety of available courses for your learning journey</p>


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
    <section class="course">
        <h1>Our Teachers</h1>
        <p>Meet our dedicated educators, committed to fostering vibrant, academically challenging, and encouraging learning environments.</p>

        <div class="container">
            <div class="row">
                <?php
                while ($info = $result->fetch_assoc()) {

                ?>
                    <div class="col-md-4">
                        <div class="card border-0 shadow-sm custom-margin">
                            <img src="<?php echo "{$info['image']}"; ?>" alt="" class="card-img-top teacher-image">
                            <div class="card-body">
                                <h5 class="card-title text-center"><?php echo "{$info['name']}"; ?></h5>
                                <h6 class="card-title text-center"><?php echo "{$info['course']}"; ?></h6>

                                <p class="card-text"><?php echo "{$info['description']}"; ?></p>
                            </div>

                        </div>
                    </div>


                <?php
                }

                ?>
            </div>
        </div>
    </section>
    <?php
    include 'footer.php';
    ?>








    <script src="script.js"></script>
</body>

</html>