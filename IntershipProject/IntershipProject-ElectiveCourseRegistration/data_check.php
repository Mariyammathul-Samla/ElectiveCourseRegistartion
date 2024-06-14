<?php
error_reporting(0);
session_start();
$host="localhost";
$user="root";
$password="";
$db="electivecourse";
$data=mysqli_connect($host,$user,$password,$db);

if($data===false){
    die("connection error");
}
if(isset($_POST['apply'])){
    $name = $_POST['name'];
    $usn = $_POST["usn"];
    $department = $_POST["department"];
    $semester = $_POST["semester"];
    $email = $_POST["email"];
    $phone = $_POST["phone"];
    $selectedCourseValue = $_POST["course"];

    
    $courseNames = array(
        "ME" => "Non-Conventional Energy Sources(18ME651)",
        "CIV" => "Remote Sensing and GIS (18CV651)",
        "PLC" => "PLC and SCADA (18EE652)",
        "Renewable" => "Renewable Energy Sources (18EE653)",
        "VLSI" => "Basic VLSI Design (18EC655)",
        "OS" => "Introduction to Operating Systems (18CS656)",
    );
    $selectedCourseName = $courseNames[$selectedCourseValue];

    $sql="INSERT INTO student_data (name, usn, department, semester, email, phone, course) VALUES ('$name', '$usn', '$department', '$semester', '$email', '$phone', '$selectedCourseName')";

    $result=mysqli_query($data,$sql);
    if($result){
        $_SESSION['message']="Successfully Registered";
        header("location:studenthome.php");
    }else{
        echo"failed";
    }
}