<?php require_once './user.php'; 
    if(!isset($_SESSION['user_name'])) {
        header('location: index.php');
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Sign up</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="./css/signup.css">
    <link rel="stylesheet" href="css/style.css" type="text/css">

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Lato&family=Noto+Sans+JP&display=swap" rel="stylesheet">

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <!-- Popper JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>


    <script src="jquery-3.3.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>

</head>

<body>

<div class="menu">
    <div class="container-fluid content">
        <div id="norm" class="top-bar">
            <div class="logo">
                <a href="index.php">
                    <img src="images/logo_Acacy_white.svg" alt="error">
                </a>
            </div>

            <ul class="nav nav-pills mb-3" role="tablist">
                <li class="nav-item" role="presentation">
                    <button class="nav-link" data-bs-toggle="pill" data-bs-target="#op1" type="button" role="tab" aria-controls="op1" aria-selected="false">Manpower Outsourcing</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" data-bs-toggle="pill" data-bs-target="#op2" type="button" role="tab" aria-controls="op2" aria-selected="false">Mass Recruit.services</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" data-bs-toggle="pill" data-bs-target="#op3" type="button" role="tab" aria-controls="op3" aria-selected="false">Training services</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" data-bs-toggle="pill" data-bs-target="#op4" type="button" role="tab" aria-controls="op4" aria-selected="false">Payroll services</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" data-bs-toggle="pill" data-bs-target="#op5" type="button" role="tab" aria-controls="op5" aria-selected="false">Management system</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" data-bs-toggle="pill" data-bs-target="#op6" type="button" role="tab" aria-controls="op6" aria-selected="false">About us</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link active" data-bs-toggle="pill" data-bs-target="#op7" type="button" role="tab" aria-controls="op7" aria-selected="true">User</button>
                </li>
            </ul>

        </div>

        <nav id="burger" class="navbar navbar-dark light-blue lighten-4">
            <!-- Navbar brand -->
            <div class="logo navbar-brand">
                <a href="#">
                    <img src="images/logo_Acacy_white.svg" alt="error">
                </a>
            </div>

            <!-- Collapse button -->
            <button class="navbar-toggler toggler-example" type="button" data-toggle="collapse" data-target="#navbarSupportedContent1" aria-controls="navbarSupportedContent1" aria-expanded="false" aria-label="Toggle navigation"><span class="dark-blue-text"><i class="fas fa-bars fa-1x"></i></span></button>

            <!-- Collapsible content -->
            <div class="collapse navbar-collapse" id="navbarSupportedContent1">

                <!-- Links -->
                <ul class="navbar-nav mr-auto nav nav-pills mb-3" id="pills-tab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="op1-tab" data-bs-toggle="pill" data-bs-target="#op1" type="button" role="tab" aria-controls="op1" aria-selected="false">Manpower Outsourcing</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="op2-tab" data-bs-toggle="pill" data-bs-target="#op2" type="button" role="tab" aria-controls="op2" aria-selected="false">Mass Recruit.services</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="op3-tab" data-bs-toggle="pill" data-bs-target="#op3" type="button" role="tab" aria-controls="op3" aria-selected="false">Training services</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="op4-tab" data-bs-toggle="pill" data-bs-target="#op4" type="button" role="tab" aria-controls="op4" aria-selected="false">Payroll services</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="op5-tab" data-bs-toggle="pill" data-bs-target="#op5" type="button" role="tab" aria-controls="op5" aria-selected="false">Management system</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="op6-tab" data-bs-toggle="pill" data-bs-target="#op6" type="button" role="tab" aria-controls="op6" aria-selected="false">About us</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active" id="op7-tab" data-bs-toggle="pill" data-bs-target="#op7" type="button" role="tab" aria-controls="op7" aria-selected="true">User</button>
                    </li>
                </ul>
                <!-- Links -->

            </div>
            <!-- Collapsible content -->

        </nav>
        <!--/.Navbar-->

        <div class="tab-content" id="cont">
            <div class="tab-pane fade" id="op1" role="tabpanel" aria-labelledby="op1-tab">
                <div class="info-box">
                    <img class="responsive" src="images/Hinh%201.jpg" alt="error">
                    <div class="p-info">
                        <p>Our field force features well training and devotion. Our field auditing force with mobile application breaks the common practice.</p>

                        <div class="btn-group" role="group" aria-label="Basic example">
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#saleForceModal">
                                Salesforce
                            </button>
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#PGmodal">
                                Promoters - PG
                            </button>
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#FASmodal">
                                Field auditing services
                            </button>
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#SCmodal">
                                Staff contracting
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="tab-pane fade" id="op2" role="tabpanel" aria-labelledby="op2-tab">
                <div class="info-box">
                    <img class="responsive" src="images/Hinh%202.jpg" height="280" alt="error">
                    <div class="p-info">
                        <p>Speedy, mass recruitment meets instant requirements for the field force and sales force.</p>

                        <div class="btn-group" role="group" aria-label="Basic example">
                            <button type="button" class="btn btn-secondary">Mass Recruit</button>
                            <button type="button" class="btn btn-secondary">ServicesBenefits of Outsourcing</button>
                            <button type="button" class="btn btn-secondary">Online Recruitment</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="tab-pane fade" id="op3" role="tabpanel" aria-labelledby="op3-tab">
                <div class="info-box">
                    <img class="responsive" src="images/training.jpg" height="280" alt="error">
                    <div class="p-info">
                        <p>Our training team - our pride to accelerate competency of the utsourced.</p>
                        <div class="btn-group" role="group" aria-label="Basic example">
                            <button type="button" class="btn btn-secondary">Online training system</button>
                            <button type="button" class="btn btn-secondary">Acacy employee development</button>
                            <button type="button" class="btn btn-secondary">Training activities of Acacy</button>
                        </div>

                    </div>
                </div>
            </div>
            <div class="tab-pane fade" id="op4" role="tabpanel" aria-labelledby="op4-tab">
                <div class="info-box">
                    <img src="images/Hinh%204.jpg" height="280" alt="error">
                    <div class="p-info">
                        <p> We has started Payroll services from initial days. </p>
                        <div class="btn-group" role="group" aria-label="Basic example">
                            <button type="button" class="btn btn-secondary">Payroll services</button>
                            <button type="button" class="btn btn-secondary">Why Outsource payroll</button>
                            <button type="button" class="btn btn-secondary">Payroll Online system</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="tab-pane fade" id="op5" role="tabpanel" aria-labelledby="op5-tab">
                <div class="info-box">
                    <img class="responsive" src="images/Hinh%205.jpg" height="280" alt="error">
                    <div class="p-info">
                        <p>
                            All controlled in hand. Our system, mobile applications show daily real time reports
                            of
                            outsourced field force activities.
                        </p>
                        <div class="btn-group" role="group" aria-label="Basic example">
                            <button type="button" class="btn btn-secondary">Management systems</button>
                            <button type="button" class="btn btn-secondary">Links of our reporting system</button>
                            <button type="button" class="btn btn-secondary">Why online reporting system</button>
                        </div>
                    </div>
                </div>

            </div>
            <div class="tab-pane fade" id="op6" role="tabpanel" aria-labelledby="op6-tab">
                <div class="info-box">
                    <img class="responsive" src="images/Hinh%206.jpg" height="280" alt="error">
                    <div class="p-info">
                        <p>
                            All functions, teams, system to support the outsourced. We help
                            clients to gain more focus on their core business
                        </p>
                        <div class="btn-group" role="group" aria-label="Basic example">
                            <button type="button" class="btn btn-secondary">Why Acacy?</button>
                            <button type="button" class="btn btn-secondary">Acacy Vietnam history</button>
                            <button type="button" class="btn btn-secondary">Contact us</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="tab-pane fade show active" id="op7" role="tabpanel" aria-labelledby="op7-tab">
                <div class="info-box">
                        <img class="responsive" src="../images/HinhUser2.png" height="280" alt="error">
                        <div class="p-info">
                        <p>
                            Your account is created at: <?php echo $_SESSION['createtime'];?>
                        </p>
                        <p> Your Full name: <span style="font-weight:bold;"> <?php echo $_SESSION['full_name'];?> </span>
                        <p> Your Email: <span style="font-weight:bold;"> <?php echo $_SESSION['email'];?> </span>

                        <p> Your Phone Number: <span style="font-weight:bold;"> <?php echo $_SESSION['phone'];?> </span>
                        
                        <div class="btn-group" role="group" aria-label="Basic example">
                            <button type="button" class="btn btn-secondary" onclick="window.location.href='edit_profile.php'">Edit Profile</button>
                            <button type="button" class="btn btn-secondary" onclick="window.location.href='change_password.php'">Change Password</button>
                        </div>
                        </div>
                </div>
            </div>
    </div>
</div>


</body>

</html>