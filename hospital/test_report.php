<?php
include 'header.php';
$id=$_SESSION['id'];
$booking_id=$_GET['id'];
?>
    <!-- Navbar End -->

  <script src="https://cdn.ckeditor.com/4.20.0/standard/ckeditor.js"></script>
    <!-- Page Header Start -->
    <div class="container-fluid page-header py-5 mb-5 wow fadeIn" data-wow-delay="0.1s">
        <div class="container py-5">
            <h1 class="display-3 text-white mb-3 animated slideInDown">Test Report</h1>
            <nav aria-label="breadcrumb animated slideInDown">
                <ol class="breadcrumb text-uppercase mb-0">
                    <li class="breadcrumb-item"><a class="text-white" href="#">Home</a></li>
                    <li class="breadcrumb-item"><a class="text-white" href="#">Test</a></li>
                    <li class="breadcrumb-item text-primary active" aria-current="page">Test Report</li>
                </ol>
            </nav>
        </div>
    </div>
    <!-- Page Header End -->


    <!-- Team Start -->
    <div class="container-xxl py-5">
        <div class="container">
  <div class="col-lg-12 wow fadeInUp" data-wow-delay="0.5s">
                    <div class="bg-light rounded h-100 d-flex align-items-center p-5">
                        <?php

                        $sql="select hospital_test.test_id from hospital_test inner join  test_booking on hospital_test.id=test_booking.test_id where test_booking.id=$booking_id";
                        $result=$con->query($sql);
                        $row=$result->fetch_assoc();
                        $test_id=$row['test_id'];
if($test_id==63){
    ?>


<form action="liver_test.php" method="post" enctype="multipart/form-data">
    <h1>Liver Function Test</h1>
                            <div class="row g-3">
                                <input type="hidden" name="booking_id" value="<?php echo $booking_id;?>">
                                <div class="col-12 col-sm-12">
                                   <input type="text" name="quantity" placeholder="Bilurubin Total" class="form-control border-0">
                                </div>
                                 <div class="col-12 col-sm-12">
                                   <input type="text" name="quantity1" placeholder="SGPT(ALT)" class="form-control border-0">
                                </div>
                                 <div class="col-12 col-sm-12">
                                   <input type="text" name="quantity2" placeholder="SGOT(AST)" class="form-control border-0">
                                </div>
                                 <div class="col-12 col-sm-12">
                                   <input type="text" name="quantity3" placeholder="Alkaline Phosphatase" class="form-control border-0">
                                </div>
                                 <div class="col-12 col-sm-12">
                                   <input type="text" name="quantity4" placeholder="Albumine" class="form-control border-0">
                                </div>
                                 <div class="col-12 col-sm-12">
                                   <input type="text" name="quantity5" placeholder="Gamma GT" class="form-control border-0">
                                </div>

 
                               
                                
                               
                                 
                                  


                                    

                                <div class="col-12">
                                    <button class="btn btn-primary w-100 py-3" type="submit">Add</button>
                                </div>
                            </div>
                        </form>



  

    <?php
}
else if($test_id==11){
    ?>


<form action="blood_test.php" method="post" enctype="multipart/form-data">
    <h1>Blood Test</h1>
                            <div class="row g-3">
                                <input type="hidden" name="booking_id" value="<?php echo $booking_id;?>">
                                <div class="col-12 col-sm-12">
                                   <input type="text" name="quantity" placeholder="Hemoglobin" class="form-control border-0">
                                </div>
                                 <div class="col-12 col-sm-12">
                                   <input type="text" name="quantity1" placeholder="RBC" class="form-control border-0">
                                </div>
                                 <div class="col-12 col-sm-12">
                                   <input type="text" name="quantity2" placeholder="HCT" class="form-control border-0">
                                </div>
                                 <div class="col-12 col-sm-12">
                                   <input type="text" name="quantity3" placeholder="MCV" class="form-control border-0">
                                </div>
                                 <div class="col-12 col-sm-12">
                                   <input type="text" name="quantity4" placeholder="MCH" class="form-control border-0">
                                </div>
                                 <div class="col-12 col-sm-12">
                                   <input type="text" name="quantity5" placeholder="MCHC" class="form-control border-0">
                                </div>
                                 <div class="col-12 col-sm-12">
                                   <input type="text" name="quantity6" placeholder="RDW-CV" class="form-control border-0">
                                </div>
                                 <div class="col-12 col-sm-12">
                                   <input type="text" name="quantity7" placeholder="RDW-SD" class="form-control border-0">
                                </div>
                                 <div class="col-12 col-sm-12">
                                   <input type="text" name="quantity8" placeholder="WBC" class="form-control border-0">
                                </div>
                                 <div class="col-12 col-sm-12">
                                   <input type="text" name="quantity9" placeholder="NEU%" class="form-control border-0">
                                </div>
                                 <div class="col-12 col-sm-12">
                                   <input type="text" name="quantity10" placeholder="LYM%" class="form-control border-0">
                                </div>
                                 <div class="col-12 col-sm-12">
                                   <input type="text" name="quantity11" placeholder="MON%" class="form-control border-0">
                                </div>
                                 <div class="col-12 col-sm-12">
                                   <input type="text" name="quantity12" placeholder="EOS%" class="form-control border-0">
                                </div>
                                 <div class="col-12 col-sm-12">
                                   <input type="text" name="quantity13" placeholder="BAS%" class="form-control border-0">
                                </div>
                                 <div class="col-12 col-sm-12">
                                   <input type="text" name="quantity14" placeholder="LYM#" class="form-control border-0">
                                </div>
                                 <div class="col-12 col-sm-12">
                                   <input type="text" name="quantity15" placeholder="GRA#" class="form-control border-0">
                                </div>
                                 <div class="col-12 col-sm-12">
                                   <input type="text" name="quantity16" placeholder="PLT" class="form-control border-0">
                                </div>
                                 <div class="col-12 col-sm-12">
                                   <input type="text" name="quantity17" placeholder="ESR" class="form-control border-0">
                                </div>

 
                               
                                
                               
                                 
                                  


                                    

                                <div class="col-12">
                                    <button class="btn btn-primary w-100 py-3" type="submit">Add</button>
                                </div>
                            </div>
                        </form>



  

    <?php
}

