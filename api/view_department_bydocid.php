<?php

require 'connection.php';
$data=array();
$hospital_id=$_REQUEST['hospital_id'];
$sql="select * from department where hospital_id=$hospital_id";
$result=$con->query($sql);
$count=$result->num_rows;
if($count>0){
	while($row=$result->fetch_assoc()){
$name=$row['department_name'];
$sql1="select * from dept where name='$name'";
$result1=$con->query($sql1);
$row1=$result1->fetch_assoc();
$file=$row1['file'];

		$data[]=array('id'=>$row['id'],
			          'department'=>$row['department_name'],
			          'file'=>"http://campus.sicsglobal.co.in/Project/Trauma_Care/hospital/uploads/".$file
			      );
	}
	$post=array("status"=>true,
"message"=>"Department Details",
"departmentDetails"=>$data);
}
else{
	$post=array("status"=>false,
"message"=>"No Department Details",
"departmentDetails"=>$data);
}
echo json_encode($post);
?>