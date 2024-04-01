<?php

require 'connection.php';
$userid=$_REQUEST['userid'];
$hospital_id=$_REQUEST['hospital_id'];
$department_id=$_REQUEST['department_id'];
$doctor_id=$_REQUEST['doctor_id'];
$date=$_REQUEST['date'];
$timeslot=$_REQUEST['timeslot'];
// $sql="select * from `appointment` where `hospital_id`='$hospital_id' and `dept_id`='$department_id' and date='$date' and timeslot='$timeslot' ";
// $result=$con->query($sql);
// 	$count=$result->num_rows;
// 	if($count>0){
// 		$data=array("status"=>false,
//                 "message"=>'Already booked');
// 	}
// 	else{

$sql="INSERT INTO `appointment`(`userid`, `hospital_id`, `dept_id`, `doc_id`, `date`, `timeslot`) VALUES ('$userid','$hospital_id','$department_id','$doctor_id','$date','$timeslot')";
$result=$con->query($sql);
$count=$con->affected_rows;
if($count>0){
	$data=array("status"=>true,
                "message"=>'Appointment successfull');
}
else{
	 $data=array("status"=>false,
                "message"=>'Appointment failed');

}
//}
echo json_encode($data);
?>