else if($test_id==43){
    ?>


    <form action="test_pdf.php" method="post" enctype="multipart/form-data">
        <h1>Urine Test</h1>
                            <div class="row g-3">
                                <input type="hidden" name="booking_id" value="<?php echo $booking_id;?>">
                                <div class="col-12 col-sm-12">
                                     <input type="text" name="quantity" placeholder="quantity" class="form-control border-0">
                                </div>
                                <div class="col-12 col-sm-12">
                                     <input type="text" name="quantity1" placeholder="Color" class="form-control border-0">
                                </div>
                                <div class="col-12 col-sm-12">
                                     <input type="text" name="quantity2" placeholder="Appearence" class="form-control border-0">
                                </div>
                                <div class="col-12 col-sm-12">
                                     <input type="text" name="quantity3" placeholder="Deposit" class="form-control border-0">
                                </div>
                                <div class="col-12 col-sm-12">
                                     <input type="text" name="quantity15" placeholder="Specific Gravity" class="form-control border-0">
                                </div>
                                 <div class="col-12 col-sm-12">
                                     <input type="text" name="quantity4" placeholder="Reaction(pH)" class="form-control border-0">
                                </div>
                                <div class="col-12 col-sm-12">
                                     <input type="text" name="quantity5" placeholder="Protien" class="form-control border-0">
                                </div>
                                <div class="col-12 col-sm-12">
                                     <input type="text" name="quantity6" placeholder="Glucose" class="form-control border-0">
                                </div>
                                <div class="col-12 col-sm-12">
                                     <input type="text" name="quantity7" placeholder="Occult" class="form-control border-0">
                                </div>
                                <div class="col-12 col-sm-12">
                                     <input type="text" name="quantity8" placeholder="Ketones" class="form-control border-0">
                                </div>
                                <div class="col-12 col-sm-12">
                                     <input type="text" name="quantity9" placeholder="Bile Salt & Pigments" class="form-control border-0">
                                </div>
                                <div class="col-12 col-sm-12">
                                     <input type="text" name="quantity10" placeholder="Pus cells" class="form-control border-0">
                                </div>
                                <div class="col-12 col-sm-12">
                                     <input type="text" name="quantity11" placeholder="Red Blood Cells" class="form-control border-0">
                                </div>
                                <div class="col-12 col-sm-12">
                                     <input type="text" name="quantity12" placeholder="Epithelial Cell" class="form-control border-0">
                                </div>
                                <div class="col-12 col-sm-12">
                                     <input type="text" name="quantity13" placeholder="Casts" class="form-control border-0">
                                </div>
                                <div class="col-12 col-sm-12">
                                     <input type="text" name="quantity14" placeholder="Cristals" class="form-control border-0">
                                </div>
                                

 
                               
                                
                               
                                 
                                  


                                    

                                <div class="col-12">
                                    <button class="btn btn-primary w-100 py-3" type="submit">Add</button>
                                </div>
                            </div>
                        </form>

    <?php
}


?>
                       
                    </div>
                </div>
            </div>
                <br><br>

          
            </div>
            </div>


    <!-- Team End -->
        
<script>
    // Replace the <textarea id="editor1"> with a CKEditor 4
    // instance, using default configuration.
    CKEDITOR.replace('editor2');
    
</script>
    <!-- Footer Start -->
   <?php


include 'footer.php';
   ?>