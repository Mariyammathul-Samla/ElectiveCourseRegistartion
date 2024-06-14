<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("location:login.php");
} elseif ($_SESSION['usertype'] == 'admin') {
    header("location:login.php");
}
include 'config.php';

$sql = "SELECT * FROM teacher";
$result = mysqli_query($data, $sql);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>

    <?php
    include 'studentcss.php';
    ?>
    
      <style>
        body{
            overflow: hidden;
        }
        .teacher-image {
            width: 100%;
            height: 200px;
            /* Set the desired height for the image within the card */
            object-fit: cover;
            /* Makes the image cover the entire container while maintaining its aspect ratio */
        }
        .custom-margin {
            margin-bottom: 10px; /* Adjust the value to control the margin as per your preference */
        }

        .row {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            margin: 50px;
        }

        .column {
            margin: 10px;
        }

        .card-body {
            text-align: center;
            background-color: #eee;
        }     

        .card-body p {
            font-size: 12px;
        }

        .card-body h5 {
            font-size: 18px;
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

                
            </div>
            <h1 style="text-align:center;">Our Teachers</h1>
          
            <div class="container">
                <div class="row">
                    <?php
                    while ($info = $result->fetch_assoc()) {
                    ?>
                        <div class="col-md-4 column">
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
    </div>
</body>

</html>
