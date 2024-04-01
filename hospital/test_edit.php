<?php
include 'header.php';
$id=$_SESSION['id'];
$test=$_GET['id'];
?>
    <!-- Navbar End -->


    <!-- Page Header Start -->
    <div class="container-fluid page-header py-5 mb-5 wow fadeIn" data-wow-delay="0.1s">
        <div class="container py-5">
            <h1 class="display-3 text-white mb-3 animated slideInDown">Test Edit</h1>
            <nav aria-label="breadcrumb animated slideInDown">
                <ol class="breadcrumb text-uppercase mb-0">
                    <li class="breadcrumb-item"><a class="text-white" href="#">Home</a></li>
                    <li class="breadcrumb-item"><a class="text-white" href="#">Pages</a></li>
                    <li class="breadcrumb-item text-primary active" aria-current="page">Test</li>
                </ol>
            </nav>
        </div>
    </div>
    <!-- Page Header End -->


    <!-- Team Start -->
    <div class="container-xxl py-5">
        <div class="container">

             <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.5s">
                    <div class="bg-light rounded h-100 d-flex align-items-center p-5">
                        <form method="post" action="edittest.php">
                             <?php
                            $sql="select * from  hospital_test inner join test on test.id=hospital_test.test_id where hospital_test.id=$test";
                            $result=$con->query($sql);
                            $row=$result->fetch_assoc();


                            ?>
                            <div class="row g-3">


                                <div class="col-12 col-sm-12">
                                    
                                  
                                    <select class="form-control border-0" name="department" id="department" style="height: 55px;">
                                        <option>Select department</option>
                                        <?php
                                        $selected = "";
                                        $sql1="select dept.id,department.department_name from department inner join dept on dept.name=department.department_name where hospital_id=$id";
                                        $result1=$con->query($sql1);
                                        while($row1=$result1->fetch_assoc()){
                                                          if ( $row['department_id'] == $row1['id'] ){

        $selected = "selected";}
                                            ?>
                                          

                                            <option <?php if($row1["id"]==$row['department_id']){?> selected <?php }?> value="<?php echo $row1['id'] ?>"><?php echo $row1['department_name'];?></option>
                                            <?php
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="col-12 col-sm-12">
                                    <input type="hidden" name="id" class="form-control border-0"  style="height: 55px;" value="<?php echo $test;?>">
                                   <!--  <input type="text" name="deptname" id="deptname" class="form-control border-0" placeholder="Department Name" style="height: 55px;"> -->
                                    <select class="form-control border-0" name="test" id="test" style="height: 55px;">
                                        <option>Select Test</option>
                                        <?php
                                        $selected = "";
                                        $sql1="select * from test";
                                        $result1=$con->query($sql1);
                                        while($row1=$result1->fetch_assoc()){
                                                          if ( $row['test_id'] == $row1['id'] ){

        $selected = "selected";}
                                            ?>
                                          

                                            <option <?php if($row1["id"]==$row['test_id']){?> selected <?php }?> value="<?php echo $row1['id'] ?>"><?php echo $row1['title'];?></option>
                                            <?php
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="col-12 col-sm-6">
                                    <textarea class="form-control border-0" name="details" id="details" placeholder="Details" style="height: 55px;"><?php echo $row['details'];?></textarea>
                                </div>
                                 <div class="col-12 col-sm-6">
                                    <input type="text" name="price" id="price" class="form-control border-0" placeholder="Price" style="height: 55px;" value="<?php echo $row['price']?>">
                                </div>
                               
                               
                                <div class="col-12">
                                    <button class="btn btn-primary w-100 py-3" id="department" type="submit">Update</button>
                                </div>
                            </div>
                        </form>
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
      

      $(document).ready(function(){
           $('#department').on('change', function () {
            // alert('hai');
            var department = $(this).val();
            // alert(countryID);
            if (department) {
                $.ajax({
                    type: 'POST',
                    url: 'test_ajax.php',
                    data: 'department=' + department,
                    success: function (html) {
                        $('#test').html(html);
                    }
                });
            } else {
                $('#test').html('<option value="">Select Test</option>');
            }
        });

      });
  </script>