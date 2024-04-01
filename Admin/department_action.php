<?php

require 'connection.php';
$name=$_POST['name'];

$upload_dir = 'uploads/';
$server_url = '/home/ubuntu/html/Project/Trauma_Care/hospital/';
 $avatar_name = $_FILES["img"]["name"];
    
            $avatar_tmp_name = $_FILES["img"]["tmp_name"];
 
            $error = $_FILES["img"]["error"];
            $random_name = rand(1000,1000000)."-".$avatar_name;
            $upload_name = $upload_dir.strtolower($random_name);
            $upload_name = preg_replace('/\s+/', '-', $upload_name);


            $upload_name= $server_url."/".$upload_name;
         
            move_uploaded_file($avatar_tmp_name,$upload_name);
            $image= basename($upload_name);
$sql="INSERT INTO `dept`(`name`, `file`) VALUES ('$name','$image')";
$result=$con->query($sql);
$count=$con->affected_rows;
if($count>0){
	header("location:add_department.php?status=success");
}
else{
	header("location:add_department.php?status=failed");
}
?>