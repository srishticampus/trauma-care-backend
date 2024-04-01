<?php
require_once 'dompdf/autoload.inc.php'; 

$main=$_POST['main_content'];
$booking_id=$_POST['booking_id'];
 
// Reference the Dompdf namespace 
use Dompdf\Dompdf; 
 
// Instantiate and use the dompdf class 
$dompdf = new Dompdf();
$connect = mysqli_connect("localhost","root","Neontetra@2021#","trauma_care");
$query = "
  SELECT hospital.name as hname,hospital.email as hemail,hospital.phone as hphone,patient.name as pname,patient.email as pemail,patient.phone as pphone,patient.dob,patient.gender FROM patient INNER JOIN test_booking ON patient.id=test_booking.patient_id INNER JOIN hospital ON test_booking.hospital_id=hospital.id where test_booking.id=9";
$result = mysqli_query($connect, $query);
// Load HTML content 
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
$html = "
  <style>
  .table{
    background:#3753b8;
    width:1040px;
    
    color:white;
  }
  .td{
text-align:center;
  }
  table{
    width:1040px;

  }

</style>

";
$row = mysqli_fetch_array($result);
$dob=date('Y',strtotime($row['dob']));
$current=date('Y');
$age=$current-$dob;

$html .='<table class="table"><tr><td colspan="2" class="td"><h2>'.$row['hname'].'</h2></td></tr>
  <tr><td colspan="2" class="td">'.$row['hemail'].'</td></tr><tr><td colspan="2" class="td">'.$row['hphone'].'</td></tr></table> 
  ';
  $html.='<table class="table1" border="1"><tr><td >Patient Name:</td><td>'.$row['pname'].'</td></tr><tr><td>Email:</td><td>'.$row['pemail'].'</td></tr><tr><td>Phone:</td><td>'.$row['pphone'].'</td></tr><tr><td>Age:</td><td>'.$age.'</td></tr><tr><td>Sex:</td><td>'.$row['gender'].'</td></tr></table>';
  $html.=$main;
$filename = "newpdffile";

$dompdf->loadHtml($html);

// (Optional) Setup the paper size and orientation
$dompdf->setPaper('A4', 'landscape');

// Render the HTML as PDF
$dompdf->render();

$output = $dompdf->output();
 $file_location="uploads/".rand(10,100)."file.pdf";
file_put_contents($file_location, $output);
$sql="INSERT INTO `report`( `test_bookingid`, `pdffile`,`report_status`) VALUES ('$booking_id','$file_location','test')";
$result = mysqli_query($connect, $sql);
header("location:test_booking.php?status=success");

?>