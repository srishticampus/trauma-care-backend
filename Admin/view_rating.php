<?php
include 'header.php';

?>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap4.min.css">
        <!-- partial -->
        <div class="main-panel">
          <div class="content-wrapper">
            <div class="page-header">
              <h3 class="page-title">Rating and Reviews</h3>
              <nav aria-label="breadcrumb">
                <!-- <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="#"></a></li>
                  <li class="breadcrumb-item active" aria-current="page">Department</li>
                </ol> -->
              </nav>
            </div>
            <div class="row">
            
              <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Rating and Reviews</h4>
                    <!-- <p class="card-description"> Add class <code>.table-striped</code>
                    </p> -->
                    <table id="example" class="table table-striped table-bordered" style="width:50%">                      <thead>
                        <tr>
                          <th> # </th>
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

                   
                        <?php
                        $i=1;
                      $sql="SELECT patient.name as pname,patient.email as pemail,patient.phone as pphone,feedback.rating,feedback.review,hospital.name as hname,hospital.email as hemail,hospital.phone as hphone,hospital.building_no FROM feedback INNER JOIN hospital ON feedback.hospital_id=hospital.id INNER JOIN patient on feedback.userid=patient.id";
                      $result=$con->query($sql);
                      while ( $row=$result->fetch_assoc()) {
                        ?>
                           <tbody>
                        <tr>
                          <td class="py-1">
                           <?php
echo $i++;
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
                        </tbody>
                        <?php
                      }

                      ?>
                        
                        
                      
                    </table>
                  </div>
                </div>
              </div>
              
              
          
            </div>
          </div>
          <!-- content-wrapper ends -->
          <!-- partial:../../partials/_footer.html -->
          <footer class="footer">
            <div class="container-fluid d-flex justify-content-between">
              <span class="text-muted d-block text-center text-sm-start d-sm-inline-block"></span>
              <span class="float-none float-sm-end mt-1 mt-sm-0 text-end"> </span>
            </div>
          </footer>
          <!-- partial -->
        </div>
        <!-- main-panel ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="assets/vendors/js/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="assets/js/off-canvas.js"></script>
    <script src="assets/js/hoverable-collapse.js"></script>
    <script src="assets/js/misc.js"></script>
    


<script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap4.min.js"></script>
    <script type="text/javascript" >
  $(document).ready(function () {
    $('#example').DataTable({
        scrollX: true,
    });
});
    </script>
    <!-- endinject -->
    <!-- Custom js for this page -->
    <!-- End custom js for this page -->
  </body>
</html>