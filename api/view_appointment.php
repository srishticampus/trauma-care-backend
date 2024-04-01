<?php
require 'connection.php';
$appointment_id=$_REQUEST['appointment_id'];
$data=array();
$sql="select * from appointment where id=$appointment_id";
$result=$con->query($sql);
$count=$result->num_rows;
if($count>0){
	$row=$result->fetch_assoc();
	$userid=$row['userid'];
	$hospital_id=$row['hospital_id'];
	$doc_id=$row['doc_id'];
	$department=$row['dept_id'];
	$sql1="select * from patient where id=$userid";
$result1=$con->query($sql1);
$row1=$result1->fetch_assoc();
$sql2="select * from hospital where id=$hospital_id";
$result2=$con->query($sql2);
$row2=$result2->fetch_assoc();
$sql3="select * from doctors where id=$doc_id";
$result3=$con->query($sql3);
$row3=$result3->fetch_assoc();
$sql4="select * from department where id=$department";
$result4=$con->query($sql4);
$row4=$result4->fetch_assoc();

$sql5="select * from report where appointment_id=$appointment_id";
$result5=$con->query($sql5);
$count5=$result5->num_rows;
$rstatus=false;
if($count5>0){
$rstatus=true;	
}
else{
	$rstatus=false;
}

	

	$data[]=array("appointment_id"=>$row['id'],
	              "userid"=>$row['userid'],
	              "username"=>$row1['name'],

	              "hospital_id"=>$row['hospital_id'],
	              "hospital_name"=>$row2['name'],
	              "hospital_phone"=>$row2['phone'],
	              "department"=>$row['dept_id'],
	              "doctor_id"=>$row['doc_id'],
	              "department"=>$row4['department_name'],
	              "doc_name"=>$row3['doctor_name'],
	              "doc_email"=>$row3['doctor_email'],
	               "doc_phone"=>$row3['phone'],
	              "date"=>$row['date'],
	              "timeslot"=>$row['timeslot'],
	              "report_status"=>$rstatus,
	              "report"=>"http://campus.sicsglobal.co.in/Project/Trauma_Care/hospital/view_report.php?id=".$appointment_id
	          );
	$post=array("status"=>true,
               "message"=>"Appointment listed",
               "appointmentDetails"=>$data);

}
else{
	$post=array("status"=>false,
               "message"=>"No Appointment",
               "appointmentDetails"=>$data);
}
echo json_encode($post);
?>