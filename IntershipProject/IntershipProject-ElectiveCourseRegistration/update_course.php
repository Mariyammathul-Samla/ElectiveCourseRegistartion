<?php
error_reporting(0);
session_start();
if (!isset($_SESSION['username'])) {
    header("location:login.php");
} elseif ($_SESSION['usertype'] == 'student') {
    header("location:login.php");
}

include 'config.php';
if ($_GET['course_id']) {
    $c_id = $_GET['course_id'];
    $sql = "SELECT * FROM course WHERE id='$c_id'";
    $result = mysqli_query($data, $sql);
    $info = $result->fetch_assoc();
}

if (isset($_POST['update_course'])) {
    $c_name = $_POST['name'];
    $id = $_POST['id'];
    $c_code = $_POST['code'];
    $c_seat = $_POST['seat'];
    $c_sem = $_POST['sem'];
    $c_desc = $_POST['description'];
    $c_dep = $_POST['department'];


    $sql2 = "UPDATE course SET name='$c_name', code='$c_code',seat='$c_seat' ,sem='$c_sem',description='$c_desc',department='$c_dep' WHERE id='$id'";

    $result2 = mysqli_query($data, $sql2);

    if ($result2) {
        header("location:view_course.php");
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

        
        select{
            width: 200px;
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
                <p class="font-weight-bold">Update Course</p>
            </div>
            <div class="form" action="update_teacher.php" method="post">
                <form action="#" method="post" enctype="multipart/form-data">
                    <input type="text" name="id" value="<?php echo "{$info['id']}"; ?>" hidden>
                    <div class="input">
                        <label>Name</label>
                        <input type="text" name="name" value="<?php echo "{$info['name']}"; ?>">
                    </div>
                    <!-- <div class="input">
                        <label>Department</label>
                        <input type="text" name="department" value="<?php echo "{$info['department']}"; ?>">
                    </div> -->
                    <div class="input">
                        <label for="department">Department</label>
                        <select id="department" name="department">
                        <option value=""><?php echo "{$info['department']}"; ?></option>

                            <option value="CS">Computer Science (CS)</option>
                            <option value="IS">Information Systems (IS)</option>
                            <option value="EC">Electronics and Communication (EC)</option>
                            <option value="EE">Electrical Engineering (EE)</option>
                            <option value="CV">Civil Engineering (CV)</option>
                            <option value="ME">Mechanical Engineering (ME)</option>
                        </select>
                    </div>
                    <div class="input">

                        <label>Code</label>
                        <input type="text" name="code" value="<?php echo "{$info['code']}"; ?>">

                    </div>
                    <div class="input">

                        <label>Seat</label>
                        <input type="number" name="seat" value="<?php echo "{$info['seat']}"; ?>">
                    </div>

                    <div class="input">

                        <label>Seat</label>
                        <input type="number" name="sem" value="<?php echo "{$info['sem']}"; ?>">
                    </div>
                    <div class="input">

                        <label>Description</label>
                        <textarea name="description" rows="4"><?php echo "{$info['description']}"; ?></textarea>

                    </div>

                    <div class="btn">

                        <input type="submit" name="update_course" value="Update" class="update-button">
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