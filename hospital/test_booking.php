<?php
include 'header.php';
$id=$_SESSION['id'];
?>
    <!-- Navbar End -->
    <style type="text/css">
        div.dataTables_wrapper {
        width: 800px;
        margin: 0 auto;
    }
    </style>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">


    <!-- Page Header Start -->
    <div class="container-fluid page-header py-5 mb-5 wow fadeIn" data-wow-delay="0.1s">
        <div class="container py-5">
            <h1 class="display-3 text-white mb-3 animated slideInDown">Test Booking</h1>
            <nav aria-label="breadcrumb animated slideInDown">
                <ol class="breadcrumb text-uppercase mb-0">
                    <li class="breadcrumb-item"><a class="text-white" href="#">Home</a></li>
                    <li class="breadcrumb-item"><a class="text-white" href="#">Test</a></li>
                    <li class="breadcrumb-item text-primary active" aria-current="page">Bookings</li>
                </ol>
            </nav>
        </div>
    </div>
    <!-- Page Header End -->


    <!-- Team Start -->
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
                <th>#</th>
                <th>Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Test name</th>
                <th>Date</th>
                <th>Price</th>
                <th></th>
                
            </tr>
        </thead>
        <tbody>
            <?php
            $i=1;
            $sql="SELECT patient.name as pname,patient.email as pemail,patient.phone as pphone,test.title,test_booking.date,test_booking.id as bid,hospital_test.price FROM test INNER JOIN hospital_test ON test.id=hospital_test.test_id INNER JOIN test_booking on hospital_test.id=test_booking.test_id INNER join patient on test_booking.patient_id=patient.id where test_booking.hospital_id=$id";
            $result=$con->query($sql);
            while($row=$result->fetch_assoc()){
                ?>
                 <tr>
                <td><?php echo $i++;?></td>
                <td><?php echo $row['pname'];?></td>
                <td><?php echo $row['pemail'];?></td>
                <td><?php echo $row['pphone'];?></td>
                <td><?php echo $row['title'];?></td>
                <td><?php echo $row['date'];?></td>
                <td><?php echo $row['price'];?></td>
                <th>

<?php
$bid=$row['bid'];
$sql1="select * from report where report_status='test' and test_bookingid=$bid";
$result1=$con->query($sql1);
$count1=$result1->num_rows;
if($count1>0){
    $row1=$result1->fetch_assoc();
    echo '<a href='.$row1['pdffile'].' target="_blank"> View PDF</a>';
}
else{
    echo '<a href="test_report.php?id='.$row['bid'].'"> Add Report</a>';
}

?>



</th>
                
            </tr>
                <?php

            }
            ?>
           
        </tbody>
    </table>
                        
                    </div>
                </div>
                <br><br>
          
               
                
            
            </div>
        </div>
    </div>

    <!-- Team End -->
        

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