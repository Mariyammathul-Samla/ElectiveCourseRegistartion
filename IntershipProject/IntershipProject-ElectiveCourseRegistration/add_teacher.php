<?php
session_start();
if (!isset($_SESSION['username'])) {
  header("location:login.php");
} elseif ($_SESSION['usertype'] == 'student') {
  header("location:login.php");
}

include 'config.php';
if(isset($_POST['add_teacher'])){
    $t_name=$_POST['name'];
    $t_course=$_POST['course'];
    $t_description=$_POST['description'];
    $file=$_FILES['image']['name'];
    $dst="./profile/".$file;
    $dst_db="profile/".$file;
    move_uploaded_file($_FILES['image']['tmp_name'],$dst);
    $sql="INSERT INTO teacher (name,description,course,image) VALUES ('$t_name','$t_description','$t_course','$dst_db')";
    $result=mysqli_query($data,$sql);


    if($result){
        header("location:add_teacher.php");
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
    label{
        display: inline-block;
        text-align-last: right;
        width: 100px;
        padding-top: 10px;
        padding-bottom: 10px;
    }
/* Add this CSS to your existing styles */
.submit-button {
    background-color:  #f51e0f;
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
    background-color:  #fc9f99;
}
.form{
    background-color: lightgray;
    width:500px;
    padding:50px;
}


.image label{
    margin-left: 90px;
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
      <p class="font-weight-bold">Add Teacher</p>
    </div>
   <div class="form">
    <form action="#" method="post" enctype="multipart/form-data" onsubmit="return validateForm()">
        <div class="input">
            <label>Name</label>
            <input type="text" name="name" id="name">
        </div>
        <div class="input">

            <label>Description</label>
            <textarea name="description" ></textarea>
        </div>
        <div class="input">
            <label>Course</label>
            <input type="text" name="course">
        </div>
        <div class="input image">

            <label>Image</label>
            <input type="file" name="image">
        </div>
        
        <div class="btn">

            <input type="submit" name="add_teacher"value="Add Teacher" class="submit-button">
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
  <script>
        function validateForm() {
            // Get the values from the form
            var name = document.getElementById("name").value;

            // Regular expression pattern for email
            var namePattern = /^[A-Za-z\s]+$/;

            if (!name.match(namePattern)) {
                alert("Name should contain only characters");
                return false;
            }
            // If all checks pass, the form is valid
            return true;
        }
    </script>


</body>

</html>