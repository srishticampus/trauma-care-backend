<?php
require 'connection.php';
session_start();
$id=$_SESSION['id'];
$appoinment_id=$_POST['appoinment_id'];
$doctor=$_POST['doctor'];
$userid=$_POST['userid'];
$age=$_POST['age'];
$medication=$_POST['medication'];
$dose=$_POST['dose'];
$additional_info=$_POST['additional_info'];
$sql="INSERT INTO `prescription`( `hospital_id`, `doctor_id`, `patient_id`, `age`, `medication_details`, `additional_information`,`dose`,`appoinment_id`) VALUES ('$id','$doctor','$userid','$age','$medication','$additional_info','$dose','$appoinment_id')";
$result=$con->query($sql);
$count=$con->affected_rows;
if($count>0){
	header("location:add_prescription.php?id=".$appoinment_id."&status=success");
}
else{
	header("location:add_prescription.php?id=".$appoinment_id."&status=failed");
}

?>