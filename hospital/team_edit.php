<?php
include 'header.php';
$id=$_SESSION['id'];
$doctor=$_GET['id'];
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
                    <li class="breadcrumb-item text-primary active" aria-current="page">Doctor </li>
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
                        <form action="teamedit_action.php" method="post" enctype="multipart/form-data">
                            <?php
                            $sql="select * from  doctors where id=$doctor";
                            $result=$con->query($sql);
                            $row=$result->fetch_assoc();


                            ?>
                             <input type="hidden" name="id" class="form-control border-0"  style="height: 55px;" value="<?php echo $doctor;?>">
                            <div class="row g-3">
                                <div class="col-12 col-sm-6">
                                    <input type="text" name="name" class="form-control border-0" placeholder="Your Name" style="height: 55px;" value="<?php echo $row['doctor_name']?>">
                                </div>
                                <div class="col-12 col-sm-6">
                                    <input type="email" name="email" class="form-control border-0" placeholder="Your Email" style="height: 55px;" value="<?php echo $row['doctor_email']?>">
                                </div>
                                <div class="col-12 col-sm-6">
                                    <input type="text" name="phone" class="form-control border-0" placeholder="Your Mobile" style="height: 55px;" value="<?php echo $row['phone']?>">
                                </div>
                                <div class="col-12 col-sm-6">
                                    <select class="form-select border-0" name="department" style="height: 55px;">
                                         <?php
                                         $selected = "";
                                       $sql1="select * from department where hospital_id=$id";
                                       $result1=$con->query($sql1);
                                       while($row1=$result1->fetch_assoc()){

      if ( $row['department'] == $row1['id'] ){

        $selected = "selected";}
                                        ?>
                                      <option <?php if($row1["id"]==$row['department']){?> selected <?php }?> value="<?php echo $row1['id'] ?>"><?php echo $row1['department_name'];?></option>
                                      
                                        <?php
                                       }
                                       ?>
                                    </select>
                                </div>
                                <div class="col-12 col-sm-6">
                                    <input type="text" name="degree" class="form-control border-0" placeholder="Your Degree" style="height: 55px;" value="<?php echo $row['degree']?>">
                                </div>
                                <div class="col-12 col-sm-6">
                                    <input type="text" name="designation" class="form-control border-0" placeholder="Your Designation" style="height: 55px;" value="<?php echo $row['designation']?>">
                                </div>
                                <div class="col-12 col-sm-6">
                                    <input type="text" name="experience" class="form-control border-0" placeholder="Your Experience" style="height: 55px;" value="<?php echo $row['experience']?>">
                                </div>
                                <div class="col-12 col-sm-6">
                                    <input type="text" name="fee" class="form-control border-0" placeholder="Consultation Fee" style="height: 55px;" value="<?php echo $row['payment']?>">
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
                                         <?php
                                        $flag=false;
                                        $s="select * from doc_days where days='Sunday' and doc_id=$doctor ";
                                        $r=$con->query($s);
                                        $co=$r->num_rows;
                                        $roo=$r->fetch_assoc();
                                        $day_id=$roo['id'];
                                        if($co>0){
                                            $flag=true;

                                        }
                                        else{
                                            $flag=false;
                                        }


                                        ?>
                                            <?php
                                         $s1="SELECT * FROM `doctor_timeslot` where  doc_id='$doctor' and day_id='$day_id'";
                                        $r1=$con->query($s1);
                                        $count=0;
                                        $count1=0;
                                        $count2=0;
                                        $count3=0;
                                        $count4=0;
                                        $count5=0;
                                        $count6=0;
                                        $count7=0;

                                        $count8=0;
                                        $count9=0;
                                        $count10=0;
                                        $count11=0;
                                        

                                        
                                        while($rooo=$r1->fetch_assoc()){
                                            $slot=$rooo['slot'];
                                            if( $slot == '9:00 am - 10:00 am'){
$count=1;
}
  if( $slot == '10:00 am - 11:00 am') {$count1=2;}
                                               if( $slot == '11:00 am - 12:00 pm') {
                                                $count2=3;
                                               }
                                            if( $slot == '12:00 pm - 01:00 pm') {
                                                $count3=4;
                                            }
                                         if( $slot == '01:00 pm - 02:00 pm') {
                                            $count4=5;
                                         }
                                                 if( $slot == '02:00 pm - 03:00 pm'){
                                                    $count5=6;
                                                 }                                               
                                                  if( $slot == '03:00 pm - 04:00 pm') {
                                                    $count6=7;
                                                  }
                                             if( $slot == '04:00 pm - 05:00 pm'){
                                                $count7=8;
                                             } 
                                         if( $slot == '05:00 pm - 06:00 pm') {
                                            $count8=9;
                                         }
                                         if( $slot == '06:00 pm - 07:00 pm') {
                                            $count9=10;
                                         }
                                    if( $slot == '07:00 pm - 08:00 pm') {
                                        $count10=11;
                                    }
                                    if( $slot == '08:00 pm - 09:00 pm') {
                                        $count=12;
                                    }


                                        }

                                            

                                            ?>

                                   <input type="checkbox"
                                            
                                            placeholder="Choose Date" name="days[]" value="Sunday" <?php if($flag==true){echo 'checked';}?>>Sunday</div>
                                            <div class="col-12 col-sm-12">
                                            <select multiple="" style="height: 60px;" class="form-select border-0" name="timeslot1[]">
                                                <option value="">Select Timeslot</option>
                                                 
                                             
                                             <option  <?php if($count == '1') echo "selected"; ?>>9:00 am - 10:00 am</option>
                                                <option <?php if($count1 == '2') echo "selected"; ?>>10:00 am - 11:00 am</option>
                                                <option <?php if($count2 == '3') echo "selected"; ?>>11:00 am - 12:00 pm</option>
                                                <option <?php if($count3 == '4') echo "selected"; ?>>12:00 pm - 01:00 pm</option>
                                                <option <?php if($count4 == '5') echo "selected"; ?>>01:00 pm - 02:00 pm</option>
                                                <option <?php if($count5== '6') echo "selected"; ?>>02:00 pm - 03:00 pm</option>
                                                <option <?php if($count6 == '7') echo "selected"; ?>>03:00 pm - 04:00 pm</option>
                                                <option <?php if($count7 == '8') echo "selected"; ?>>04:00 pm - 05:00 pm</option>
                                                <option <?php if($coun8 == '9') echo "selected"; ?>>05:00 pm - 06:00 pm</option>
                                                <option <?php if($count9 == '10') echo "selected"; ?>>06:00 pm - 07:00 pm</option>
                                                <option <?php if($count10 == '11') echo "selected"; ?>>07:00 pm - 08:00 pm</option>
                                                <option <?php if($count11 == '12') echo "selected"; ?>>08:00 pm - 09:00 pm</option>
                                              
                                         
                                               
                                            </select>
                                        </div>
                                         <div class="col-12 col-sm-6">
                                            <?php
                                        $flag=false;
                                        $s="select * from doc_days where days='Monday' and doc_id=$doctor ";
                                        $r=$con->query($s);
                                        $r=$con->query($s);
                                        $co=$r->num_rows;
                                        $roo=$r->fetch_assoc();
                                        $day_id=$roo['id'];
                                        if($co>0){
                                            $flag=true;

                                        }
                                        else{
                                            $flag=false;
                                        }


                                        ?>
                                         <?php
                                         $s1="SELECT * FROM `doctor_timeslot` where  doc_id='$doctor' and day_id='$day_id'";
                                        $r1=$con->query($s1);

                                         $count=0;
                                        $count1=0;
                                        $count2=0;
                                        $count3=0;
                                        $count4=0;
                                        $count5=0;
                                        $count6=0;
                                        $count7=0;

                                        $count8=0;
                                        $count9=0;
                                        $count10=0;
                                        $count11=0;
                                        
                                        while($rooo=$r1->fetch_assoc()){

                                            $slot=$rooo['slot'];
                                              if( $slot == '9:00 am - 10:00 am'){
$count=1;
}
  if( $slot == '10:00 am - 11:00 am') {$count1=2;}
                                               if( $slot == '11:00 am - 12:00 pm') {
                                                $count2=3;
                                               }
                                            if( $slot == '12:00 pm - 01:00 pm') {
                                                $count3=4;
                                            }
                                         if( $slot == '01:00 pm - 02:00 pm') {
                                            $count4=5;
                                         }
                                                 if( $slot == '02:00 pm - 03:00 pm'){
                                                    $count5=6;
                                                 }                                               
                                                  if( $slot == '03:00 pm - 04:00 pm') {
                                                    $count6=7;
                                                  }
                                             if( $slot == '04:00 pm - 05:00 pm'){
                                                $count7=8;
                                             } 
                                         if( $slot == '05:00 pm - 06:00 pm') {
                                            $count8=9;
                                         }
                                         if( $slot == '06:00 pm - 07:00 pm') {
                                            $count9=10;
                                         }
                                    if( $slot == '07:00 pm - 08:00 pm') {
                                        $count10=11;
                                    }
                                    if( $slot == '08:00 pm - 09:00 pm') {
                                        $count=12;
                                    }


                                        }
                                        
                                            
                                            ?>

                                             <input type="checkbox"
                                            
                                            placeholder="Choose Date" name="days[]" value="Monday" <?php if($flag==true){echo 'checked';}?>>Monday</div>
                                            <div class="col-12 col-sm-12">
                                            <select multiple=""  style="height: 60px;" class="form-select border-0" name="timeslot2[]">
                                                  <option value="">Select Timeslot</option>
                                           

