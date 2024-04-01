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

$query = "
	SELECT patient.name,patient.email,patient.dob,patient.address,patient.gender,patient.phone,appointment.date,appointment.id,appointment.timeslot,appointment.doc_id,report.aware_date,report.first_symptoms,report.diagnosis,report.complaints,report.lasttime,report.description,report.treatment,report.admission_date,report.discharge_date,report.created_at ,hospital.name as hname,hospital.email as hemail,hospital.phone as hphone FROM patient INNER JOIN appointment ON patient.id=appointment.userid INNER JOIN report ON report.appointment_id=appointment.id INNER JOIN hospital ON hospital.id=report.hospital_id where appointment.id=$id order by date desc";
$result = mysqli_query($connect, $query);

$output = "
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

";

while($row = mysqli_fetch_array($result))
{
	$output .= '<h1 style="text-align:center; color:red">ILLNESS MEDICAL REPORT</h1><br>
    <h3>INFORMATION ABOUT THE PATIENT</h3><br>
    <table>
    <tr><td>Name:</td><td>'.$row['name'].'</td></tr>
    <tr><td>Address:</td><td>'.$row['address'].'</td></tr>

<tr><td>Date of Birth:</td><td>'.$row['dob'].'</td></tr>
<tr><td>Gender:</td><td>'.$row['gender'].'</td></tr>
<tr><td>Email:</td><td>'.$row['email'].'</td></tr>
<tr><td>Phone:</td><td>'.$row['phone'].'</td></tr>






    </table>
  

		
	';
$doc_id=$row['doc_id'];

$query1 = "
    SELECT * FROM doctors where id=$doc_id
";
$result1 = mysqli_query($connect, $query1);
while($row1 = mysqli_fetch_array($result1))
{


$output .= '
    <h3>DOCTORS DETAILS AND TREATMENT INFORMATIONS</h3><br>
    <table>
    <tr><td>Name:</td><td>'.$row1['doctor_name'].'</td></tr>
    <tr><td>Email:</td><td>'.$row1['doctor_email'].'</td></tr>
  <tr><td>What date was the patient first aware of symptoms/conditions:</td><td>'.$row['aware_date'].'</td></tr>
  <tr><td>First Symptoms:</td><td>'.$row['first_symptoms'].'</td></tr>
  <tr><td>Diagnosis:</td><td>'.$row['diagnosis'].'</td></tr>
  <tr><td>Has the patient previously suffered from the same complaints?:</td><td>'.$row['complaints'].'</td></tr>
  <tr><td>When(Last time):</td><td>'.$row['lasttime'].'</td></tr>
  <tr><td>Breif description of treatment already given:</td><td>'.$row['description'].'</td></tr>
  <tr><td>Reason for referral for specialist treatment :</td><td>'.$row['treatment'].'</td></tr>

    </table>
    <h3>INCASE OF HOSPITAL ADMISSION
    <table>
    <tr><td>Date of Admission :</td><td>'.$row['admission_date'].'</td></tr>
    <tr><td>Anticipated date of discharge :</td><td>'.$row['discharge_date'].'</td></tr>
     <tr><td>Name and address of <b>the hospital </b>:</td><td>'.$row['hname'].'</td></tr>
     <tr><td>Tel :<td>'.$row['hphone'].'</td></tr>
     <tr><td>Email :<td>'.$row['hemail'].'</td></tr>
    </table>



        
    ';
}
}




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