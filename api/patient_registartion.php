<?php

require 'connection.php';
$name=$_POST['name'];
$email=$_POST['email'];
$dob=$_POST['dob'];
$blood=$_POST['blood'];
$interested=$_POST['is_interested'];
$gender=$_POST['gender'];
$phone=$_POST['phone'];
$address=$_POST['address'];
$password=$_POST['password'];
$upload_dir = 'uploads/';
$obj=array();
$server_url = '/home/ubuntu/html/Project/Trauma_Care/api/';

 $avatar_name = $_FILES["image"]["name"];
    
    $avatar_tmp_name = $_FILES["image"]["tmp_name"];
 
    $error = $_FILES["image"]["error"];
   
$data=array();
if($interested==true){
	$interested=1;

}
else{
	$interested=0;
}
$sql="select * from patient where phone='$phone'";
$result=$con->query($sql);
$count=$result->num_rows;
if($count>0){
	$data=array("status"=>false,
              "message"=>"User Already Exist");
	}
	else{


		 $random_name = rand(1000,1000000)."-".$avatar_name;
        $upload_name = $upload_dir.strtolower($random_name);
        $upload_name = preg_replace('/\s+/', '-', $upload_name);


         $upload_name= $server_url."/".$upload_name;
         
  move_uploaded_file($avatar_tmp_name,$upload_name);
            $image= basename($upload_name);
          
$sql="INSERT INTO `patient`(`name`, `dob`, `blood_group`, `is_interested_donation`, `gender`, `phone`, `email`, `address`, `password`,`image`) VALUES ('$name','$dob','$blood','$interested','$gender','$phone','$email','$address','$password','$image')";
$result=$con->query($sql);
$count=$con->affected_rows;
$last_id = $con->insert_id;
if($count>0)
{
	


$data=array("status"=>true,
              "message"=>"Registration Success");
//echo 'hai';
}
else{
	$data=array("status"=>false,
              "message"=>"Registration Failed");

	//echo $sql;

}
  // $data=array("status"=>false,
  //             "message"=>"Registration Failed");
  // echo 'hello';
}
echo json_encode($data);

?>