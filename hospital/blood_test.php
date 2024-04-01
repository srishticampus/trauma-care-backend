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
$quantity15=$_POST['quantity15'];
$quantity16=$_POST['quantity16'];
$quantity17=$_POST['quantity17'];

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

   $html.='<table class="table1" ><tr><th colspan="4">COMPLETE BLOOD COUNT</th></tr></table>';
  $html.='<table class="table1" ><tr><th>Test Name</th><th>Result</th><th>Normal Range</th><th>Unit</th></tr></table>';
  $html.='<br>';

  
     $html.='<table class="table1"><tr><td>Hemoglobin</td><td>'.$quantity.'</td><td>11.0-16.0</td><td>g/dL</td></tr>
                                   <tr><td>RBC</td><td>'.$quantity1.'</td><td>3.5-5.50</td><td>10^6/uL</td></tr>
                                   <tr><td>HCT</td><td>'.$quantity2.'</td><td>37.0-50.0</td><td>%</td></tr>
                                  <tr><td>MCV</td><td>'.$quantity3.'</td><td>82-95</td><td>fl</td></tr>
                                  <tr><td>MCH</td><td>'.$quantity4.'</td><td>27-31</td><td>pg</td></tr>
                                  <tr><td>MCHC</td><td>'.$quantity5.'</td><td>32.0-36.0</td><td>g/dL</td></tr>
                                   <tr><td>RDW-CV</td><td>'.$quantity6.'</td><td>11.5-14.5</td><td>%</td></tr>
                                    <tr><td>RDW-SD</td><td>'.$quantity7.'</td><td>35-35</td><td>fl</td></tr>
                                     <tr><td>WBC</td><td>'.$quantity8.'</td><td>4.5-11</td><td>10^3/uL</td></tr>
                                      <tr><td>NEU%</td><td>'.$quantity9.'</td><td>40-70</td><td>%</td></tr>
                                       <tr><td>LYM%</td><td>'.$quantity10.'</td><td>20-45</td><td>%</td></tr>
                                        <tr><td>MON%</td><td>'.$quantity11.'</td><td>2-10</td><td>%</td></tr>
                                         <tr><td>EOS%</td><td>'.$quantity12.'</td><td>1-6</td><td>%</td></tr>
                                          <tr><td>BAS%</td><td>'.$quantity13.'</td><td>0-2</td><td>%</td></tr>
                                      <tr><td>LYM#</td><td>'.$quantity14.'</td><td>1.5-4.0</td><td>10^3/uL</td></tr>
                                      <tr><td>GRA#</td><td>'.$quantity15.'</td><td>2.0-7.5</td><td>10^3/uL</td></tr>
                                      <tr><td>PLT</td><td>'.$quantity16.'</td><td>150-450</td><td>10^3/uL</td></tr>
                                      <tr><td>ESR</td><td>'.$quantity17.'</td><td>Up to 15</td><td>mm/hr</td></tr>
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