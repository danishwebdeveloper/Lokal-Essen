<!DOCTYPE html>
<?php include_once './index.php'; ?>

        <!-- Registration Start -->
        <div class="container-xxl py-5">
            <div class="container">
                <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                    <h5 class="section-title ff-secondary text-center text-primary fw-normal">Registered Us</h5>
                    <h1 class="mb-5">Register your Resturant!</h1>
                </div>
                <div class="row g-4">
                    <div class="col-md-6">
                        <div class="wow fadeInUp" data-wow-delay="0.2s">
                            <form action="#" method="POST">
                                <div class="row g-3">
                                    <div class="col-md-6">
                                        <div class="form-floating">
                                            <input type="text" class="form-control" id="fullName"  required="required" name="fullName" placeholder="John Doe">
                                            <label for="name">First and Last Name</label>
                                        </div>
                                    </div>
                                   <div class="col-md-6">
                                        <div class="form-floating">
                                            <input type="text" class="form-control" id="resturantName" required="required" name="resturantName" placeholder="Example Pizza">
                                            <label for="name">Resturant Name</label>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-floating">
                                            <input type="text" class="form-control" id="resturantCity" required="required" name="resturantCity" placeholder="Berlin">
                                            <label for="name">City of Resturant</label>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-floating">
                                            <input type="text" class="form-control" id="email" required="required" name="email" placeholder="Subject">
                                            <label for="subject">Email</label>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-floating">
                                            <input type="text" class="form-control" id="cellPhone" required="required" name="cellPhone" placeholder="+49 176 54540987">
                                            <label for="name">Personal Phone Number</label>
                                        </div>
                                    </div>       
                                    <div class="col-12">
                                        <button class="btn btn-primary w-100 py-3" name="submit" id="submit" type="submit">I want to be there</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

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

<?php
include './db_connection.php';
    if(isset($_POST['submit'])){
        $fullName = $_POST['fullName'];
        $resturantName = $_POST['resturantName'];
        $resturantCity = $_POST['resturantCity'];
        $email = $_POST['email'];
        $cellPhone = $_POST['cellPhone'];
        
        $query = "INSERT INTO `resturant_registration`(`fullname`,`resturantname`,`resturantcity`,`email`,`cellphone`)"
                . "VALUES('$fullName', '$resturantName', '$resturantCity', '$email', '$cellPhone')";
        
        $email_check = "SELECT *from `resturant_registration` where email='".$email."'";
        $run_query = mysqli_query($connection, $email_check);
        if(mysqli_num_rows($run_query)>0){ ?>
        <script>
            alert('Email Alread exist!!');
        </script>
        <?php }
        else{
            
        $run_query = mysqli_query($connection, $query);
        
        if($run_query){
            echo '<div class="alert alert-success" role="alert">
                    You registered Succesfully!
                </div>';
        }
        else
        {
            echo '<div class="alert alert-success" role="alert">
                    "Error: " . $query . "<br>" . $connection->error;
                </div>';
        }
        
        $connection->close();
    }
   }
?>

