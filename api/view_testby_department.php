<?php
require 'connection.php';
$department_id=$_REQUEST['department_id'];
$hospital_id=$_REQUEST['hospital_id'];
$data=array();
$sql="SELECT hospital_test.id,hospital_test.hospital_id,test.title,test.image,hospital_test.price
FROM hospital_test
INNER JOIN hospital ON hospital_test.hospital_id=hospital.id INNER JOIN test on test.id=hospital_test.test_id  where hospital_test.hospital_id=$hospital_id and hospital_test.department_id=$department_id";
$result=$con->query($sql);
$count=$result->num_rows;
if($count>0){
	while($row=$result->fetch_assoc()){
		$data[]=array("id"=>$row['id'],
	                 "hospital_id"=>$row['hospital_id'],
	                 
	                 "title"=>$row['title'],
	                 "price"=>$row['price'],
	                
	                
	                  "image"=>"http://campus.sicsglobal.co.in/Project/Trauma_Care/hospital/uploads/".$row['image']);
	}
	$post=array("status"=>true,
               "message"=>"Test Listed",
               "testDetails"=>$data);
}
else{
	$post=array("status"=>false,
               "message"=>"no test found",
               "testDetails"=>$data);
}
echo json_encode($post);
?>