<?php
include 'header.php';

?>
        <!-- partial -->
        <div class="main-panel">
          <div class="content-wrapper">
            <div class="page-header">
              <h3 class="page-title">Test </h3>
              <nav aria-label="breadcrumb">
              
              </nav>
            </div>
            <div class="row">
             
              <div class="col-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    
                    
                    <form class="forms-sample" action="test_action.php" method="post" enctype="multipart/form-data">
                     <!--  <div class="form-group">
                        <label for="exampleInputName1">Department</label>
                        <select class="form-control" name="department" id="exampleInputName1" placeholder="Department">
                          <option value="">Select Department</option>
                          <?php
$sq="select * from dept";
$res=$con->query($sq);
while($ro=$res->fetch_assoc()){
  ?>
<option value="<?php echo $ro['id'];?>"><?php echo $ro['name'];?></option>
  <?php
}
                          ?>
                        </select>
                      </div> -->
                      <div class="form-group">
                        <label for="exampleInputName1">Test Name</label>
                        <input type="text" class="form-control" name="name" id="exampleInputName1" placeholder="Name">
                      </div>
                      
                      <div class="form-group">
                        <label>Image upload</label>
                        <input type="file" name="img" class="file-upload">
                       <!--  <div class="input-group col-xs-12">
                          <input type="text" class="form-control file-upload-info" disabled placeholder="Upload Image">
                          <span class="input-group-append">
                            <button class="file-upload-browse btn btn-gradient-primary" type="button">Upload</button>
                          </span>
                        </div> -->
                      </div>
                     
                      <button type="submit" class="btn btn-gradient-primary me-2">Submit</button>
                      <button class="btn btn-light">Cancel</button>
                    </form>
                  </div>
                </div>
              </div>
             
             
             
             
              
              
            </div>
          </div>
          <!-- content-wrapper ends -->
          <!-- partial:../../partials/_footer.html -->
          <footer class="footer">
           
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
    <script src="assets/vendors/chart.js/Chart.min.js"></script>
    <script src="assets/js/jquery.cookie.js" type="text/javascript"></script>
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="assets/js/off-canvas.js"></script>
    <script src="assets/js/hoverable-collapse.js"></script>
    <script src="assets/js/misc.js"></script>
    <!-- endinject -->
    <!-- Custom js for this page -->
    <script src="assets/js/dashboard.js"></script>
    <script src="assets/js/todolist.js"></script>
    <!-- End custom js for this page -->
  </body>
</html>