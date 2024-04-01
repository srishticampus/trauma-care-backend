<?php
include 'header.php';
$id=$_SESSION['id'];
$appoinment_id=$_GET['id'];
//echo $appoinment_id;
?>
    <!-- Navbar End -->


    <!-- Page Header Start -->
    <div class="container-fluid page-header py-5 mb-5 wow fadeIn" data-wow-delay="0.1s">
        <div class="container py-5">
            <h1 class="display-3 text-white mb-3 animated slideInDown">Patient Prescription</h1>
            <nav aria-label="breadcrumb animated slideInDown">
                <ol class="breadcrumb text-uppercase mb-0">
                    <li class="breadcrumb-item"><a class="text-white" href="#">Home</a></li>
                    <li class="breadcrumb-item"><a class="text-white" href="#">Pages</a></li>
                    <li class="breadcrumb-item text-primary active" aria-current="page">Prescription</li>
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
                        <form method="post" action="prescription_action.php">
                            <?php

                            $sql1="select * from appointment where id=$appoinment_id ";
$result1=$con->query($sql1);
$row1=$result1->fetch_assoc();
$userid=$row1['userid'];
$doc_id=$row1['doc_id'];
$sql2="select * from doctors where id=$doc_id";
$result2=$con->query($sql2);
$row2=$result2->fetch_assoc();
$doctor_name= $row2['doctor_name'];

$sql="select * from patient where id=$userid";
$result=$con->query($sql);
$row=$result->fetch_assoc();
$name= $row['name'];

$dob=date('Y',strtotime($row['dob']));
$current=date('Y');
$age=$current-$dob;


  $sql3="select * from prescription where appoinment_id=$appoinment_id ";
