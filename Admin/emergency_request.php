<?php
include 'header.php';

?>


<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap4.min.css">
        <!-- partial -->
        <div class="main-panel">
          <div class="content-wrapper">
            <div class="page-header">
              <h3 class="page-title">Emergency Request</h3>
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

                   <!--  <h4 class="card-title">Hospitals</h4> -->
                    <!-- <p class="card-description"> Add class <code>.table-striped</code>
                    </p> -->
                    <table id="example" class="table table-striped table-bordered" style="width:50%">                      <thead>
                        <tr>
                          <th>Slno</th>
                <th>Place</th>
                <th>Message</th>
                <th>Hospital Name</th>
                <th>Patient Name</th>
                <th>Patient Email</th>
                <th>Patient Phone</th>
                <th>Action</th>
                        </tr>
                      </thead>
 <tbody>
                   
                        <?php
                        $i=1;
                      $sql="select *  from `emergency`";
                      $result=$con->query($sql);
                      while ( $row=$result->fetch_assoc()) {
                          $userid=$row['user_id'];
                          $hospital=$row['hospital_id'];
                    // $name=$row['department_name'];
                    $sql1="select * from patient where id='$userid'";
                    $result1=$con->query($sql1);
                    $row1=$result1->fetch_assoc();

                     $sql2="select * from hospital where id='$hospital'";
                    $result2=$con->query($sql2);
                    $row2=$result2->fetch_assoc();
                        ?>
                          
                        <tr>
                          <td><?php echo $i++;?></td>
                <td><?php echo $row['place']?></td>
                <td><?php echo $row['message'];?></td>
                 <td><?php echo $row2['name'];?></td>
                <td><?php echo $row1['name'];?></td>
                <td><?php echo $row1['email'];?></td>
                <td><?php echo $row1['phone'];?></td>
               
                <td><?php if($row['read_status']==0)echo 'Read';
                else
                    echo 'Readed';?></td>
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