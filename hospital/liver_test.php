<?php
require_once 'dompdf/autoload.inc.php'; 

$quantity=$_POST['quantity'];
$quantity1=$_POST['quantity1'];

$quantity2=$_POST['quantity2'];
$quantity3=$_POST['quantity3'];
$quantity4=$_POST['quantity4'];
$quantity5=$_POST['quantity5'];

$booking_id=$_POST['booking_id'];
 
// Reference the Dompdf namespace 
use Dompdf\Dompdf; 
 
// Instantiate and use the dompdf class 
$dompdf = new Dompdf();
$connect = mysqli_connect("localhost","root","Neontetra@2021#","trauma_care");
$query = "
  SELECT hospital.name as hname,hospital.email as hemail,hospital.phone as hphone,patient.name as pname,patient.email as pemail,patient.phone as pphone,patient.dob,patient.gender,test_booking.date FROM patient INNER JOIN test_booking ON patient.id=test_booking.patient_id INNER JOIN hospital ON test_booking.hospital_id=hospital.id where test_booking.id=9";
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
    background:#aac99c;
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

$html .='<table class="table"><tr><td colspan="4" class="td"><h2>'.$row['hname'].'</h2></td></tr>
  <tr><td colspan="4" class="td">'.$row['hemail'].'</td></tr><tr><td colspan="4" class="td">'.$row['hphone'].'</td></tr></table> 
  ';
  $html.='<table class="table1" border="1"><tr><td >Patient Name:</td><td>'.$row['pname'].'</td></tr><tr><td>Email:</td><td>'.$row['pemail'].'</td></tr><tr><td>Phone:</td><td>'.$row['pphone'].'</td></tr><tr><td>Age:</td><td>'.$age.'</td></tr><tr><td>Sex:</td><td>'.$row['gender'].'</td></tr><tr><td>Date:</td><td>'.$row['date'].'</td></tr></table>';

   $html.='<table class="table1" ><tr><th colspan="4">LIVER FUNCTION TEST</th></tr></table>';
  $html.='<table class="table1" ><tr><th>Test</th><th>Result</th><th>Unit</th><th>Reference Value</th></tr></table>';
  $html.='<br>';

  
     $html.='<table class="table1">
     <tr><td>Bilurubin Total</td><td>'.$quantity.'</td><td>mg/dL</td><td>Adult:0.1-1.2<br>
     Childres>(1Mon):0.2-1.0<br>
     Neonates(24 hrs):<8.8<br>
     2nd day:1.3-11.3<br>
     3rd day:0.7-12.7<br>
     4-6 days:0.6-12.6</td></tr>
     <tr><td>SGPT(ALT)</td><td>'.$quantity1.'</td><td>U/L</td><td>Up to 43</td></tr>
      <tr><td>SGOT(AST)</td><td>'.$quantity2.'</td><td>U/L</td><td>Up to 38</td></tr>
     <tr><td>Alkaline Phosphatase</td><td>'.$quantity3.'</td><td>U/L</td><td>Adult Male:80-270<br>
        Adult Female:65-240<br>
        Childres(1-12 Years)<727<br>
        Child 13-17 yrs F<483 M<435</td></tr>
     <tr><td>Albumine</td><td>'.$quantity4.'</td><td>g/dL</td><td>3.5-5.5</td></tr>
     <tr><td>Gamma GT</td><td>'.$quantity5.'</td><td>U/L</td><td>Male<55<br>
                  Female<38</td></tr>
                                 
     </table>';
    

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