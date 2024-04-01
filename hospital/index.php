<?php

include 'header.php';
$id=$_SESSION['id'];


?>
    <!-- Navbar End -->


    <!-- Header Start -->
    <div class="container-fluid header bg-primary p-0 mb-5">
        <div class="row g-0 align-items-center flex-column-reverse flex-lg-row" style="height: 600px; background:  #aac99c">
            <div class="col-lg-6 p-5 wow fadeIn" data-wow-delay="0.1s">
                <h1 class="display-4 text-white mb-5">Good Health Is The Root Of All Happiness</h1>
                <div class="row g-4">
                    <div class="col-sm-4">
                        <div class="border-start border-light ps-4">
                            <h2 class="text-white mb-1" data-toggle="counter-up">
                                <?php

                                $sql="select * from doctors where hospital_id=$id ";
$result=$con->query($sql);
$count=$result->num_rows;
echo $count;
                                ?>


                            </h2>
                            <p class="text-light mb-0">Expert Doctors</p>
                        </div>
                    </div>
                   <!--  <div class="col-sm-4">
                        <div class="border-start border-light ps-4">
                            <h2 class="text-white mb-1" data-toggle="counter-up">1234</h2>
                            <p class="text-light mb-0">Medical Stuff</p>
                        </div>
                    </div> -->
                    <!-- <div class="col-sm-4">
                        <div class="border-start border-light ps-4">
                            <h2 class="text-white mb-1" data-toggle="counter-up">12345</h2>
                            <p class="text-light mb-0">Total Patients</p>
                        </div>
                    </div> -->
                </div>
            </div>
            <div class="col-lg-6 wow fadeIn" data-wow-delay="0.5s">
                <div class="owl-carousel header-carousel">

                    <?php
                    $sq="SELECT dept.file,dept.name FROM dept INNER JOIN department ON dept.name=department.department_name WHERE department.hospital_id=$id";
                    $res=$con->query($sq);
                    while($ro=$res->fetch_assoc()){
                        ?>
                        <div class="owl-carousel-item position-relative">
                       
                        <div class="owl-carousel-text">
                            <h1 class="display-1 text-white mb-0" style="font-size: 40px;"><?php echo $ro['name'];?></h1>
                        </div>
                         <img class="img-fluid" src="uploads/<?php echo $ro['file'];?>" alt="" style="height: 300px;width: 200px;">
                    </div>
                        <?php

                    }

                    ?>
                    
                    
                    
                </div>
            </div>
        </div>
    </div>
    <!-- Header End -->


    <!-- About Start -->

 
    <!-- About End -->


    <!-- Service Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
                <p class="d-inline-block border rounded-pill py-1 px-4">Department</p>
                <h1>Our Departments</h1>
            </div>
            <div class="row g-4">
                 <?php
                $sql="select * from department where hospital_id=$id";
                $result=$con->query($sql);
                while ( $row=$result->fetch_assoc()) {
                    $name=$row['department_name'];
                    $sql1="select * from dept where name='$name'";
                    $result1=$con->query($sql1);
                    $row1=$result1->fetch_assoc();
                    ?>
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="service-item bg-light rounded h-100 p-5">
                        <div class="d-inline-flex align-items-center justify-content-center bg-white rounded-circle mb-4" style="width: 65px; height: 65px;">
                            <i class="fa fa-heartbeat text-primary fs-4"></i>
                        </div>
                        <h4 class="mb-3">Department</h4>
                        <p class="mb-4"><?php echo $row['department_name'];?></p>
                        <!-- <a class="btn" href=""><i class="fa fa-plus text-primary me-3"></i>Read More</a> -->
                    </div>
                </div>
                    <?php
                   
                }
                ?>
                
               
              
            </div>
        </div>
    </div>
    <!-- Service End -->


   <div class="container-fluid bg-primary overflow-hidden my-5 px-lg-0">
        <div class="container feature px-lg-0">
            <div class="row g-0 mx-lg-0">
                <div class="col-lg-6 feature-text py-5 wow fadeIn" data-wow-delay="0.1s" style=" background:  #aac99c">
                    <div class="p-lg-5 ps-lg-0">
                        <p class="d-inline-block border rounded-pill text-light py-1 px-4">Features</p>
                        <h1 class="text-white mb-4">Why To Choose Us</h1>
                        <p class="text-white mb-4 pb-2"><?php
