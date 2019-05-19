<?php require "assets/validation/validateUser.php"; ?>

<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport">
  <meta name="author" content="WIF2003">
  <title>Notes</title>
  <!-- CSS -->
  <!-- <link rel="stylesheet" href="assets/css/style.css"> -->
  <!-- Google Fonts Poppins -->
  <link href="https://fonts.googleapis.com/css?family=Poppins" rel="stylesheet">
  <!-- Argon CSS Bootstrap -->
  <link rel="stylesheet" href="assets/css/argon.css">
  <!-- Include Nucleo CSS Icons -->
  <link rel="stylesheet" href="assets/nucleo/css/nucleo.css">
  <link type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" />
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.0/jquery.js"></script>
  <script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

  <style type="text/css">
    hr {
      height: 1px;
      color: grey;
      background-color: grey;
      border: none;
    }

    .event_time_inner {
      margin-left: 130px;
      margin-right: 130px
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
      padding: 12px 28px;
    }

    #saveButton:hover {
      background-color: #FF7F50;
      color: white;
    }

    html {
      font-size: 100%;
    }

    .margin {
      margin-top: 25px;
    }

    .grayout {
      opacity: .45;
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

    .glyphicon:after {
      pointer-events: none;
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
        <!-- Section -->
        <a class="h4 mb-0 text-white text-uppercase d-none d-lg-inline-block" href="overview.php">Overview</a>
        <!-- Search Form -->
        <form class="navbar-search navbar-search-dark form-inline mr-3 d-none d-md-flex ml-lg-auto">
          <div class="form-group mb-0">
            <div class="input-group input-group-alternative" style="padding-left: 20px">
              <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-search"></i></span>
              </div>
              <input class="form-control" placeholder="Search" type="text">
            </div>
          </div>
        </form>
        <form action="assets/api/logout_user.php">
          <input type="submit" class="btn" value="Logout" style="width: 100%">
        </form>
      </div>
    </nav>

    <div class="header container-fluid bg-gradient-light pb-1 pt-5 pt-md-8">
      <div class="event_time_area">
        <div class="event_time_inner">
          <h1>Meeting Notes</h1>
        </div>
      </div>
    </div>
    <!--===== Notes =====-->
    <div class="container-fluid" style="height: 600px">
      <div class="col-sm-9" style="height: 100%; margin-left:120px;">
        <form role="form" name="addNote" id="addSticky">
          <div class="control-group form-group">
            <div class="controls"><br><br>
              <label for="title">Title</label>
              <input type="text" class="form-control" placeholder="Notes Title" id="notename" required data-validation-required-message="You must enter a title" />
            </div>
          </div>
          <div class="control-group form-group">
            <div class="controls">
              <label for="content">Content</label>
              <textarea id="notecontent" class="form-control" placeholder="Notes Content" maxlength="999" rows="18" required style="resize: none;"></textarea>
            </div>
          </div>
          <div id="success"></div>
          <button type="submit" class="btn btn-primary pull-right" id="saveButton" style="margin-bottom:10px">Save
            Notes</button>
        </form>
      </div>
      <div class="col-sm-12" style="height: 100%;margin: auto">
        <h3>Saved Notes</h3>
        <h5><img src="assets/png/edit.png" style="height:18px; width:18px"><i>&nbspClick the content box to edit</i></h5>
        <div class="row" style="height: 100%;overflow:auto;">
          <div class="col-sm-12" id="container">
          </div>
        </div>
      </div>
    </div>
    <div class="modal fade" id="deleteModal" role="dialog">
      <div class="modal-dialog modal-sm">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Delete</h4>
          </div>
          <div class="modal-body">
            <p>Are you sure you want to delete this note?</p>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" id="deleteButton" data-dismiss="modal">Yes</button>
            <button type="button" class="btn btn-default" data-dismiss="modal">No</button>
          </div>
        </div>
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

  <script>
    var id;
    var i = 1;

    $(document).ready(function() {
      document.getElementById("saveButton").onclick = function() {
        if (CheckNote("notename", "notecontent")) {
          var element = CreateNote();
          element.setAttribute("id", i++);
          var insert = document.getElementById("container");

          if (insert != null)
            insert.insertBefore(element, insert.firstChild);
          else
            document.getElementById("container").appendChild(element);
          return false;
        }
        return true;
      };

      document.getElementById("deleteButton").onclick = function() {
        var toRemove = document.getElementById(id);
        toRemove.parentElement.removeChild(toRemove);

        var insert = document.getElementById("deteledContainer");

        if (insert != null)
          insert.insertBefore(toRemove, insert.firstChild);
        else
          document.getElementById("deletedContainer").appendChild(toRemove);

        document.getElementById("g0" + toRemove.id).remove();
        document.getElementById("g1" + toRemove.id).remove();
        document.getElementById("g2" + toRemove.id).remove();

        toRemove.className += " grayout";
      };

    });

    function NoGlyph(currentId) {
      var span2 = document.createElement("span");
      span2.className = "glyphicon glyphicon-remove pull-right";
      span2.setAttribute("id", 'g2' + currentId);
      span2.setAttribute("onclick", "okGlyphInDiv(this)");
      span2.setAttribute("data-toggle", "modal");
      span2.setAttribute("data-target", "#deleteModal");
      return span2;
    };

    function okGlyph(that) {
      id = that.parentElement.parentElement.parentElement.id;
    };

    function okGlyphInDiv(that) {
      id = that.parentElement.parentElement.parentElement.parentElement.id;
    };

    function CreateNote() {
      var date = new Date();
      var day = date.getDate();
      var month = date.getMonth() + 1;
      var year = date.getFullYear();
      var fulldate = day + "-" + month + "-" + year;
      var note = document.createElement("div");
      note.className = "col-sm-9 margin";
      note.setAttribute("id", "notehover");
      var panel = document.createElement("div");
      panel.className = "panel panel-default";
      panel.style.height = "200px";
      var heading = document.createElement("div");
      heading.className = "panel-body headingcolor";
      heading.setAttribute("id", "heading" + i);
      heading.textContent = document.getElementById("notename").value + "   (" + fulldate + ")";
      var body = document.createElement("div");
      body.className = "panel-body";
      body.setAttribute("id", "glyphContainer" + i);
      body.setAttribute("contenteditable", true);
      body.style.overflow = "hidden";
      body.style.position = "relative";
      body.style.height = "73%";
      body.textContent = document.getElementById("notecontent").value;
      body.innerHTML += '<br/><br/>';
      body = createGlyphs(body, i);
      panel.appendChild(heading);
      panel.appendChild(body);
      note.appendChild(panel);
      return note;
    };

    function createGlyphs(body, id) {
      var cont = document.createElement("div");
      cont.style.position = "absolute";
      cont.style.bottom = "0";
      cont.style.right = "0";
      cont.style.marginRight = "5px";
      cont.style.marginBottom = "5px";
      cont.appendChild(NoGlyph(id));
      body.appendChild(cont);
      return body;
    };

    function CheckNote(nameId, contentId) {
      if (document.getElementById(nameId).value == "" || document.getElementById(contentId).value == "")
        return false;
      return true;
    };
  </script>
  <script src="assets/js/argon.js"></script>
  <script src="assets/js/jquery-3.3.1.min.js"></script>
  <script src="assets/flipclock/timer.js"></script>
  <script src="assets/counter-up/jquery.counterup.js"></script>
  <script src="assets/counter-up/jquery.waypoints.min.js"></script>

</body>

</html>