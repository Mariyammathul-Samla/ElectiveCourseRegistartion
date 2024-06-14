<?php
error_reporting(0);
session_start();
if (!isset($_SESSION['username'])) {
    header("location:login.php");
} elseif ($_SESSION['usertype'] == 'student') {
    header("location:login.php");
}

include 'config.php';
if ($_GET['teacher_id']) {
    $t_id = $_GET['teacher_id'];
    $sql = "SELECT * FROM teacher WHERE id='$t_id'";
    $result = mysqli_query($data, $sql);
    $info = $result->fetch_assoc();
}

if (isset($_POST['update_teacher'])) {
    $t_name = $_POST['name'];
    $id = $_POST['id'];
    $t_course = $_POST['course'];
    $t_desc = $_POST['description'];
    $file = $_FILES['image']['name'];
    $dst = "./profile/" . $file;
    $dst_db = "profile/" . $file;
    move_uploaded_file($_FILES['image']['tmp_name'], $dst);
    if ($file) {
        $sql2 = "UPDATE teacher SET name='$t_name', description='$t_desc',course='$t_course',image='$dst_db' WHERE id='$id'";
    } else {
        $sql2 = "UPDATE teacher SET name='$t_name', description='$t_desc',course='$t_course' WHERE id='$id'";
    }
    $result2 = mysqli_query($data, $sql2);

    if ($result2) {
        header("location:view_teacher.php");
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <title>Admin Dashboard</title>
    <!-- Add Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        label {
            display: inline-block;
            text-align-last: right;
            width: 100px;
            padding-top: 10px;
            padding-bottom: 10px;
        }

        /* Add this CSS to your existing styles */
        .update-button {
            background-color: #f51e0f;
            color: white;
            padding: 10px 20px;
            border: none;
            margin-left: 60px;
            margin-top: 30px;
            border-radius: 3px;
            cursor: pointer;
            font-weight: bold;
            transition: background-color 0.3s;
        }

        .update-button:hover {
            background-color: #fc9f99;
        }

        .form {
            margin: auto;
            background-color: lightgray;
            width: 500px;
            padding: 50px;
        }

        .form input[type="text"],
        .form input[type="file"],
        .form textarea {
            width: 50%;
            /* padding: 10px; */
            /* margin-bottom: 10px; */
            border: 1px solid #ccc;
            border-radius: 3px;
        }

        .small-square-image {
            width: 200px;
            /* Set the desired width for the square image */
            height: 100px;
            /* Set the same height as the width to create a square */
            object-fit: cover;

            /* Maintain aspect ratio and cover the container */
            margin-bottom: 20px;
        }
    </style>
    <?php
    include 'admin_css.php';
    ?>

</head>

<body>
    <?php
    include 'adminsidebar.php';
    ?>

    <!-- Main -->

    <main class="main-container">
        <center>
            <div class="main-title">
                <p class="font-weight-bold">Update Teacher</p>
            </div>
            <div class="form" action="update_teacher.php" method="post">
                <form action="#" method="post" enctype="multipart/form-data">
                    <input type="text" name="id" value="<?php echo "{$info['id']}"; ?>" hidden>
                    <div class="input">
                        <label>Name</label>
                        <input type="text" name="name" value="<?php echo "{$info['name']}"; ?>">
                    </div>
                    <div class="input">

                        <label>About</label>
                        <textarea name="description" rows="4"><?php echo "{$info['description']}"; ?></textarea>

                    </div>
                    <div class="input">

                        <label>Course</label>
                        <input type="text" name="course" value="<?php echo "{$info['course']}"; ?>">
                    </div>
                    <div class="input">
                        <label>Old Image</label>
                        <img class="small-square-image" src="<?php echo "{$info['image']}"; ?>">
                    </div>
                    <div class="input">

                        <label>New Image</label>
                        <input type="file" name="image" value="<?php echo "{$info['password']}"; ?>">
                    </div>
                    <div class="btn">

                        <input type="submit" name="update_teacher" value="Update" class="update-button">
                    </div>
                </form>
            </div>

        </center>
    </main>

    <!-- End Main -->

    </div>

    <!-- Scripts -->
    <!-- ApexCharts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/apexcharts/3.35.3/apexcharts.min.js"></script>
    <!-- Custom JS -->
    <script src="admin.js"></script>
</body>

</html>