<option  <?php if($count == '1') echo "selected"; ?>>9:00 am - 10:00 am</option>
                                                <option <?php if($count1 == '2') echo "selected"; ?>>10:00 am - 11:00 am</option>
                                                <option <?php if($count2 == '3') echo "selected"; ?>>11:00 am - 12:00 pm</option>
                                                <option <?php if($count3 == '4') echo "selected"; ?>>12:00 pm - 01:00 pm</option>
                                                <option <?php if($count4 == '5') echo "selected"; ?>>01:00 pm - 02:00 pm</option>
                                                <option <?php if($count5== '6') echo "selected"; ?>>02:00 pm - 03:00 pm</option>
                                                <option <?php if($count6 == '7') echo "selected"; ?>>03:00 pm - 04:00 pm</option>
                                                <option <?php if($count7 == '8') echo "selected"; ?>>04:00 pm - 05:00 pm</option>
                                                <option <?php if($coun8 == '9') echo "selected"; ?>>05:00 pm - 06:00 pm</option>
                                                <option <?php if($count9 == '10') echo "selected"; ?>>06:00 pm - 07:00 pm</option>
                                                <option <?php if($count10 == '11') echo "selected"; ?>>07:00 pm - 08:00 pm</option>
                                                <option <?php if($count11 == '12') echo "selected"; ?>>08:00 pm - 09:00 pm</option>




                                     
                                                
                                            </select>
                                        </div>
                                         <div class="col-12 col-sm-6">
                                                 <?php
                                        $flag=false;
                                        $s="select * from doc_days where days='Tuesday' and doc_id=$doctor ";
                                        $r=$con->query($s);
                                       
                                        $co=$r->num_rows;
                                        $roo=$r->fetch_assoc();
                                        $day_id=$roo['id'];
                                        if($co>0){
                                            $flag=true;

                                        }
                                        else{
                                            $flag=false;
                                        }


                                        ?>
                                         <?php
                                         $s1="SELECT * FROM `doctor_timeslot` where  doc_id='$doctor' and day_id='$day_id'";
                                        $r1=$con->query($s1);
                                        
                                         $count=0;
                                        $count1=0;
                                        $count2=0;
                                        $count3=0;
                                        $count4=0;
                                        $count5=0;
                                        $count6=0;
                                        $count7=0;

                                        $count8=0;
                                        $count9=0;
                                        $count10=0;
                                        $count11=0;
                                        
                                        while($rooo=$r1->fetch_assoc()){

                                            $slot=$rooo['slot'];
                                              if( $slot == '9:00 am - 10:00 am'){
$count=1;
}
  if( $slot == '10:00 am - 11:00 am') {$count1=2;}
                                               if( $slot == '11:00 am - 12:00 pm') {
                                                $count2=3;
                                               }
                                            if( $slot == '12:00 pm - 01:00 pm') {
                                                $count3=4;
                                            }
                                         if( $slot == '01:00 pm - 02:00 pm') {
                                            $count4=5;
                                         }
                                                 if( $slot == '02:00 pm - 03:00 pm'){
                                                    $count5=6;
                                                 }                                               
                                                  if( $slot == '03:00 pm - 04:00 pm') {
                                                    $count6=7;
                                                  }
                                             if( $slot == '04:00 pm - 05:00 pm'){
                                                $count7=8;
                                             } 
                                         if( $slot == '05:00 pm - 06:00 pm') {
                                            $count8=9;
                                         }
                                         if( $slot == '06:00 pm - 07:00 pm') {
                                            $count9=10;
                                         }
                                    if( $slot == '07:00 pm - 08:00 pm') {
                                        $count10=11;
                                    }
                                    if( $slot == '08:00 pm - 09:00 pm') {
                                        $count=12;
                                    }


                                        }
                                            
                                            ?>
                                      
                                             <input type="checkbox"
                                            
                                            placeholder="Choose Date" name="days[]" value="Tuesday" <?php if($flag==true){echo 'checked';}?>>Tuesday</div>
                                            <div class="col-12 col-sm-12">
                                            <select multiple=""  style="height: 60px;" class="form-select border-0" name="timeslot3[]">
                                                 <option value="">Select Timeslot</option>
                                            

