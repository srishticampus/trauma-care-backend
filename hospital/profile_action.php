<?php
require 'connection.php';
session_start();
$id=$_SESSION['id'];
$name=$_POST['name'];
$email=$_POST['email'];
$phone=$_POST['phone'];
$bno=$_POST['bno'];
$street=$_POST['street'];
$city=$_POST['city'];
$district=$_POST['district'];
$state=$_POST['state'];
$regno=$_POST['regno'];
$lat=$_POST['lattitude'];
$long=$_POST['longitude'];
$landmark=$_POST['landmark'];
$password=$_POST['password'];
$description=$_POST['description'];
$upload_dir = 'uploads/';
$server_url = '/home/ubuntu/html/Project/Trauma_Care/registration/';

if($_FILES["file"]["name"]==""){
	$sq="select * from `hospital` where id='$id'";
$res=$con->query($sq);
$co=$res->num_rows;

	$ro=$res->fetch_assoc();
	$photo=$ro['photo'];
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
            $photo= basename($upload_name);
        }
            $sql="UPDATE `hospital` SET `name`='$name',`email`='$email',`phone`='$phone',`building_no`='$bno',`street`='$street',`district`='$district',`state`='$state',`regno`='$regno',`lattitude`='$lat',`longitude`='$long',`landmark`='$landmark',`password`='$password',`photo`='$photo',`description`='$description' WHERE id=$id ";
            $result=$con->query($sql);
            if(!$result){
            	header("location:profile.php?status=failed");
            }
            else{
            	header("location:profile.php?status=success");
            }
