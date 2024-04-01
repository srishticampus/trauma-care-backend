<?php
include 'header.php';
$id=$_SESSION['id'];
?>
    <!-- Navbar End -->


    <!-- Page Header Start -->
    <div class="container-fluid page-header py-5 mb-5 wow fadeIn" data-wow-delay="0.1s">
        <div class="container py-5">
            <h1 class="display-3 text-white mb-3 animated slideInDown">Doctors</h1>
            <nav aria-label="breadcrumb animated slideInDown">
                <ol class="breadcrumb text-uppercase mb-0">
                    <li class="breadcrumb-item"><a class="text-white" href="#">Home</a></li>
                    <li class="breadcrumb-item"><a class="text-white" href="#">Pages</a></li>
                    <li class="breadcrumb-item text-primary active" aria-current="page">Doctors</li>
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
                        <form action="doctor_action.php" method="post" enctype="multipart/form-data">
                            <div class="row g-3">
                                <div class="col-12 col-sm-6">
                                    <input type="text" name="name" class="form-control border-0" placeholder="Your Name" style="height: 55px;">
                                </div>
                                <div class="col-12 col-sm-6">
                                    <input type="email" name="email" class="form-control border-0" placeholder="Your Email" style="height: 55px;">
                                </div>
                                <div class="col-12 col-sm-6">
                                    <input type="text" name="phone" class="form-control border-0" placeholder="Your Mobile" style="height: 55px;">
                                </div>
                                <div class="col-12 col-sm-6">
                                    <select class="form-select border-0" name="department" style="height: 55px;">
                                        <option selected>Choose Department</option>
                                       <?php
                                       $sql="select * from department where hospital_id=$id";
                                       $result=$con->query($sql);
                                       while($row=$result->fetch_assoc()){
                                        ?>
                                        <option value="<?php echo $row['id'];?>"><?php echo $row['department_name'];?></option>
                                        <?php
                                       }
                                       ?>
                                    </select>
                                </div>
                                <div class="col-12 col-sm-6">
                                    <input type="text" name="degree" class="form-control border-0" placeholder="Your Degree" style="height: 55px;">
                                </div>
                                <div class="col-12 col-sm-6">
                                    <input type="text" name="designation" class="form-control border-0" placeholder="Your Designation" style="height: 55px;">
                                </div>
                                <div class="col-12 col-sm-6">
                                    <input type="text" name="experience" class="form-control border-0" placeholder="Your Experience" style="height: 55px;">
                                </div>
                                   <div class="col-12 col-sm-6">
                                    <input type="text" name="fee" class="form-control border-0" placeholder="Consultation Fee" style="height: 55px;">
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
                                    Doctors Avaliable Days<br>
                                     <div class="col-12 col-sm-6">
                                    <input type="checkbox"
                                            
                                            placeholder="Choose Date" name="days[]" value="Sunday">Sunday</div>
                                            <div class="col-12 col-sm-12">
                                            <select multiple="" style="height: 60px;" class="form-select border-0" name="timeslot1[]">
                                                <option>Select Timeslot</option>
                                                <option>9:00 am - 10:00 am</option>
                                                <option>10:00 am - 11:00 am</option>
                                                <option>11:00 am - 12:00 pm</option>
                                                <option>12:00 pm - 01:00 pm</option>
                                                <option>01:00 pm - 02:00 pm</option>
                                                <option>02:00 pm - 03:00 pm</option>
                                                <option>03:00 pm - 04:00 pm</option>
                                                <option>04:00 pm - 05:00 pm</option>
                                                <option>05:00 pm - 06:00 pm</option>
                                                <option>06:00 pm - 07:00 pm</option>
                                                <option>07:00 pm - 08:00 pm</option>
                                                <option>08:00 pm - 09:00 pm</option>
                                            </select>
                                        </div>
                                         <div class="col-12 col-sm-6">
                                             <input type="checkbox"
                                            
                                            placeholder="Choose Date" name="days[]" value="Monday">Monday</div>
                                            <div class="col-12 col-sm-12">
                                            <select multiple=""  style="height: 60px;" class="form-select border-0" name="timeslot2[]">
                                                <option>Select Timeslot</option>
                                                <option>9:00 am - 10:00 am</option>
                                                <option>10:00 am - 11:00 am</option>
                                                <option>11:00 am - 12:00 pm</option>
                                                <option>12:00 pm - 01:00 pm</option>
                                                <option>01:00 pm - 02:00 pm</option>
                                                <option>02:00 pm - 03:00 pm</option>
                                                <option>03:00 pm - 04:00 pm</option>
                                                <option>04:00 pm - 05:00 pm</option>
                                                <option>05:00 pm - 06:00 pm</option>
                                                <option>06:00 pm - 07:00 pm</option>
                                                <option>07:00 pm - 08:00 pm</option>
                                                <option>08:00 pm - 09:00 pm</option>
                                            </select>
                                        </div>
                                         <div class="col-12 col-sm-6">
                                             <input type="checkbox"
                                            
                                            placeholder="Choose Date" name="days[]" value="Tuesday">Tuesday</div>
                                            <div class="col-12 col-sm-12">
                                            <select multiple=""  style="height: 60px;" class="form-select border-0" name="timeslot3[]">
                                                <option>Select Timeslot</option>
                                                <option>9:00 am - 10:00 am</option>
                                                <option>10:00 am - 11:00 am</option>
                                                <option>11:00 am - 12:00 pm</option>
                                                <option>12:00 pm - 01:00 pm</option>
                                                <option>01:00 pm - 02:00 pm</option>
                                                <option>02:00 pm - 03:00 pm</option>
                                                <option>03:00 pm - 04:00 pm</option>
                                                <option>04:00 pm - 05:00 pm</option>
                                                <option>05:00 pm - 06:00 pm</option>
                                                <option>06:00 pm - 07:00 pm</option>
                                                <option>07:00 pm - 08:00 pm</option>
                                                <option>08:00 pm - 09:00 pm</option>
                                            </select>
                                        </div>
                                         <div class="col-12 col-sm-6">

                                         <input type="checkbox"
                                            
                                            placeholder="Choose Date" name="days[]" value="Wednesday">Wednesday</div>
                                            <div class="col-12 col-sm-12">
                                            <select multiple=""  style="height: 60px;" class="form-select border-0" name="timeslot4[]">
                                                <option>Select Timeslot</option>
                                               <option>9:00 am - 10:00 am</option>
                                                <option>10:00 am - 11:00 am</option>
                                                <option>11:00 am - 12:00 pm</option>
                                                <option>12:00 pm - 01:00 pm</option>
                                                <option>01:00 pm - 02:00 pm</option>
                                                <option>02:00 pm - 03:00 pm</option>
                                                <option>03:00 pm - 04:00 pm</option>
                                                <option>04:00 pm - 05:00 pm</option>
                                                <option>05:00 pm - 06:00 pm</option>
                                                <option>06:00 pm - 07:00 pm</option>
                                                <option>07:00 pm - 08:00 pm</option>
                                                <option>08:00 pm - 09:00 pm</option>
                                            </select>
                                        </div>
                                         <div class="col-12 col-sm-6">
                                             <input type="checkbox"
                                            
                                            placeholder="Choose Date" name="days[]" value="Thursday">Thursday</div>
                                            <div class="col-12 col-sm-12">
                                            <select multiple=""  style="height: 60px;" class="form-select border-0" name="timeslot5[]">
                                                <option>Select Timeslot</option>
                                               <option>9:00 am - 10:00 am</option>
                                                <option>10:00 am - 11:00 am</option>
                                                <option>11:00 am - 12:00 pm</option>
                                                <option>12:00 pm - 01:00 pm</option>
                                                <option>01:00 pm - 02:00 pm</option>
                                                <option>02:00 pm - 03:00 pm</option>
                                                <option>03:00 pm - 04:00 pm</option>
                                                <option>04:00 pm - 05:00 pm</option>
                                                <option>05:00 pm - 06:00 pm</option>
                                                <option>06:00 pm - 07:00 pm</option>
                                                <option>07:00 pm - 08:00 pm</option>
                                                <option>08:00 pm - 09:00 pm</option>
                                            </select>
                                        </div>
                                         <div class="col-12 col-sm-6">
                                             <input type="checkbox"
                                            
                                            placeholder="Choose Date" name="days[]" value="Friday">Friday</div>
                                            <div class="col-12 col-sm-12">
                                        <select multiple=""  style="height: 30px;" class="form-select border-0" name="timeslot6[]">
                                                <option>Select Timeslot</option>
                                               <option>9:00 am - 10:00 am</option>
                                                <option>10:00 am - 11:00 am</option>
                                                <option>11:00 am - 12:00 pm</option>
                                                <option>12:00 pm - 01:00 pm</option>
                                                <option>01:00 pm - 02:00 pm</option>
                                                <option>02:00 pm - 03:00 pm</option>
                                                <option>03:00 pm - 04:00 pm</option>
                                                <option>04:00 pm - 05:00 pm</option>
                                                <option>05:00 pm - 06:00 pm</option>
                                                <option>06:00 pm - 07:00 pm</option>
                                                <option>07:00 pm - 08:00 pm</option>
                                                <option>08:00 pm - 09:00 pm</option>
                                            </select></div>
                                             <div class="col-12 col-sm-6">
                                             <input type="checkbox"
                                            
                                            placeholder="Choose Date" name="days[]" value="Saturday">Saturday</div>
                                            <div class="col-12 col-sm-12">
                                            <select multiple=""  style="height: 60px;" class="form-select border-0" name="timeslot7[]">
                                                <option>Select Timeslot</option>
                                                <option>9:00 am - 10:00 am</option>
                                                <option>10:00 am - 11:00 am</option>
                                                <option>11:00 am - 12:00 pm</option>
                                                <option>12:00 pm - 01:00 pm</option>
                                                <option>01:00 pm - 02:00 pm</option>
                                                <option>02:00 pm - 03:00 pm</option>
                                                <option>03:00 pm - 04:00 pm</option>
                                                <option>04:00 pm - 05:00 pm</option>
                                                <option>05:00 pm - 06:00 pm</option>
                                                <option>06:00 pm - 07:00 pm</option>
                                                <option>07:00 pm - 08:00 pm</option>
                                                <option>08:00 pm - 09:00 pm</option>
                                            </select>
                                        </div>


                                    
