<?php 
// require "./assets/validation/validateUser.php";
// require "./assets/helper/UserAction.php";

// $img = UserAction::getImageDir();
// $data = UserAction::retrieveData();
?>

<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport">
  <meta name="author" content="WIF2003">
  <title>Notes</title>
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
    <link rel="stylesheet" href="assets/css/profile-layout.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">

  <style type="text/css">
    hr {
      height: 1px;
      color: grey;
      background-color: grey;
      border: none;
    }

    .event_time_inner {
      margin-left: 150px;
      margin-right: 150px;
      
    }
    .event_time_area {
      margin-top: 30px;
      padding-bottom: 1px;
    }

    h1 {
      text-align: center;
      text-transform: uppercase;
      font-family: Georgia;
      color: #FF7F50;
    }

    #saveButton {
      border-radius: 12px;
      background-color: white;
      color: black;
      border: 2px solid #FF7F50;
      padding: 10px 24px;
      margin:auto;
      display:block;
    }

    #saveButton:hover {
      background-color: #FF7F50;
      color: white;
    }
    .margin {
      margin-top: 25px;
    }

    .headingcolor {
      color: white;
      background-color: #FF7F50;
      border-color: #ddd;
      padding: 10px 15px;
      border-bottom: 1px solid transparent;
      border-top-left-radius: 3px;
      border-top-right-radius: 3px;
    }

    .panel {
      transition: box-shadow 200ms;
    }

    .panel:hover {
      box-shadow: 2px 1px 6px 4px grey;
    }

  </style>

</head>

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
            <a class="nav-link" href="appointment.php"><i class="ni ni-calendar-grid-58 text-purple"></i>Appointment</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="Checklist.php"><i class="ni ni-bullet-list-67 text text-green"></i>Checklist</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="Notes.php"><i class="ni ni-ruler-pencil text-yellow"></i>Notes</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="Research-Progress.php"><i class="ni ni-ui-04 text-orange"></i>Research
              Progress</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="Upload.php"><i class="ni ni-cloud-upload-96 text-pink"></i>Upload Report</a>
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
              <!-- <img src=<?= $img ?> class="img-fluid img-circle header-user-image small-img" alt="User Image">
              <span class="hidden-xs"><?= $_SESSION['logged_firstName'] . " " . $_SESSION['logged_lastName'] ?></span> -->
            </a>
            <ul class="dropdown-menu">
              <!-- Menu Body -->
              <li class="user-body p-4 header-profile-margin">
                <div class="row d-flex justify-content-center">
                  <img src=<?= $img ?> class = "img-fluid img-circle card-user-image" alt="User Image">
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

    <div class="header container-fluid bg-gradient-light pb-3 pt-5 pt-md-8">
     <!--===== Notes =====-->
    <div class="event_time_area">
      <div class="event_time_inner">
        <h1>Create Meeting Notes</h1>
      </div>
    </div>
  </div>
    <?php
    $con = mysqli_connect("localhost","root","","rmms");
    // Check connection
    if (mysqli_connect_errno())
      {
      echo "Failed to connect to MySQL: " . mysqli_connect_error();
      }
    $status = "";
    if(isset($_POST['new']) && $_POST['new']==1)
    {
      $trn_date = date("Y-m-d");
      $noteTitle =$_REQUEST['NoteTitle'];
      $content = $_REQUEST['message'];
      $meeting = $_REQUEST['MeetingTitle'];
      $submittedby = $_SESSION["'logged_firstName'"];
      $ins_query="insert into new_notes (`trn_date`,`meetingTitle`,`noteTitle`,`content`,`submittedby`) values ('$trn_date','$meeting','$noteTitle','$content','$submittedby')";
      mysqli_query($con,$ins_query) or die(mysql_error());
      $status = "New Notes Inserted Successfully.</br></br><a href='addNotes.php'>View Inserted Notes</a>";
    }
    ?>
    <?php
    try{
        $sqlconnection = new pdo('mysql:host=localhost;dbname=rmms;charset=utf8','user1','user1abc');
        }   
    catch(PDOException $pe){
        echo 'Cannot connect to database';
        die;
    }
?>

    <br><br>
    <div class="container-fluid" style="height: 800px">
    <div class="col-sm-9" style="height: 100%; margin-left:120px;">
      <div class="form">
       <a href="addNotes.php" class="btn btn-warning" role="button">View Notes</a>
          <form name="form" method="post" action=""> 
            <div class="control-group form-group">
              <input type="hidden" name="new" value="1" />
            </div>
            <div class="control-group form-group">
              <label for="meeting"> Meeting Title : <span id="message-title"></span></label><br>
              <input type="text" name="MeetingTitle" placeholder="Enter Meeting Title" required />
              <datalist id="appointment">
            <?php
                $commandtext = "Select AppointmentSubject from appointment order by AppointmentID";
                $cmd = $sqlconnection->prepare($commandtext);
                $cmd->execute();
                $result = $cmd->fetchAll(PDO::FETCH_ASSOC);
                foreach($result as $row) {
                    echo '<option value="'.$row['AppointmentSubject'].'">';
                }
                ?>
                </datalist> 
            </div>
            <div class="control-group form-group">
              <label for="title">  Notes Title   :   <span id="message-title"></span></label><br>
              <input type="text" name="NoteTitle" placeholder="Enter Notes Title" required />
            </div>
            <div class="control-group form-group">
              <label for="mesg"> Notes Content : <span id="message-info"></span></label><br>
              <textarea class="form-field" id="message" name="message" rows="15" cols="43"></textarea>
            </div>
            <p><input name="submit" type="submit" value="Save Notes" /></p>
          </form>
          <p style="color:#FF0000;"><?php echo $status; ?></p><br />
        </div>
      </div>
    </div>
      
  <footer class="footer">
    <div class="footerContent">
      <hr>
      Copyright &copy; ORMMS TEAM 1<br>
      <a href="mailto:umseclub@um.edu.my">ormmsteam1@um.edu.my</a>
    </div>
  </footer>
</body>
</html>