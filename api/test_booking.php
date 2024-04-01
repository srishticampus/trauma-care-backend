<?php

require 'connection.php';
$date=$_REQUEST['date'];
$time="";
$test_id=$_REQUEST['test_id'];
$hospital_id=$_REQUEST['hospital_id'];
$patient_id=$_REQUEST['patient_id'];
// $sql="select * from `test_booking` where `hospital_id`='$hospital_id' and `patient_id`='$patient_id' and date='$date'";
// $result=$con->query($sql);
// 	$count=$result->num_rows;
// 	if($count>0){
// 		$data=array("status"=>false,
//                 "message"=>'Already booked');
// 	}
// 	else{
$sql="INSERT INTO `test_booking`(`date`, `time`, `test_id`, `hospital_id`, `patient_id`) VALUES ('$date','$time','$test_id','$hospital_id','$patient_id')";
$result=$con->query($sql);
$count=$con->affected_rows;
if($count>0){
	$data=array("status"=>true,
                "message"=>"Booking successfull");
}
else{
	$data=array("status"=>false,
               "message"=>"Booking Failed");
}
//}
echo json_encode($data);
?>