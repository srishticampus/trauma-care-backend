<?php
include 'header.php';
$id=$_SESSION['id'];
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
                        <form method="post" action="department_action.php" enctype="multipart/form-data">
                            <div class="row g-3">
                                <div class="col-12 col-sm-12">
                                   <!--  <input type="text" name="deptname" id="deptname" class="form-control border-0" placeholder="Department Name" style="height: 55px;"> -->
                                    <select class="form-control border-0" name="deptname[]" id="deptname" multiple="" style="height: 55px;">
                                        <option value="">Select Department</option>
                                        <?php
                                        $sql="select * from dept";
                                        $result=$con->query($sql);
                                        while($row=$result->fetch_assoc()){
                                            ?>
                                            <option value="<?php echo $row['name']?>"><?php echo $row['name']?></option>
                                            <?php
                                        }
                                        ?>
                                    </select>
                                </div>
                                <!-- <div class="col-12 col-sm-6">
                                    <input type="file" name="file" id="file" class="form-control border-0" placeholder="File" style="height: 55px;">
                                </div> -->
                               
                               
                                <div class="col-12">
                                    <button class="btn btn-primary w-100 py-3" id="department" type="submit" style="background-color: #eda537;border-style: none;">Add</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <br><br>
            <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
                <p class="d-inline-block border rounded-pill py-1 px-4">Departments</p>
                <h1>Our Departments</h1>
            </div>


            <div class="row g-4">
                <?php
                $sql="select * from department where hospital_id=$id";
                $result=$con->query($sql);
                while ( $row=$result->fetch_assoc()) {
                    $name=$row['department_name'];
                    $department_id=$row['id'];
                    $sql1="select * from dept where name='$name'";
                    $result1=$con->query($sql1);
                    $row1=$result1->fetch_assoc();
                    ?>


                    <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="team-item position-relative rounded overflow-hidden">
                        <div class="overflow-hidden">
                            <img class="img-fluid" src="uploads/<?php echo $row1['file'] ?>" alt="" style="height: 422px;max-width: 100%">
                        </div>
                        <div class="team-text bg-light text-center p-4">
                            <h5>Department</h5>
                            <p class="text-primary"><?php echo $row['department_name'];?></p>
                            <div class="team-social text-center">
                              <button type="button" class="btn btn-info ">  <a  href="edit_department.php?id=<?php echo $department_id;?>">View</a>
                                </button>
                                <button type="button" class="btn btn-danger"><a  href="delete_department.php?id=<?php echo $department_id;?>">Delete</a></button>
                                
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