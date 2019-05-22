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


        .event_time_inner {
            margin-left: 130px;
            margin-right: 130px
        }

        h1 {
            text-align: center;
            text-transform: uppercase;
            font-family: Georgia;
            font-size: 40px;
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
            font-size: 110%;
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
                        <a class="nav-link" href="schedule.php"><i class="ni ni-calendar-grid-58 text-purple"></i>Schedule</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="checklist.php"><i class="ni ni-bullet-list-67 text text-green"></i>Checklist</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="notes.php"><i class="ni ni-ruler-pencil text-yellow"></i>Notes</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="research-progress.php"><i class="ni ni-cloud-upload-96 text-orange"></i>Research
                            Progress</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="upload.php"><i class="ni ni-cloud-upload-96 text-pink"></i>Upload Report</a>
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
                            <img src= <?= $img ?> class="img-fluid img-circle header-user-image small-img" alt="User Image">
                            <span class="hidden-xs"><?= $_SESSION['logged_firstName'] . " " . $_SESSION['logged_lastName'] ?></span>
                        </a>
                        <ul class="dropdown-menu">
                            <!-- Menu Body -->
                            <li class="user-body p-4 header-profile-margin">
                                <div class="row d-flex justify-content-center">
                                    <img src= <?= $img ?>  class="img-fluid img-circle card-user-image" alt="User Image"> 
                                </div>
                                <div class="row d-flex justify-content-around">
                                    <p class="text-center pt-2">
                                        <small><b> <?= $_SESSION['logged_firstName'] . " " . $_SESSION['logged_lastName'] ?></b></small><br>
                                        <small>Member since <?= $data['timeCreated'] ?></small>
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

        <div class="header container-fluid bg-gradient-light pt-md-6 pb-2">
        </div>

        <div class="pt-4">
            <div class="box">
                <h1>Upload Report</h1>
            </div>
        </div>


        <!--===== Upload Report =====-->
        <div class="container-fluid" style="height: 600px">
            <div class="col-sm-9" style="height: 100%; margin-left:120px;">
                <br><br>
                <div class="box">
                    <form role="form" name="addNote" id="addSticky" action="upload.php" method="post" enctype="multipart/form-data">
                        <div class="control-group form-group">
                            <div class="controls"><br>
                                <label for="title">Project Title</label>
                                <input type="text" class="form-control" placeholder="Project title" id="notename" required data-validation-required-message="You must enter a title" />
                            </div>
                        </div>
                        <div class="control-group form-group">
                            <div class="controls">
                                <label for="content">Submission comments</label>
                                <textarea id="notecontent" class="form-control" placeholder="Comments" maxlength="999" rows="10" requiredstyle="resize: none;"></textarea>
                            </div>
                        </div>
                        Select file to upload:
                        <input type="file" name="fileToUpload" id="fileToUpload">
                        <input type="submit" value="Submit" name="submit" class="btn btn-primary pull-right" id="saveButton" style="margin-bottom:10px">
                    </form>
                    <div id="success"></div>
                </div>
            </div>
            <div class="col-sm-12" style="height: 100%;margin: auto">
                <h3> </h3>
                <div class="row border" style="height: 100%;overflow:auto;">
                    <div class="col-sm-12" id="container"> </div>
                </div>
            </div>
        </div>

        <!-- Edit -->
        <div class="modal fade" id="editModal" role="dialog">
            <div class="modal-dialog modal-sm">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Edit</h4>
                    </div>
                    <div class="modal-body">
                        <form role="form" name="editNote" id="editSticky">
                            <div class="control-group form-group">
                                <div class="controls">
                                    <label for="title">Edit Submission</label>
                                    <input type="text" class="form-control" id="editname" required />
                                </div>
                            </div>
                            <div class="control-group form-group">
                                <div class="controls">
                                    <label for="content">Comments</label>
                                    <textarea id="editcontent" class="form-control" maxlength="999" rows="10" cols="100" required style="resize: none;"></textarea>
                                </div>
                            </div>
                            <div id="success"></div>
                            <button type="button" class="btn btn-primary pull-right" id="editButton" style="margin-bottom:10px" data-dismiss="modal">Save</button>
                            <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- Delete -->
        <div class="modal fade" id="deleteModal" role="dialog">
            <div class="modal-dialog modal-sm">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Delete</h4>
                    </div>
                    <div class="modal-body">
                        <p>Are you sure you want to delete this file?</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" id="deleteButton" data-dismiss="modal">Yes</button>
                        <button type="button" class="btn btn-default" data-dismiss="modal">No</button>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!--

<--===== Upload Report =====->
<div class="container-fluid mt--7">


                <div class="row">
                    <div class="col-xl-8 mb-5 mb-xl-0">
                        <div class="card bg-white shadow">
                            <div class="upload-btn-wrapper">

                                

                                <form class="btn" action="upload.php" method="post" enctype="multipart/form-data">
                                    Select file to upload:
                                    <input type="file" name="fileToUpload" id="fileToUpload">
                                    <input type="submit" value="Upload File" name="submit">
                                </form>
                            </div>
                        </div>
                    </div>
                    
                </div>
                
</div>

-->

    <br><br><br><br><br><br>
    <hr>
    <footer class="text-center font-italic">
        Copyright &copy; ORMMS TEAM 1<br>
        <a href="mailto:umseclub@um.edu.my">ormmsteam1@um.edu.my</a>
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
                document.getElementById("glyphContainer" + toRemove.id).appendChild(RestoreGlyph(toRemove.id));

                toRemove.className += " grayout";
            };

            document.getElementById("yesButton").onclick = function() {
                var toMove = document.getElementById(id);
                toMove.parentElement.removeChild(toMove);
                toMove.className += " grayout";

                document.getElementById("container").appendChild(toMove);
                var glyph = document.getElementById("g1" + toMove.id);
                glyph.removeAttribute("data-toggle");
                glyph.removeAttribute("data-target");
            };

            document.getElementById("editButton").onclick = function() {
                if (CheckNote("editname", "editcontent")) {
                    var newTitle = document.getElementById("heading" + id);
                    newTitle.textContent = document.getElementById("editname").value;

                    var newBody = document.getElementById("glyphContainer" + id);
                    newBody.textContent = document.getElementById("editcontent").value;
                    newBody.innerHTML += '<br/><br/>';

                    if (newBody.parentElement.parentElement.parentElement.id == "container")
                        newBody = createGlyphs(newBody, id);
                    else
                        newBody.appendChild(RestoreGlyph(id));

                    return false;
                };

                return true;
            };
        });

        function YesGlyph(currentId) {
            var span1 = document.createElement("span");
            span1.className = "glyphicon glyphicon-ok pull-right";
            span1.setAttribute("id", 'g1' + currentId);
            span1.setAttribute("onclick", "okGlyphInDiv(this)");
            span1.setAttribute("data-toggle", "modal");
            span1.setAttribute("data-target", "#okModal");

            return span1;
        };

        function NoGlyph(currentId) {
            var span2 = document.createElement("span");
            span2.className = "glyphicon glyphicon-remove pull-right";
            span2.setAttribute("id", 'g2' + currentId);
            span2.setAttribute("onclick", "okGlyphInDiv(this)");
            span2.setAttribute("data-toggle", "modal");
            span2.setAttribute("data-target", "#deleteModal");

            return span2;
        };

        function EditGlyph(currentId) {
            var glyph = document.createElement("span");
            glyph.className = "glyphicon glyphicon-edit pull-right";
            glyph.setAttribute("id", 'g0' + currentId);
            glyph.setAttribute("onclick", "okGlyph(this)");
            glyph.setAttribute("data-toggle", "modal");
            glyph.setAttribute("data-target", "#editModal");
            glyph.style.position = "absolute";
            glyph.style.top = "0";
            glyph.style.right = "0";
            glyph.style.marginRight = "5px";
            glyph.style.marginTop = "5px";

            return glyph;
        };

        function okGlyph(that) {
            id = that.parentElement.parentElement.parentElement.id;
        };

        function okGlyphInDiv(that) {
            id = that.parentElement.parentElement.parentElement.parentElement.id;
        };

        function CreateReport() {
            var note = document.createElement("div");
            note.className = "col-sm-9 margin";
            note.setAttribute("id", "notehover");
            var panel = document.createElement("div");
            panel.className = "panel panel-default";
            panel.style.height = "200px";
            var heading = document.createElement("div");
            heading.className = "panel-body headingcolor";
            heading.setAttribute("id", "heading" + i);
            heading.textContent = document.getElementById("notename").value;
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
            body.insertBefore(EditGlyph(id), body.firstChild);
            cont.appendChild(NoGlyph(id));
            body.appendChild(cont);

            return body;
        };

        function CheckReport(nameId, contentId) {
            if (document.getElementById(nameId).value == "" || document.getElementById(contentId).value == "")
                return false;

            return true;
        };
    </script>

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