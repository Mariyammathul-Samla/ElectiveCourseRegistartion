<?php
// session_start();
// if (!isset($_SESSION['username'])) {
//     header("location:login.php");
// } elseif ($_SESSION['usertype'] == 'admin') {
//     header("location:login.php");
// }
include 'config.php';
$sql1 = "SELECT * FROM course";
$result1 = mysqli_query($data, $sql1);
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
        body {
            overflow: hidden;
        }

        .main {
            margin-top: 30px;
        }

        /* Container styling */
        .form-container {
            max-width: 400px;
            margin: 0 auto;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            background-color: #f5f5f5;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
        }

        /* Form heading styling */
        .form-container h3 {
            text-align: center;
            font-size: 24px;
            margin-bottom: 20px;
            color: #333;
        }

        /* Error message styling */
        #error-message {
            color: red;
            text-align: center;
        }

        /* Input field styling */
        input[type="text"],
        input[type="number"],
        select {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 16px;
        }

        /* Submit button styling */
        .btn-box {
            text-align: center;
        }

        .btn-box button[type="submit"] {
            background-color: #007bff;
            /* Blue color for the button */
            color: #fff;
            /* White text color */
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 18px;
        }

        /* Hover effect for the submit button */
        .btn-box button[type="submit"]:hover {
            background-color: #0056b3;
            /* Darker blue on hover */
        }

        #error-message {
            color: rgba(219, 33, 33, 0.934);
            font-weight: lighter;
        }

        .msg {
            background-color: #f2f2f2;
            color: #333;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            margin-top: 10px;
            margin-bottom: 20px;
            font-size: 14px;
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
            <div class="form-container">
                <form action="process_form.php" method="post" onsubmit="return validateForm()">
                    <h3> Registartion Form</h3>
                    <h4 id="error-message">
                        <?php
                        error_reporting(0);
                        session_start();
                        session_destroy();
                        echo $_SESSION['loginMessage'];
                        ?>
                    </h4>
                    <input type="text" placeholder="Enter email" name="email" id="email" required>
                    <input type="text" placeholder="Enter Phone Number" name="phone" id="phone" required>
                    <input type="number" placeholder="Enter Semester" name="semester" id="semester" min="1" max="8" required>

                    <input type="text" placeholder="Enter name" name="name" id="name" required>
                    <input type="text" placeholder="Enter USN" name="usn" pattern="4SU20[CS|IS|EC|EE|CV|ME|cs|is|ec|ee|cv|me][0-9]{3}" id="usn" required>
                    <select id="department" name="department">
                        <option value="">Department</option>
                        <option value="CS">Computer Science (CS)</option>
                        <option value="CS">Information Science (IS)</option>
                        <option value="CV">Civil Engineering (CIVIL)</option>
                        <option value="ME">Mechanical Engineering (MECH)</option>
                        <option value="EC">Electronics and Communication (EC)</option>
                        <option value="EE">Electrical Engineering (EE)</option>
                    </select>

                    <!-- <select id="course" name="course">
                        <option value="">Course</option>
                        <?php
                        // Include your database connection code here

                        $sql1 = "SELECT * FROM course";
                        $result1 = mysqli_query($data, $sql1);

                        while ($info = $result1->fetch_assoc()) {
                        ?>
                            <option value="<?php echo $info['code']; ?>"><?php echo $info['name']; ?></option>
                        <?php
                        }
                        ?>
                    </select> -->



                    <label for="course">Select Course:</label>
                    <select id="course" name="course">
                        <option value="">Course</option>
                    </select>
                    <!-- <select id="course" name="course">
                    <option value="">Course</option>
                    <option value="MECH">Non-Conventional Energy Sources(18ME651)</option>
                    <option value="CIVIL">Remote Sensing and GIS (18CV651)</option>
                    <option value="PLC">PLC and SCADA (18EE652)</option>
                    <option value="Renewable">Renewable Energy Sources (18EE653)</option>
                    <option value="VLSI">Basic VLSI Design (18EC655)</option>
                    <option value="OS">Introduction to Operating Systems (18CS656)</option>
                </select> -->
                    <div class="msg">
                        <p>Note: If the course is already at full capacity, it will not be displayed.</p>
                    </div>

                    <div class="btn-box">
                        <button type="submit">Register</button>
                    </div>
                </form>

                <!-- <div class="step-row">
                <div id="progress"></div>
                <div class="step-col">
                    <small>step1</small>
                </div>
                <div class="step-col">
                    <small>step2</small>
                </div>
                <div class="step-col">
                    <small>step3</small>
                </div>
            </div> -->
            </div>



        </section>
    </div>
    <!-- JavaScript/jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            // Listen for changes in the "Select Department" dropdown
            $('#department').on('change', function() {
                var selectedDepartment = $(this).val();

                // Send an AJAX request to fetch courses and check availability
                $.ajax({
                    url: 'fetch_courses.php', // Path to the PHP script
                    method: 'POST',
                    data: {
                        department: selectedDepartment
                    },
                    success: function(response) {
                        // Update the "Select Course" dropdown with the fetched course options
                        $('#course').html(response);
                    }
                });
            });
        });
    </script>


    <script src="studentregister.js"></script>
</body>

</html>