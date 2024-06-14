<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("location:login.php");
} elseif ($_SESSION['usertype'] == 'student') {
    header("location:login.php");
}

include 'config.php';
if (isset($_POST['add_course'])) {
    $c_name = $_POST['name'];
    $c_course = $_POST['code'];
    $c_dep = $_POST['department'];
    $c_seat = $_POST['seat'];
    $c_sem = $_POST['sem'];
    $c_desc = $_POST['description'];

    $sql = "INSERT INTO course (name,code,seat,sem,description,department) VALUES ('$c_name','$c_course','$c_seat','$c_sem','$c_desc',' $c_dep')";
    $result = mysqli_query($data, $sql);

    if ($result) {
        header("location:add_course.php");
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <title>Admin Dashboard</title>
    <style>
        label {
            display: inline-block;
            text-align-last: right;
            width: 100px;
            padding-top: 10px;
            padding-bottom: 10px;
        }

        /* Add this CSS to your existing styles */
        .submit-button {
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

        .submit-button:hover {
            background-color: #fc9f99;
        }
        select{
            width: 170px;
        }

        .form {
            background-color: lightgray;
            width: 500px;
            padding: 50px;
        }


        .image label {
            margin-left: 90px;
        }
        #semester,#seat{
            width: 160px;
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
                <p class="font-weight-bold">Add Course</p>
            </div>
            <div class="form">
                <form action="#" method="post" onsubmit="return validateForm()">
                    <div class="input">
                        <label>Name</label>
                        <input type="text" name="name" id="name">
                    </div>
                    <div class="input">
                        <label for="department">Department</label>
                        <select id="department" name="department">
                        <option value="">Select</option>

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
                        <input type="text" name="code">
                    </div>
                    <div class="input">
                        <label>Seats</label>
                        <input type="number" name="seat" id="seat" min="1" max="150" required>
                    </div>
                    <div class="input">

                        <label>Semester</label>
                        <input type="number" name="sem" id="semester" min="1" max="8" required>
                    </div>
                    <div class="input">

                        <label>Description</label>
                        <textarea name="description"></textarea>
                    </div>

                    <div class="btn">

                        <input type="submit" name="add_course" value="Add Course" class="submit-button">
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
    <script src="course.js"></script>
</body>

</html>