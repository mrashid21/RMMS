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
  <title>Task Checklist</title>
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

  <style>
    /* Include the padding and border in an element's total width and height */
    * {
      box-sizing: border-box;
    }

    /* Remove margins and padding from the list */
    #myUL {
      margin: 0;
      padding: 0;
    }

    /* Style the list items */
    #myUL li {
      cursor: pointer;
      position: relative;
      padding: 12px 8px 12px 40px;
      list-style-type: none;
      background: #eee;
      font-size: 18px;
      transition: 0.2s;

      /* make the list items unselectable */
      -webkit-user-select: none;
      -moz-user-select: none;
      -ms-user-select: none;
      user-select: none;
    }

    /* Set all odd list items to a different color (zebra-stripes) */
    #myUL li:nth-child(odd) {
      background: #f9f9f9;
    }

    /* Darker background-color on hover */
    #myUL li:hover {
      background: #ddd;
    }

    /* When clicked on, add a background color and strike out text */
    #myUL li.checked {
      background: #888;
      color: #fff;
      text-decoration: line-through;
    }

    /* Add a "checked" mark when clicked on */
    #myUL li.checked::before {
      content: '';
      position: absolute;
      border-color: #fff;
      border-style: solid;
      border-width: 0 2px 2px 0;
      top: 10px;
      left: 16px;
      transform: rotate(45deg);
      height: 15px;
      width: 7px;
    }

    /* Style the close button */
    .close {
      position: absolute;
      right: 0;
      top: 0;
      padding: 12px 16px 12px 16px;
    }

    .close:hover {
      background-color: #f44336;
      color: white;
    }

    /* Style the header */
    .header {
      background-color: pink;
      padding: 30px 40px;
      color: maroon;
      text-align: center;
    }

    /* Clear floats after the header */
    .header:after {
      content: "";
      display: table;
      clear: both;
    }

    /* Style the input */
    input {
      margin: 0;
      border: none;
      border-radius: 0;
      width: 75%;
      padding: 10px;
      float: left;
      font-size: 16px;
    }
  </style>

</head>

<body class="bg-gradient-lighter">
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
            <a class="nav-link" href="Notes.php"><i class="ni ni-ruler-pencil text-yellow"></i>Notes</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="Research-Progress.php"><i class="ni ni-cloud-upload-96 text-orange"></i>Research
              Progress</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="Upload.php"><i class="ni ni-cloud-upload-96 text-pink"></i>Upload Report</a>
          </li>
          <li class="nav-item pb-9">
            <a class="nav-link" href="profile.php"><i class="ni ni-cloud-upload-96 text-pink"></i>Profile</a>
          </li>
          <form class="d-flex justify-content-center pt-9" action="assets/api/logout_user.php">
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
              <img src=<?= $img ?> class="img-fluid img-circle header-user-image small-img" alt="User Image">
              <span class="hidden-xs"><?= $_SESSION['logged_firstName'] . " " . $_SESSION['logged_lastName'] ?></span>
            </a>
            <ul class="dropdown-menu">
              <!-- Menu Body -->
              <li class="user-body p-4 header-profile-margin">
                <div class="row d-flex justify-content-center">
                  <img src=<?= $img ?> class="img-fluid img-circle card-user-image" alt="User Image">
                </div>
                <div class="row d-flex justify-content-around">
                  <p class="text-center pt-2">
                    <small><b> <?= $_SESSION['logged_firstName'] . " " . $_SESSION['logged_lastName'] ?></b></small><br>
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

    <div class="header container-fluid bg-gradient-light pb- pt-5 pt-md-8">
      <div class="event_time_area">
        <div class="event_time_inner">
          <h1 class="text-danger">Task Checklist</h1>
        </div>
      </div>
    </div>
    <br>
    <!--===== Checklist =====-->

    <br><br>
    <div class="container-fluid mt--10">
      <div class="row ">
        <div class="col-xl-7 col-centered">
          <div class="card shadow">
            <div class="card-header bg-transparent">
              <div class="row align-items-center">
                <div class="col">
                  <div id="myDIV" class="header">
                    <input type="text" id="myInput" placeholder="New Task">
                    <span onclick="newElement()" class="addBtn">
                      <button type="button" class="btn btn-danger">Add</button>
                    </span>
                  </div>
                  <ul id="myUL" contenteditable="true">
                    <li>Meet Client</li>
                    <li class="checked">Update Document</li>
                    <li>Prepare slides</li>
                    <li>Prepare report</li>
                    <li>Organize office</li>
                  </ul>

                  <div class="container">
                    <h3>Notes!</h3>
                    <h4>1.Click task to edit</h4>
                    <h4>2.Double click task to tick if the task is completed</h4>
                  </div>

                </div>
              </div>
            </div>
          </div>
        </div>
      </div>



    </div>

    <script>
      // Create a "close" button and append it to each list item
      var x = document.getElementById("myUL");
      var myNodelist = x.getElementsByTagName("LI");
      var i;
      for (i = 0; i < myNodelist.length; i++) {
        var span = document.createElement("SPAN");
        var txt = document.createTextNode("\u00D7");
        span.className = "close";
        span.appendChild(txt);
        myNodelist[i].appendChild(span);
      }

      // Click on a close button to hide the current list item
      var close = document.getElementsByClassName("close");
      var i;
      for (i = 0; i < close.length; i++) {
        close[i].onclick = function() {
          var div = this.parentElement;
          div.style.display = "none";
        }
      }

      // Add a "checked" symbol when clicking on a list item
      var list = document.querySelector('#myUL');
      list.addEventListener('dblclick', function(ev) {
        if (ev.target.tagName === 'LI') {
          ev.target.classList.toggle('checked');
        }
      }, false);

      // Create a new list item when clicking on the "Add" button
      function newElement() {
        var li = document.createElement("li");
        var inputValue = document.getElementById("myInput").value;
        var t = document.createTextNode(inputValue);
        li.appendChild(t);
        if (inputValue === '') {
          alert("You must write something!");
        } else {
          document.getElementById("myUL").appendChild(li);
        }
        document.getElementById("myInput").value = "";

        var span = document.createElement("SPAN");
        var txt = document.createTextNode("\u00D7");
        span.className = "close";
        span.appendChild(txt);
        li.appendChild(span);

        for (i = 0; i < close.length; i++) {
          close[i].onclick = function() {
            var div = this.parentElement;
            div.style.display = "none";
          }
        }
      }
    </script>
    <br><br>
    <hr>
    <footer class="text-center font-georgia">
      Copyright &copy; ORMMS TEAM 1<br>
      <a href="mailto:umseclub@um.edu.my">ormmsteam1@um.edu.my</a>
    </footer>

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