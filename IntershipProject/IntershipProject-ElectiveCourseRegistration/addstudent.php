<?php
session_start();
// if (!isset($_SESSION['username'])) {
//   header("location:login.php");
// } elseif ($_SESSION['usertype'] == 'student') {
//   header("location:login.php");
// }

include 'config.php';
if (isset($_POST['add_student'])) {
    $username = $_POST['name'];
    $user_email = $_POST['email'];
    $user_phone = $_POST['phone'];
    $user_password = md5($_POST['password']);
    $usertype = "student";

    $check = "SELECT * FROM user WHERE username='$username'";
    $check_user = mysqli_query($data, $check);
    $row_count = mysqli_num_rows($check_user);
    if ($row_count == 1) {
        echo "<script type='text/javascript'>
        alert('USN already exists!');
        </script>";
    } else {




        $sql = "INSERT INTO user(username,email,phone,usertype,password) VALUES ('$username','$user_email','$user_phone','$usertype','$user_password')";
        $result = mysqli_query($data, $sql);
        if ($result) {
            echo "<script type='text/javascript'>
        alert('Successfully Added!');
        </script>";
        } else {
            echo "<script type='text/javascript'>
        alert('Failed!');
        </script>";
        }
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

        .form {
            background-color: lightgray;
            width: 500px;
            padding: 50px;
        }

        .msg {
            background-color: #f2f2f2;
            border: 2px solid #ccc;
            border-radius: 5px;
            padding: 2px;
            margin: 20px auto;
            max-width: 400px;
            text-align: center;
            box-shadow: 0px 2px 6px rgba(0, 0, 0, 0.2);
            font-family: Arial, sans-serif;
        }

        .msg p {
            font-size: 10px;
            color: #333;
        }
        .msg-hidden {
            display: none;
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
                <p class="font-weight-bold">Add Students</p>
            </div>
            <div class="form">
                <form action="#" method="post" onsubmit="return validateForm()">
                    <div class="input">
                        <label>USN</label>
                        <input type="text" name="name" pattern="4SU20[CS|IS|EC|EE|CV|ME|cs|is|ec|ee|cv|me][0-9]{3}" id="usn" required>
                    </div>
                    <div class="input">

                        <label>Email</label>
                        <input type="text" name="email" id="email" required>
                    </div>
                    <div class="input">

                        <label>Phone</label>
                        <input type="number" name="phone" id="phone" required>
                    </div>
                    <div class="input">

                        <label>Password</label>
                        <input type="password" name="password" id="password" onfocus="showPasswordMessage()" required>
                    </div>
                    <div class="msg msg-hidden">
                        <p>Note:Password must be at least 8 characters long and include at least one uppercase letter, one lowercase letter,one digit,and one special character</p>
                    </div>
                    <div class="btn">

                        <input type="submit" name="add_student" value="Add Student" class="submit-button">
                    </div>
                </form>
            </div>
        </center>
    </main>

  
    

    <!-- End Main -->
    <script>
    // JavaScript function to show the password message when the password field is focused
        function showPasswordMessage() {
            var passwordMessage = document.querySelector('.msg');
            // Remove the "msg-hidden" class to show the message
            passwordMessage.classList.remove('msg-hidden');
        }

        // Rest of your JavaScript code (validateForm function, etc.)
    </script>
    </div>

    <!-- Scripts -->
    <!-- ApexCharts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/apexcharts/3.35.3/apexcharts.min.js"></script>
    <!-- Custom JS -->
    <script src="admin.js"></script>
    <script src="addstudent.js"></script>


</body>

</html>