<option  <?php if($count == '1') echo "selected"; ?>>9:00 am - 10:00 am</option>
                                                <option <?php if($count1 == '2') echo "selected"; ?>>10:00 am - 11:00 am</option>
                                                <option <?php if($count2 == '3') echo "selected"; ?>>11:00 am - 12:00 pm</option>
                                                <option <?php if($count3 == '4') echo "selected"; ?>>12:00 pm - 01:00 pm</option>
                                                <option <?php if($count4 == '5') echo "selected"; ?>>01:00 pm - 02:00 pm</option>
                                                <option <?php if($count5== '6') echo "selected"; ?>>02:00 pm - 03:00 pm</option>
                                                <option <?php if($count6 == '7') echo "selected"; ?>>03:00 pm - 04:00 pm</option>
                                                <option <?php if($count7 == '8') echo "selected"; ?>>04:00 pm - 05:00 pm</option>
                                                <option <?php if($coun8 == '9') echo "selected"; ?>>05:00 pm - 06:00 pm</option>
                                                <option <?php if($count9 == '10') echo "selected"; ?>>06:00 pm - 07:00 pm</option>
                                                <option <?php if($count10 == '11') echo "selected"; ?>>07:00 pm - 08:00 pm</option>
                                                <option <?php if($count11 == '12') echo "selected"; ?>>08:00 pm - 09:00 pm</option>




                                     

                                            </select>
                                        </div>
                                         <div class="col-12 col-sm-6">
                                                 <?php
                                        $flag=false;
                                        $s="select * from doc_days where days='Wednesday' and doc_id=$doctor ";
                                       $r=$con->query($s);
                                        $co=$r->num_rows;
                                        $roo=$r->fetch_assoc();
                                        $day_id=$roo['id'];
                                        if($co>0){
                                            $flag=true;

                                        }
                                        else{
                                            $flag=false;
                                        }


                                        ?>
                                         <?php
                                         $s1="SELECT * FROM `doctor_timeslot` where  doc_id='$doctor' and day_id='$day_id'";
                                        $r1=$con->query($s1);
                                        
                                         $count=0;
                                        $count1=0;
                                        $count2=0;
                                        $count3=0;
                                        $count4=0;
                                        $count5=0;
                                        $count6=0;
                                        $count7=0;

                                        $count8=0;
                                        $count9=0;
                                        $count10=0;
                                        $count11=0;
                                        
                                        while($rooo=$r1->fetch_assoc()){

                                            $slot=$rooo['slot'];
                                              if( $slot == '9:00 am - 10:00 am'){
$count=1;
}
  if( $slot == '10:00 am - 11:00 am') {$count1=2;}
                                               if( $slot == '11:00 am - 12:00 pm') {
                                                $count2=3;
                                               }
                                            if( $slot == '12:00 pm - 01:00 pm') {
                                                $count3=4;
                                            }
                                         if( $slot == '01:00 pm - 02:00 pm') {
                                            $count4=5;
                                         }
                                                 if( $slot == '02:00 pm - 03:00 pm'){
                                                    $count5=6;
                                                 }                                               
                                                  if( $slot == '03:00 pm - 04:00 pm') {
                                                    $count6=7;
                                                  }
                                             if( $slot == '04:00 pm - 05:00 pm'){
                                                $count7=8;
                                             } 
                                         if( $slot == '05:00 pm - 06:00 pm') {
                                            $count8=9;
                                         }
                                         if( $slot == '06:00 pm - 07:00 pm') {
                                            $count9=10;
                                         }
                                    if( $slot == '07:00 pm - 08:00 pm') {
                                        $count10=11;
                                    }
                                    if( $slot == '08:00 pm - 09:00 pm') {
                                        $count=12;
                                    }


                                        }
                                            
                                            ?>
                                       

                                         <input type="checkbox"
                                            
                                            placeholder="Choose Date" name="days[]" value="Wednesday" <?php if($flag==true){echo 'checked';}?>>Wednesday</div>
                                            <div class="col-12 col-sm-12">
                                            <select multiple=""  style="height: 60px;" class="form-select border-0" name="timeslot4[]">
                                                <option value="">Select Timeslot</option>
                                           

