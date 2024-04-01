<?php
require 'connection.php';
session_start();
echo "hai";die();
$testid=$_POST['id'];
$test=$_POST['test'];
$details=$_POST['details'];
$price=$_POST['price'];
$sql="UPDATE `hospital_test` SET `details`='$details',`price`='$price',`test_id`='$test' WHERE id=$testid";
$result=$con->query($sql);
if(!$result){
	//header("location:test.php?status=failed");
	echo $sql;die();
}
else{
	header("location:test.php?status=success");
}
?>