<?php
// error_reporting(0);
session_start();
$host = "localhost";
$user = "root";
$password = "";
$db = "electivecourse";
$conn = new mysqli($host, $user, $password, $db);



// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $name = $_POST['name'];
    $usn = $_POST["usn"];
    $department = $_POST["department"];
    $semester = $_POST["semester"];
    $email = $_POST["email"];
    $phone = $_POST["phone"];
    $course = $_POST["course"];

    // $selectedCourseValue = $_POST["course"];

    // // Define an associative array to map course values to their names
    // $courseNames = array(
    //     "MECH" => "MECH",
    //     "CIVIL" => "CIVIL",
    //     "PLC" => "PLC",
    //     "Renewable" => "Renewable",
    //     "VLSI" => "VLSI",
    //     "OS" => "OS"
    // );
    
    // $selectedCourseName = $courseNames[$selectedCourseValue];

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }else{
        $stmt = $conn->prepare("INSERT INTO student_data (name, usn, department, semester, email, phone, course) VALUES (?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("sssisss", $name, $usn, $department, $semester, $email, $phone, $course);
       

    try {
        // Attempt to execute the SQL statement
        $stmt->execute();
        // echo "Successfully Registered";

        $message= "Registered Successfully!!";
            $_SESSION['loginMessage']=$message;
            header("location:register.php");
        $stmt->close();
        $conn->close();
    } catch (mysqli_sql_exception $e) {
        if ($e->getCode() === 1062) {
            // Duplicate key error (USN already exists)
            $message= "USN already exists!!";
            $_SESSION['loginMessage']=$message;
            header("location:register.php");
        } else {
            // Other SQL error
            echo "Error: " . $e->getMessage();
        }
        $stmt->close();
        $conn->close();
    }
}
}
?>