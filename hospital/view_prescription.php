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
	SELECT hospital.name,hospital.email,hospital.phone,doctors.doctor_name ,doctors.doctor_email ,doctors.phone as dphone,prescription.craeted_at,patient.name as pname,prescription.age,prescription.medication_details,prescription.additional_information,prescription.dose FROM patient INNER JOIN appointment ON patient.id=appointment.userid INNER JOIN prescription ON prescription.appoinment_id=appointment.id INNER JOIN hospital ON hospital.id=prescription.hospital_id INNER JOIN doctors on appointment.doc_id= doctors.id where appointment.id=$id ";
$result = mysqli_query($connect, $query);
//#3753b8;
$output = "
	<style>
	.table{
		background:#aac99c;
		width:1040px;
		
		color:white;
	}
  .td{
text-align:center;
  }

</style>

";

while($row = mysqli_fetch_array($result))
{
  $date=date('Y-m-d',strtotime($row['created_at']));
   $time=date('h:i:s',strtotime($row['created_at']));
	$output .= '<table class="table"><tr><td colspan="2" class="td"><h2>'.$row['name'].' Hospital</h2></td></tr>
	<tr><td colspan="2" class="td">'.$row['email'].'</td></tr><tr><td colspan="2" class="td">'.$row['phone'].'</td></tr></table>
  
    
     

		
	';
	$output.='<table><tr><td><h2>Name:</h2></td><td><h2>'.$row['pname'].'</h2></td></tr><tr><td><h4>Age:</h4></td><td><h4>'.$row['age'].'</h4></td></tr></table>';

$output.='<table><tr><td><h4>Medication Details:</h4></td><td>'.$row['medication_details'].'</td></tr><tr><td><h4>Additional Information:</h4></td><td>'.$row['additional_information'].'</td></tr>
<tr><td><h4>Dose:</h4></td><td>'.$row['dose'].'</td></tr>
</table>';
$output .='<br><br><br><br><br>';
$output .= '<table class="table"><tr><td colspan="2" class="td"><h2>Doctor Name:'.$row['doctor_name'].'</h2></td></tr>
	<tr><td colspan="2" class="td">'.$row['doctor_email'].','.$row['dphone'].'</td></tr><tr><td colspan="2" class="td">'.$row['craeted_at'].'</td></tr></table>';

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