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

            <!--===== header =====-->
            <div class="header container-fluid bg-gradient-light pt-md-6 pb-2">

            </div>

            <div class="row pt-2 pb-4 justify-content-center">
                <button type="button" class="col-4 btn btn-block btn-default" @click="$modal.show('researchForm');">Add Research</button>
            </div>
            <!--===== Page content =====-->

            <!--===== Checklist =====-->
            <div class="table-responsive col-centered">
                <table class="table align-items-center" id="myTable">
                    <thead class="thead-light">
                        <tr>
                            <th scope="col">Research</th>
                            <th scope="col">Status</th>
                            <th scope="col">Contributers</th>
                            <th scope="col">Completion</th>
                            <th scope="col"></th>
                        </tr>
                    </thead>
                    <tbody id="table-body">
                        <tr v-for="research in researches">
                            <th scope="row">
                                <div class="media align-items-center">
                                    <a href="#" class="avatar rounded-circle mr-3" data-toggle="tooltip" data-placement="top" data-original-title="i">
                                        <img alt="Image placeholder" :src="'https://api.adorable.io/avatars/256/' + i" class="rounded-circle">
                                    </a>
                                    <div class="media-body">
                                        <span class="mb-0 text-sm">{{ research.name }}</span>

                                    </div>
                                </div>
                            </th>
                            <td>
                                <span class="badge badge-dot mr-4">
                                    <i :class="statusColor(research.status)"></i> {{ research.status }}
                                </span>
                            </td>
                            <td>
                                <div class="avatar-group">
                                    <a href="#" class="avatar avatar-sm" data-toggle="tooltip" data-placement="top" data-original-title="i" v-for='i in parseInt(research.contributers)'>
                                        <img alt="Image placeholder" :src="'https://api.adorable.io/avatars/256/' + i" class="rounded-circle">
                                    </a>
                                </div>

                            </td>
                            <td>
                                <div class="d-flex align-items-center">
                                    <span class="mr-2"> {{ research.completion }}%</span>
                                    <div>
                                        <div class="progress">
                                            <div :class="'progress-bar ' + statusColor(research.status)" role="progressbar" :aria-valuenow="research.completion" aria-valuemin="0" aria-valuemax="100" :style="'width:'+ research.completion + '%'"></div>
                                        </div>
                                    </div>
                                </div>
                            </td>
                            <td class="text-right">
                                <div class="dropdown">
                                    <a class="btn btn-info tdropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" title="Info">
                                        <i class="ni ni-bullet-list-67"></i>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                        <a class="dropdown-item" @click="edit(research)">Edit</a>
                                        <a class="dropdown-item" @click="remove(research)">Remove</a>
                                        <a class="dropdown-item" :href="'/tasks.php?id=' + research.id">Tasks</a>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>

            </div>
        </div>
        <modal name="researchForm" :height="500">
            <div class="text-center text-muted mb-4" style="padding:0 20px">
                <h3 style="padding-top: 20px;">Add Research</h3>
            </div>
            <form role="form" style="height: 400px; padding:0 20px" method="POST" action="#" v-on:submit.prevent="onSubmit">
                <div class="form-group mb-3">
                    <div class="input-group input-group-alternative">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="ni ni-map-big"></i></span>
                        </div>
                        <input class="form-control" placeholder="Research Name" type="text" v-model='name' name="research-name" required>
                    </div>
                </div>
                <div class="form-group">
                    <div class="input-group input-group-alternative">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="ni ni-lock-circle-open"></i></span>
                        </div>
                        <select class="form-control" placeholder="Status" v-model='status' name="research-status" required>
                            <option value="completed">Completed</option>
                            <option value="pending" selected>Pending</option>
                            <option value="delayed">delayed</option>
                            <option value="on shcedule">on shcedule</option>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <div class="input-group input-group-alternative">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="ni ni-diamond"></i></span>
                        </div>
                        <input class="form-control" placeholder="Contributers" type="text" v-model='contributers' name="research-contributers" required>
                    </div>
                </div>
                <div class="form-group">
                    <div class="input-group input-group-alternative">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="ni ni-lock-circle-open"></i></span>
                        </div>
                        <input class="form-control" placeholder="Completion" type="number" min="0" max="100" v-model="completion" name="research-completionPercentage" required>
                    </div>
                </div>

                <div class="text-center">

                    <button type="input" v-show="mode == 'save'" class="btn btn-primary my-4" @click="add(name,contributers,status,completion)" name="submit-add-research">Add</button>
                    <button type="button" v-show="mode == 'edit'" class="btn btn-primary my-4" @click="update(name,contributers,status,completion)">Edit</button>

                </div>
            </form>
        </modal>

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

    <script src="/assets/js/argon.js"></script>
    <script src="/assets/js/jquery-3.3.1.min.js"></script>
    <script src="/assets/flipclock/timer.js"></script>
    <script src="/assets/counter-up/jquery.counterup.js"></script>
    <script src="/assets/counter-up/jquery.waypoints.min.js"></script>
    <script src="/assets/js/researchProgress.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/vue@2.6.10/dist/vue.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/vue-js-modal@1.3.28/dist/index.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/vue-axios@2.1.4/dist/vue-axios.min.js"></script>
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
    <script src="/assets/js/researchProgress.js"></script>

</body>

</html>