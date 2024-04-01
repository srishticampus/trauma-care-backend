<?php
require 'connection.php';
$hospital_id=$_REQUEST['hospital_id'];
$test_id=$_REQUEST['test_id'];
$rating=0;
 $avg=0;
$data=array();
$sql="SELECT patient.name,patient.image,feedback.rating,feedback.review,feedback.id,feedback.userid,feedback.hospital_id
FROM feedback
INNER JOIN patient ON feedback.userid=patient.id INNER JOIN test_booking ON feedback.test_id=test_booking.id where feedback.hospital_id=$hospital_id and feedback.test_id=$test_id";

$result=$con->query($sql);
$count=$result->num_rows;
if($count>0){
	while($row=$result->fetch_assoc()){
			$rating=$rating+$row['rating'];
	
		 $avg=$rating/$count;
		 $data[]=array("id"=>$row['id'],
		             "name"=>$row['name'],
		             "image"=>"http://campus.sicsglobal.co.in/Project/Trauma_Care/api/uploads/".$row['image'],
		             "rating"=>$row['rating'],
		             "review"=>$row['review']);

		

	}
	$post =array("status"=>true,
                "message"=>"Rating Details Listed",
                "totalRating"=>$rating,
                "ratingCount"=>$count,
                "averageRating"=>$avg,
                "ratingDetails"=>$data);
}
else{
	$post =array("status"=>false,
                "message"=>"No Rating Details Listed",
                "totalRating"=>$rating,
                "ratingCount"=>$count,
                "averageRating"=>$avg,
                "ratingDetails"=>$data);
}
echo json_encode($post);

?>