<br><br><br>
                                <div class="col-12">
                                    <button class="btn btn-primary w-100 py-3" type="submit">Add</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
                <br><br>
 <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
                <p class="d-inline-block border rounded-pill py-1 px-4">Doctors</p>
                <h1>Our Experienced Doctors</h1>
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

 <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="team-item position-relative rounded overflow-hidden" >
                        <div class="overflow-hidden" >
                            <img class="img-fluid" src="uploads/<?php echo $row['file'] ?>" alt="" style="height: 422px;max-width: 100%">
                        </div>
                        <div class="team-text bg-light text-center p-4">
                            <h5><?php echo $row['doctor_name'];?></h5>
                            <p class="text-primary"><?php echo $row1['department_name'];?></p>
                            <div class="team-social text-center">
                                <h5>Consultation Fee:<?php echo $row['payment'];?></h5>
                              <!--     <?php
                            $sql2 ="SELECT *
FROM doctor_timeslot
INNER JOIN doc_days ON doctor_timeslot.day_id=doc_days.id where doctor_timeslot.doc_id=$doctorid ";
$result2=$con->query($sql2);
while($row2=$result2->fetch_assoc()){
    echo $row2['days'].' '.$row2['slot'];
    echo '<br>';
}


                            ?> -->
                              <button type="button" class="btn btn-info ">  <a  href="team_edit.php?id=<?php echo  $doctorid; ?>">Edit</a></button>
                            
                                  <button type="button" class="btn btn-danger"><a  href="team_delete.php?id=<?php echo  $doctorid; ?>">Delete</a></button>
                                 <!-- <a class="btn btn-square" href=""><i class="fab fa-twitter"></i></a>
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