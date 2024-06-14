<?php
error_reporting(0);
session_start();
// if (!isset($_SESSION['username'])) {
//   header("location:login.php");
// } elseif ($_SESSION['usertype'] == 'student') {
//   header("location:login.php");
// }

$host = "localhost";
$user = "root";
$password = "";
$db = "electivecourse";
$data = mysqli_connect($host, $user, $password, $db);

$sql = "SELECT * from user where usertype='student'";
$result = mysqli_query($data, $sql);
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1.0">
  <!-- Add Bootstrap CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

<!-- Add Bootstrap JavaScript (jQuery and Popper.js are required) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

  <title>Admin Dashboard</title>

  <?php
  include 'admin_css.php';
  ?>
  <style>
    table {
      border-collapse: collapse;
      width: 100%;
      margin-bottom: 20px;
    }

    table,
    th,
    td {
      border: 1px solid #ccc;
    }

    th,
    td {
      padding: 20px;
      text-align: left;
    }

    th {
      background-color: #f2f2f2;
    }

    tr:nth-child(even) {
      background-color: #f2f2f2;
    }

    tr:hover {
      background-color: #ddd;
    }
   
  </style>
</head>

<body>
  <?php
  include 'adminsidebar.php';
  ?>

  <!-- Main -->
  <main class="main-container">
    <div class="main-title">
      <p class="font-weight-bold">All Students</p>
    </div>
    <?php
        if( $_SESSION['message']){
            echo  $_SESSION['message'];
        }
        unset( $_SESSION['message']);
    ?>

    <table border="1">
      <tr>
        <th>USN</th>
        <th>Phone</th>
        <th>Email</th>
        <th>Delete</th>
        <th>Update</th>
      </tr>

      <?php
      while($info=$result->fetch_assoc()){
      ?>
      <tr>
        <td><?php echo"{$info['username']}"; ?></td>
        <td><?php echo"{$info['phone']}"; ?></td>
        <td><?php echo"{$info['email']}"; ?></td>
        <td><?php echo"<a class='btn btn-danger' onclick=\"javascript:return confirm('Are you sure to delete the entry?');\" href='delete.php?student_id={$info['id']}'>Delete</a>"; ?></td>
        <td><?php echo"<a class='btn btn-primary' href='update.php?student_id={$info['id']}'>Update</a>"; ?></td>

      </tr>
      <?php
    }
    ?>
    </table>
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