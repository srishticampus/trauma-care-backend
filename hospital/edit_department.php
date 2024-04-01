<?php
include 'header.php';
$id=$_SESSION['id'];
$department=$_GET['id'];
?>
    <!-- Navbar End -->


    <!-- Page Header Start -->
    <div class="container-fluid page-header py-5 mb-5 wow fadeIn" data-wow-delay="0.1s">
        <div class="container py-5">
            <h1 class="display-3 text-white mb-3 animated slideInDown">Department</h1>
            <nav aria-label="breadcrumb animated slideInDown">
                <ol class="breadcrumb text-uppercase mb-0">
                    <li class="breadcrumb-item"><a class="text-white" href="#">Home</a></li>
                    <li class="breadcrumb-item"><a class="text-white" href="#">Pages</a></li>
                    <li class="breadcrumb-item text-primary active" aria-current="page">Department</li>
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
                        <form action="departmentedit_action.php" method="post" enctype="multipart/form-data">
                            <?php
                            $sql="select * from  department where id=$department";
                            $result=$con->query($sql);
                            $row=$result->fetch_assoc();


                            ?>
                             <input type="hidden" name="id" class="form-control border-0"  style="height: 55px;" value="<?php echo $department;?>">
                            <div class="row g-3">
                                <div class="col-12 col-sm-12">
                                    Department
                                    <select class="form-control border-0" name="deptname" id="deptname" style="height: 55px;">
                                        <option>Select Department</option>
                                        <?php
                                         $selected = "";
                                        $sql1="select * from dept";
                                        $result1=$con->query($sql1);
                                        while($row1=$result1->fetch_assoc()){

                                            if ( $row['department_name'] == $row1['name'] ){

        $selected = "selected";}
                                            ?>
                                            
                                             <option <?php if($row1["name"]==$row['department_name']){?> selected <?php }?> value="<?php echo $row1['name'] ?>"><?php echo $row1['name'];?></option>
                                            <?php
                                        }
                                        ?>
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