$sql="select * from hospital where id=$id";
$result=$con->query($sql);
$row=$result->fetch_assoc();


                         echo $row['description'];?></p>
                        <div class="row g-4">
                            <div class="col-6">
                                <div class="d-flex align-items-center">
                                    <div class="d-flex flex-shrink-0 align-items-center justify-content-center rounded-circle bg-light" style="width: 55px; height: 55px;">
                                        <i class="fa fa-user-md text-primary"></i>
                                    </div>
                                    <div class="ms-4">
                                        <p class="text-white mb-2">Experience</p>
                                        <h5 class="text-white mb-0">Doctors</h5>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="d-flex align-items-center">
                                    <div class="d-flex flex-shrink-0 align-items-center justify-content-center rounded-circle bg-light" style="width: 55px; height: 55px;">
                                        <i class="fa fa-check text-primary"></i>
                                    </div>
                                    <div class="ms-4">
                                        <p class="text-white mb-2">Quality</p>
                                        <h5 class="text-white mb-0">Services</h5>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="d-flex align-items-center">
                                    <div class="d-flex flex-shrink-0 align-items-center justify-content-center rounded-circle bg-light" style="width: 55px; height: 55px;">
                                        <i class="fa fa-comment-medical text-primary"></i>
                                    </div>
                                    <div class="ms-4">
                                        <p class="text-white mb-2">Positive</p>
                                        <h5 class="text-white mb-0">Consultation</h5>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="d-flex align-items-center">
                                    <div class="d-flex flex-shrink-0 align-items-center justify-content-center rounded-circle bg-light" style="width: 55px; height: 55px;">
                                        <i class="fa fa-headphones text-primary"></i>
                                    </div>
                                    <div class="ms-4">
                                        <p class="text-white mb-2">24 Hours</p>
                                        <h5 class="text-white mb-0">Support</h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 pe-lg-0 wow fadeIn" data-wow-delay="0.5s" style="min-height: 400px;">
                    <div class="position-relative h-100">
                        <img class="position-absolute img-fluid w-100 h-100" src="img/feature.jpg" style="object-fit: cover;" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- Team Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
                <p class="d-inline-block border rounded-pill py-1 px-4">Doctors</p>
                <h1>Our Experience Doctors</h1>
            </div>
            <div class="row g-4">
                   <?php
                $sql="select * from doctors where hospital_id=$id";
               
                $result=$con->query($sql);
                while ( $row=$result->fetch_assoc()) {
                    $department=$row['department'];
                    $doctorid=$row['id'];
                     $sql1="select * from department where  id=$department";

                $result1=$con->query($sql1);
            $row1=$result1->fetch_assoc();
                    ?>
                <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="team-item position-relative rounded overflow-hidden">
                        <div class="overflow-hidden">
                            <img class="img-fluid"  src="uploads/<?php echo $row['file'] ?>" alt="" style="height: 400px;width: 300px;">
                        </div>
                        <div class="team-text bg-light text-center p-4">
                            <h5><?php echo $row['doctor_name'];?></h5>
                            <p class="text-primary"><?php echo $row1['department_name'];?></p>
                            <div class="team-social text-center">
                                <!-- <a class="btn btn-square" href=""><i class="fab fa-facebook-f"></i></a>
                                <a class="btn btn-square" href=""><i class="fab fa-twitter"></i></a>
                                <a class="btn btn-square" href=""><i class="fab fa-instagram"></i></a> -->
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