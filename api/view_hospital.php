<?php
require 'connection.php';
$data=array();
$sql="select * from hospital where status=1";
$result=$con->query($sql);
$count=$result->num_rows;

if($count>0){
	$rating=0;
	$avg=0;

	while ( $row=$result->fetch_assoc()) {
		$rating=0;
		$id=$row['id'];
		$sq="select * from feedback where hospital_id=$id";
		$res=$con->query($sq);
		 $co=$res->num_rows;

	while($ro=$res->fetch_assoc()){

		$rating=$rating+$ro['rating'];
	
		 $avg=$rating/$co;
		 $avg=round($avg, 2);   
		}

		$data[]=array("id"=>$row['id'],
	                  "name"=>$row['name'],
	                  "email"=>$row['email'],
	                  "phone"=>$row['phone'],
	                  "building_no"=>$row['building_no'],
	                  "street"=>$row['street'],
	                  "district"=>$row['district'],
	                  "state"=>$row['state'],
	                  "regno"=>$row['regno'],
	                  "lattitude"=>$row['lattitude'],
	                  "longitude"=>$row['longitude'],
	                  "landmark"=>$row['landmark'],
	                  "password"=>$row['password'],
	                  "description"=>($row['description']==null)?"":$row['description'],
	                  "photo"=>"http://campus.sicsglobal.co.in/Project/Trauma_Care/registration/uploads/".$row['photo'],
	                  "rating"=>$avg,
	                  "created_at"=>$row['created_at']);
		$rating=0;
	$avg=0;


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