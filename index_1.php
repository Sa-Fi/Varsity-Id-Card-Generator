<!-- <!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student ID Card</title>
    <!-- Bootstrap CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .gradient-bar {
            height: 8px;
            background: linear-gradient(to right, gold, white);
            margin-top: 5px;
        }

        .container {
            margin-top: 20px;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .rotate-text {
            writing-mode: vertical-rl;
            text-orientation: mixed;
            transform: rotate(180deg);
            font-weight: bold;
            margin-right: 10px;
            font-size: 30px;
            padding-right: 70px;
        }

        .card-custom {
            padding: 0px;
            width: 65%;
        }

        .logo-img {
            width: 70%;
        }

        .student-img {
            width: 60%;
        }

        .details-info {
            padding-left: 50px;
            text-align: left;
            font-size: 15px;
            font-family: 'Poppins', sans-serif;
            font-weight: 600;
        }

        .details-info-text {
            padding: 0px;
            color: black;
        }

        .card-body1 {
            background: linear-gradient(to bottom, rgba(0, 0, 255, 0.8), rgba(255, 255, 0, 0.5));
            color: white;
        }

        .card-body2 {
            margin: 20px;
        }

        .uni-info {
            font-size: 40px;
        }

        .uni-info1 {
            font-size: 10px;
        }
    </style>
</head>

<body>
    <!-- User Input Section -->
    <div class="container mt-5">
        <div class="row w-100">
            <!-- Form Section -->
            <div class="col-md-3"></div>
            <div class="col-md-6">
                <h2>Student ID Card Form</h2>
                <form action="<?php $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="studentName">Student Name</label>
                        <input type="text" class="form-control" id="studentName" name="studentName" required>
                    </div>
                    <div class="form-group">
                        <label for="program">Program</label>
                        <input type="text" class="form-control" id="program" name="program" required>
                    </div>
                    <div class="form-group">
                        <label for="studentId">Student ID</label>
                        <input type="text" class="form-control" id="studentId" name="studentId" required>
                    </div>
                    <div class="form-group">
                        <label for="bloodGroup">Blood Group</label>
                        <input type="text" class="form-control" id="bloodGroup" name="bloodGroup" required>
                    </div>
                    <div class="form-group">
                        <label for="expiryDate">Expiry Date</label>
                        <input type="date" class="form-control" id="expiryDate" name="expiryDate" required>
                    </div>
                    <div class="form-group">
                        <label for="studentImage">Student Image</label>
                        <input type="file" class="form-control-file" id="studentImage" name="studentImage" required>
                    </div>
                    <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
           
        </div>
    </div>
    <?php 
    if(isset($_POST['submit'])){
        $stu_name = $_POST['studentName'];
        $stu_program = $_POST['program'];
        $stu_id = $_POST['studentId'];
        $stu_blood = $_POST['bloodGroup'];
        $stu_ed = $_POST['expiryDate'];

        $target_dir = "uploads/";
        $target_file = $target_dir . basename($_FILES["studentImage"]["name"]);
        move_uploaded_file($_FILES["studentImage"]["tmp_name"], $target_file);
  
    ?>


    <!-- Display Section -->
    <div class="container">
        <div class="row w-100">
            <div class="col-md-6 d-flex justify-content-center">
                <div class="card card-custom">
                    <div class="card-body text-center card-body1">
                        <div class="row">
                            <div class="col-md-4">
                                <img src="images/pciu_logo.png" alt="Varsity Logo" class="img-fluid logo-img mb-3">
                            </div>
                            <div class="col-md-8">
                                <h5 class="uni-info">Port City</h5>
                                <h4>Int. University</h4>
                                <div class="gradient-bar"></div><br>
                            </div>
                        </div>
                        <div class="row mb-1">
                            <div class="col-md-2 d-flex justify-content-center align-items-center">
                                <div class="rotate-text" style="color: red;">STUDENT</div>
                            </div>
                            <div class="col-md-10">
                                <img src="<?php echo $target_file; ?>" alt="Student Image" class="img-fluid student-img rounded mb-3">
                            </div>
                        </div>
                        <h4 class="mb-2" style="color: purple;"><?php echo $stu_name ?></h4>
                        <div class="details-info">
                            <p class="details-info-text">Program: <?php echo $stu_program ?></p>
                            <p class="details-info-text">ID NO. :  <?php echo $stu_id ?></p>
                            <p class="details-info-text">Blood Group:  <?php echo $stu_blood ?></p>
                            <p class="details-info-text" style="color: red;">Expiry Date:  <?php echo $stu_ed ?></p>
                        </div>
                    </div>
                </div>
            </div>



            <div class="col-md-6 d-flex justify-content-center">
                <div class="card card-custom">
                    <div class="card-body card-body2">
                        <ul class="list-group">
                            <li class="" style="list-style-type: square;">This card is the property of <br> Port City International University</li>
                            <li class="" style="list-style-type: square;">If found, please return to the following address:</li>
                        </ul>
                        <h6 style="text-align: center; padding-top:10px;">Office of the Registrar</h6>
                        <hr style="color : black;">

                        <p style="text-align: center; font-size: 15px;">7-14, Nikunja Housing Society,<br> South Khulsi, Chattogram, Bangladesh</p>
                        <p style="text-align: center; font-size: 15px;">Phone: +88 031-2869877, 28698999</p>
                        <p style="font-size: 15px;">Mobile: 017773225500 <br> 01773225511 <br> 01851120791</p>
                        <p style="font-size: 15px;">Fax: +88031-2869966</p>
                        <p style="font-size: 15px;">Email: admission@portcity.edu.bd</p>
                        <p style="font-size: 15px;">Web: www.portcity.edu.bd</p>

                    
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    </div>
    
    <?php
      }
    ?>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html> -->