<?php
require 'connection.php';
$data=array();
$timeslot=array();

$doctor_id=$_REQUEST['doctor_id'];
$i=1;


$sql="select * from doc_days where doc_id=$doctor_id";
$result=$con->query($sql);
$count=$result->num_rows;
if($count>0){


	while($row=$result->fetch_assoc()){
		$id=$row['id'];
	$s="select * from doctor_timeslot where day_id=$id";
	$r=$con->query($s);
$timeslot=array();

// while ($i <= 10) {
while ($ro=$r->fetch_assoc()) {

	
	$timeslot[]=array("slot"=>$ro['slot']);
};


$nextMonday = new \DateTime(date('Y-m-d') . ' this week '.$row['days'].'');
$date= $nextMonday->format('Y-m-d');
for ($i=1 ; $i<=9 ; $i++) {
 $nextMonday->add(new DateInterval('P7D'));
 $date= $nextMonday->format('Y-m-d');

// $current=date('Y-m-d');

// echo $d;
	// $date=date('Y-m-d', strtotime('this week '.$row['days'].''));
	// if($current>$date){
	// 	$date=date('Y-m-d', strtotime('next week '.$row['days'].''));
	// }


	$data[]=array("days"=>$row['days'],
		         "date"=>$date,
                 "timeSlot"=>$timeslot);
	$i++;
}}





// }
usort($data, function ($a, $b) {
							return [$a['date']]
								<=>
								[$b['date']];
						});
$post=array("status"=>true,
            "message"=>"Timeslot",
            "schedule"=>$data);}
else{

	$post=array("status"=>false,
            "message"=>"Not Found",
            "schedule"=>$data);
}

echo json_encode($post);

 function compareDate($date1, $date2){
        return strtotime($date1) - strtotime($date2);
    }
?>

 
