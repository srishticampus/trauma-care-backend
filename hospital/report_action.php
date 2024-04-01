<?php
require 'connection.php';
session_start();
$id=$_SESSION['id'];
$doctor=$_POST['doctor'];
$aware_date=$_POST['aware_date'];
$first_symptoms=$_POST['first_symptoms'];
$diagnosis=$_POST['diagnosis'];
$complaints=$_POST['complaints'];
$lasttime=$_POST['lasttime'];
$description=$_POST['description'];
$treatment=$_POST['treatment'];
$admission_date=$_POST['admission_date'];
$discharge_date=$_POST['discharge_date'];
$appoinment_id=$_POST['appoinment_id'];
$sql="INSERT INTO `report`(`hospital_id`, `appointment_id`, `doctor`, `aware_date`, `first_symptoms`, `diagnosis`, `complaints`, `lasttime`, `description`, `treatment`, `admission_date`, `discharge_date`) VALUES ('$id','$appoinment_id','$doctor','$aware_date','$first_symptoms','$diagnosis','$complaints','$lasttime','$description','$treatment','$admission_date','$discharge_date')";
$result=$con->query($sql);
$count=$con->affected_rows;
if($count>0){
	header("location:appointment.php?status=success");
}
else{
	header("location:appointment.php?status=failed");
	//echo $sql;
}




?>