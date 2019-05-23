<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="Start your development with a Design System for Bootstrap 4.">
  <meta name="author" content="Creative Tim">
  <title>Register</title>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <!-- Favicon -->
  <link href="../assets/img/brand/favicon.png" rel="icon" type="image/png">
  <!-- Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
  <!-- Icons -->
  <link href="../assets/vendor/nucleo/css/nucleo.css" rel="stylesheet">
  <link href="../assets/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet">
  <!-- Argon CSS -->
  <link type="text/css" href="../assets/css/argon.css?v=1.0.1" rel="stylesheet">
  <!-- Docs CSS -->
  <link type="text/css" href="../assets/css/docs.min.css" rel="stylesheet">

</head>

<body>
  <main>
    <section class="section section-shaped section-lg contentWrap">
      <div class="shape shape-style-1 bg-gradient-default">
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        <span></span>
      </div>
      <div class="container pt-lg-md">
        <div class="row justify-content-center">
          <div class="col-lg-5">
            <div class="card bg-secondary shadow border-0">
              <div class="card-body px-lg-5 py-lg-5">
                <div class="text-center text-muted mb-4">
                  <small>Sign up with credentials</small>
                </div>

                <?php if(isset($_GET['action']) && ($_GET['action'] === 'emailUsed')): ?>
                  <div class="alert alert-danger" role="alert">
                    Email already used by another user!
                  </div>
                <?php endif; ?>

                <?php if(isset($_GET['action']) && ($_GET['action'] === 'somethingWrong')): ?>
                  <div class="alert alert-warning" role="alert">
                    Something went wrong, please try again!
                  </div>
                <?php endif; ?>

                <?php if(isset($_GET['action']) && ($_GET['action'] === 'success')): ?>
                  <div class="alert alert-success" role="alert">
                    Registrated Successfully!
                  </div>
                <?php endif; ?>



              <form role="form" action="../assets/api/user/create_user.php" method="POST" name="credentialsForm">
                <!-- Each of the inputs will have its own ID -->
                <!-- First name field -->
                <div class="form-group">
                  <div class="input-group input-group-alternative mb-3">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="ni ni-hat-3"></i></span>
                    </div>
                    <input class="form-control" placeholder="First Name" type="text" name="firstName"
                    oninput="validateName(this)" required>
                  </div>
                </div>

                <!-- Last name field -->
                <div class="form-group">
                  <div class="input-group input-group-alternative mb-3">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="ni ni-hat-3"></i></span>
                    </div>
                    <input class="form-control" placeholder="Last Name" type="text" name="lastName"
                    oninput="validateName(this)" required>
                  </div>
                </div>

                <!-- Email field -->
                <div class="form-group">
                  <div class="input-group input-group-alternative mb-3">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="ni ni-email-83"></i></span>
                    </div>
                    <input class="form-control" placeholder="Email" type="email" name="email" required>
                  </div>
                </div>

                <!-- Password field -->
                <div class="form-group">
                  <div class="input-group input-group-alternative">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="ni ni-lock-circle-open"></i></span>
                    </div>
                    <input class="form-control" placeholder="Password" type="password" name="password"
                    id="passwordField" oninput="validatePassword(this)" required>
                  </div>
                </div>

                <!-- Repeat Password field -->
                <div class="form-group">
                  <div class="input-group input-group-alternative">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="ni ni-lock-circle-open"></i></span>
                    </div>
                    <input class="form-control" placeholder="Confirm Password" type="password" name="confirmPassword"
                    oninput="validateConfirmPassword(this)" required>
                  </div>
                </div>

                <!-- Type of user -->
                <div class="form-group ">
                  <div class="input-group input-group-alternative">
                    <select class="custom-select" name="userType" required>
                      <option value="">User Type</option>
                      <option value="student">Student</option>
                      <option value="supervisor">Supervisor</option>
                    </select>
                  </div>
                </div>

                <div class="text-muted font-italic">
                  <small>password strength:
                    <span class="text-success font-weight-700">strong</span>
                  </small>
                </div>
                <div class="row my-4">
                  <div class="col-12">
                    <div class="custom-control custom-control-alternative custom-checkbox">
                      <input class="custom-control-input " id="customCheckRegister" type="checkbox" required>
                      <label class="custom-control-label" for="customCheckRegister">
                        <span>I agree with the
                          <a href="#">Privacy Policy</a>
                        </span>
                      </label>
                    </div>
                  </div>
                </div>
                <div class="text-center" style="padding-bottom:10px">
                  <input type="submit" class="btn btn-primary mt-4" value="Create an account" name="submit-signup">
                </div>
                <div class="text-center">
                  <p>Already have an accoutn? <a href="../index.php"><b>Sign in</b></a></p>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <?php if(isset($_GET['reg']) && ($_GET['reg'] === "success")){alert("User Created Successfully!!");} ?>
</main>

<footer class="footer" style="width: 70%">
  <div class="footerContent">
    <hr>
    Copyright &copy; ORMMS TEAM 1<br>
    <a href="mailto:umseclub@um.edu.my">ormmsteam1@um.edu.my</a>
  </div>
</footer>

<!-- Core -->
<script src="../assets/vendor/jquery/jquery.min.js"></script>
<script src="../assets/vendor/popper/popper.min.js"></script>
<script src="../assets/vendor/bootstrap/bootstrap.min.js"></script>
<script src="../assets/vendor/headroom/headroom.min.js"></script>

<!-- Argon JS -->
<script src="../assets/js/argon.js"></script>
<script src="../assets/validation/validateUserRegisterClient.js"></script>

</body>

</html>