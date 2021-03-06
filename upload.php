<?php 
require "./assets/validation/validateUser.php";
require "./assets/helper/UserAction.php";

$img = UserAction::getImageDir();
$data = UserAction::retrieveData();
?>

<!DOCTYPE html>

<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport">
    <meta name="author" content="WIF2003">
    <title>Upload Report</title>
    <!-- CSS -->
    <!-- <link rel="stylesheet" href="assets/css/style.css"> -->
    <!-- Google Fonts Poppins -->
    <link href="https://fonts.googleapis.com/css?family=Poppins" rel="stylesheet">
    <!-- Argon CSS Bootstrap -->
    <link rel="stylesheet" href="assets/css/argon.css">
    <!-- Include Nucleo CSS Icons -->
    <link rel="stylesheet" href="assets/nucleo/css/nucleo.css">
    <!--
    <link type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" />
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.0/jquery.js"></script>
    <script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
-->
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
<link rel="stylesheet" href="/assets/css/profile-layout.css">

<style type="text/css">
    .box {
        border: 2px solid gray;
        color: gray;
        background-color: white;
        padding: 8px 20px;
        border-radius: 8px;
        font-size: 20px;
        font-weight: bold;
        text-align: center;
    }

    h1 {
        text-align: center;
        text-transform: uppercase;
        font-family: Georgia;
        font-size: 40px;
    }

    #button {
        border-radius: 12px;
        background-color: white;
        color: black;
        border: 2px solid #FF7F50;
        padding: 12px 28px;
    }

    #button:hover {
        background-color: #FF7F50;
        color: white;
    }
</style>
</head>

<body class="bg-gradient-lighter">
    <!--    <div class="wrapper">   -->
        <!--===== Sidebar =====-->
        <nav class="navbar bg-white shadow navbar-vertical fixed-left navbar-expand-md navbar-light">
            <div class="container-fluid">
                <!-- ORMMS Logo -->
                <a class="navbar-brand pt-0" href="overview.php">
                    <img src="assets/png/ormms.png" class="navbar-brand-img" alt="">
                </a>
                <div class="collapse navbar-collapse" id="sidenav-collapse-main">
                    <!-- Navigation -->
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link" href="overview.php"><i class="ni ni-tv-2 text-teal"></i>Overview</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="appointment.php"><i class="ni ni-calendar-grid-58 text-purple"></i>Appointment</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="checklist.php"><i class="ni ni-bullet-list-67 text text-green"></i>Checklist</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="notes.php"><i class="ni ni-ruler-pencil text-yellow"></i>Notes</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="research-progress.php"><i class="ni ni-ui-04 text-orange"></i>Research
                            Progress</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="upload.php"><i class="ni ni-cloud-upload-96 text-pink"></i>Upload Report</a>
                        </li>
                        <li class="nav-item pb-9">
                            <a class="nav-link" href="profile.php"><i class="ni ni-single-02 text-black"></i>Profile</a>
                        </li>
                        <form class="d-flex justify-content-center pt-9" action="assets/api/user/logout_user.php">
                            <input type="submit" class="btn" value="Logout" style="width: 80%">
                        </form>
                    </ul>
                </div>
            </div>
        </nav>

        <!--===== Main =====-->
        <div class="main-content">
            <nav class="navbar navbar-top navbar-expand-md navbar-dark" id="navbar-main">
                <div class="container-fluid">
                    <!-- Profie Dropdown -->
                    <form>
                        <!-- <input type="submit" class="btn" value="Logout" style="width: 100%"> -->
                        <div class="dropdown user user-menu" style="width:300px;">
                            <a href="#" class="small-img" data-toggle="dropdown">
                                <img src= <?= $img ?> class="img-fluid img-circle header-user-image small-img" alt="User Image">
                                <span class="hidden-xs"><?= $data['firstName'] . " " . $data['lastName'] ?></span>
                            </a>
                            <ul class="dropdown-menu">
                                <!-- Menu Body -->
                                <li class="user-body p-4 header-profile-margin">
                                    <div class="row d-flex justify-content-center">
                                        <img src= <?= $img ?>  class="img-fluid img-circle card-user-image" alt="User Image"> 
                                    </div>
                                    <div class="row d-flex justify-content-around">
                                        <p class="text-center pt-2">
                                            <small><b> <?= $data['firstName'] . " " . $data['lastName'] ?></b></small><br>
                                            <small>Member since <?= $data['timeCreated'] ?></small>
                                        </p>
                                    </div>
                                    <div class="d-flex row justify-content-center">
                                        <div class="col-xs-12 text-center">
                                            <a href="profile.php" class="btn btn-default btn-sm btn-flat mr-1">Profile</a>
                                            <a href="#" class="btn btn-default btn-sm btn-flat">Friends</a>
                                        </div>
                                    </div>
                                    <!-- /.row -->
                                </li>

                            </ul>
                        </div>
                    </form>

                    <form class="navbar-search navbar-search-dark form-inline mr-3 d-none d-md-flex ml-lg-auto">
                        <div class="form-group mb-0">
                            <div class="input-group input-group-alternative">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fa fa-search"></i></span>
                                </div>
                                <input class="form-control" placeholder="Search" type="text">
                            </div>
                        </div>
                    </form>

                </div>
            </nav>

            <div class="header container-fluid bg-gradient-light pt-md-6 pb-2"></div>

            <!--===== Upload Report =====-->
            <div class="pt-4">
                <div class="box">
                    <h1>Upload Report</h1>
                </div>
            </div>
            <div class="container-fluid" style="height: 400px">
                <div class="col-sm-9" style="height: 100%; margin-left:120px;">
                    <br><br>
                    <div class="box">
                        <!-- <a href="https://ormms-c98b2.firebaseapp.com/#/dashboard" target="_blank">Go to Upload Page</a> -->
                        Click below to go to Upload Page<br>
                        <input type="button" value="Click me!" onclick=window.open("https://ormms-c98b2.firebaseapp.com/#/dashboard") class="box" style="margin-bottom:10px" id="button">
                    </div>
                </div>
            </div>

            <br><br><br><br><br><br>
            <hr>
            <footer class="text-center font-italic">
                Copyright &copy; ORMMS TEAM 1<br>
                <a href="mailto:umseclub@um.edu.my">ormmsteam1@um.edu.my</a>
            </footer>

            <script src="assets/js/argon.js"></script>
            <script src="assets/js/jquery-3.3.1.min.js"></script>
            <script src="assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>



        </body>

        </html>