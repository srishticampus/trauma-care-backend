<?php
require 'connection.php';
session_start();
$id=$_GET['id'];
$sql="delete from hospital_test where id=$id";
$result=$con->query($sql);

if(!$result){
	header("location:test.php?status=failed");
}
else{
	header("location:test.php?status=success");
}

?>