$result3=$con->query($sql3);
$count3=$result3->num_rows;
$row3=$result3->fetch_assoc();
$medication_details=$row3['medication_details'];
$dose=$row3['dose'];
$additional_information=$row3['additional_information'];



                            ?>
                            <div class="row g-3">
                                <div class="col-12 col-sm-12">
                                   <!--  <input type="text" name="deptname" id="deptname" class="form-control border-0" placeholder="Department Name" style="height: 55px;"> -->
                                   <input type="hidden" name="appoinment_id" value="<?php echo $appoinment_id;?>">
                                   <input type="hidden" name="userid" value="<?php echo $userid;?>">
                                   <input type="hidden" name="doctor" value="<?php echo $userid;?>">
                                   <div class="col-12 col-sm-12"><label>Doctor Name</label>
                                </div>
                                    <input type="text" name="doctor_name" class="form-control border-0" value="<?php echo $doctor_name;?>" >
                                </div>
                                <div class="col-12 col-sm-12"><label>Patient Name</label>
                                </div>
                                <input type="text" name="pname" value="<?php echo $name?>" class="form-control border-0">
                                 <div class="col-12 col-sm-12"><label>Age</label>
                                </div>
                                <input type="text" name="age" class="form-control border-0" value="<?php echo $age;?>">
                                 <div class="col-12 col-sm-12"><label>Medication Details</label>
                                </div>

                                <textarea name="medication" class="form-control border-0"><?php echo $medication_details;?>
                                	</textarea>
                                	<div class="col-12 col-sm-12"><label>Dose</label>
                                </div>

                                <textarea name="dose" class="form-control border-0" >
                                	<?php echo $dose;?>
                                	</textarea>

                                 <div class="col-12 col-sm-12"><label>Additional Information </label><br>
                                     <textarea name="additional_info" class="form-control border-0"><?php echo $row3['additional_information'];?>
                                	</textarea>
                                </div>
                                
                                
                               
                                
                               
                                 
                               
                               
                                <div class="col-12">
                                   


                                   <?php
                                   if($count3>0){?>

                                   	<button class="btn btn-primary w-100 py-3" id="department" type="submit">Update</button><br><br>
                                   	 <button class="btn btn-danger w-100 py-3"><a href="view_prescription.php?id=<?php echo $appoinment_id;?>" style="color: #fff;">View PDF</a></button>
                                   	<?php

                                   }else{
                                   	?>

                                   	<button class="btn btn-primary w-100 py-3" id="department" type="submit">Add</button><br><br>
                                   	 <button class="btn btn-danger w-100 py-3"><a target="_blank" href="view_prescription.php?id=<?php echo $appoinment_id;?>" style="color: #fff;">View PDF</a></button>
                                   	<?php
                                   }


                                   ?> 
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
    <div class="container-fluid bg-dark text-light footer mt-5 pt-5 wow fadeIn" data-wow-delay="0.1s">
        <div class="container py-5">
            <div class="row g-5">
                <div class="col-lg-3 col-md-6">
                    <h5 class="text-light mb-4">Address</h5>
                    <p class="mb-2"><i class="fa fa-map-marker-alt me-3"></i>123 Street, New York, USA</p>
                    <p class="mb-2"><i class="fa fa-phone-alt me-3"></i>+012 345 67890</p>
                    <p class="mb-2"><i class="fa fa-envelope me-3"></i>info@example.com</p>
                    <div class="d-flex pt-2">
                        <a class="btn btn-outline-light btn-social rounded-circle" href=""><i class="fab fa-twitter"></i></a>
                        <a class="btn btn-outline-light btn-social rounded-circle" href=""><i class="fab fa-facebook-f"></i></a>
                        <a class="btn btn-outline-light btn-social rounded-circle" href=""><i class="fab fa-youtube"></i></a>
                        <a class="btn btn-outline-light btn-social rounded-circle" href=""><i class="fab fa-linkedin-in"></i></a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <h5 class="text-light mb-4">Services</h5>
                    <a class="btn btn-link" href="">Cardiology</a>
                    <a class="btn btn-link" href="">Pulmonary</a>
                    <a class="btn btn-link" href="">Neurology</a>
                    <a class="btn btn-link" href="">Orthopedics</a>
                    <a class="btn btn-link" href="">Laboratory</a>
                </div>
                <div class="col-lg-3 col-md-6">
                    <h5 class="text-light mb-4">Quick Links</h5>
                    <a class="btn btn-link" href="">About Us</a>
                    <a class="btn btn-link" href="">Contact Us</a>
                    <a class="btn btn-link" href="">Our Services</a>
                    <a class="btn btn-link" href="">Terms & Condition</a>
                    <a class="btn btn-link" href="">Support</a>
                </div>
                <div class="col-lg-3 col-md-6">
                    <h5 class="text-light mb-4">Newsletter</h5>
                    <p>Dolor amet sit justo amet elitr clita ipsum elitr est.</p>
                    <div class="position-relative mx-auto" style="max-width: 400px;">
                        <input class="form-control border-0 w-100 py-3 ps-4 pe-5" type="text" placeholder="Your email">
                        <button type="button" class="btn btn-primary py-2 position-absolute top-0 end-0 mt-2 me-2">SignUp</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="copyright">
                <div class="row">
                    <div class="col-md-6 text-center text-md-start mb-3 mb-md-0">
                        &copy; <a class="border-bottom" href="#">Your Site Name</a>, All Right Reserved.
                    </div>
                    <div class="col-md-6 text-center text-md-end">
                        <!--/*** This template is free as long as you keep the footer author’s credit link/attribution link/backlink. If you'd like to use the template without the footer author’s credit link/attribution link/backlink, you can purchase the Credit Removal License from "https://htmlcodex.com/credit-removal". Thank you for your support. ***/-->
                        Designed By <a class="border-bottom" href="https://htmlcodex.com">HTML Codex</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Footer End -->


    <!-- Back to Top -->
    <a href="#" class="btn btn-lg btn-primary btn-lg-square rounded-circle back-to-top"><i class="bi bi-arrow-up"></i></a>


    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="lib/wow/wow.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/counterup/counterup.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="lib/tempusdominus/js/moment.min.js"></script>
    <script src="lib/tempusdominus/js/moment-timezone.min.js"></script>
    <script src="lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>
</body>


</html>