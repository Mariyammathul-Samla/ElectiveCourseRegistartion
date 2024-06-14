<?php
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

$sql = "SELECT * from student_data";
$result = mysqli_query($data, $sql);
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1.0">
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
      padding: 10px;
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
      <p class="font-weight-bold">Enrolled Students</p>
    </div>

    <table border="1">
      <tr>
        <th>Name</th>
        <th>USN</th>
        <th>Department</th>
        <th>Semester</th>
        <th>Email</th>
        <th>Phone</th>
        <th>Course</th>
      </tr>

      <?php
      while($info=$result->fetch_assoc()){
      ?>
      <tr>
        <td><?php echo"{$info['name']}"; ?></td>
        <td><?php echo"{$info['usn']}"; ?></td>
        <td><?php echo"{$info['department']}"; ?></td>
        <td><?php echo"{$info['semester']}"; ?></td>
        <td><?php echo"{$info['email']}"; ?></td>
        <td><?php echo"{$info['phone']}"; ?></td>
        <td><?php echo"{$info['course']}"; ?></td>
      </tr>
      <?php
    }
    ?>
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