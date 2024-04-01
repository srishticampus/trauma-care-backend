<?php
require 'connection.php';
$data=array();

$hospital_id=$_REQUEST['hospital_id'];
$sql="SELECT * FROM `doctors` WHERE hospital_id=$hospital_id";
$result=$con->query($sql);
$count=$result->num_rows;

if($count>0){
	while ( $row=$result->fetch_assoc()) {
		$department=$row['department'];
		 $sql1="select * from department where id=$department";

                $result1=$con->query($sql1);
            $row1=$result1->fetch_assoc();
		$data[]=array("id"=>$row['id'],
	                  "hospital_id"=>$row['hospital_id'],
	                  "doctor_name"=>$row['doctor_name'],
	                  "doctor_email"=>$row['doctor_email'],
	                  "phone"=>$row['phone'],
	                  "department_id"=>$row['department'],
	                  "degree"=>$row['degree'],
	                  "experience"=>$row['experience'],
	                  "consultation_fee"=>$row['payment'],
	                  "from"=>$row['from_time'],
	                  "to"=>$row['to_time'],
	                  "file"=>"http://campus.sicsglobal.co.in/Project/Trauma_Care/hospital/uploads/".$row['file'],
	                  "department_name"=>$row1['department_name']);

	}
	$post=array("status"=>true,
                "message"=>"Doctor Details",
                "doctorDetails"=>$data);
	
}
else{
	$post=array("status"=>false,
                "message"=>"No Doctor Details",
                "doctorDetails"=>$data);
}
echo json_encode($post);
?>