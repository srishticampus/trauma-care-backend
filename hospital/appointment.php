<?php
include 'header.php';
?>
    <!-- Navbar End -->


    <!-- Page Header Start -->
       <style type="text/css">
        div.dataTables_wrapper {
        width: 800px;
        margin: 0 auto;
    }
    </style>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <div class="container-fluid page-header py-5 mb-5 wow fadeIn" data-wow-delay="0.1s">
        <div class="container py-5">
            <h1 class="display-3 text-white mb-3 animated slideInDown">Appointment</h1>
            <nav aria-label="breadcrumb animated slideInDown">
                <ol class="breadcrumb text-uppercase mb-0">
                    <li class="breadcrumb-item"><a class="text-white" href="#">Home</a></li>
                    <li class="breadcrumb-item"><a class="text-white" href="#">Pages</a></li>
                    <li class="breadcrumb-item text-primary active" aria-current="page">Appointment</li>
                </ol>
            </nav>
        </div>
    </div>
    <!-- Page Header End -->


    <!-- Appointment Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="row g-5">
                <div class="col-lg-12 wow fadeInUp" data-wow-delay="0.1s">
                    <p class="d-inline-block border rounded-pill py-1 px-4">Appointment</p>

      

       <div class="container-xxl py-5">
        <div class="container">
            <div class="row g-5">
               <!--  <div class="col-lg-6 wow fadeIn" data-wow-delay="0.1s">
                    <div class="d-flex flex-column">
                        <img class="img-fluid rounded w-75 align-self-end" src="img/about-1.jpg" alt="">
                        <img class="img-fluid rounded w-50 bg-white pt-3 pe-3" src="img/about-2.jpg" alt="" style="margin-top: -25%;">
                    </div>
                </div> -->
                <div class="col-lg-12 wow fadeIn" data-wow-delay="0.5s">
                         
                                    <table id="example" class="display nowrap" style="width:100%">
        <thead>
            <tr>
                 <th>Sl no</th>
                          <th>Patient Name</th>
                          <th> DOB</th>
                          <th>Phone</th> 
                          <th>Address</th>
                          <th>Doctor Name</th>
                          <th>Date</th>
                          <th>Time</th>
                          <th>Appointment Status</th>
                          
                          
                          <th>Action</th>
                          <th></th>
                
            </tr>
        </thead>
        <tbody>
            <?php
            $j=1;
           $sql="SELECT patient.name,patient.email,patient.dob,patient.address,patient.phone,appointment.date,appointment.id,appointment.timeslot,appointment.doc_id FROM patient INNER JOIN appointment ON patient.id=appointment.userid INNER JOIN department ON department.id=appointment.dept_id where appointment.hospital_id=$id order by date desc";
            $result=$con->query($sql);
            $j=1;
            while($row=$result->fetch_assoc()){
              $current=date('Y-m-d');
  $date=$row['date'];
                ?>
                 <tr>
              <td>
                           <?php
                             echo $j++;
                           ?>
                          </td>
                          <td><?php echo $row['name'];?></td>
                             <td><?php echo $row['dob'];?></td>
                                <td><?php echo $row['phone'];?></td>
                                   <td> 
                                    <?php echo $row['address'];?>
                  </td>

                                      <td><?php
$d_id=$row['doc_id'];
$s="select * from doctors where id=$d_id";
$r=$con->query($s);
$ro=$r->fetch_assoc();
echo '&nbsp;';
echo $ro['doctor_name'];
echo '<br>';
echo '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
echo $ro['doctor_email'];
echo '<br>';
echo '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
echo $ro['phone'];
?></td>
<td><?php echo $row['date']?></td>
                             <td><?php echo $row['timeslot']?></td>
                               <td><?php

                               if($date>$current){
    echo 'upcoming';
  }
  else{
    echo 'previous';
  }
                               ?></td>
                                <td>     <button class="btn btn-primary" >

<?php
$app_id=$row['id'];
$s="select * from report where appointment_id=$app_id";
$res=$con->query($s);
$co=$res->num_rows;
if($co>0){
    ?>
    <a href="view_report.php?id=<?php echo $row['id']?>" style="color:white;"  target="_blank">View Report</a>
    <?php
}

else{?>
    <a href="add_report.php?id=<?php echo $row['id']?>" style="color:white;">Add Report</a>
    <?php

}
?>

                                
                            </button></td>
                                   <td>      <button class="btn btn-primary" >


<?php
$app_id=$row['id'];
$s="select * from prescription where appoinment_id=$app_id";
$res=$con->query($s);
$co=$res->num_rows;
if($co>0){
    ?>
    <a href="view_prescription.php?id=<?php echo $row['id']?>" style="color:white;"  target="_blank">View Prescription</a>
    <?php
}

else{?>
    <a href="add_prescription.php?id=<?php echo $row['id']?>" style="color:white;">Add Prescription</a>
    <?php

}
?>



                                </button>
                                <?php
                                 if($date>$current){
                                  ?>
                                  <?php
                                 }
                                 else{
                                  ?>
                                  <button class="btn btn-primary"style="color:white;" ><a href="payment_report.php?id=<?php echo $app_id;?>" target="_blank"style="color:white;"  >View Payment Report</a></button>
                                  <?php
                                 }

                                ?>
                                </td>
                                     
                
            </tr>
                <?php

            }
            ?>
           
        </tbody>
    </table>

                        </div>
                    </div>

                  
                  
                </div>
               
            </div>
        </div>
    </div>
  </div>
</div>

    <!-- Appointment End -->
        

    <!-- Footer Start -->
   <?php
include 'footer.php';
   ?>


     <script type="text/javascript">
      $(document).ready(function () {
    $('#example').DataTable({
        scrollX: true,
    });
});
  </script>


  <script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script>
  <script type="text/javascript" src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>