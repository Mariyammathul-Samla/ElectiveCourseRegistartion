<?php
error_reporting(0);
session_start();
if (!isset($_SESSION['username'])) {
    header("location:login.php");
} elseif ($_SESSION['usertype'] == 'student') {
    header("location:login.php");
}

include 'config.php';
$sql = "SELECT * FROM teacher";
$result = mysqli_query($data, $sql);

if ($_GET['teacher_id']) {
    $t_id = $_GET['teacher_id'];
    $sql2 = "DELETE FROM teacher WHERE id='$t_id'";
    $result2 = mysqli_query($data, $sql2);
    if ($result2) {
        header('location:view_teacher.php');
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

        .small-square-image {
            width: 100px;
            /* Set the desired width for the square image */
            height: 100px;
            /* Set the same height as the width to create a square */
            object-fit: cover;
            /* Maintain aspect ratio and cover the container */
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
                <p class="font-weight-bold">View Teacher</p>
            </div>
            <table border="1">
                <tr>
                    <th>Name</th>
                    <th>About</th>
                    <th>Course</th>
                    <th>Image</th>
                    <th>Delete</th>
                    <th>Update</th>

                </tr>

                <?php
                while ($info = $result->fetch_assoc()) {
                ?>
                    <tr>
                        <td><?php echo "{$info['name']}"; ?></td>
                        <td><?php echo "{$info['description']}"; ?></td>
                        <td><?php echo "{$info['course']}"; ?></td>
                        <td>
                            <img src="<?php echo "{$info['image']}"; ?>" class="small-square-image">
                        </td>
                        <td><?php echo "<a class='btn btn-danger' onclick=\"javascript:return confirm('Are you sure to delete the entry?');\" href='view_teacher.php?teacher_id={$info['id']}'>Delete</a>"; ?></td>

                        <td><?php echo "<a class='btn btn-primary' href='update_teacher.php?teacher_id={$info['id']}'>Update</a>"; ?></td>

                    </tr>
                <?php
                }
                ?>
            </table>
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