<?php

require 'connection.php';
$data=array();
$sql="select * from test";
$result=$con->query($sql);
$count=$result->num_rows;
if($count>0){
	while($row=$result->fetch_assoc()){
		$data[]=array("id"=>$row['id'],
	                  "title"=>$row['title'],
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