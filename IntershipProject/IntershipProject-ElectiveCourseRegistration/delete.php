<?php
session_start();
include 'config.php';

if($_GET['student_id']){
    $user_id=$_GET['student_id'];
    $sql="DELETE FROM user WHERE id='$user_id'";
    $result=mysqli_query($data,$sql);
    if($result){
        $_SESSION['message']='Succesfully Deleted';
        header("location:viewstudent.php");
    }
}
?>