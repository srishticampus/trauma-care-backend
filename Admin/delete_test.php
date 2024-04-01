<?php
require 'connection.php';
$id=$_GET['id'];
$sql="delete from test where id=$id";
$result=$con->query($sql);
if(!$result){
	header("location:view_test.php?status=failed");
}
else{
	header("location:view_test.php?status=success");
	//echo $sql;die();
}
?>