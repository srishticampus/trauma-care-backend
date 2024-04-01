<?php
require 'connection.php';
$hospital_id=$_REQUEST['hospital_id'];
$rating=0;
 $avg=0;
$data=array();
$sql="SELECT patient.name,patient.image,feedback.rating,feedback.review,feedback.id,feedback.userid,feedback.hospital_id
FROM feedback
INNER JOIN patient ON feedback.userid=patient.id where feedback.hospital_id=$hospital_id";

$result=$con->query($sql);
$count=$result->num_rows;
if($count>0){
	while($row=$result->fetch_assoc()){
			$rating=$rating+$row['rating'];
	
		 $avg=$rating/$count;
		 $avg=round($avg, 2); 
		 $data[]=array("id"=>$row['id'],
		             "name"=>$row['name'],
		             "image"=>"http://campus.sicsglobal.co.in/Project/Trauma_Care/api/uploads/".$row['image'],
		             "rating"=>(string)$row['rating'],
		             "review"=>$row['review']);

		

	}
	$post =array("status"=>true,
                "message"=>"Rating Details Listed",
                "totalRating"=>(string)$rating,
                "ratingCount"=>(string)$count,
                "averageRating"=>(string)$avg,
                "ratingDetails"=>$data);
}
else{
	$post =array("status"=>false,
                "message"=>"No Rating Details Listed",
                "totalRating"=>(string)$rating,
                "ratingCount"=>(string)$count,
                "averageRating"=>(string)$avg,
                "ratingDetails"=>$data);
}
echo json_encode($post);

?>