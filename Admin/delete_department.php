<?php
require 'connection.php';
$id=$_GET['id'];
$sql="delete from dept where id=$id";
$result=$con->query($sql);
if(!$result){
	header("location:view_department.php?status=failed");
}
else{
	header("location:view_department.php?status=success");
}
?>