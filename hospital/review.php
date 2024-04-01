<?php
include 'header.php';
$id=$_SESSION['id'];
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
<!-- 
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css"> -->
<!-- <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap4.min.css"> -->
   <div class="container-fluid page-header py-5 mb-5 wow fadeIn" data-wow-delay="0.1s">
        <div class="container py-5">
            <h1 class="display-3 text-white mb-3 animated slideInDown">Reviews</h1>
            <nav aria-label="breadcrumb animated slideInDown">
                <ol class="breadcrumb text-uppercase mb-0">
                    <li class="breadcrumb-item"><a class="text-white" href="#">Home</a></li>
                    <li class="breadcrumb-item"><a class="text-white" href="#">Pages</a></li>
                    <li class="breadcrumb-item text-primary active" aria-current="page">Reviews</li>
                </ol>
            </nav>
        </div>
    </div>
    <!-- Page Header End -->


    <!-- Appointment Start -->
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
                          <th>Name</th>
                          <th> Email</th>
                          <th>Phone</th> 
                          <th>Rating</th>
                          <th>Reviews</th>
                          <th>Hospital Name</th>
                          <th> Hospital Email</th>
                          <th>Hospital Phone</th>
                          <th>Building No</th>
                          
                          <th>Action</th>
                
            </tr>
        </thead>
        <tbody>
            <?php
            
            $sql="SELECT patient.name as pname,patient.email as pemail,patient.phone as pphone,feedback.rating,feedback.review,hospital.name as hname,hospital.email as hemail,hospital.phone as hphone,hospital.building_no FROM feedback INNER JOIN hospital ON feedback.hospital_id=hospital.id INNER JOIN patient on feedback.userid=patient.id where hospital.id=$id";
            $result=$con->query($sql);
            $j=1;
            while($row=$result->fetch_assoc()){
                ?>
                 <tr>
              <td>
                           <?php
                             echo $j++;
                           ?>
                          </td>
                          <td><?php echo $row['pname'];?></td>
                             <td><?php echo $row['pemail'];?></td>
                                <td><?php echo $row['pphone'];?></td>
                                   <td> <?php
                for ($i = 1; $i <= 5; $i++) {
                  $ratingClass = "btn-default btn-grey";
                  if($i <= $row['rating']) {
                    $ratingClass = "btn-warning";
                  }
                ?>
                  <button type="button" class="btn btn-xs <?php echo $ratingClass; ?>" aria-label="Left Align">
                  <span class="fa fa-star" aria-hidden="true"></span>
                </button>               
                <?php } ?></td>
                                      <td><?php echo $row['review'];?></td>
                             <td><?php echo $row['hname'];?></td>
                                <td><?php echo $row['hemail'];?></td>
                                   <td><?php echo $row['hphone'];?></td>
                                      <td><?php echo $row['building_no'];?></td>
                                      
                        
                           
                          <td> </td>
                
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