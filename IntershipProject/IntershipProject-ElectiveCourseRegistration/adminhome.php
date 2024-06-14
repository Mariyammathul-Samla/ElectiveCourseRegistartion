<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("location:login.php");
}
elseif($_SESSION['usertype']=='student'){
    header("location:login.php");

}


$host = "localhost";
$user = "root";
$password = "";
$db = "electivecourse";
$data = mysqli_connect($host, $user, $password, $db);

$sql = "SELECT COUNT(*) AS studentCount from student_data";
$result = mysqli_query($data, $sql);
if($result){
  $row=mysqli_fetch_assoc($result);
  $studentCount=$row["studentCount"];
}else{
  $studentCount="Error";
}

$sql1 = "SELECT COUNT(*) AS Count from user WHERE usertype='student'";
$result1 = mysqli_query($data, $sql1);
if($result1){
  $row1=mysqli_fetch_assoc($result1);
  $studentCount1=$row1["Count"];
}else{
  $studentCount1="Error";
}

$sql2 = "SELECT COUNT(*) AS teacherCount from teacher";
$result2 = mysqli_query($data, $sql2);
if($result2){
  $row2=mysqli_fetch_assoc($result2);
  $teacherCount=$row2["teacherCount"];
}else{
  $teacherCount="Error";
}

$sql3 = "SELECT COUNT(*) AS courseCount from course";
$result3 = mysqli_query($data, $sql3);
if($result3){
  $row3=mysqli_fetch_assoc($result3);
  $courseCount=$row3["courseCount"];
}else{
  $courseCount="Error";
}
$sql4 = "SELECT c.department, c.name AS course_name, COUNT(s.usn) AS studentCount 
         FROM student_data s
         JOIN course c ON s.course = c.code
         GROUP BY c.department, c.name";
$result4 = mysqli_query($data, $sql4);

$chartData = [];

while ($row = mysqli_fetch_assoc($result4)) {
    $department = $row['department'];
    $courseName = $row['course_name'];
    $studentCount = $row['studentCount'];

    // Create a nested associative array to store data by department and course
    if (!isset($chartData[$department])) {
        $chartData[$department] = [];
    }

    // Store student count for each course within the department
    $chartData[$department][$courseName] = $studentCount;
}


// Convert the data to JSON for JavaScript
$chartDataJson = json_encode($chartData);
$departments = array_keys($chartData);

// Create an array to store categories for the X-axis (department names)
$xAxisCategories = [];
// Create an array to store series data for the Y-axis (student counts)
$seriesData = [];

foreach ($departments as $department) {
    $departmentData = $chartData[$department];
    $courses = array_keys($departmentData);
    $studentCounts = array_values($departmentData);

    // Create an array for each course within the department
    $departmentSeriesData = [];
    foreach ($courses as $course) {
        $departmentSeriesData[] = [
            'name' => $course,
            'data' => [$departmentData[$course]],
        ];
    }

    // Add the department and its series data to the chart data arrays
    $xAxisCategories[] = $department;
    $seriesData = array_merge($seriesData, $departmentSeriesData);
}

// Convert the data to JSON for JavaScript
$xAxisCategoriesJson = json_encode($xAxisCategories);
$seriesDataJson = json_encode($seriesData);



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
  </head>
  <body>
  <?php
  include 'adminsidebar.php';
  ?>

      <!-- Main -->
      <main class="main-container">
        <div class="main-title">
          <p class="font-weight-bold">DASHBOARD</p>
        </div>

        <div class="main-cards">

          <div class="card">
            <div class="card-inner">
              <p class="text-primary">Enrolled Students</p>
              <span class="material-icons-outlined text-blue">inventory_2</span>
            </div>
            <span class="text-primary font-weight-bold"><?php echo $studentCount; ?></span>
          </div>

          <div class="card">
            <div class="card-inner">
              <p class="text-primary">Courses</p>
              <span class="material-icons-outlined text-orange">add_shopping_cart</span>
            </div>
            <span class="text-primary font-weight-bold"><?php echo $courseCount; ?></span>
          </div>

          <div class="card">
            <div class="card-inner">
              <p class="text-primary">Total Students</p>
              <span class="material-icons-outlined text-green">shopping_cart</span>
            </div>
            <span class="text-primary font-weight-bold"><?php echo $studentCount1; ?></span>
          </div>

          <div class="card">
            <div class="card-inner">
              <p class="text-primary">Teachers</p>
              <span class="material-icons-outlined text-red">notification_important</span>
            </div>
            <span class="text-primary font-weight-bold"><?php echo $teacherCount; ?></span>
          </div>

        </div>

        <div class="charts">
          <div class="charts-card">
            <p class="chart-title">Course Enroll Statistics</p>
            <div> <div id="chart-container"></div></div>
          </div>

        </div>
      </main>
      <!-- End Main -->

    </div>

    <!-- Scripts -->
    <!-- ApexCharts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/apexcharts/3.35.3/apexcharts.min.js"></script>
    <!-- Custom JS -->
    <!-- <script src="admin.js"></script> -->
     <!-- Add a container for the chart -->
    

     <script>
    var xAxisCategories = <?php echo $xAxisCategoriesJson; ?>;
    var seriesData = <?php echo $seriesDataJson; ?>;

    var options = {
        chart: {
            type: 'bar',
            height: '400px',
            width: '1000px',
        },
        xaxis: {
            categories: xAxisCategories,
        },
        plotOptions: {
            bar: {
                horizontal: false,
                barWidth: '40%', // Adjust the bar width as needed (e.g., '40%' or a specific number like 20)
            },
        },
        series: seriesData,
    };

    var chart = new ApexCharts(document.querySelector("#chart-container"), options);
    chart.render();
</script>

  </body>
</html>