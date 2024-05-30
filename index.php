<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ID Card</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.1/html2canvas.min.js"></script>
    <link rel="stylesheet" href="css/style.css">

    <style>
        .id-card {
            width: 300px;
            height: 400px;
            border: 1px solid #000;
            border-radius: 10px;
            padding: 10px;
            background: #f8f9fa;
            position: relative;
            overflow: hidden;
            background: linear-gradient(to bottom, rgb(8 8 149 / 81%), #d7ed55)
        }
        .id-card .header {
            text-align: center;
            margin-bottom: 10px;
        }
        .id-card .header img {
            width: 40px;
            height: 40px;
        }
        .id-card .header h5 {
            margin: 0;
            font-size: 1.2rem;
            font-weight: bold;
        }
        .id-card .vertical-text {
            position: absolute;
            left: -10px;
            top: 124px;
            transform: rotate(270deg);
            font-size: 1.5rem;
            color: #d76a6a;
            font-weight: bold;
            letter-spacing: 1px;
        }
        .id-card .photo {
            text-align: center;
            margin-bottom: 10px;
        }
        .id-card .photo img {
            width: 115px;
            height: 120px;
            border: 2px solid #3C4468;
        }
        .id-card .details {
            text-align: left;
        }
        .id-card .details p {
            margin: 2px 0;
            margin-left: 10px;
            font-size: 0.9rem;
            font-weight: 500;
        }
        .id-card .signature {
            position: absolute;
            bottom: 10px;
            right: 10px;
            text-align: center;
        }
        .id-card .signature img {
            width: 100px;
        }
        body > div:nth-child(1) > div > div.details > p:nth-child(1) > strong{
            font-size: 18px;
            
        }
        .id-card-back {
            width: 300px;
            height: 400px;
            border: 2px solid #000;
            border-radius: 10px;
            padding: 20px;
            background: #ffffff;
            font-size: 0.9rem;
            line-height: 1.1;
        }
        .id-card-back .title {
            font-weight: bold;
        }
        .id-card-back .underline {
            text-decoration: underline;
        }
        .id-card-back .contact-info {
            margin-top: 10px;
        }
    </style>
</head>
<body>
<div class="container mt-5">
    <div class="row w-100">
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
                        <select class="form-control" id="bloodGroup" name="bloodGroup" required>
                            <option value="" disabled selected>Select your blood group</option>
                            <option value="A+">A+</option>
                            <option value="A-">A-</option>
                            <option value="B+">B+</option>
                            <option value="B-">B-</option>
                            <option value="AB+">AB+</option>
                            <option value="AB-">AB-</option>
                            <option value="O+">O+</option>
                            <option value="O-">O-</option>
                        </select>
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
    <div class="container d-flex justify-content-center mt-5 mb-5 " id="main-id-card">
        <div class="row">
            <div class="col-md-6 d-flex justify-content-center">
                <div class="id-card" id="id-card-front">
                    <div class="header">
                        <img src="images/pciu_logo.png" alt="University Logo">
                        <h5>Port City Int. University</h5>
                    </div>
                    <div class="vertical-text">STUDENT</div>
                    <div class="photo">
                        <img src="<?php echo $target_file; ?>" alt="Student Photo">
                    </div>
                    <div class="details">
                        <p style="text-align: center;"><strong><?php echo $stu_name; ?></strong></p>
                        <p>Program: <?php echo $stu_program; ?></p>
                        <p>ID NO.: <?php echo $stu_id; ?></p>
                        <p>Blood Group: <span style="color:red;"><?php echo $stu_blood; ?></span></p>
                        <p>Expiry Date: <span style="color:red;"><?php echo $stu_ed; ?></span></p>
                    </div>
                    <div class="signature">
                        <p>Registrar</p>
                    </div>
                </div>
            </div>
            <div class="col-md-6 d-flex justify-content-center">
                <div class="id-card-back" id="id-card-back">
                    <ul>
                        <li>
                            <p><strong>This Card is the property of</strong><br>
                                Port City International University</p>
                        </li>
                        <li>
                            <p><strong>If it is found, please return to the following address:</strong></p>
                        </li>
                    </ul>
                    <p class="title underline text-center">Office of the Registrar</p>
                    <p>7 - 14. Nikunja Housing Society,<br>
                        South Khulshi, Chattogram, Bangladesh</p>
                    <div class="contact-info">
                        <p>Phone: +88 031-2869877, 2869899</p>
                        <p>Mobile: 01773226500<br>
                            01773226511<br>
                            01851120791</p>
                        <p>Fax: +88 031-2869966</p>
                        <p>E-mail: admission@portcity.edu.bd</p>
                        <p>Web: www.portcity.edu.bd</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="text-center mt-4 mb-5">
        <button class="btn btn-success" id="download-btn">Download ID Card</button>
    </div>
    <?php } ?>
</div>

<script>
    document.getElementById('download-btn').addEventListener('click', function () {
        html2canvas(document.getElementById('id-card-front')).then(function (canvas) {
            var link = document.createElement('a');
            link.download = 'id_card_front.png';
            link.href = canvas.toDataURL('image/png');
            link.click();
        });

        html2canvas(document.getElementById('id-card-back')).then(function (canvas) {
            var link = document.createElement('a');
            link.download = 'id_card_back.png';
            link.href = canvas.toDataURL('image/png');
            link.click();
        });
        html2canvas(document.getElementById('main-id-card')).then(function (canvas) {
            var link = document.createElement('a');
            link.download = 'id_card.png';
            link.href = canvas.toDataURL('image/png');
            link.click();
        });
    });
</script>
</body>
</html>
