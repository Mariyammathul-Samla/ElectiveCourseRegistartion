<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("location:login.php");
} elseif ($_SESSION['usertype'] == 'admin') {
    header("location:login.php");
}

include 'config.php';
$name = $_SESSION['username'];
$sql = "SELECT * FROM  user  WHERE username='$name' ";
$result = mysqli_query($data, $sql);
$info = mysqli_fetch_assoc($result);

if (isset($_POST['update_profile'])) {
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $password = md5($_POST['password']);
    $sql2 = "UPDATE user SET email='$email',phone='$phone',password='$password' WHERE username='$name'";

    $result2 = mysqli_query($data, $sql2);

    if ($result2) {
        echo "<script type='text/javascript'>
        alert('Updated Successfully!!');
        </script>";
        // header("location:student_profile.php");
    }
}
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
        /* Container styling */

        .main {
            margin-top: 30px;
        }

        .content {
            max-width: 400px;
            margin: 0 auto;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            background-color: #f5f5f5;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
        }

        /* Heading styling */
        .content h1 {
            text-align: center;
            font-size: 24px;
            color: #333;
        }

        /* Form input container */
        .input {
            margin-bottom: 15px;
        }

        /* Label styling */
        .input label {
            display: block;
            margin-bottom: 5px;
        }

        /* Input field styling */
        .input input[type="text"],
        .input input[type="password"],
        .input input[type="number"] {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 14px;
        }

        /* Submit button styling */
        .btn input[type="submit"] {
            background-color: #007bff;
            /* Blue color for the button */
            color: #fff;
            /* White text color */
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 12px;
            margin-left: 130px;

        }

        /* Hover effect for the submit button */
        .btn input[type="submit"]:hover {
            background-color: #0056b3;
            /* Darker blue on hover */
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
            <div class="content">
                <h1>Update Profile</h1>
                <form action="#" method="post" onsubmit="return validateForm()">
                    <div class="input">
                        <label value="<?php echo "{$info['username']}"; ?>">USN</label>
                        <input type="text" name="name" value="<?php echo "{$info['username']}"; ?>" disabled>
                    </div>
                    <div class="input">
                        <label>Email</label>
                        <input type="text" name="email" id="email" value="<?php echo "{$info['email']}"; ?>" required>
                    </div>
                    <div class="input">
                        <label>Phone</label>
                        <input type="number" name="phone" id="phone" value="<?php echo "{$info['phone']}"; ?>" required>
                    </div>
                    <div class="input">

                        <label>Password</label>
                        <input type="password" name="password" value="<?php echo "{$info['password']}"; ?>">
                    </div>
                    <div class="btn">

                        <input type="submit" name="update_profile" value="Update">
                    </div>
                </form>

            </div>



        </section>
    </div>
    <script>
        function validateForm() {
            // Get the values from the form
            var email = document.getElementById("email").value;
            var phoneNumber = document.getElementById("phone").value;

            // Regular expression pattern for email
            var emailPattern = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/;

            if (!email.match(emailPattern)) {
                alert("Invalid email address");
                return false;
            }

            if (phoneNumber.length !== 10 || isNaN(phoneNumber)) {
                alert("Phone number must be 10 digits");
                return false;
            }

            // If all checks pass, the form is valid
            return true;
        }
    </script>


</body>

</html>