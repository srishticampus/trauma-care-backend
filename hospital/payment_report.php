<?php
//index.php
//include autoloader

require_once 'dompdf/autoload.inc.php';
$id=$_GET['id'];
// echo $id;

// reference the Dompdf namespace

use Dompdf\Dompdf;

//initialize dompdf class

$document = new Dompdf();

$html = '
  <style>
table {
    font-family: arial, sans-serif;
    border-collapse: collapse;
    width: 100%;
}

td, th {
    border: 1px solid #dddddd;
    text-align: left;
    padding: 8px;
}

tr:nth-child(even) {
    background-color: #dddddd;
}
</style>

';

//$document->loadHtml($html);
$page = file_get_contents("cat.html");

//$document->loadHtml($page);

$connect = mysqli_connect("localhost","root","Neontetra@2021#","trauma_care");

$query = "SELECT hospital.name as hname,hospital.email as hemail,hospital.id as hid,hospital.phone as hphone,patient.name as pname,patient.email as pemail,patient.phone as pphone,patient.id as pid,patient.dob,patient.gender,doctors.doctor_name,doctors.department ,doctors.doctor_email,doctors.payment ,doctors.phone as dphone,patient.name as pname,doctors.payment,appointment.date FROM patient INNER JOIN appointment ON patient.id=appointment.userid  INNER JOIN hospital on hospital.id=appointment.hospital_id INNER JOIN  doctors on appointment.doc_id= doctors.id where appointment.id=$id";
 //echo $query;die();
$result = mysqli_query($connect, $query);
//#3753b8

$output = "
  <style>
  .table{
    background:#aac99c;
    width:1040px;
    
    color:white;
  }
  .table1{
     width:1040px;
  }
  .td{
text-align:center;
  }

</style>

";
$sum=0;
$patient=0;
$hospital=0;
while($row = mysqli_fetch_array($result))
{
$dob=date('Y',strtotime($row['dob']));
$current=date('Y');
$age=$current-$dob;
$patient=$row['pid'];
$hospital=$row['hid'];




$d_id=$row['department'];
$s="select * from department where id=$d_id ";

$result1 = mysqli_query($connect, $s);
$row1 = mysqli_fetch_array($result1);
$department_name=$row1['department_name'];

$sum+=$row['payment'];
 
  $output .= '<table class="table"><tr><td colspan="2" class="td"><h2>'.$row['hname'].'</h2></td></tr>
  <tr><td colspan="2" class="td">'.$row['hemail'].'</td></tr><tr><td colspan="2" class="td">'.$row['hphone'].'</td></tr></table> 
  ';
 $output .= '<table class="table1" border="1"><tr><td >Patient Name:</td><td>'.$row['pname'].'</td></tr><tr><td>Email:</td><td>'.$row['pemail'].'</td></tr><tr><td>Phone:</td><td>'.$row['pphone'].'</td></tr><tr><td>Age:</td><td>'.$age.'</td></tr><tr><td>Sex:</td><td>'.$row['gender'].'</td></tr><tr><td>Doctors Name:</td><td>'.$row['doctor_name'].'</td></tr><tr><td>Specialist:</td><td>'.$department_name.'</td></tr>
 <tr><td>Fee:</td><td>'.$row['payment'].'</td></tr><tr><td>Date:</td><td>'.$row['date'].'</td></tr></table>';
}
 $query2 = "SELECT test.title,hospital_test.price,test_booking.date  FROM test_booking INNER JOIN hospital_test ON test_booking.test_id=hospital_test.id  INNER JOIN test on hospital_test.test_id=test.id where test_booking.patient_id=$patient and test_booking.hospital_id=$hospital";
//echo $query2;die();
$result2 = mysqli_query($connect, $query2);

 $output .= '<table class="table1" border="1"><tr><td colspan="2"><h3>Hospital Test</h3></td></tr></table>';
while($row2 = mysqli_fetch_array($result2)){
  $sum+=$row2['price'];
   $output .= '<table class="table1" border="1"><tr><td>Date</td><td>'.$row2['date'].'</td></tr> <tr><td>'.$row2['title'].'</td><td>'.$row2['price'].'</td></tr></table>';

}
$output .= '<table class="table1" border="1"><tr><td rowspan="8"><h4>Total Paid:</h4></td><td rowspan="8"><h4>'.$sum.'</h4></td></tr></table>';






//echo $output;

$document->loadHtml($output);

//set page size and orientation

$document->setPaper('A4', 'landscape');

//Render the HTML as PDF

$document->render();

//Get output of generated pdf in Browser

$document->stream("Webslesson", array("Attachment"=>0));
//1  = Download
//0 = Preview


?>