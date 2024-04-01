<?php
session_start();
require 'connection.php';
$id=$_SESSION['id'];
$sql="select * from hospital where id=$id";
$result=$con->query($sql);
$row=$result->fetch_assoc();
$lattitude=$row['lattitude'];
$longitude=$row['longitude'];

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title><?php echo $row['name'];?></title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;500&family=Roboto:wght@500;700;900&display=swap" rel="stylesheet"> 

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/animate/animate.min.css" rel="stylesheet">
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="css/style.css" rel="stylesheet">
</head>

<body>
    <!-- Spinner Start -->
    <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
        <div class="spinner-grow text-primary" style="width: 3rem; height: 3rem;" role="status">
            <span class="sr-only">Loading...</span>
        </div>
    </div>
    <!-- Spinner End -->


    <!-- Topbar Start -->
    <div class="container-fluid bg-light p-0 wow fadeIn" data-wow-delay="0.1s" >
        <div class="row gx-0 d-none d-lg-flex" style="background-color:  #aac99c">
            <div class="col-lg-7 px-5 text-start">
                <div class="h-100 d-inline-flex align-items-center py-3 me-4">
                    <small class="fa fa-map-marker-alt text-primary me-2"></small>
                    <small><?php echo $row['street'];?>,<?php echo $row['district'];?>,<?php echo $row['state'];?></small>
                </div>
                <div class="h-100 d-inline-flex align-items-center py-3">
                    <small class="far fa-clock text-primary me-2"></small>
                    <small>Mon - Fri : 09.00 AM - 09.00 PM</small>
                </div>
            </div>
            <div class="col-lg-5 px-5 text-end">
                <div class="h-100 d-inline-flex align-items-center py-3 me-4">
                    <small class="fa fa-phone-alt text-primary me-2"></small>
                    <small><?php echo $row['phone'];?></small>
                </div>
               
            </div>
        </div>
    </div>
    <!-- Topbar End -->


    <!-- Navbar Start -->
    <nav class="navbar navbar-expand-lg bg-white navbar-light sticky-top p-0 wow fadeIn" data-wow-delay="0.1s">
        <a href="index.php" class="navbar-brand d-flex align-items-center px-4 px-lg-5">
            <h1 class="m-0 text-primary"><i class="far fa-hospital me-3"></i><?php echo $row['name'];?></h1>
        </a>
        <button type="button" class="navbar-toggler me-4" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <div class="navbar-nav ms-auto p-4 p-lg-0">
                <a href="index.php" class="nav-item nav-link active">Home</a>
                <!-- <a href="about.php" class="nav-item nav-link">About</a> -->
                
                <div class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Pages</a>
                    <div class="dropdown-menu rounded-0 rounded-bottom m-0">
                      <!--   <a href="feature.php" class="dropdown-item">Feature</a> -->
                         <a href="department.php" class="dropdown-item">Department</a>
                        <a href="team.php" class="dropdown-item">Our Doctor</a>
                        <a href="appointment.php" class="dropdown-item">Appointment</a>
                          <a href="view_revenue.php?id=<?php echo $id;?>"  target="_blank" class="dropdown-item">Revenue</a>
                       <!--  <a href="testimonial.php" class="dropdown-item">Testimonial</a>
                        <a href="404.php" class="dropdown-item">404 Page</a> -->
                    </div>
                </div>
                 <div class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Test</a>
                    <div class="dropdown-menu rounded-0 rounded-bottom m-0">
                    
                       
                          <a href="test.php" class="dropdown-item">Test</a>
                        <a href="test_booking.php" class="dropdown-item">Test Booking</a>
                       
                    
                    </div>
                </div>
               
                  <a href="review.php" class="nav-item nav-link">Reviews</a>
                   <a href="notification.php" class="nav-item nav-link">Emergency</a>
                <a href="profile.php" class="nav-item nav-link">Profile</a> 
                 <a href="logout.php" class="nav-item nav-link">Logout</a>
            </div>
            <!-- <a href="appointment.php" class="btn btn-primary rounded-0 py-4 px-lg-5 d-none d-lg-block">Appointment</a> -->
        </div>
    </nav>
    <span id="reload">
        <?php
        $sql="SELECT `s`.lattitude,`s`.longitude,`s`.place,`s`.read_status,`s`.id, (((acos(sin(($lattitude*pi()/180)) * sin((s.lattitude*pi()/180))+cos(($lattitude*pi()/180)) * cos((s.lattitude*pi()/180)) * cos((($longitude - s.longitude)*pi()/180))))*180/pi())*60*1.1515*1.609344) AS distance FROM (`emergency` as s) where read_status=0 HAVING distance <= 30 ORDER BY `s`.id DESC";
$result=$con->query($sql);
$count=$result->num_rows;
if($count>0){
    echo '<div class="alert alert-danger" role="alert">You Have New Notification <a href="notification.php" class="alert-link">Please Click Here...</a></div>';
}
else{
    echo '';
}

        ?>
    </span>
    <script type="text/javascript" href="https://cdnout.com/bootstrap-notify/css/bootstrap-notify.min.css"></script>
    <script type="text/javascript">




//var hiddenReload= $('#hiddenReload').val();
                setInterval(function() {
             
                   
                                     $.ajax({

            type: 'POST',

            url: "reload_every.php",

            data: {

              

            },

            beforeSend: function() {

                // Show image container

               // $("#loader1").show();

            },

            success: function(data) {
            	if(data==1){
               
 $('#reload').html('<p><div class="alert alert-danger" role="alert">This is a danger alert with <a href="#" class="alert-link">an example link</a>. Give it a click if you like.</div></p>');      }
$("#reload").load(location.href + " #reload");



            },

            complete: function(data) {

                // Hide image container

               // $("#loader1").hide();

            }

        });

                }, 5000);


    </script>