<?php
session_start();
require 'connection.php';
$name=$_POST['deptname'];
$id=$_SESSION['id'];
$file=$_POST['file'];
// $upload_dir = 'uploads/';
// $server_url = '/home/ubuntu/html/Project/Trauma_Care/hospital/';
 // $avatar_name = $_FILES["file"]["name"];
    
 //    $avatar_tmp_name = $_FILES["file"]["tmp_name"];
 
 //    $error = $_FILES["file"]["error"];
 //    $random_name = rand(1000,1000000)."-".$avatar_name;
 //        $upload_name = $upload_dir.strtolower($random_name);
 //        $upload_name = preg_replace('/\s+/', '-', $upload_name);


 //         $upload_name= $server_url."/".$upload_name;
         
 //  move_uploaded_file($avatar_tmp_name,$upload_name);
 //            $image= basename($upload_name);

foreach ($name as $key => $value) {
      $sql1="select * from department where department_name='$value' and hospital_id='$id'";
      $result1=$con->query($sql1);
      $count1=$result1->num_rows;
      if($count1>0){
            $sq="update department set department_name='$value',hospital_id='$id' where department_name='$value' and hospital_id='$id' ";
            $res=$con->query($sq);

      }
else{
            $sql="INSERT INTO `department`(`department_name`, `hospital_id`) VALUES ('$value','$id')";
            $result=$con->query($sql);
            $count=$con->affected_rows;
      }
      }
            if($count>0){
            	header("location:department.php?status=success");
            }
            else{
            	//echo $sql;
            	header("location:department.php?status=failed");
            }

?>