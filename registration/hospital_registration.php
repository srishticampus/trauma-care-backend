<?php
require 'connection.php';
$name=$_POST['name'];
$email=$_POST['email'];
$phone=$_POST['phone'];
$bno=$_POST['bno'];
$street=$_POST['street'];
$city=$_POST['city'];
$district=$_POST['district'];
$state=$_POST['state'];
$regno=$_POST['regno'];
$lat=$_POST['lat'];
$long=$_POST['long'];
$landmark=$_POST['landmark'];
$password=$_POST['password'];
$description=$_POST['description'];
$upload_dir = 'uploads/';
$server_url = '/home/ubuntu/html/Project/Trauma_Care/registration/';
$sql="select * from `hospital` where email='$email'";
$result=$con->query($sql);
$count=$result->num_rows;
if($count>0){
	//echo 3;
	header("location:index.php?status=failed");
}
else{

	 $avatar_name = $_FILES["file"]["name"];
    
            $avatar_tmp_name = $_FILES["file"]["tmp_name"];
 
            $error = $_FILES["file"]["error"];
            $random_name = rand(1000,1000000)."-".$avatar_name;
            $upload_name = $upload_dir.strtolower($random_name);
            $upload_name = preg_replace('/\s+/', '-', $upload_name);


            $upload_name= $server_url."/".$upload_name;
         
            move_uploaded_file($avatar_tmp_name,$upload_name);
            $image= basename($upload_name);
$sql="INSERT INTO `hospital`(`name`, `email`, `phone`, `building_no`, `street`, `district`, `state`, `regno`, `lattitude`, `longitude`, `landmark`, `password`,`photo`,`description`) VALUES ('$name','$email','$phone','$bno','$street','$district','$state','$regno','$lat','$long','$landmark','$password','$image','$description')";
$result=$con->query($sql);
$count=$con->affected_rows;
if($count>0){
	header("location:index.php?status=success");
}
else{
	header("location:index.php?status=failed");
	//echo $sql;
}
}
?>