<?php
require 'connection.php';
session_start();
$id=$_GET['id'];
$s="select * from appointment where id=$id";
$r=$con->query($s);
$ro=$r->fetch_assoc();
$userid=$ro['userid'];
$sql="delete from appointment where id=$id";
$result=$con->query($sql);
$sql1="delete from patient where id=$userid";
$result1=$con->query($sql1);
if(!$result){
	header("location:view_users.php?status=failed");
}
else{
	header("location:view_users.php?status=success");
}
?>