<?php require "assets/validation/validateUser.php"; ?>


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
  <link rel="stylesheet" href="assets/css/argon.css">
  <link rel="stylesheet" href="assets/vendor/bootstrap-datepicker/css/bootstrap-datepicker.css">
  <!-- Include Nucleo CSS Icons -->
  <link rel="stylesheet" href="assets/nucleo/css/nucleo.css">

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
            <a class="nav-link" href="homePage.html"><i class="ni ni-tv-2 text-teal"></i>Overview</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="schedule.html"><i class="ni ni-calendar-grid-58 text-purple"></i>Schedule</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="Checklist.html"><i class="ni ni-bullet-list-67 text text-green"></i>Checklist</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="Notes.html"><i class="ni ni-ruler-pencil text-yellow"></i>Notes</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="Research Progress.html"><i class="ni ni-cloud-upload-96 text-orange"></i>Research
            Progress</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="upload.html"><i class="ni ni-cloud-upload-96 text-pink"></i>Upload Report</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="profile.html"><i class="ni ni-cloud-upload-96 text-pink"></i>Profile</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <!--===== Main =====-->
  <div class="main-content">
    <nav class="navbar navbar-top navbar-expand-md navbar-dark" id="navbar-main">
      <div class="container-fluid">
        <!-- Section -->
        <a class="h4 mb-0 text-white text-uppercase d-none d-lg-inline-block" href="overview.php">Overview</a>
        <!-- Search Form -->
        <form class="navbar-search navbar-search-dark form-inline mr-3 d-none d-md-flex ml-lg-auto">
          <div class="form-group mb-0">
            <div class="input-group input-group-alternative">
              <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-search"></i></span>
              </div>
              <input class="form-control" placeholder="Search" type="text">
            </div>
          </div>
        </form>
        <form action="assets/api/logout_user.php" >
          <input type="submit" class="btn" value="Logout" style="width: 100%">
        </form>
      </div>
    </nav>

    <!--===== Timer =====-->

    <div class="header container-fluid bg-gradient-light pb-3 pt-5 pt-md-8">

    </div>

    <!--===== Page content =====-->

    <!--===== Checklist =====-->
    <div class="container-fluid mt-3">
                      <!-- Page Content -->
                <div class="content content-full content-boxed">
                    <!-- Latest Friends -->
                    <h2 class="content-heading">
                        <i class="si si-users mr-1"></i> Latest Friends
                    </h2>
                    <div class="row">
                        <div class="col-md-6 col-xl-3">
                            <div class="block block-rounded text-center">
                                <div class="block-content block-content-full bg-image" style="background-image: url('assets/media/photos/photo15.jpg');">
                                    <img class="img-avatar img-avatar-thumb" src="assets/media/avatars/avatar6.jpg" alt="">
                                </div>
                                <div class="block-content block-content-full block-content-sm bg-body-light">
                                    <div class="font-w600">Barbara Scott</div>
                                    <div class="font-size-sm text-muted">Product Designer</div>
                                </div>
                                <div class="block-content block-content-full">
                                    <a class="btn btn-sm btn-light" href="javascript:void(0)">
                                        <i class="fa fa-plus text-muted mr-1"></i> Add
                                    </a>
                                    <a class="btn btn-sm btn-light" href="javascript:void(0)">
                                        <i class="fa fa-user-circle text-muted mr-1"></i> Profile
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-xl-3">
                            <div class="block block-rounded text-center">
                                <div class="block-content block-content-full bg-image" style="background-image: url('assets/media/photos/photo4.jpg');">
                                    <img class="img-avatar img-avatar-thumb" src="assets/media/avatars/avatar14.jpg" alt="">
                                </div>
                                <div class="block-content block-content-full block-content-sm bg-body-light">
                                    <div class="font-w600">Adam McCoy</div>
                                    <div class="font-size-sm text-muted">Senior Developer</div>
                                </div>
                                <div class="block-content block-content-full">
                                    <a class="btn btn-sm btn-light" href="javascript:void(0)">
                                        <i class="fa fa-plus text-muted mr-1"></i> Add
                                    </a>
                                    <a class="btn btn-sm btn-light" href="javascript:void(0)">
                                        <i class="fa fa-user-circle text-muted mr-1"></i> Profile
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-xl-3">
                            <div class="block block-rounded text-center">
                                <div class="block-content block-content-full bg-image" style="background-image: url('assets/media/photos/photo1.jpg');">
                                    <img class="img-avatar img-avatar-thumb" src="assets/media/avatars/avatar15.jpg" alt="">
                                </div>
                                <div class="block-content block-content-full block-content-sm bg-body-light">
                                    <div class="font-w600">Carl Wells</div>
                                    <div class="font-size-sm text-muted">Junior Designer</div>
                                </div>
                                <div class="block-content block-content-full">
                                    <a class="btn btn-sm btn-light" href="javascript:void(0)">
                                        <i class="fa fa-plus text-muted mr-1"></i> Add
                                    </a>
                                    <a class="btn btn-sm btn-light" href="javascript:void(0)">
                                        <i class="fa fa-user-circle text-muted mr-1"></i> Profile
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-xl-3">
                            <div class="block block-rounded text-center">
                                <div class="block-content block-content-full bg-image" style="background-image: url('assets/media/photos/photo3.jpg');">
                                    <img class="img-avatar img-avatar-thumb" src="assets/media/avatars/avatar6.jpg" alt="">
                                </div>
                                <div class="block-content block-content-full block-content-sm bg-body-light">
                                    <div class="font-w600">Amber Harvey</div>
                                    <div class="font-size-sm text-muted">Marketing</div>
                                </div>
                                <div class="block-content block-content-full">
                                    <a class="btn btn-sm btn-light" href="javascript:void(0)">
                                        <i class="fa fa-plus text-muted mr-1"></i> Add
                                    </a>
                                    <a class="btn btn-sm btn-light" href="javascript:void(0)">
                                        <i class="fa fa-user-circle text-muted mr-1"></i> Profile
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="text-right">
                        <button type="button" class="btn btn-hero-sm btn-hero-secondary">
                            Check out more <i class="fa fa-arrow-right ml-1"></i>
                        </button>
                    </div>
                    <!-- END Latest Friends -->

                    <!-- Latest Projects -->
                    <h2 class="content-heading">
                        <i class="si si-briefcase mr-1"></i> Latest Projects
                    </h2>
                    <div class="row">
                        <div class="col-md-6 col-xl-3">
                            <div class="block block-rounded text-center">
                                <div class="block-content block-content-full bg-info">
                                    <div class="my-3">
                                        <i class="fab fa-2x fa-windows text-white-75"></i>
                                    </div>
                                </div>
                                <div class="block-content block-content-full block-content-sm bg-body-light">
                                    <div class="font-w600">Windows App</div>
                                    <div class="font-size-sm text-muted">Accounting Dashboard</div>
                                </div>
                                <div class="block-content block-content-full">
                                    <a class="btn btn-sm btn-light" href="javascript:void(0)">
                                        <i class="fa fa-briefcase text-muted mr-1"></i> View Project
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-xl-3">
                            <div class="block block-rounded text-center">
                                <div class="block-content block-content-full bg-warning">
                                    <div class="my-3">
                                        <i class="fa fa-2x fa-mobile text-white-75"></i>
                                    </div>
                                </div>
                                <div class="block-content block-content-full block-content-sm bg-body-light">
                                    <div class="font-w600">iOS App</div>
                                    <div class="font-size-sm text-muted">Accounting Dashboard</div>
                                </div>
                                <div class="block-content block-content-full">
                                    <a class="btn btn-sm btn-light" href="javascript:void(0)">
                                        <i class="fa fa-briefcase text-muted mr-1"></i> View Project
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-xl-3">
                            <div class="block block-rounded text-center">
                                <div class="block-content block-content-full bg-danger">
                                    <div class="my-3">
                                        <i class="fa fa-2x fa-globe text-white-75"></i>
                                    </div>
                                </div>
                                <div class="block-content block-content-full block-content-sm bg-body-light">
                                    <div class="font-w600">Website Design</div>
                                    <div class="font-size-sm text-muted">https://example.com</div>
                                </div>
                                <div class="block-content block-content-full">
                                    <a class="btn btn-sm btn-light" href="javascript:void(0)">
                                        <i class="fa fa-briefcase text-muted mr-1"></i> View Project
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-xl-3">
                            <div class="block block-rounded text-center">
                                <div class="block-content block-content-full bg-success">
                                    <div class="my-3">
                                        <i class="fa fa-2x fa-birthday-cake text-white-75"></i>
                                    </div>
                                </div>
                                <div class="block-content block-content-full block-content-sm bg-body-light">
                                    <div class="font-w600">Special Icon Set</div>
                                    <div class="font-size-sm text-muted">3000 icons</div>
                                </div>
                                <div class="block-content block-content-full">
                                    <a class="btn btn-sm btn-light" href="javascript:void(0)">
                                        <i class="fa fa-briefcase text-muted mr-1"></i> View Project
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="text-right">
                        <button type="button" class="btn btn-hero-sm btn-hero-secondary">
                            Check out more <i class="fa fa-arrow-right ml-1"></i>
                        </button>
                    </div>
                    <!-- END Latest Projects -->

                    <!-- Latest Posts -->
                    <h2 class="content-heading">
                        <i class="si si-note mr-1"></i> Latest Posts
                    </h2>
                    <a class="block block-rounded block-bordered block-link-shadow" href="javascript:void(0)">
                        <div class="block-content block-content-full">
                            <p class="font-size-sm text-muted float-sm-right mb-1"><em>3 hours ago</em></p>
                            <h4 class="font-size-base text-primary mb-0">
                                <i class="fa fa-newspaper-o text-muted mr-1"></i> 5 things I've learned working from home
                            </h4>
                        </div>
                    </a>
                    <a class="block block-rounded block-bordered block-link-shadow" href="javascript:void(0)">
                        <div class="block-content block-content-full">
                            <p class="font-size-sm text-muted float-sm-right mb-1"><em>2 days ago</em></p>
                            <h4 class="font-size-base text-primary mb-0">
                                <i class="fa fa-newspaper-o text-muted mr-1"></i> Vue.js or React? Let’s dive in!
                            </h4>
                        </div>
                    </a>
                    <a class="block block-rounded block-bordered block-link-shadow" href="javascript:void(0)">
                        <div class="block-content block-content-full">
                            <p class="font-size-sm text-muted float-sm-right mb-1"><em>1 week ago</em></p>
                            <h4 class="font-size-base text-primary mb-0">
                                <i class="fa fa-newspaper-o text-muted mr-1"></i> 10 important things I wish I knew
                            </h4>
                        </div>
                    </a>
                    <a class="block block-rounded block-bordered block-link-shadow" href="javascript:void(0)">
                        <div class="block-content block-content-full">
                            <p class="font-size-sm text-muted float-sm-right mb-1"><em>2 weeks ago</em></p>
                            <h4 class="font-size-base text-primary mb-0">
                                <i class="fa fa-newspaper-o text-muted mr-1"></i> Bringing your productivity back
                            </h4>
                        </div>
                    </a>
                    <a class="block block-rounded block-bordered block-link-shadow" href="javascript:void(0)">
                        <div class="block-content block-content-full">
                            <p class="font-size-sm text-muted float-sm-right mb-1"><em>1 month ago</em></p>
                            <h4 class="font-size-base text-primary mb-0">
                                <i class="fa fa-newspaper-o text-muted mr-1"></i> Creating a super smooth CSS animation
                            </h4>
                        </div>
                    </a>
                    <div class="text-right">
                        <button type="button" class="btn btn-hero-sm btn-hero-secondary">
                            Check out more <i class="fa fa-arrow-right ml-1"></i>
                        </button>
                    </div>
                    <!-- END Latest Posts -->
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