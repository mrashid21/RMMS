<?php 

require "./assets/validation/validateUser.php";
require "./assets/helper/UserAction.php";
require "./assets/helper/ChecklistAction.php";

$errors = "";

$img = UserAction::getImageDir();
$data = UserAction::retrieveData();
$tasks = ChecklistAction::getCheckkistTasks();

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
	<link rel="stylesheet" href="assets/css/argon.css">
	<link rel="stylesheet" href="assets/vendor/bootstrap-datepicker/css/bootstrap-datepicker.css">
	<!-- Include Nucleo CSS Icons -->
	<link rel="stylesheet" href="assets/nucleo/css/nucleo.css">
	<link rel="stylesheet" href="assets/css/profile-layout.css">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">

	<style>
		
		#myform {
			width: 100%; 
			margin: 30px auto; 
			border-radius: 10px; 
			padding: 10px;
			background: pink;
			border: 1px solid red;
		}
		#myform p {
			color: red;
			margin: 0px;
		}
		.task_input {
			width: 75%;
			height: 60px; 
			padding: 10px;
			border: 2px solid red;
		}
		.add_btn {
			height: 39px;
			background: red;
			color: 	white; 
			padding: 1px 20px;
		}
		.edit a{
			color: white;
			background: #038680;
			padding: 1px 6px;
			border-radius: 3px;
			text-decoration: none;
		}
		
		#myform {
			width: 100%; 
			margin: 30px auto; 
			border-radius: 10px; 
			padding: 10px;
			background: pink;
			border: 1px solid red;
		}
		#myform p {
			color: red;
			margin: 0px;
		}
		.task_input {
			width: 100%;
			height: 60px; 
			padding: 10px;
			border: 2px solid red;
		}
		.add_btn {
			height: 39px;
			background: red;
			color: 	white; 
			padding: 1px 20px;
		}
		.edit a{
			color: white;
			background: #038680;
			padding: 1px 6px;
			border-radius: 3px;
			text-decoration: none;
		}

		#myform {
			width: 100%; 
			margin: 30px auto; 
			border-radius: 10px; 
			padding: 10px;
			background: pink;
			border: 1px solid red;
		}
		#myform p {
			color: red;
			margin: 0px;
		}
		.task_input {
			width: 75%;
			height: 60px; 
			padding: 10px;
			border: 2px solid red;
		}
		.add_btn {
			height: 39px;
			background: red;
			color: 	white; 
			padding: 1px 20px;
		}
		.edit a{
			color: white;
			background: #038680;
			padding: 1px 6px;
			border-radius: 3px;
			text-decoration: none;
		}



		#mytable table {
			width: 50%;
			margin: 30px auto;
			border-collapse: collapse;
		}

		#mytable tr {
			border-bottom: 1px solid #cbcbcb;
		}

		#mytable th {
			font-size: 19px;
			color: red;
		}

		#mytable th, td{
			border: none;
			height: 30px;
			padding: 2px;
		}

		#mytable tr:hover {
			background: #E9E9E9;
		}

		.task {
			text-align: left;
		}

		.delete{
			text-align: center;
		}
		.delete a{
			color: white;
			background: #a52a2a;
			padding: 1px 6px;
			border-radius: 3px;
			text-decoration: none;
		}
		h1 {
			text-align: center;
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
				<!-- Profile Dropdown -->
				<form>
					<!-- <input type="submit" class="btn" value="Logout" style="width: 100%"> -->
					<div class="dropdown user user-menu" style="width:300px;">

						<a href="#" class="small-img" data-toggle="dropdown">
							<img src=<?= $img ?> class= "img-fluid img-circle header-user-image small-img" alt="User Image">
							<span class="hidden-xs"><?= $data['firstName'] . " " . $data['lastName'] ?></span>
						</a>
						<ul class="dropdown-menu">
							<!-- Menu Body--> 
							<li class="user-body p-4 header-profile-margin">
								<div class="row d-flex justify-content-center">
									<img src=<?= $img ?> class= "img-fluid img-circle card-user-image" alt="User Image">
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
							</li>
						</li>
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
		<div class="event_time_inner  ">
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
								<div id="myform">
									<form method="POST" action="./assets/api/checklist/create_task_checklist.php" class="input_form">
										<input type="text" placeholder= "New Task" name="task" class="task_input" required>
										<button type="submit" name="submit" id="add_btn" class="add_btn">Add Task</button>
									</form></div>


									<table id="mytable">
										<thead>
											<tr>
												<th style="width: 80px;">No.</th>
												<th style="width: 1000000px">Tasks</th>
												<th style="width : 60px;">Edit      </th>
												<th style="width: 60px;">Delete</th>
											</tr>
										</thead>

										<tbody>
											<?php $count = 1; foreach($tasks as $key=>$value): ?>

											<tr>
												<td> <?= $count ?> </td>
												<td class="task"> <?= $value['task']; ?> </td>
												<td class="edit">
													<a href="/ChecklistEdit.php?id=<?= $value['id'] ?>" >Edit</a></td>
													<td class="delete">
														<a href="/assets/api/checklist/delete_task_checklist.php?del_task=<?= $value['id'] ?>" onClick="return confirm('Are you sure you want to delete?')">x</a>
													</td>
												</tr>
												<?php $count++; endforeach; ?>
											</tbody>
										</table>


									</div>
								</div>
							</div>
						</div>
					</div>
				</div>



			</div>


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