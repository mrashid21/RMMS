<?php require "./assets/validation/validateUser.php"; ?>


<!DOCTYPE html>

<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport">
    <meta name="author" content="WIF2003">
    <title>Dashboard - Research Meeting Management System</title>
    <!-- CSS -->
    <link rel="stylesheet" href="assets/css/reminder-pop.css">
    <!-- <link rel="stylesheet" href="assets/css/style.css"> -->
    <!-- Google Fonts Poppins -->
    <link href="https://fonts.googleapis.com/css?family=Poppins" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
    <!-- Argon CSS Bootstrap -->
    <link rel="stylesheet" href="/assets/css/argon.css">
    <link rel="stylesheet" href="/assets/vendor/bootstrap-datepicker/css/bootstrap-datepicker.css">
    <!-- Include Nucleo CSS Icons -->
    <link rel="stylesheet" href="/assets/nucleo/css/nucleo.css">
    <link rel="stylesheet" href="/assets/css/profile-layout.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">

</head>

<body class="bg-gradient-lighter">
    <!--===== Sidebar =====-->
    <nav class="navbar bg-white shadow navbar-vertical fixed-left navbar-expand-md navbar-light">
        <div class="container-fluid">
            <!-- ORMMS Logo -->
            <a class="navbar-brand pt-0" href="index.html">
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
                        <a class="nav-link" href="Notes.php"><i class="ni ni-ruler-pencil text-yellow"></i>Notes</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="Research-Progress.php"><i class="ni ni-cloud-upload-96 text-orange"></i>Research
                            Progress</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="upload.php"><i class="ni ni-cloud-upload-96 text-pink"></i>Upload Report</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="profile.php"><i class="ni ni-cloud-upload-96 text-pink"></i>Profile</a>
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

        <!--===== Timer =====-->

        <div class="header container-fluid bg-gradient-light pt-md-6 pb-2">

        </div>

        <!--===== Page content =====-->

        <!--===== Checklist =====-->
        <div class="container-fluid mt-3">
            <!-- Page Content -->
            <div class="content content-full content-boxed">
                <div class="row">
                    <h1>User Profile</h1>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex col-12 justify-content-center">
                                    <img src="https://api.adorable.io/avatars/160/ayoob.png" class="img-fluid img-circle card-user-image" alt="User Image">
                                </div>
                                <div class="d-flex col-12 justify-content-center pt-3">
                                    <input type="file" style="font-size: 12px; border-width : 0">
                                </div>
                                <hr>

                                <div class="pt-1 pb-1">
                                    <strong>Biography</strong>
                                </div>

                                <div>
                                    <p>Some texr kjtghrlt rgkfrgnrghfrkgn.fkjghfkfmgjfbkjjfngf.kjghkjfgkjfdhgkjfdhgkjfdhgjkfdhgkjfhdglhfdkjghdfk</p>
                                </div>
                                <hr>
                                <p class="text-center">Name</p>
                                <p class="text-center">Career</p>
                                <div class="d-flex col-12 pt-1 justify-content-center">
                                    <ul class="list-group mt-2 list-group-unbordered">
                                        <li class="list-group-item">
                                            <b>Friends</b> <a class="pull-right">13,287</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="card">
                            <div class="card-body">

                                <div class="nav-tabs-custom">
                                    <ul class="nav nav-tabs">
                                        <li class="nav-item"><a class="nav-link active" href="#activity" data-toggle="tab" aria-expanded="false">Activity</a></li>
                                        <li class="nave-item"><a class="nav-link" href="#settings" data-toggle="tab" aria-expanded="true">Settings</a></li>
                                    </ul>
                                    <div class="tab-content">
                                        <div class="tab-pane active" id="activity">
                                            <div class="col-12">
                                                <table class="table table-condensed">
                                                    <tbody>
                                                        <tr>
                                                            <th style="width: 10px">#</th>
                                                            <th>Activity</th>
                                                            <th>Date</th>
                                                        </tr>
                                                        <tr>
                                                            <td>1.</td>
                                                            <td>Update software</td>
                                                            <td></td>
                                                            
                                                        </tr>
                                                        <tr>
                                                            <td>2.</td>
                                                            <td>Clean database</td>
                                                            <td></td>
                                                            
                                                        </tr>
                                                        <tr>
                                                            <td>3.</td>
                                                            <td>Cron job running</td>
                                                            <td></td>
                                                            
                                                        </tr>
                                                        <tr>
                                                            <td>4.</td>
                                                            <td>Fix and squish bugs</td>
                                                            <td></td>
                                                            
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>

                                        <div class="tab-pane" id="settings">
                                            <form class="form-horizontal">
                                                <div class="form-group">
                                                    <label for="inputName" class="col-sm control-label pt-4">Name</label>

                                                    <div class="col-sm-10">
                                                        <input type="email" class="form-control" id="inputName" placeholder="Name">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="inputEmail" class="col-sm control-label">Email</label>

                                                    <div class="col-sm-10">
                                                        <input type="email" class="form-control" id="inputEmail" placeholder="Email">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="inputName" class="col-sm control-label">Name</label>

                                                    <div class="col-sm-10">
                                                        <input type="text" class="form-control" id="inputName" placeholder="Name">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="inputExperience" class="col-sm control-label">Experience</label>

                                                    <div class="col-sm-10">
                                                        <textarea class="form-control" id="inputExperience" placeholder="Experience"></textarea>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="inputSkills" class="col-sm control-label">Skills</label>

                                                    <div class="col-sm-10">
                                                        <input type="text" class="form-control" id="inputSkills" placeholder="Skills">
                                                    </div>
                                                </div>

                                                <div class="ml-3 custom-control custom-control-alternative custom-checkbox">
                                                    <input class="custom-control-input " id="customCheckRegister" type="checkbox" required>
                                                    <label class="custom-control-label" for="customCheckRegister">
                                                        <span>I agree with the
                                                            <a href="#">Privacy Policy</a>
                                                        </span>
                                                    </label>
                                                </div>

                                                <div class="form-group pt-4">
                                                    <div class="col-sm-offset-2 col-sm-10">
                                                        <button type="submit" class="btn btn-danger">Submit</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                        <!-- /.tab-pane -->
                                    </div>
                                    <!-- /.tab-content -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- END Page Content -->

        </div>
    </div>


    <!--  Plugin for the DateTimePicker, full documentation here: https://eonasdan.github.io/bootstrap-datetimepicker/ -->
    <script src="assets/js/bootstrap-datetimepicker.min.js"></script>

    <script src="assets/js/argon.js"></script>
    <script src="assets/js/jquery-3.3.1.min.js"></script>
    <script src="assets/flipclock/timer.js"></script>
    <script src="assets/counter-up/jquery.counterup.js"></script>
    <script src="assets/counter-up/jquery.waypoints.min.js"></script>
    <script src="assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <script src="assets/vendor/chart.js/dist/Chart.min.js"></script>
    <script src="assets/vendor/chart.js/dist/Chart.extension.js"></script>
    <script src="assets/vendor/jquery/dist/jquery.min.js"></script>
    <script src="assets/js/reminder-pop.js"></script>
    <script src="assets/vendor/bootstrap-datepicker/js/bootstrap-datepicker.min.js"></script>

    <script>
        document.getElementById('button').addEventListener("click", function() {
            document.querySelector('.bg-modal').style.display = "flex";
        });

        document.querySelector('.close').addEventListener("click", function() {
            document.querySelector('.bg-modal').style.display = "none";
        });
    </script>

</body>

</html>