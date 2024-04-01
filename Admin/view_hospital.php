<?php
include 'header.php';

?>


<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap4.min.css">
        <!-- partial -->
        <div class="main-panel">
          <div class="content-wrapper">
            <div class="page-header">
              <h3 class="page-title">List of Hospitals</h3>
              <nav aria-label="breadcrumb">
                <!-- <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="#"></a></li>
                  <li class="breadcrumb-item active" aria-current="page">Department</li>
                </ol> -->
              </nav>
            </div>
             <button type="button" class="btn btn-primary"><a href="../hospital/all_revenue.php" target="_blank" style="color: white;"> View All Revenue Details</a></button>

                 <br>
            <br>
            <div class="row">
              
              



              <div class="col-lg-12 grid-margin stretch-card">

                <div class="card">
                  <div class="card-body">


                   <!--  <h4 class="card-title">Hospitals</h4> -->
                    <!-- <p class="card-description"> Add class <code>.table-striped</code>
                    </p> -->
                    <table id="example" class="table table-striped table-bordered" style="width:50%">                      <thead>
                        <tr>
                          <th> # </th>
                          <th>Name</th>
                          <th> Email</th>
                          <th>Phone</th>
                          <th>Building No</th>
                          <th>Street</th>
                          <th>District</th>
                          <th>State</th>
                          <th>Register no</th>
                          <th>Lattitude</th>
                          <th>Longitude</th>
                          <th>Landmark</th>
                          <th>Photo</th>
                          <th>Action</th>
                           <th>Action</th>
                        </tr>
                      </thead>
 <tbody>
                   
                        <?php
                        $i=1;
                      $sql="select *  from hospital";
                      $result=$con->query($sql);
                      while ( $row=$result->fetch_assoc()) {
                        ?>
                          
                        <tr>
                          <td class="py-1">
                           <?php
echo $i++;
                           ?>
                          </td>
                          <td><?php echo $row['name'];?></td>
                             <td><?php echo $row['email'];?></td>
                                <td><?php echo $row['phone'];?></td>
                                   <td><?php echo $row['building_no'];?></td>
                                      <td><?php echo $row['street'];?></td>
                             <td><?php echo $row['district'];?></td>
                                <td><?php echo $row['state'];?></td>
                                   <td><?php echo $row['regno'];?></td>
                                      <td><?php echo $row['lattitude'];?></td>
                                         <td><?php echo $row['longitude'];?></td>
                                            <td><?php echo $row['landmark'];?></td>
                                               
                          <td>  <img src="http://campus.sicsglobal.co.in/Project/Trauma_Care/registration/uploads/<?php echo $row['photo'];?>" alt="image" /> </td>
                         
                           
                          <td><!-- <a href="delete_hospital.php?id=<?php echo $row['id']?>">Delete</a>  -->
                            <a href="accept_hospital.php?id=<?php echo $row['id']?>"><?php if($row['status']==1){
                              echo 'Accepted';}
                              else{ echo 'Accept';
                              }?></a> |
                             <a href="reject_hospital.php?id=<?php echo $row['id']?>"><?php if($row['status']==2){
                              echo 'Rejected';}
                              else{ echo 'Reject';
                              }?></a> 
                          </td>
                          <td><a target="_blank" href="../hospital/view_revenue.php?id=<?php echo $row['id']?>">View Revenue</td>
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