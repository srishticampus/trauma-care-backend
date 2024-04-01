<?php
include 'header.php';
?>
    <!-- Navbar End -->

<!-- <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css"> -->
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap4.min.css">
    <!-- Page Header Start -->
    <div class="container-fluid page-header py-5 mb-5 wow fadeIn" data-wow-delay="0.1s">
        <div class="container py-5">
            <h1 class="display-3 text-white mb-3 animated slideInDown">Emergency Notification</h1>
            <nav aria-label="breadcrumb animated slideInDown">
                <ol class="breadcrumb text-uppercase mb-0">
                    <li class="breadcrumb-item"><a class="text-white" href="#">Home</a></li>
                    
                    <li class="breadcrumb-item text-primary active" aria-current="page"> Emergency notification</li>
                </ol>
            </nav>
        </div>
    </div>
    <!-- Page Header End -->


    <!-- About Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="row g-5">
               <!--  <div class="col-lg-6 wow fadeIn" data-wow-delay="0.1s">
                    <div class="d-flex flex-column">
                        <img class="img-fluid rounded w-75 align-self-end" src="img/about-1.jpg" alt="">
                        <img class="img-fluid rounded w-50 bg-white pt-3 pe-3" src="img/about-2.jpg" alt="" style="margin-top: -25%;">
                    </div>
                </div> -->
                <div class="col-lg-12 wow fadeIn" data-wow-delay="0.5s">
                   <table id="example" class="table table-striped table-bordered col-lg-12" style="width:100%">
        <thead>
            <tr>
                <th>Slno</th>
                <th>Place</th>
                <th>Message</th>
                <th>Patient Name</th>
                <th>Patient Email</th>
                <th>Patient Phone</th>
                <th>Action</th>
               
            </tr>
        </thead>
        <?php
        $i=1;
                $sql="SELECT `s`.lattitude,`s`.longitude,`s`.place,`s`.read_status,`s`.id,`s`.user_id,`s`.message,(((acos(sin(($lattitude*pi()/180)) * sin((s.lattitude*pi()/180))+cos(($lattitude*pi()/180)) * cos((s.lattitude*pi()/180)) * cos((($longitude - s.longitude)*pi()/180))))*180/pi())*60*1.1515*1.609344) AS distance FROM (`emergency` as s) HAVING distance <= 30 ORDER BY `s`.id DESC";
                $result=$con->query($sql);
                while ( $row=$result->fetch_assoc()) {
                    $userid=$row['user_id'];
                    // $name=$row['department_name'];
                    $sql1="select * from patient where id='$userid'";
                    $result1=$con->query($sql1);
                    $row1=$result1->fetch_assoc();
                    ?>
        <tbody>
            <tr>
                <td><?php echo $i++;?></td>
                <td><?php echo $row['place']?></td>
                <td><?php echo $row['message'];?></td>
                <td><?php echo $row1['name'];?></td>
                <td><?php echo $row1['email'];?></td>
                <td><?php echo $row1['phone'];?></td>
               
                <td><a href="notfication_status.php?id=<?php echo $row['id'];?>"><?php if($row['read_status']==0)echo 'Read';
                else
                    echo 'Readed';?></a></td>
            </tr>
         
        </tbody>
           <?php
                   
                }
                ?>
    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- About End -->


    
    <!-- Team End -->
        

    <!-- Footer Start -->
   
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
    
  <!--   <script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script> -->
    <script type="text/javascript" src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap4.min.js"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>
      <script type="text/javascript">
        $(document).ready(function () {
    $('#example').DataTable();
});
    </script>
</body>

</html>