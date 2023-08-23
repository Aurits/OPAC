<?php

# Include connection
require_once "php-assets/config.php";

# Initialize session
session_start();

# Check if user is already logged in, If yes then redirect him to index page
if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] == TRUE) {
  echo "<script>" . "window.location.href='./'" . "</script>";
  exit;
}

# Define variables and initialize with empty values
$user_login_err = $user_password_err = $login_err = "";
$user_login = $user_password = "";

# Processing form data when form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty(trim($_POST["user_login"]))) {
    $user_login_err = "Please enter your username or an email id.";
  } else {
    $user_login = trim($_POST["user_login"]);
  }

  if (empty(trim($_POST["user_password"]))) {
    $user_password_err = "Please enter your password.";
  } else {
    $user_password = trim($_POST["user_password"]);
  }

  # Validate credentials 
  if (empty($user_login_err) && empty($user_password_err)) {
    # Prepare a select statement
    $sql = "SELECT UserID, Username, Password FROM Users WHERE username = ? OR email = ?";

    if ($stmt = mysqli_prepare($link, $sql)) {
      # Bind variables to the statement as parameters
      mysqli_stmt_bind_param($stmt, "ss", $param_user_login, $param_user_login);

      # Set parameters
      $param_user_login = $user_login;

      # Execute the statement
      if (mysqli_stmt_execute($stmt)) {
        # Store result
        mysqli_stmt_store_result($stmt);

        # Check if user exists, If yes then verify password
        if (mysqli_stmt_num_rows($stmt) == 1) {
          # Bind values in result to variables
          mysqli_stmt_bind_result($stmt, $id, $username, $hashed_password);

          if (mysqli_stmt_fetch($stmt)) {
            # Check if password is correct
            if (password_verify($user_password, $hashed_password)) {
              # Query the database to get the user's role based on the ID
              $role_sql = "SELECT role FROM Users WHERE UserID = ?";
              if ($role_stmt = mysqli_prepare($link, $role_sql)) {
                mysqli_stmt_bind_param($role_stmt, "i", $id);
                mysqli_stmt_execute($role_stmt);
                mysqli_stmt_bind_result($role_stmt, $userRole);
                mysqli_stmt_fetch($role_stmt);
                mysqli_stmt_close($role_stmt);

                # Store data in session variables
                $_SESSION["id"] = $id;
                $_SESSION["username"] = $username;
                $_SESSION["loggedin"] = TRUE;
                $_SESSION["role"] = $userRole;

                # Redirect user to index page
                echo "<script>" . "window.location.href='./book.php'" . "</script>";
                exit;
              } else {
                echo "<script>" . "alert('Oops! Something went wrong. Please try again later.');" . "</script>";
                echo "<script>" . "window.location.href='./login.php'" . "</script>";
                exit;
              }
            } else {
              # If password is incorrect show an error message
              $login_err = "The email or password you entered is incorrect.";
            }
          }
        } else {
          # If user doesn't exist, show an error message
          $login_err = "Invalid username or password.";
        }
      } else {
        echo "<script>" . "alert('Oops! Something went wrong. Please try again later.');" . "</script>";
        echo "<script>" . "window.location.href='./login.php'" . "</script>";
        exit;
      }

      # Close statement
      mysqli_stmt_close($stmt);
    }
  }

  # Close connection
  mysqli_close($link);
}

include('php-assets/header.php');

?>

<main class="main">
  <div class="page-header breadcrumb-wrap">
    <div class="container">
      <div class="breadcrumb">
        <a href="index.php" rel="nofollow">Home</a>
        <span></span> Login
      </div>
    </div>
  </div>
  <section class="pt-150 pb-150">
    <div class="container">
      <div class="row">
        <div class="col-lg-10 m-auto">
          <div class="row">
            <div class="col-lg-5">
              <div class="login_wrap widget-taber-content p-30 background-white border-radius-10 mb-md-5 mb-lg-0 mb-sm-5">
                <div class="padding_eight_all bg-white">
                  <div class="heading_s1">
                    <h3 class="mb-30">Login</h3>
                  </div>
                  <?php
                  if (!empty($login_err)) {
                    echo "<div class='alert alert-danger'>" . $login_err . "</div>";
                  }
                  ?>
                  <form action="<?= htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" novalidate>
                    <div class="form-group">
                      <input type="text" required="" name="user_login" placeholder="Your Email or Password">
                      <small class="text-danger"><?= $user_login_err; ?></small>
                    </div>
                    <div class="form-group">
                      <input required="" type="password" name="user_password" placeholder="Password">
                      <small class="text-danger"><?= $user_password_err; ?></small>
                    </div>
                    <div class="login_footer form-group">
                      <div class="chek-form">
                        <div class="custome-checkbox">
                          <input class="form-check-input" type="checkbox" name="checkbox" id="exampleCheckbox1" value="">
                          <label class="form-check-label" for="exampleCheckbox1"><span>Remember me</span></label>
                        </div>
                      </div>
                      <a class="text-muted" href="#">Forgot password?</a>
                    </div>
                    <div class="form-group">
                      <button type="submit" class="btn btn-fill-out btn-block hover-up" name="login">Log in</button>
                    </div>
                  </form>
                </div>
              </div>
            </div>
            <div class="col-lg-1"></div>
            <div class="col-lg-6">
              <img src="assets/imgs/login.webp">
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</main>

<?php
include('php-assets/footer.php');
?>
<!-- Vendor JS-->
<script src="assets/js/vendor/modernizr-3.6.0.min.js"></script>
<script src="assets/js/vendor/jquery-3.6.0.min.js"></script>
<script src="assets/js/vendor/jquery-migrate-3.3.0.min.js"></script>
<script src="assets/js/vendor/bootstrap.bundle.min.js"></script>
<script src="assets/js/plugins/slick.js"></script>
<script src="assets/js/plugins/jquery.syotimer.min.js"></script>
<script src="assets/js/plugins/wow.js"></script>
<script src="assets/js/plugins/jquery-ui.js"></script>
<script src="assets/js/plugins/perfect-scrollbar.js"></script>
<script src="assets/js/plugins/magnific-popup.js"></script>
<script src="assets/js/plugins/select2.min.js"></script>
<script src="assets/js/plugins/waypoints.js"></script>
<script src="assets/js/plugins/counterup.js"></script>
<script src="assets/js/plugins/jquery.countdown.min.js"></script>
<script src="assets/js/plugins/images-loaded.js"></script>
<script src="assets/js/plugins/isotope.js"></script>
<script src="assets/js/plugins/scrollup.js"></script>
<script src="assets/js/plugins/jquery.vticker-min.js"></script>
<script src="assets/js/plugins/jquery.theia.sticky.js"></script>
<script src="assets/js/plugins/jquery.elevatezoom.js"></script>
<!-- Template  JS -->
<script src="assets/js/main.js?v=3.3"></script>
<script src="assets/js/shop.js?v=3.3"></script>
</body>

</html>