<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("location:login.php");
} elseif ($_SESSION['usertype'] == 'student') {
    header("location:login.php");
}


include 'config.php';
$id=$_GET['student_id'];
$sql="SELECT * FROM user WHERE id='$id'";
$result=mysqli_query($data,$sql);
$info=$result->fetch_assoc();

if(isset($_POST['update'])){
    $name=$_POST['name'];
    $email=$_POST['email'];
    $phone=$_POST['phone'];
    $password=$_POST['password'];

    $query="UPDATE user SET username='$name',email='$email',phone='$phone',password='$password' WHERE id='$id'";
    $result2=mysqli_query($data,$query);
    if($result2){
        header("location:viewstudent.php");
    }

}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <title>Admin Dashboard</title>

    <!-- Montserrat Font -->
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">

    <!-- Material Icons -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Outlined" rel="stylesheet">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="css/admin.css">
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
    </style>
    
</head>

<body>
    <?php
    include 'adminsidebar.php';
    ?>

    <!-- Main -->
    <main class="main-container">
        <center>
            <div class="main-title">
                <p class="font-weight-bold">Update Records</p>
            </div>

            <div class="form">
                <form action="#" method="post">
                    <div class="input">
                        <label>USN</label>
                        <input type="text" name="name" value="<?php echo"{$info['username']}"; ?>">
                    </div>
                    <div class="input">

                        <label>Email</label>
                        <input type="text" name="email" value="<?php echo"{$info['email']}"; ?>">
                    </div>
                    <div class="input">

                        <label>Phone</label>
                        <input type="number" name="phone" value="<?php echo"{$info['phone']}"; ?>">
                    </div>
                    <div class="input">

                        <label>Password</label>
                        <input type="password" name="password" value="<?php echo"{$info['password']}"; ?>">
                    </div>
                    <div class="btn">

                        <input type="submit" name="update" value="Update" class="update-button">
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