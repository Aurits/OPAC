<?php


# Include connection
require_once "php-assets/config.php";

# Initialize session
session_start();


# Define variables and initialize with empty values
$username_err = $email_err = $password_err = $tel_err = $address_err = "";
$username = $email = $password = $tel = $address =  "";

# Processing form data when form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  # Validate username
  if (empty(trim($_POST["username"]))) {
    $username_err = "Please enter a username.";
  } else {
    $username = trim($_POST["username"]);
    if (!ctype_alnum(str_replace(array("@", "-", "_"), "", $username))) {
      $username_err = "Username can only contain letters, numbers and symbols like '@', '_', or '-'.";
    } else {
      # Prepare a select statement
      $sql = "SELECT UserID FROM Users WHERE username = ?";

      if ($stmt = mysqli_prepare($link, $sql)) {
        # Bind variables to the statement as parameters
        mysqli_stmt_bind_param($stmt, "s", $param_username);

        # Set parameters
        $param_username = $username;

        # Execute the prepared statement 
        if (mysqli_stmt_execute($stmt)) {
          # Store result
          mysqli_stmt_store_result($stmt);

          # Check if username is already registered
          if (mysqli_stmt_num_rows($stmt) == 1) {
            $username_err = "This username is already registered.";
          }
        } else {
          echo "<script>" . "alert('Oops! Something went wrong. Please try again later.')" . "</script>";
        }

        # Close statement 
        mysqli_stmt_close($stmt);
      }
    }
  }

  # Validate email 
  if (empty(trim($_POST["email"]))) {
    $email_err = "Please enter an email address";
  } else {
    $email = filter_var($_POST["email"], FILTER_SANITIZE_EMAIL);
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $email_err = "Please enter a valid email address.";
    } else {
      # Prepare a select statement
      $sql = "SELECT UserID FROM Users WHERE email = ?";

      if ($stmt = mysqli_prepare($link, $sql)) {
        # Bind variables to the statement as parameters
        mysqli_stmt_bind_param($stmt, "s", $param_email);

        # Set parameters
        $param_email = $email;

        # Execute the prepared statement 
        if (mysqli_stmt_execute($stmt)) {
          # Store result
          mysqli_stmt_store_result($stmt);

          # Check if email is already registered
          if (mysqli_stmt_num_rows($stmt) == 1) {
            $email_err = "This email is already registered.";
          }
        } else {
          echo "<script>" . "alert('Oops! Something went wrong. Please try again later.');" . "</script>";
        }

        # Close statement
        mysqli_stmt_close($stmt);
      }
    }
  }

  # Validate password
  if (empty(trim($_POST["password"]))) {
    $password_err = "Please enter a password.";
  } else {
    $password = trim($_POST["password"]);
    if (strlen($password) < 8) {
      $password_err = "Password must contain at least 8 or more characters.";
    }
  }

  # Check input errors before inserting data into database
  if (empty($username_err) && empty($email_err) && empty($password_err)) {
    # Prepare an insert statement
    $sql = "INSERT INTO Users(Username, Email, Password, PhoneNumber, Address ) VALUES (?, ?, ?, ?, ?)";

    if ($stmt = mysqli_prepare($link, $sql)) {
      # Bind varibales to the prepared statement as parameters
      mysqli_stmt_bind_param($stmt, "sssss", $param_username, $param_email, $param_password, $param_tel, $param_address);

      # Set parameters
      $param_username = $username;
      $param_email = $email;
      $param_password = password_hash($password, PASSWORD_DEFAULT);
      $param_tel = $_POST['tel'];
      $param_address = $_POST['address'];

      # Execute the prepared statement
      if (mysqli_stmt_execute($stmt)) {
        echo "<script>" . "alert('Registeration completed successfully. Login to continue.');" . "</script>";
        echo "<script>" . "window.location.href='./login.php';" . "</script>";
        exit;
      } else {
        echo "<script>" . "alert('Oops! Something went wrong. Please try again later.');" . "</script>";
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
        <span></span> Register
      </div>
    </div>
  </div>
  <section class="pt-150 pb-150">
    <div class="container">
      <div class="row">
        <div class="col-lg-10 m-auto">
          <div class="row">
            <div class="col-lg-6">
              <div class="login_wrap widget-taber-content p-30 background-white border-radius-5">
                <div class="padding_eight_all bg-white">
                  <div class="heading_s1">
                    <h3 class="mb-30">Create an Account</h3>
                  </div>
                  <form action="<?= htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" novalidate>
                    <div class="form-group">
                      <input type="text" required="" name="username" placeholder="Username" value="<?= $username; ?>">
                      <small class="text-danger"><?= $username_err; ?></small>
                    </div>
                    <div class="form-group">
                      <input type="text" required="" name="email" placeholder="Email" value="<?= $email; ?>">
                      <small class="text-danger"><?= $email_err; ?></small>
                    </div>
                    <div class="form-group">
                      <input required="" type="password" name="password" placeholder="Password" value="<?= $password; ?>">
                      <small class="text-danger"><?= $password_err; ?></small>
                    </div>
                    <div class="form-group">
                      <input required="" type="text" name="tel" placeholder="Tel" value="<?= $tel; ?>">
                      <small class="text-danger"><?= $tel_err; ?></small>
                    </div>
                    <div class="form-group">
                      <input required="" type="text" name="address" placeholder="Address" value="<?= $address; ?>">
                      <small class="text-danger"><?= $address_err; ?></small>
                    </div>
                    <div class="login_footer form-group">
                      <div class="chek-form">
                        <div class="custome-checkbox">
                          <input class="form-check-input" type="checkbox" name="checkbox" id="exampleCheckbox12" value="">
                          <label class="form-check-label" for="exampleCheckbox12"><span>I
                              agree to terms &amp; Policy.</span></label>
                        </div>
                      </div>
                      <a href="privacy-policy.php"><i class="fi-rs-book-alt mr-5 text-muted"></i>Lean more</a>
                    </div>
                    <div class="form-group">
                      <button type="submit" class="btn btn-fill-out btn-block hover-up" name="login">Submit &amp; Register</button>
                    </div>
                  </form>
                  <div class="text-muted text-center">Already have an account? <a href="login.php">Sign in
                      now</a></div>
                </div>
              </div>
            </div>
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