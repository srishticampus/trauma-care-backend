<?php
require 'connection.php';
session_start();
$id=$_GET['id'];
$sql="delete from doctors where id=$id";
$result=$con->query($sql);
$sql1="delete from doc_days where doc_id=$id";
$result1=$con->query($sql1);
$sql2="delete from doctor_timeslot where doc_id=$id";
$result2=$con->query($sql2);
if(!$result){
	header("location:team.php?status=failed");
}
else{
	header("location:team.php?status=success");
}

?>