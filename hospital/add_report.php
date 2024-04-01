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
            <h1 class="display-3 text-white mb-3 animated slideInDown">Report</h1>
            <nav aria-label="breadcrumb animated slideInDown">
                <ol class="breadcrumb text-uppercase mb-0">
                    <li class="breadcrumb-item"><a class="text-white" href="#">Home</a></li>
                    <li class="breadcrumb-item"><a class="text-white" href="#">Pages</a></li>
                    <li class="breadcrumb-item text-primary active" aria-current="page">Report</li>
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
                        <form method="post" action="report_action.php">
                            <div class="row g-3">
                                <div class="col-12 col-sm-12">
                                   <!--  <input type="text" name="deptname" id="deptname" class="form-control border-0" placeholder="Department Name" style="height: 55px;"> -->
                                   <input type="hidden" name="appoinment_id" value="<?php echo $appoinment_id;?>">
                                    <select class="form-control border-0" name="doctor" id="doctor" style="height: 55px;">
                                        <option>Select Doctor</option>
                                        <?php
                                        $sql="select * from doctors where hospital_id=$id";
                                        $result=$con->query($sql);
                                        while($row=$result->fetch_assoc()){
                                            ?>
                                            <option value="<?php echo $row['id']?>"><?php echo $row['doctor_name']?></option>
                                            <?php
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="col-12 col-sm-12"><label>What Date was the patient first aware of symptoms /conditions?</label>
                                </div>
                                <input type="date" name="aware_date" class="form-control border-0">
                                 <div class="col-12 col-sm-12"><label>First symptoms</label>
                                </div>
                                <input type="text" name="first_symptoms" class="form-control border-0">
                                 <div class="col-12 col-sm-12"><label>Diagnosis</label>
                                </div>

                                <input type="text" name="diagnosis" class="form-control border-0">

                                 <div class="col-12 col-sm-12"><label>Has patient previously suffered from the same complaints? </label><br>
                                     <input type="radio" name="complaints" value="No">No
                                     <input type="radio" name="complaints" value="Yes">Yes
                                </div>
                                <div class="col-12 col-sm-12"><label>When Last time</label><br>
                                   <input type="text" name="lasttime" class="form-control border-0">    
                                </div>
                                <div class="col-12 col-sm-12"><label>Breif Description of treatment already given</label><br>
                                   <textarea type="text" name="description" class="form-control border-0"></textarea>    
                                </div>
                                <div class="col-12 col-sm-12"><label>Reason for referral for specialist treatment</label><br>
                                   <textarea type="text" name="treatment" class="form-control border-0"> </textarea>   
                                </div>
                                <label><strong>INCASE OF HOSPITAL ADMISSION</strong></label>
                               
                                <div class="col-12 col-sm-12">
                                   <label>Date of Admission</label><br>
                                    <input type="date" name="admission_date" class="form-control border-0">
                                </div>
                                <div class="col-12 col-sm-12">
                                   <label>Anticipated date of Discharge</label><br>
                                    <input type="date" name="discharge_date" class="form-control border-0">
                                </div>
                                 
                               
                               
                                <div class="col-12">
                                    <button class="btn btn-primary w-100 py-3" id="department" type="submit">Add</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <br><br>
           


           

                <button><a href="view_report.php?id=<?php echo $appoinment_id;?>">View PDF</a></button>
                
               
                
               
               
               
                
            
            </div>
        </div>
    </div>
    <!-- Team End -->
        

    <!-- Footer Start -->
    <?php
    include 'footer.php';
    ?>