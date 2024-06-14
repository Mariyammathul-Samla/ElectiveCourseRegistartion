<?php
// Include your database connection code here
include 'config.php'; // Replace with the actual file that contains your database connection


    $selectedDepartment = $_POST['department'];

    // Query the database to fetch courses for the selected department
    $sql = "SELECT * FROM course WHERE department != '$selectedDepartment'";
    $result = mysqli_query($data, $sql);

    if ($result) {
        // Generate HTML options for the "Select Course" dropdown
        $courseOptions = '';
        while ($row = mysqli_fetch_assoc($result)) {
            $courseCode = $row['code'];
            $courseName = $row['name'];
            $availabilitySql = "SELECT COUNT(*) AS enrolled_students FROM student_data WHERE course = '$courseCode'";
            $availabilityResult = mysqli_query($data, $availabilitySql);

            if ($availabilityResult) {
                $enrolledStudents = mysqli_fetch_assoc($availabilityResult)['enrolled_students'];
                $seatLimit = $row['seat'];

                if ($enrolledStudents < $seatLimit) {
                    // Add the course to the dropdown if seats are available
                    $courseOptions .= "<option value='$courseCode'>$courseName</option>";
                }
            }
        }

        // Return the HTML options as the response
        echo $courseOptions;
    } else {
        // Handle the query error if needed
        echo '<option value="">No courses found</option>';
    }

?>