<option  <?php if($count == '1') echo "selected"; ?>>9:00 am - 10:00 am</option>
                                                <option <?php if($count1 == '2') echo "selected"; ?>>10:00 am - 11:00 am</option>
                                                <option <?php if($count2 == '3') echo "selected"; ?>>11:00 am - 12:00 pm</option>
                                                <option <?php if($count3 == '4') echo "selected"; ?>>12:00 pm - 01:00 pm</option>
                                                <option <?php if($count4 == '5') echo "selected"; ?>>01:00 pm - 02:00 pm</option>
                                                <option <?php if($count5== '6') echo "selected"; ?>>02:00 pm - 03:00 pm</option>
                                                <option <?php if($count6 == '7') echo "selected"; ?>>03:00 pm - 04:00 pm</option>
                                                <option <?php if($count7 == '8') echo "selected"; ?>>04:00 pm - 05:00 pm</option>
                                                <option <?php if($coun8 == '9') echo "selected"; ?>>05:00 pm - 06:00 pm</option>
                                                <option <?php if($count9 == '10') echo "selected"; ?>>06:00 pm - 07:00 pm</option>
                                                <option <?php if($count10 == '11') echo "selected"; ?>>07:00 pm - 08:00 pm</option>
                                                <option <?php if($count11 == '12') echo "selected"; ?>>08:00 pm - 09:00 pm</option>




                                      
                                            </select>
                                        </div>
                                         <div class="col-12 col-sm-6">
                                                 <?php
                                        $flag=false;
                                        $s="select * from doc_days where days='Thursday' and doc_id=$doctor ";
                                        $r=$con->query($s);
                                        $co=$r->num_rows;
                                        $roo=$r->fetch_assoc();
                                        $day_id=$roo['id'];
                                        if($co>0){
                                            $flag=true;

                                        }
                                        else{
                                            $flag=false;
                                        }


                                        ?>
                                         <?php
                                         $s1="SELECT * FROM `doctor_timeslot` where  doc_id='$doctor' and day_id='$day_id'";
                                        $r1=$con->query($s1);
                                        
                                         $count=0;
                                        $count1=0;
                                        $count2=0;
                                        $count3=0;
                                        $count4=0;
                                        $count5=0;
                                        $count6=0;
                                        $count7=0;

                                        $count8=0;
                                        $count9=0;
                                        $count10=0;
                                        $count11=0;
                                        
                                        while($rooo=$r1->fetch_assoc()){

                                            $slot=$rooo['slot'];
                                              if( $slot == '9:00 am - 10:00 am'){
$count=1;
}
  if( $slot == '10:00 am - 11:00 am') {$count1=2;}
                                               if( $slot == '11:00 am - 12:00 pm') {
                                                $count2=3;
                                               }
                                            if( $slot == '12:00 pm - 01:00 pm') {
                                                $count3=4;
                                            }
                                         if( $slot == '01:00 pm - 02:00 pm') {
                                            $count4=5;
                                         }
                                                 if( $slot == '02:00 pm - 03:00 pm'){
                                                    $count5=6;
                                                 }                                               
                                                  if( $slot == '03:00 pm - 04:00 pm') {
                                                    $count6=7;
                                                  }
                                             if( $slot == '04:00 pm - 05:00 pm'){
                                                $count7=8;
                                             } 
                                         if( $slot == '05:00 pm - 06:00 pm') {
                                            $count8=9;
                                         }
                                         if( $slot == '06:00 pm - 07:00 pm') {
                                            $count9=10;
                                         }
                                    if( $slot == '07:00 pm - 08:00 pm') {
                                        $count10=11;
                                    }
                                    if( $slot == '08:00 pm - 09:00 pm') {
                                        $count=12;
                                    }


                                        }
                                            
                                            ?>
                                       
                                             <input type="checkbox"
                                            
                                            placeholder="Choose Date" name="days[]" value="Thursday" <?php if($flag==true){echo 'checked';}?>>Thursday</div>
                                            <div class="col-12 col-sm-12">
                                            <select multiple=""  style="height: 60px;" class="form-select border-0" name="timeslot5[]">
                                                 <option value="">Select Timeslot</option>
                                          

