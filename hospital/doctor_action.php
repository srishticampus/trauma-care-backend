<?php
session_start();
date_default_timezone_set("Asia/Kolkata"); 
require 'connection.php';
$name=$_POST['name'];
$email=$_POST['email'];
$phone=$_POST['phone'];
$department=$_POST['department'];

$degree =$_POST['degree'];
$experience=$_POST['experience'];
$designation=$_POST['designation'];
// $from=$_POST['from'];
// $to=$_POST['to'];
$id=$_SESSION['id'];
$fee=$_POST['fee'];

$upload_dir = 'uploads/';
$server_url = '/home/ubuntu/html/Project/Trauma_Care/hospital/';
 $avatar_name = $_FILES["file"]["name"];
    
    $avatar_tmp_name = $_FILES["file"]["tmp_name"];
 
    $error = $_FILES["file"]["error"];
    $random_name = rand(1000,1000000)."-".$avatar_name;
        $upload_name = $upload_dir.strtolower($random_name);
        $upload_name = preg_replace('/\s+/', '-', $upload_name);


         $upload_name= $server_url."/".$upload_name;
         
  move_uploaded_file($avatar_tmp_name,$upload_name);
            $image= basename($upload_name);

            $days=$_POST['days'];
            $timeslot1=$_POST['timeslot1'];
 $timeslot2=$_POST['timeslot2'];
 $timeslot3=$_POST['timeslot3'];
 $timeslot4=$_POST['timeslot4'];
 $timeslot5=$_POST['timeslot5'];
 $timeslot6=$_POST['timeslot6'];
 $timeslot7=$_POST['timeslot7'];
            

            $sql="INSERT INTO `doctors`(`hospital_id`, `doctor_name`, `doctor_email`, `phone`, `department`, `degree`, `experience`, `file`,`designation`,`payment`) VALUES ($id,'$name','$email','$phone','$department','$degree','$experience','$image','$designation','$fee')";
            $result=$con->query($sql);
           
            $count=$con->affected_rows;
             $last_id = $con->insert_id;
            if($count>0){
      foreach ($days as $value) {
           $s="INSERT INTO `doc_days`(`days`, `doc_id`) VALUES ('$value',$last_id)";
           $r=$con->query($s);
            $lastid = $con->insert_id;

            if($value=='Sunday'){
            	foreach ($timeslot1 as $value1) {
            		  $s1="INSERT INTO `doctor_timeslot`(`doc_id`, `day_id`, `slot`) VALUES ('$last_id','$lastid','$value1')";
           $r1=$con->query($s1);


            }

        }
        else if($value=='Monday'){
            	foreach ($timeslot2 as $value2) {
            		  $s2="INSERT INTO `doctor_timeslot`(`doc_id`, `day_id`, `slot`) VALUES ('$last_id','$lastid','$value2')";
           $r2=$con->query($s2);

            }

        }
        else if($value=='Tuesday'){
            	foreach ($timeslot3 as $value3) {
            		  $s3="INSERT INTO `doctor_timeslot`(`doc_id`, `day_id`, `slot`) VALUES ('$last_id','$lastid','$value3')";
           $r3=$con->query($s3);

            }

        }
         else if($value=='Wednesday'){
            	foreach ($timeslot4 as $value4) {
            		  $s4="INSERT INTO `doctor_timeslot`(`doc_id`, `day_id`, `slot`) VALUES ('$last_id','$lastid','$value4')";
           $r4=$con->query($s4);

            }

        }
        else if($value=='Thursday'){
            	foreach ($timeslot5 as $value5) {
            		  $s5="INSERT INTO `doctor_timeslot`(`doc_id`, `day_id`, `slot`) VALUES ('$last_id','$lastid','$value5')";
           $r5=$con->query($s5);

            }

        }
        else if($value=='Friday'){
            	foreach ($timeslot6 as $value6) {
            		  $s6="INSERT INTO `doctor_timeslot`(`doc_id`, `day_id`, `slot`) VALUES ('$last_id','$lastid','$value6')";
           $r6=$con->query($s6);

            }

        }
         else if($value=='Saturday'){
            	foreach ($timeslot7 as $value7) {
            		  $s7="INSERT INTO `doctor_timeslot`(`doc_id`, `day_id`, `slot`) VALUES ('$last_id','$lastid','$value7')";
           $r7=$con->query($s7);

            }
}
        }
            	header("location:team.php?status=success");
            }
            else{
            	header("location:team.php?status=failed");
            }

?>