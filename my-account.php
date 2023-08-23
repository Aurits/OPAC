<?php
# Initialize the session
session_start();

# If user is not logged in then redirect him to login page
if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== TRUE) {
    echo "<script>" . "window.location.href='./login.php';" . "</script>";
    exit;
}
?>

<?php

include('php-assets/header.php');
?>
<main class="main">
    <div class="page-header breadcrumb-wrap">
        <div class="container">
            <div class="breadcrumb">
                <a href="index.php" rel="nofollow">Home</a>
                <span></span> My Account
            </div>
        </div>
    </div>
    <section class="pt-150 pb-150">
        <div class="container">
            <div class="row">
                <div class="col-lg-10 m-auto">
                    <div class="row">
                        <div class="col-md-2">
                            <div class="dashboard-menu">
                                <ul class="nav flex-column" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active" id="dashboard-tab" data-bs-toggle="tab" href="#dashboard" role="tab" aria-controls="dashboard" aria-selected="false"></i>Dashboard</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="books-tab" data-bs-toggle="tab" href="#books" role="tab" aria-controls="books" aria-selected="false">Books</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="categories-tab" data-bs-toggle="tab" href="#categories" role="tab" aria-controls="categories" aria-selected="false">Categories</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="locations-tab" data-bs-toggle="tab" href="#locations" role="tab" aria-controls="locations" aria-selected="false">Locations</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="blogs-tab" data-bs-toggle="tab" href="#blogs" role="tab" aria-controls="blogs" aria-selected="false">Blogs</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="messages-tab" data-bs-toggle="tab" href="#messages" role="tab" aria-controls="messages" aria-selected="true">Messages</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="account-detail-tab" data-bs-toggle="tab" href="#account-detail" role="tab" aria-controls="account-detail" aria-selected="true">Account details</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="logout.php"><i class="fi-rs-sign-out mr-10"></i>Logout</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-md-10">
                            <div class="tab-content dashboard-content">
                                <div class="tab-pane fade active show" id="dashboard" role="tabpanel" aria-labelledby="dashboard-tab">
                                    <div class="card">
                                        <div class="card-header">
                                            <h5 class="mb-0">Hello Rosie! </h5>
                                        </div>
                                        <div class="card-body">
                                            <p>From your account dashboard. you can easily check &amp; view your <a href="#">recent messages</a>, manage your <a href="#">blogs</a> and <a href="#">books</a></p>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="books" role="tabpanel" aria-labelledby="books-tab">
                                    <div class="card">
                                        <div class="card-header">
                                            <h5>Add Resource</h5>
                                        </div>
                                        <div class="card-body">
                                            <form method="post" name="enq" action="php-assets/book.php">
                                                <div class="row">
                                                    <div class="form-group col-md-6">
                                                        <label>Title <span class="required">*</span></label>
                                                        <input required="" class="form-control square" name="title" type="text">
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label>Authors</label>
                                                        <input class="form-control square" name="authors" type="text">
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label>Publication Year</label>
                                                        <input class="form-control square" name="publication_year" type="number">
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label>Publisher</label>
                                                        <input class="form-control square" name="publisher" type="text">
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label>ISBN</label>
                                                        <input class="form-control square" name="isbn" type="text">
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label>Keywords</label>
                                                        <input class="form-control square" name="keywords" type="text">
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label>Format</label>
                                                        <select class="form-control square" name="format">
                                                            <option value="Print">Print</option>
                                                            <option value="Digital">Digital</option>
                                                            <option value="Audio">Audio</option>
                                                        </select>
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label>Availability Status</label>
                                                        <select class="form-control square" name="availability_status">
                                                            <option value="Available">Available</option>
                                                            <option value="Unavailable">Unavailable</option>
                                                        </select>
                                                    </div>

                                                    <div class="form-group col-md-6">
                                                        <label>Location</label>
                                                        <select class="form-control square" name="location_id">
                                                            <?php

                                                            include('php-assets/config.php');
                                                            $location_query = "SELECT LocationID, LocationName FROM Location";
                                                            $location_result = mysqli_query($link, $location_query);
                                                            while ($row = mysqli_fetch_assoc($location_result)) {
                                                                echo "<option value='{$row['LocationID']}'>{$row['LocationName']}</option>";
                                                            }
                                                            ?>
                                                        </select>
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label>Category</label>
                                                        <select class="form-control square" name="category_id">
                                                            <?php
                                                            include('php-assets/config.php');
                                                            $category_query = "SELECT CategoryID, CategoryName FROM Category";
                                                            $category_result = mysqli_query($link, $category_query);
                                                            while ($row = mysqli_fetch_assoc($category_result)) {
                                                                echo "<option value='{$row['CategoryID']}'>{$row['CategoryName']}</option>";
                                                            }
                                                            ?>
                                                        </select>
                                                    </div>
                                                    <div class="form-group col-md-12">
                                                        <label>Description</label>
                                                        <textarea class="form-control square" name="description" rows="6"></textarea>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <button type="submit" class="btn btn-fill-out submit" name="add_resource" value="Submit">Save</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>


                                <div class="tab-pane fade" id="categories" role="tabpanel" aria-labelledby="categories-tab">
                                    <div class="card">
                                        <div class="card-header">
                                            <h5>Add Category</h5>
                                        </div>
                                        <div class="card-body">
                                            <form method="post" name="enq" action="php-assets/category.php">
                                                <div class="row">
                                                    <div class="form-group col-md-6">
                                                        <label>Category Name <span class="required">*</span></label>
                                                        <input required="" class="form-control square" name="category_name" type="text">
                                                    </div>
                                                    <div class="col-md-12">
                                                        <button type="submit" class="btn btn-fill-out submit" name="add_category" value="Submit">Save</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>

                                <div class="tab-pane fade" id="locations" role="tabpanel" aria-labelledby="locations-tab">
                                    <div class="card">
                                        <div class="card-header">
                                            <h5>Add Location</h5>
                                        </div>
                                        <div class="card-body">
                                            <form method="post" name="enq" action="php-assets/location.php">
                                                <div class="row">
                                                    <div class="form-group col-md-6">
                                                        <label>Location Name <span class="required">*</span></label>
                                                        <input required="" class="form-control square" name="location_name" type="text">
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label>Address</label>
                                                        <input class="form-control square" name="address" type="text">
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label>Opening Hours</label>
                                                        <input class="form-control square" name="opening_hours" type="text">
                                                    </div>
                                                    <div class="col-md-12">
                                                        <button type="submit" class="btn btn-fill-out submit" name="add_location" value="Submit">Save</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="blogs" role="tabpanel" aria-labelledby="blogs-tab">
                                    <div class="card">
                                        <div class="card-header">
                                            <h5>Add Blog Post</h5>
                                        </div>
                                        <div class="card-body">
                                            <form method="post" name="enq" action="php-assets/blog.php">
                                                <div class="row">
                                                    <div class="form-group col-md-6">
                                                        <label>Title <span class="required">*</span></label>
                                                        <input required="" class="form-control square" name="title" type="text">
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label>Publish Date</label>
                                                        <input class="form-control square" name="publish_date" type="date">
                                                    </div>
                                                    <div class="form-group col-md-12">
                                                        <label>Content</label>
                                                        <textarea class="form-control square" name="content" rows="6"></textarea>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <button type="submit" class="btn btn-fill-out submit" name="add_blog" value="Submit">Save</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>


                                <div class="tab-pane fade" id="messages" role="tabpanel" aria-labelledby="messages-tab">

                                    <?php
                                    # Include connection
                                    require_once "php-assets/config.php";





                                    # Fetch messages from the Messages table
                                    $messages = [];
                                    $sql = "SELECT * FROM Message";
                                    if ($result = mysqli_query($link, $sql)) {
                                        while ($row = mysqli_fetch_assoc($result)) {
                                            $messages[] = $row;
                                        }
                                        mysqli_free_result($result);
                                    }
                                    ?>

                                    <!-- HTML code -->
                                    <div class="card">
                                        <div class="card-header">
                                            <h5 class="mb-0">Your Messages</h5>
                                        </div>
                                        <div class="card-body">
                                            <div class="table-responsive">
                                                <table class="table">
                                                    <thead>
                                                        <tr>
                                                            <th>Email</th>
                                                            <th>Subject</th>
                                                            <th>Message</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php foreach ($messages as $message) : ?>
                                                            <tr>
                                                                <td><?= htmlspecialchars($message['SenderEmail']); ?></td>
                                                                <td><?= htmlspecialchars($message['SenderSubject']); ?></td>
                                                                <td><?= htmlspecialchars($message['MessageText']); ?></td>
                                                            </tr>
                                                        <?php endforeach; ?>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>




                                </div>
                                <div class="tab-pane fade" id="account-detail" role="tabpanel" aria-labelledby="account-detail-tab">
                                    <div class="col-lg-10">
                                        <?php
                                        # Include connection
                                        require_once "php-assets/config.php";



                                        # Fetch user details from the Users table
                                        $userDetails = [];
                                        $sql = "SELECT UserID, Username, Email, role FROM Users WHERE UserID = ?";
                                        if ($stmt = mysqli_prepare($link, $sql)) {
                                            mysqli_stmt_bind_param($stmt, "i", $_SESSION["id"]);
                                            if (mysqli_stmt_execute($stmt)) {
                                                mysqli_stmt_bind_result($stmt, $UserID, $Username, $Email, $role);
                                                mysqli_stmt_fetch($stmt);
                                                $userDetails = [
                                                    "id" => $UserID,
                                                    "username" => $Username,
                                                    "email" => $Email,
                                                    "role" => $role
                                                ];
                                            }
                                            mysqli_stmt_close($stmt);
                                        }
                                        ?>

                                        <!-- HTML code -->
                                        <div class="card mb-3 mb-lg-0">
                                            <div class="card-header">
                                                <h5 class="mb-0">My Account</h5>
                                            </div>
                                            <div class="card-body">
                                                <p><strong>User ID:</strong> <?= htmlspecialchars($userDetails['id']); ?></p>
                                                <p><strong>Username:</strong> <?= htmlspecialchars($userDetails['username']); ?></p>
                                                <p><strong>Email:</strong> <?= htmlspecialchars($userDetails['email']); ?></p>
                                                <p><strong>Role:</strong> <?= htmlspecialchars($userDetails['role']); ?></p>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
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
<!-- <script src="assets/js/vendor/modernizr-3.6.0.min.js"></script>
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
    <script src="assets/js/main.js?v=3.3"></script> -->
</body>

</html>