<?php
require 'connection.php';
$data=array();
$lattitude=$_REQUEST['lattitude'];
$longitude=$_REQUEST['longitude'];
$rating=0;
$avg=0;
$sql="SELECT `s`.lattitude,`s`.longitude,`s`.name,`s`.email,`s`.phone,`s`.building_no,`s`.street,`s`.district,`s`.state,`s`.regno,`s`.landmark,`s`.password,`s`.created_at,`s`.id,`s`.photo,`s`.description, (((acos(sin(($lattitude*pi()/180)) * sin((s.lattitude*pi()/180))+cos(($lattitude*pi()/180)) * cos((s.lattitude*pi()/180)) * cos((($longitude - s.longitude)*pi()/180))))*180/pi())*60*1.1515*1.609344) AS distance FROM (`hospital` as s) where `s`.status=1 HAVING distance <= 30 ORDER BY `s`.id DESC";
$result=$con->query($sql);
$count=$result->num_rows;
if($count>0){
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
	                   "photo"=>"http://campus.sicsglobal.co.in/Project/Trauma_Care/registration/uploads/".$row['photo'],
	                  "created_at"=>$row['created_at'],
	                  "distance"=>$row['distance'],
	                 "description"=>($row['description']==null)?"":$row['description'],
	              "rating"=>(string)$avg,
	              "rating_count"=>(string)$co);
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
	//echo $sql;
}
echo json_encode($post);
?>