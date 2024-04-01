<?php

require 'connection.php';
$password=$_POST['password'];
$email=$_POST['email'];

$sql="update hospital set password='$password' where email='$email'";
$result=$con->query($sql);
if(!$result){
	//header("location:forgot_password.php?status=failed");
	echo 0;
}
else{
	//header("location:index.php?status=success");
	echo 1;
	//echo $sql;
}
?>