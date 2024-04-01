<?php
require 'connection.php';
$userid=$_REQUEST['userid'];
$rating=$_REQUEST['rating'];
$review=$_REQUEST['review'];
$data=array();
$hospital_id=$_REQUEST['hospital_id'];
$sql="INSERT INTO `feedback`(`userid`, `rating`, `review`, `hospital_id`) VALUES ($userid,$rating,'$review',$hospital_id)";
$result=$con->query($sql);
$count=$con->affected_rows;
if($count>0)
{
	$data=array("status"=>true,
                "message"=>"Rating added successull");
}
else{
	$data=array("status"=>false,
                "message"=>"Rating added failed");

}
echo json_encode($data);

?>