<?php
require 'connection.php';
$test_id=$_REQUEST['test_id'];
$data=array();
$sql="SELECT hospital_test.id,hospital_test.hospital_id,hospital_test.details,hospital_test.price,hospital.name,hospital.email,hospital.building_no,hospital.street,hospital.district,hospital.state,hospital.regno,hospital.lattitude,hospital.longitude,hospital.landmark,hospital.password,hospital.photo
FROM hospital_test
INNER JOIN hospital ON hospital_test.hospital_id=hospital.id  where hospital_test.test_id=$test_id";
$result=$con->query($sql);
$count=$result->num_rows;
if($count>0){
	while($row=$result->fetch_assoc()){
		$data[]=array("testid"=>$row['id'],
	                 "hospital_id"=>$row['hospital_id'],
	                 "details"=>$row['details'],
	                 "price"=>$row['price'],
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
	                  "photo"=>"http://campus.sicsglobal.co.in/Project/Trauma_Care/registration/uploads/".$row['photo']);
	}
	$post=array("status"=>true,
               "message"=>"Hospital Details",
               "hospitalDetails"=>$data);
}
else{
	$post=array("status"=>false,
               "message"=>"No Hospital Details",
               "hospitalDetails"=>$data);
}
echo json_encode($post);
?>