<?php
require 'connection.php';
session_start();
$test=$_POST['test'];
$department=$_POST['department'];
$details=$_POST['details'];
$price=$_POST['price'];
$id=$_SESSION['id'];
$sql="INSERT INTO `hospital_test`(`details`, `price`, `test_id`, `hospital_id`,`department_id`) VALUES ('$details','$price','$test','$id','$department')";
$result=$con->query($sql);
$count=$con->affected_rows;
if($count>0){
	header("location:test.php?status=success");
}
else{
	header("location:test.php?status=failed");
}


?>