<option  <?php if($count == '1') echo "selected"; ?>>9:00 am - 10:00 am</option>
                                                <option <?php if($count1 == '2') echo "selected"; ?>>10:00 am - 11:00 am</option>
                                                <option <?php if($count2 == '3') echo "selected"; ?>>11:00 am - 12:00 pm</option>
                                                <option <?php if($count3 == '4') echo "selected"; ?>>12:00 pm - 01:00 pm</option>
                                                <option <?php if($count4 == '5') echo "selected"; ?>>01:00 pm - 02:00 pm</option>
                                                <option <?php if($count5== '6') echo "selected"; ?>>02:00 pm - 03:00 pm</option>
                                                <option <?php if($count6 == '7') echo "selected"; ?>>03:00 pm - 04:00 pm</option>
                                                <option <?php if($count7 == '8') echo "selected"; ?>>04:00 pm - 05:00 pm</option>
                                                <option <?php if($coun8 == '9') echo "selected"; ?>>05:00 pm - 06:00 pm</option>
                                                <option <?php if($count9 == '10') echo "selected"; ?>>06:00 pm - 07:00 pm</option>
                                                <option <?php if($count10 == '11') echo "selected"; ?>>07:00 pm - 08:00 pm</option>
                                                <option <?php if($count11 == '12') echo "selected"; ?>>08:00 pm - 09:00 pm</option>




                                      
                                            </select>
                                        </div>
                                         <div class="col-12 col-sm-6">
                                                 <?php
                                        $flag=false;
                                        $s="select * from doc_days where days='Friday' and doc_id=$doctor ";
                                        $r=$con->query($s);
                                        $co=$r->num_rows;
                                        $roo=$r->fetch_assoc();
                                        $day_id=$roo['id'];
                                        if($co>0){
                                            $flag=true;

                                        }
                                        else{
                                            $flag=false;
                                        }


                                        ?>
                                         <?php
                                         $s1="SELECT * FROM `doctor_timeslot` where  doc_id='$doctor' and day_id='$day_id'";
                                        $r1=$con->query($s1);
                                        
                                          $count=0;
                                        $count1=0;
                                        $count2=0;
                                        $count3=0;
                                        $count4=0;
                                        $count5=0;
                                        $count6=0;
                                        $count7=0;

                                        $count8=0;
                                        $count9=0;
                                        $count10=0;
                                        $count11=0;
                                        
                                        while($rooo=$r1->fetch_assoc()){

                                            $slot=$rooo['slot'];
                                              if( $slot == '9:00 am - 10:00 am'){
$count=1;
}
  if( $slot == '10:00 am - 11:00 am') {$count1=2;}
                                               if( $slot == '11:00 am - 12:00 pm') {
                                                $count2=3;
                                               }
                                            if( $slot == '12:00 pm - 01:00 pm') {
                                                $count3=4;
                                            }
                                         if( $slot == '01:00 pm - 02:00 pm') {
                                            $count4=5;
                                         }
                                                 if( $slot == '02:00 pm - 03:00 pm'){
                                                    $count5=6;
                                                 }                                               
                                                  if( $slot == '03:00 pm - 04:00 pm') {
                                                    $count6=7;
                                                  }
                                             if( $slot == '04:00 pm - 05:00 pm'){
                                                $count7=8;
                                             } 
                                         if( $slot == '05:00 pm - 06:00 pm') {
                                            $count8=9;
                                         }
                                         if( $slot == '06:00 pm - 07:00 pm') {
                                            $count9=10;
                                         }
                                    if( $slot == '07:00 pm - 08:00 pm') {
                                        $count10=11;
                                    }
                                    if( $slot == '08:00 pm - 09:00 pm') {
                                        $count=12;
                                    }


                                        }
                                            
                                            ?>
                                        
                                             <input type="checkbox"
                                            
                                            placeholder="Choose Date" name="days[]" value="Friday" <?php if($flag==true){echo 'checked';}?>>Friday</div>
                                            <div class="col-12 col-sm-12">
                                        <select multiple=""  style="height: 60px;" class="form-select border-0" name="timeslot6[]">
                                                 <option value="">Select Timeslot</option>
                                          

