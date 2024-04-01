<?php
include 'header.php';
$id=$_SESSION['id'];
?>
    <!-- Navbar End -->


    <!-- Page Header Start -->
    <div class="container-fluid page-header py-5 mb-5 wow fadeIn" data-wow-delay="0.1s">
        <div class="container py-5">
            <h1 class="display-3 text-white mb-3 animated slideInDown">Profile</h1>
            <nav aria-label="breadcrumb animated slideInDown">
                <ol class="breadcrumb text-uppercase mb-0">
                    <li class="breadcrumb-item"><a class="text-white" href="#">Home</a></li>
                    <!-- <li class="breadcrumb-item"><a class="text-white" href="#">Pages</a></li> -->
                    <li class="breadcrumb-item text-primary active" aria-current="page">Profile</li>
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
                        <form action="profile_action.php" method="post" enctype="multipart/form-data">
                            <?php
$sql="select * from hospital where id=$id";
$result=$con->query($sql);
$row=$result->fetch_assoc();
                            ?>
                            <div class="row g-3">
                                <div class="col-12 col-sm-6">
                                    <span>Name</span>
                                    <input type="text" name="name" class="form-control border-0" placeholder="Your Name" value="<?php echo $row['name'];?>" style="height: 55px;">
                                </div>
                                <div class="col-12 col-sm-6">
                                   <span> Email</span>
                                    <input type="email" name="email" class="form-control border-0" placeholder="Your Email" style="height: 55px;" value="<?php echo $row['email'];?>">
                                </div>
                                <div class="col-12 col-sm-6">
                                    <span>Phone</span>
                                    <input type="text" name="phone" class="form-control border-0" placeholder="Your Mobile" style="height: 55px;" value="<?php echo $row['phone'];?>">
                                </div>
                                <div class="col-12 col-sm-6">
                                    <span>Building No</span>
                                    <input type="text" name="bno" class="form-control border-0" placeholder="Building Number" style="height: 55px;" value="<?php echo $row['building_no'];?>">
                                </div>
                                 <div class="col-12 col-sm-6">
                                    <span>Street</span>
                                    <input type="text" name="street" class="form-control border-0" placeholder="Street" style="height: 55px;" value="<?php echo $row['street'];?>">
                                </div>
                                 <!-- <div class="col-12 col-sm-6">
                                    <span>City</span>
                                    <input type="text" name="city" class="form-control border-0" placeholder="City" style="height: 55px;" value="<?php echo $row['city'];?>">
                                </div> -->
                                 <div class="col-12 col-sm-6">
                                    <span>District</span>
                                    <input type="text" name="district" class="form-control border-0" placeholder="District" style="height: 55px;" value="<?php echo $row['district'];?>">
                                </div>
                                 <div class="col-12 col-sm-6">
                                    <span>State</span>
                                    <input type="text" name="state" class="form-control border-0" placeholder="State" style="height: 55px;" value="<?php echo $row['state'];?>">
                                </div>
                                 <div class="col-12 col-sm-6">
                                    <span>Register Number</span>
                                    <input type="text" name="regno" class="form-control border-0" placeholder="Register Number" style="height: 55px;" value="<?php echo $row['regno'];?>">
                                </div>
                                 <div class="col-12 col-sm-6">
                                    <span>Lattitude</span>
                                    <input type="text" name="lattitude" class="form-control border-0" placeholder="Lattitude" style="height: 55px;" value="<?php echo $row['lattitude'];?>">
                                </div>
                                 <div class="col-12 col-sm-6">
                                    <span>Longitude</span>
                                    <input type="text" name="longitude" class="form-control border-0" placeholder="Longitude" style="height: 55px;" value="<?php echo $row['longitude'];?>">
                                </div>
                                 <div class="col-12 col-sm-6">
                                    <span>Landmark</span>
                                    <input type="text" name="landmark" class="form-control border-0" placeholder="Land Mark" style="height: 55px;" value="<?php echo $row['landmark'];?>">
                                </div>
                                 <div class="col-12 col-sm-6">
                                    <span>Password</span>
                                    <input type="text" name="password" class="form-control border-0" placeholder="Password" style="height: 55px;" value="<?php echo $row['password'];?>">
                                </div>
                                  <div class="col-12 col-sm-12">
                                    <span>Description</span>
                                    <textarea name="description" class="form-control border-0" placeholder="Description" style="height: 55px;text-align:left;" ><?php echo $row['description'];?>
                                    </textarea>
                                </div>
                               
                                


                               <!--  <div class="col-12 col-sm-6">
                                    <div class="date" id="date" data-target-input="nearest">
                                        <input type="time"
                                            class="form-control border-0"
                                            placeholder="Choose Date" name="from"  style="height: 55px;">
                                    </div>
                                </div> -->
                                <!-- <div class="col-12 col-sm-6">
                                    <div class="time" id="time" data-target-input="nearest">
                                        <input type="time"
                                            class="form-control border-0"
                                            placeholder="Choose Date" name="to"  style="height: 55px;">
                                    </div>
                                </div> -->
                                <div class="col-12">
                                    <input type="file"
                                            class="form-control border-0"
                                            placeholder="File" name="file"  style="height: 55px;">
                                </div>
                               
                                          
                                        


                                    

                                <div class="col-12">
                                    <button class="btn btn-primary w-100 py-3" type="submit">Update</button>
                                </div>
                            </div>
                        </form>
                    </div>
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