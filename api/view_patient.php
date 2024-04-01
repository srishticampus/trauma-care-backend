<?php
require 'connection.php';
$id=$_REQUEST['id'];
$data=array();
$sql="select * from patient where id=$id";
$result=$con->query($sql);
$count=$result->num_rows;
if($count>0){

	while($row=$result->fetch_assoc()){
	$data[]=array("id"=>$row['id'],
                   "name"=>$row['name'],
                   "dob"=>$row['dob'],
                   "blood"=>$row['blood_group'],
                   "is_interested"=>$row['is_interested_donation'],
                   "gender"=>$row['gender'],
                   "phone"=>$row['phone'],
                   "email"=>$row['email'],
                   "address"=>$row['address'],
                   "password"=>$row['password'],
                   "image"=>"http://campus.sicsglobal.co.in/Project/Trauma_Care/api/uploads/".$row['image']);

}
$post=array("status"=>true,
            "message"=>"Patient Details",
            "patientDetails"=>$data);
}
else{
	$post=array("status"=>false,
            "message"=>"Not Found",
            "patientDetails"=>$data);
}
echo json_encode($post);
?>