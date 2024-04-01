<?php
require 'connection.php';
$phone=$_POST['phone'];
$dob=$_POST['dob'];
$dob=date('d-m-Y',strtotime($dob));
$sql="select * from patient where dob='$dob' and phone='$phone'";
$result=$con->query($sql);
$count=$result->num_rows;
if($count>0){
	echo 1;

}
else{
	echo 0;
}

?>