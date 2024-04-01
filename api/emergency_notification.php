<?php
require 'connection.php';
date_default_timezone_set("Asia/Kolkata"); 
$data=array();
$lattitude=$_REQUEST['lattitude'];
$longitude=$_REQUEST['longitude'];
$place=$_REQUEST['place'];
$message=$_REQUEST['message'];
$hospital_id=$_REQUEST['hospital_id'];
$user_id=$_REQUEST['user_id'];
$sql="INSERT INTO `emergency`(`lattitude`, `longitude`, `place`,`message`,`hospital_id`,`user_id`) VALUES ('$lattitude','$longitude','$place','$message',$hospital_id,$user_id)";
$result=$con->query($sql);
$count=$con->affected_rows;
if($count>0){
	$data=array("status"=>true,
               "message"=>'Notification send successfull');
}
else{
	$data=array("status"=>false,
               "message"=>'Notification send failed');
	//echo $sql;
}
echo json_encode($data);

?>