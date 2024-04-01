<?php
require 'connection.php';
$test_id=$_REQUEST['user_id'];
$data=array();
$sql="SELECT test_booking.id,hospital_test.test_id,hospital_test.id as htid,test_booking.hospital_id,test_booking.date,hospital_test.details,hospital_test.price,hospital.name,test_booking.date,hospital.email,hospital.phone,hospital.building_no,hospital.regno,hospital.street,hospital.district,hospital.state,hospital.landmark,hospital.lattitude,hospital.longitude,hospital.password,hospital.photo
FROM test_booking INNER JOIN  hospital_test on hospital_test.id=test_booking.test_id
INNER JOIN hospital ON hospital_test.hospital_id=hospital.id  where test_booking.patient_id=$test_id order by test_booking.id desc";
$result=$con->query($sql);
$count=$result->num_rows;
if($count>0){
	while($row=$result->fetch_assoc())
	{
//echo $row['id'];
	$tid=$row['test_id'];
	// echo $tid;
	$sq="select * from test where id=$tid";
	$res=$con->query($sq);
	$ro=$res->fetch_assoc();

$teid=$row['id'];
	$sq1="select * from report where test_bookingid=$teid";
	$res1=$con->query($sq1);
	$ro1=$res1->num_rows;
	$rr=$res1->fetch_assoc();
	if($ro1>0){
		$test_report_status=true;
		$test_report="http://campus.sicsglobal.co.in/Project/Trauma_Care/hospital/".$rr['pdffile'];
	}
	else{
		$test_report_status=false;
		$test_report="";
	}


$current=date('Y-m-d');
	$date=$row['date'];
	if($date>$current){
		$test_status='upcoming';
	}
	else{
		$test_status='previous';
	}
		$data[]=array("booking_id"=>$row['id'],

			"testid"=>$row['htid'],
			"test_name"=>$ro['title'],
			"test_image"=>"http://campus.sicsglobal.co.in/Project/Trauma_Care/hospital/uploads/".$ro['image'],
	                 "hospital_id"=>$row['hospital_id'],
	                 "details"=>$row['details'],
	                 "price"=>$row['price'],
	                 "test_date"=>$row['date'],
	                 "hospital_name"=>$row['name'],
	                 "email"=>$row['email'],
	             "building_no"=>$row['building_no'],
	                  "street"=>$row['street'],
	                  "district"=>$row['district'],
	                  "state"=>$row['state'],
	                  "regno"=>$row['regno'],
	                  "lattitude"=>$row['lattitude'],
	                  "longitude"=>$row['longitude'],
	                  "landmark"=>$row['landmark'],
	                  "password"=>$row['password'],
	                  "test_report_status"=>$test_report_status,
	                  "test_status"=>$test_status,
	                  "test_report"=>$test_report,
	                  "photo"=>"http://campus.sicsglobal.co.in/Project/Trauma_Care/registration/uploads/".$row['photo']);
	}
	$post=array("status"=>true,
               "message"=>"Booking Details",
               "hospitalDetails"=>$data);
}
else{
	$post=array("status"=>false,
               "message"=>"No Booking Details",
               "hospitalDetails"=>$data);
}
echo json_encode($post);
?>