<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("location:login.php");
} elseif ($_SESSION['usertype'] == 'admin') {
    header("location:login.php");
}
// Include your database connection code here
include 'config.php';

// Query to fetch remaining seats for each course
$sql = "SELECT
            c.id AS course_id,
            c.name AS course_name,
            c.seat AS total_seats,
            COUNT(s.usn) AS enrolled_students,
            c.seat - COUNT(s.usn) AS remaining_seats
        FROM
            course c
        LEFT JOIN
            student_data s ON c.code = s.course
        GROUP BY
            c.id";

$result = mysqli_query($data, $sql);
 // Close the database connection
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
        body{
            overflow: hidden;
        }
        .teacher-image {
            width: 100%;
            height: 200px;
            /* Set the desired height for the image within the card */
            object-fit: cover;
            /* Makes the image cover the entire container while maintaining its aspect ratio */
        }
        .custom-margin {
            margin-bottom: 10px; /* Adjust the value to control the margin as per your preference */
        }

        .row {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            margin: 50px;
        }

        .column {
            margin: 10px;
        }

        .card-body {
            text-align: center;
            background-color: #eee;
        }     

        .card-body p {
            font-size: 12px;
        }

        .card-body h5 {
            font-size: 18px;
        }
        table {
        width: 100%;
        border-collapse: collapse;
        margin: 20px 0;
        font-size: 16px;
    }

    th, td {
        border: 1px solid #ddd;
        padding: 8px;
        text-align: left;
    }

    th {
        background-color: #f2f2f2;
        font-weight: bold;
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
    <div class="container">
        <?php
        include 'studentsidebar.php';
        ?>

        <section class="main">
            <h1 style="text-align:center;">Availability</h1>
            <div class="container">
                <?php
                // Your PHP code for fetching and displaying the table here
                if ($result) {
                    echo "<table>
                            <tr>
                                <th>Course Name</th>
                                <th>Total Seats</th>
                                <th>Enrolled Students</th>
                                <th>Remaining Seats</th>
                            </tr>";

                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "<tr>";
                        echo "<td>" . $row['course_name'] . "</td>";
                        echo "<td>" . $row['total_seats'] . "</td>";
                        echo "<td>" . $row['enrolled_students'] . "</td>";
                        echo "<td>" . $row['remaining_seats'] . "</td>";
                        echo "</tr>";
                    }

                    echo "</table>";
                } else {
                    echo "Error: " . mysqli_error($data);
                }
                ?>
            </div>
        </section>
    </div>
</body>


</html>
