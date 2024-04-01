<?php
require 'connection.php';
session_start();
$email_id=$_POST['email_id'];
$pass=$_POST['pass'];
$sql="select * from hospital where email='$email_id' and password='$pass' and status=1";
$result=$con->query($sql);
$count=$result->num_rows;
if($count>0){
	$row=$result->fetch_assoc();
	$_SESSION['id']=$row['id'];
	echo 1;

}
else{
	echo 2;
}

?>