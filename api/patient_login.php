<?php
require 'connection.php';
$phone=$_REQUEST['phone'];
$password=$_REQUEST['password'];
$data=array();
$sql="select * from patient where phone='$phone' and password='$password'";
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
            "message"=>"Login Success",
            "patientDetails"=>$data);
}
else{
	$post=array("status"=>false,
            "message"=>"Login Failed",
            "patientDetails"=>$data);
}
echo json_encode($post);
?>