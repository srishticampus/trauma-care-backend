<?php
include 'header.php';
$id=$_SESSION['id'];
?>
    <!-- Navbar End -->


    <!-- Page Header Start -->
    <div class="container-fluid page-header py-5 mb-5 wow fadeIn" data-wow-delay="0.1s">
        <div class="container py-5">
            <h1 class="display-3 text-white mb-3 animated slideInDown">Hospital Test</h1>
            <nav aria-label="breadcrumb animated slideInDown">
                <ol class="breadcrumb text-uppercase mb-0">
                    <li class="breadcrumb-item"><a class="text-white" href="#">Home</a></li>
                    
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
                        <form method="post" action="test_action.php">
                             <div class="row g-3">


                                   <div class="col-12 col-sm-12">
                                   <!--  <input type="text" name="deptname" id="deptname" class="form-control border-0" placeholder="Department Name" style="height: 55px;"> -->
                                    <select class="form-control border-0" name="department" id="department" style="height: 55px;">
                                        <option value="">Select Department</option>
                                        <?php
                                        $sql="select dept.id,department.department_name from department inner join dept on dept.name=department.department_name where hospital_id=$id";
                                        $result=$con->query($sql);
                                        while($row=$result->fetch_assoc()){
                                            ?>
                                            <option value="<?php echo $row['id']?>"><?php echo $row['department_name']?></option>
                                            <?php
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="col-12 col-sm-12">
                                   <!--  <input type="text" name="deptname" id="deptname" class="form-control border-0" placeholder="Department Name" style="height: 55px;"> -->
                                    <select class="form-control border-0" name="test" id="test" style="height: 55px;">
                                        <option value="">Select Test</option>
                                        <?php
                                        $sql="select * from test";
                                        $result=$con->query($sql);
                                        while($row=$result->fetch_assoc()){
                                            ?>
                                            <option value="<?php echo $row['id']?>"><?php echo $row['title']?></option>
                                            <?php
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="col-12 col-sm-6">
                                    <textarea class="form-control border-0" name="details" id="details" placeholder="Details" style="height: 55px;"></textarea>
                                </div>
                                 <div class="col-12 col-sm-6">
                                    <input type="text" name="price" id="price" class="form-control border-0" placeholder="Price" style="height: 55px;">
                                </div>
                               
                               
                                <div class="col-12">
                                    <button class="btn btn-primary w-100 py-3" id="department" type="submit">Add</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <br><br>
            <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
                <p class="d-inline-block border rounded-pill py-1 px-4">Hospital Test</p>
                <!-- <h1>Our Experience Doctors</h1> -->
            </div>


 <div class="row g-4">
                <?php
                $sql="SELECT test.title,test.image,hospital_test.details,hospital_test.id,hospital_test.department_id
FROM test
INNER JOIN hospital_test ON test.id=hospital_test.test_id  where hospital_test.hospital_id=$id";
                $result=$con->query($sql);
                while ( $row=$result->fetch_assoc()) {
                    $dept=$row['department_id'];
                    ?>


                    <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="team-item position-relative rounded overflow-hidden">
                        <div class="overflow-hidden">
                            <img class="img-fluid" src="uploads/<?php echo $row['image'] ?>" alt="" style="width: 300px;">
                        </div>
                        <div class="team-text bg-light text-center p-4">
                            <h5><?php
                            $s="select * from dept where id=$dept";
                            $r=$con->query($s);
                            $ro=$r->fetch_assoc();
                            echo $ro['name'];

                            ?></h5>
                            <p class="text-primary"><?php echo $row['title'];?></p>
                            <div class="team-social text-center">
                               <!-- <p>
                                 <?php echo $row['details'];?>
                               </p> -->
                              <button type="button" class="btn btn-info "> <a href="test_edit.php?id=<?php echo $row['id']?>">View</a></button>
                              
                                  <button type="button" class="btn btn-danger"><a href="test_delete.php?id=<?php echo $row['id']?>">Delete</a></button>
                            </div>
                        </div>
                    </div>
                </div>
                    <?php
                   
                }
                ?>
                
               
                
               
               
               
                
            
            </div>
           
        </div>
    </div>
    <!-- Team End -->
        

    <!-- Footer Start -->
  <?php
include 'footer.php';
  ?>
<!--   <script type="text/javascript">
      

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
  </script> -->