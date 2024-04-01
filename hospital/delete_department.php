<?php
require 'connection.php';
$id=$_GET['id'];
$sql="delete from department where id=$id";
$result=$con->query($sql);
if(!$result){
	header("location:department.php?status=failed");
}
else{
	header("location:department.php?status=success");
}
?>