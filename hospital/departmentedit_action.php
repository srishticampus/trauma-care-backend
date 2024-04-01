<?php

require 'connection.php';
session_start();
$id=$_POST['id'];
$deptname=$_POST['deptname'];
$sql="UPDATE `department` SET `department_name`='$deptname' WHERE id=$id";
$result=$con->query($sql);
if(!$result){
	header("location:department.php?status=failed");
}
else{
	header("location:department.php?status=success");
}
?>