<option  <?php if($count == '1') echo "selected"; ?>>9:00 am - 10:00 am</option>
                                                <option <?php if($count1 == '2') echo "selected"; ?>>10:00 am - 11:00 am</option>
                                                <option <?php if($count2 == '3') echo "selected"; ?>>11:00 am - 12:00 pm</option>
                                                <option <?php if($count3 == '4') echo "selected"; ?>>12:00 pm - 01:00 pm</option>
                                                <option <?php if($count4 == '5') echo "selected"; ?>>01:00 pm - 02:00 pm</option>
                                                <option <?php if($count5== '6') echo "selected"; ?>>02:00 pm - 03:00 pm</option>
                                                <option <?php if($count6 == '7') echo "selected"; ?>>03:00 pm - 04:00 pm</option>
                                                <option <?php if($count7 == '8') echo "selected"; ?>>04:00 pm - 05:00 pm</option>
                                                <option <?php if($coun8 == '9') echo "selected"; ?>>05:00 pm - 06:00 pm</option>
                                                <option <?php if($count9 == '10') echo "selected"; ?>>06:00 pm - 07:00 pm</option>
                                                <option <?php if($count10 == '11') echo "selected"; ?>>07:00 pm - 08:00 pm</option>
                                                <option <?php if($count11 == '12') echo "selected"; ?>>08:00 pm - 09:00 pm</option>




                                     
                                            </select></div>
                                             <div class="col-12 col-sm-6">
                                                     <?php
                                        $flag=false;
                                        $s="select * from doc_days where days='Saturday' and doc_id=$doctor ";
                                        $r=$con->query($s);
                                        $co=$r->num_rows;
                                        $roo=$r->fetch_assoc();
                                        $day_id=$roo['id'];
                                        if($co>0){
                                            $flag=true;

                                        }
                                        else{
                                            $flag=false;
                                        }


                                        ?>
                                         <?php
                                         $s1="SELECT * FROM `doctor_timeslot` where  doc_id='$doctor' and day_id='$day_id'";
                                        $r1=$con->query($s1);
                                        
                                         $count=0;
                                        $count1=0;
                                        $count2=0;
                                        $count3=0;
                                        $count4=0;
                                        $count5=0;
                                        $count6=0;
                                        $count7=0;

                                        $count8=0;
                                        $count9=0;
                                        $count10=0;
                                        $count11=0;
                                        
                                        while($rooo=$r1->fetch_assoc()){

                                            $slot=$rooo['slot'];
                                              if( $slot == '9:00 am - 10:00 am'){
$count=1;
}
  if( $slot == '10:00 am - 11:00 am') {$count1=2;}
                                               if( $slot == '11:00 am - 12:00 pm') {
                                                $count2=3;
                                               }
                                            if( $slot == '12:00 pm - 01:00 pm') {
                                                $count3=4;
                                            }
                                         if( $slot == '01:00 pm - 02:00 pm') {
                                            $count4=5;
                                         }
                                                 if( $slot == '02:00 pm - 03:00 pm'){
                                                    $count5=6;
                                                 }                                               
                                                  if( $slot == '03:00 pm - 04:00 pm') {
                                                    $count6=7;
                                                  }
                                             if( $slot == '04:00 pm - 05:00 pm'){
                                                $count7=8;
                                             } 
                                         if( $slot == '05:00 pm - 06:00 pm') {
                                            $count8=9;
                                         }
                                         if( $slot == '06:00 pm - 07:00 pm') {
                                            $count9=10;
                                         }
                                    if( $slot == '07:00 pm - 08:00 pm') {
                                        $count10=11;
                                    }
                                    if( $slot == '08:00 pm - 09:00 pm') {
                                        $count=12;
                                    }


                                        }
                                            
                                            ?>
                                       
                                             <input type="checkbox"
                                            
                                            placeholder="Choose Date" name="days[]" value="Saturday" <?php if($flag==true){echo 'checked';}?>>Saturday</div>
                                            <div class="col-12 col-sm-12">
                                            <select multiple=""  style="height: 60px;" class="form-select border-0" name="timeslot7[]">
                                                <option value="">Select Timeslot</option>
   
