<?php require "assets/validation/validateUser.php"; ?>

<!DOCTYPE html>

<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport">
    <meta name="author" content="WIF2003">
    <title>Research Progress</title>

    <!-- CSS -->
    <!-- <link rel="stylesheet" href="assets/css/style.css"> -->
    <!-- Google Fonts Poppins -->
    <link href="https://fonts.googleapis.com/css?family=Poppins" rel="stylesheet">
    <!-- Argon CSS Bootstrap -->
    <link rel="stylesheet" href="/assets/css/argon.css">
    <!-- Include Nucleo CSS Icons -->
    <link rel="stylesheet" href="/assets/nucleo/css/nucleo.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
    <link rel="stylesheet" href="/assets/css/profile-layout.css">

</head>

<body class="bg-gradient-lighter">
    <div class="wrapper">
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
                            <a class="nav-link" href="schedule.php"><i class="ni ni-calendar-grid-58 text-purple"></i>Schedule</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="Checklist.php"><i class="ni ni-bullet-list-67 text text-green"></i>Checklist</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="notes.php"><i class="ni ni-ruler-pencil text-yellow"></i>Notes</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="Research-Progress.php"><i class="ni ni-cloud-upload-96 text-orange"></i>Research Progress</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="upload.php"><i class="ni ni-cloud-upload-96 text-pink"></i>Upload
                                Report</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="profile.html"><i class="ni ni-cloud-upload-96 text-pink"></i>Profile</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        <body class="bg-gradient-lighter">
            <div class="wrapper" id="app">
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
                                    <a class="nav-link" href="schedule.php"><i class="ni ni-calendar-grid-58 text-purple"></i>Schedule</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="Checklist.php"><i class="ni ni-bullet-list-67 text text-green"></i>Checklist</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="notes.php"><i class="ni ni-ruler-pencil text-yellow"></i>Notes</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="Research-Progress.php"><i class="ni ni-cloud-upload-96 text-orange"></i>Research Progress</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="upload.php"><i class="ni ni-cloud-upload-96 text-pink"></i>Upload Report</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </nav>

                <!--===== Main =====-->
                <div class="main-content">
                    <nav class="navbar navbar-top navbar-expand-md navbar-dark" id="navbar-main">
                        <div class="container-fluid">
                            <!-- Profie Dropdown -->
                            <!-- <form action="assets/api/logout_user.php">
                    <input type="submit" class="btn" value="Logout" style="width: 100%">
                </form> -->
                            <form>
                                <!-- <input type="submit" class="btn" value="Logout" style="width: 100%"> -->
                                <div class="dropdown user user-menu" style="width:150px;">
                                    <a href="#" class="" data-toggle="dropdown">
                                        <img src="https://api.adorable.io/avatars/160/ayoob.png" class="img-fluid img-circle header-user-image small-img" alt="User Image">
                                        <span class="hidden-xs"><small>Alexander Pierce</small></span>
                                    </a>
                                    <ul class="dropdown-menu">
                                        <!-- Menu Body -->
                                        <li class="user-body p-4 header-profile-margin">
                                            <div class="row d-flex p-2 justify-content-center">
                                                <img src="https://api.adorable.io/avatars/160/ayoob.png" class="img-fluid img-circle small-img" alt="User Image">
                                                <p class="text-center">
                                                    <small>Alexander Pierce - Web Developer</small>
                                                    <small>Member since Nov. 2012</small>
                                                </p>
                                            </div>
                                            <div class="d-flex row justify-content-center">
                                                <div class="col-xs-12 text-center">
                                                    <a href="#" class="btn btn-default btn-sm btn-flat mr-1">Profile</a>
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

                    <!--===== header =====-->
                    <div class="header container-fluid bg-gradient-light pt-md-6 pb-2">

                    </div>
                    <div class="row pt-5 text-center">
                        <div class="col-md-12 event_time_area">
                            <div class=" event_time_inner">
                                <h1>Set Appointment</h1>
                            </div>
                        </div>
                    </div>

                    <div class="container-fluid">
                        <div class="col-sm-12">
                            <div id="calendar" style="height: 600px"></div>
                        </div>
                    </div>
                </div>
            </div>

            <footer class="footer col-centered">
                <div class="footerContent">
                    <hr>
                    Copyright &copy; ORMMS TEAM 1<br>
                    <a href="mailto:umseclub@um.edu.my">ormmsteam1@um.edu.my</a>
                </div>
            </footer>

            <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
            <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>


            <script src="assets/js/MindFusion.Scheduling.js" type="text/javascript"></script>
            <script src="assets/js/MyFirstSchedule.js" type="text/javascript"></script>

            <script src="assets/js/argon.js"></script>
            <script src="assets/js/jquery-3.3.1.min.js"></script>
            <script src="assets/flipclock/timer.js"></script>
            <script src="assets/counter-up/jquery.counterup.js"></script>
            <script src="assets/counter-up/jquery.waypoints.min.js"></script>

        </body>

</html>