<?php
require_once 'dompdf/autoload.inc.php'; 

$quantity=$_POST['quantity'];
$quantity1=$_POST['quantity1'];

$quantity2=$_POST['quantity2'];
$quantity3=$_POST['quantity3'];
$quantity4=$_POST['quantity4'];
$quantity5=$_POST['quantity5'];
$quantity6=$_POST['quantity6'];
$quantity7=$_POST['quantity7'];
$quantity8=$_POST['quantity8'];
$quantity9=$_POST['quantity9'];
$quantity10=$_POST['quantity10'];
$quantity11=$_POST['quantity11'];
$quantity12=$_POST['quantity12'];
$quantity13=$_POST['quantity13'];
$quantity14=$_POST['quantity14'];

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
  $html.='<table class="table1" border="1"><tr><th>Test Description</th><th>Values</th><th>Unit</th><th>Reference Value</th></tr></table>';
  $html.='<br>';

   $html.='<table class="table1" ><tr><th colspan="4">URINE ROUTINE EXAMINATION REPORT</th></tr></table>';
    $html.='<table class="table1"><tr><th colspan="4">PHYSICAL EXAMINATION</th></tr></table>';
     $html.='<table class="table1"><tr><td>Quantity</td><td>'.$quantity.'</td><td>ml</td><td>10</td></tr>
     <tr><td>Colour</td><td>'.$quantity1.'</td><td></td><td>Pale Yellow</td></tr>
     <tr><td>Appearence</td><td>'.$quantity2.'</td><td></td><td>Clear</td></tr>
     <tr><td>Deposit</td><td>'.$quantity3.'</td><td></td><td></td></tr><tr><td>Reaction(pH)</td><td>'.$quantity4.'</td><td></td><td>Acidic</td></tr><tr><td>Specific Gravity</td><td>'.$quantity15.'</td><td></td><td>1.003-1.035</td></tr>
     </table>';
      $html.='<table class="table1"><tr><th colspan="4">CHEMICAL EXAMINATION </th></tr></table>';
        $html.='<table class="table1"><tr><td>Protien</td><td>'.$quantity5.'</td><td>&nbsp;</td><td>Absent</td></tr>
     <tr><td>Glucose</td><td>'.$quantity6.'</td><td>&nbsp;</td><td>Absent</td></tr>
     <tr><td>Occult Blood</td><td>'.$quantity7.'</td><td>&nbsp;</td><td>Absent</td></tr>
     <tr><td>Ketones</td><td>'.$quantity8.'</td><td>&nbsp;</td><td>Absent</td></tr><tr><td>Bile Salt & Pigments</td><td>'.$quantity9.'</td><td>&nbsp;</td><td>Absent</td></tr>
     </table>';
     $html.='<table class="table1" ><tr><th colspan="4">MICROSCOPIC EXAMINATION</th></tr></table>';
      $html.='<table class="table1"><tr><td>Pus cell</td><td>'.$quantity10.'</td><td>/hpf</td><td></td></tr>
     <tr><td>Red Blood Cells</td><td>'.$quantity11.'</td><td colspan="2">/hpf</td></tr>
     <tr><td>Epithelial Cell</td><td>'.$quantity12.'</td><td colspan="2">/hpf</td><td></td></tr>
     <tr><td>Casts</td><td>'.$quantity13.'</td><td colspan="2">/l.p.f</td><td></td></tr><tr><td>Crystals</td><td>'.$quantity14.'</td><td colspan="2">/l.p.f</td><td></td></tr>
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