<option  <?php if($count == '1') echo "selected"; ?>>9:00 am - 10:00 am</option>
                                                <option <?php if($count1 == '2') echo "selected"; ?>>10:00 am - 11:00 am</option>
                                                <option <?php if($count2 == '3') echo "selected"; ?>>11:00 am - 12:00 pm</option>
                                                <option <?php if($count3 == '4') echo "selected"; ?>>12:00 pm - 01:00 pm</option>
                                                <option <?php if($count4 == '5') echo "selected"; ?>>01:00 pm - 02:00 pm</option>
                                                <option <?php if($count5== '6') echo "selected"; ?>>02:00 pm - 03:00 pm</option>
                                                <option <?php if($count6 == '7') echo "selected"; ?>>03:00 pm - 04:00 pm</option>
                                                <option <?php if($count7 == '8') echo "selected"; ?>>04:00 pm - 05:00 pm</option>
                                                <option <?php if($coun8 == '9') echo "selected"; ?>>05:00 pm - 06:00 pm</option>
                                                <option <?php if($count9 == '10') echo "selected"; ?>>06:00 pm - 07:00 pm</option>
                                                <option <?php if($count10 == '11') echo "selected"; ?>>07:00 pm - 08:00 pm</option>
                                                <option <?php if($count11 == '12') echo "selected"; ?>>08:00 pm - 09:00 pm</option>




                                   
                                            </select>
                                        </div>


                                    <br><br><br>

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


    <!-- Team End -->
        

    <!-- Footer Start -->
   <?php


include 'footer.php';
   ?>