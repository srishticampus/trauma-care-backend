<?php
require 'connection.php';
$phone=$_POST['phone'];
$dob=date('d-m-Y',strtotime($_POST['dob']));
$password=$_POST['password'];
$sql="update patient set password='$password' where phone='$phone' and dob='$dob'";
$result=$con->query($sql);
if(!$result){
	echo 0;
}
else{
	echo 1;
}

?>