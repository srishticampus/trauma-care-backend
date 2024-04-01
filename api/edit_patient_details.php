<?php

require 'connection.php';
$id=$_POST['id'];
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
if($_FILES["image"]["name"]==""){
	$sql1="select * from patient where phone='$phone'";
$result1=$con->query($sql1);
$count1=$result1->num_rows;
$row1=$result1->fetch_assoc();
$image=$row1['image'];

}
else{
$server_url = '/home/ubuntu/html/Project/Trauma_Care/api/';

 $avatar_name = $_FILES["image"]["name"];
    
    $avatar_tmp_name = $_FILES["image"]["tmp_name"];
 
    $error = $_FILES["image"]["error"];
     $random_name = rand(1000,1000000)."-".$avatar_name;
        $upload_name = $upload_dir.strtolower($random_name);
        $upload_name = preg_replace('/\s+/', '-', $upload_name);


         $upload_name= $server_url."/".$upload_name;
         
  move_uploaded_file($avatar_tmp_name,$upload_name);
            $image= basename($upload_name);
}
   
$data=array();
if($interested==true){
	$interested=1;

}
else{
	$interested=0;
}
$sql="UPDATE `patient` SET `name`='$name',`dob`='$dob',`blood_group`='$blood',`is_interested_donation`='$interested',`gender`='$gender',`phone`='$phone',`email`='$email',`address`='$address',`password`='$password',`image`='$image' WHERE id=$id";
$result=$con->query($sql);
if(!$result){
	$data=array("status"=>false,
                 "message"=>"Updated Failed");
}
else{
	$data=array("status"=>true,
                 "message"=>"Updated Successfull");
}
echo json_encode($data);

?>