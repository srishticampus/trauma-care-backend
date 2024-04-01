<?php
require 'connection.php';
$id=$_GET['id'];
$sql="update emergency set read_status=1 where id=$id";
$result=$con->query($sql);
if(!$result){
header("location:notification.php?status=failed");
}
else{
	header("location:notification.php?status=success");
}

?>