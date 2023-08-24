<?php
# Initialize the session
session_start();
include('php-assets/header.php');
?>

<?php
require_once "php-assets/config.php";

// Retrieve the book_id parameter from the URL
if (isset($_GET['resource_id'])) {
    $bookId = $_GET['resource_id'];

    // Fetch book details from the database
    $sql = "SELECT * FROM Resource WHERE ResourceID = $bookId";
    $result = $link->query($sql);

    if ($result->num_rows > 0) {
        $bookDetails = $result->fetch_assoc();
        $title = $bookDetails['Title'];
        $category = $bookDetails['CategoryID'];
        $authors = $bookDetails['Authors'];
        $publisher = $bookDetails['Publisher'];
        $format = $bookDetails['Format'];
        $availabilityStatus = $bookDetails['AvailabilityStatus'];
        $description = $bookDetails['Description'];
        // ... and other details
    } else {
        // Handle case when book details are not found
        echo "Book details not found.";
        exit;
    }
} else {
    // Handle case when book_id parameter is not provided
    echo "Invalid request.";
    exit;
}

// Assuming $bookDetails is already populated with book details
$categoryID = $bookDetails['CategoryID'];

// Fetch the category details from the Category table
$categoryQuery = "SELECT * FROM Category WHERE CategoryID = $categoryID";
$categoryResult = $link->query($categoryQuery);

if ($categoryResult->num_rows > 0) {
    $categoryDetails = $categoryResult->fetch_assoc();
    $categoryName = $categoryDetails['CategoryName'];
} else {
    $categoryName = "Unknown Category"; // Default value if category not found
}
?>


<?php


# If user is not logged in then redirect him to login page
if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== TRUE) {
    echo "<script>" . "window.location.href='./login.php';" . "</script>";
    exit;
}
?>




<main class="main">
    <div class="page-header breadcrumb-wrap">
        <div class="container">
            <div class="breadcrumb">
                <a href="index.php" rel="nofollow">Home</a>
                <span></span> Book
            </div>
        </div>
    </div>
    <section class="mt-50 mb-50">
        <div class="container">
            <div class="row">
                <div class="col-lg-9">
                    <div class="product-detail accordion-detail">
                        <div class="row mb-50">
                            <div class="col-md-3 col-sm-6 col-xs-6">
                                <div class="detail-gallery">
                                    <span class="zoom-icon"><i class="fi-rs-search"></i></span>
                                    <div class="product-image-slider">
                                        <figure class="border-radius-10">
                                            <div>
                                                <div>
                                                    <img src="assets/imgs/book.png" alt="image">
                                                </div>
                                            </div>
                                        </figure>
                                    </div>
                                </div>
                                <div class="social-icons single-share">
                                    <ul class="text-grey-5 d-inline-block">
                                        <li><strong class="mr-10">Share this:</strong></li>
                                        <li class="social-facebook"><a href="#"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" width="24" height="24">
                                                    <path d="M12 1C5.92 1 1 5.92 1 12s4.92 11 11 11 11-4.92 11-11S18.08 1 12 1zm1 17v-4h2v-2h-2V9.41h2V7.42s-1.07-.18-2.06-.18c-.94 0-2.94.54-2.94 3v1.77H7V14h2v4h2z" />
                                                </svg></a></li>
                                        <li class="social-twitter"><a href="#"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" width="24" height="24">
                                                    <path d="M23.95 4.55c-.88.38-1.83.64-2.83.76 1.02-.61 1.8-1.58 2.17-2.74-.95.56-2.01.97-3.14 1.19-.9-.96-2.18-1.56-3.6-1.56-2.72 0-4.93 2.21-4.93 4.93 0 .38.04.75.09 1.11-4.1-.2-7.75-2.17-10.18-5.16-.43.72-.68 1.56-.68 2.46 0 1.7.87 3.2 2.19 4.08-.8-.02-1.56-.25-2.22-.63v.06c0 2.38 1.69 4.36 3.94 4.81-.41.11-.84.17-1.29.17-.31 0-.61 0-.91-.03.61 1.9 2.39 3.29 4.5 3.33-1.64 1.28-3.71 2.04-5.95 2.04-.39 0-.77 0-1.15-.03 2.12 1.36 4.63 2.15 7.34 2.15 8.8 0 13.63-7.3 13.63-13.63 0-.21 0-.42-.01-.63.93-.68 1.74-1.54 2.38-2.5z" />
                                                </svg></a></li>
                                        <li class="social-instagram"><a href="#"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" width="24" height="24">
                                                    <path d="M12 2C6.47 2 2 6.47 2 12s4.47 10 10 10 10-4.47 10-10S17.53 2 12 2zm0 17.5c-3.6 0-6.5-2.9-6.5-6.5s2.9-6.5 6.5-6.5 6.5 2.9 6.5 6.5-2.9 6.5-6.5 6.5zm7.8-11.96a1.8 1.8 0 0 0-.47-1.92 1.8 1.8 0 0 0-1.92-.47c-1.1.39-2.72.86-4.6 1.37a17.02 17.02 0 0 0-5.47-.76c-1.84 0-3.69.15-5.47.76-1.88-.51-3.5-.98-4.6-1.37a1.8 1.8 0 0 0-1.92.47 1.8 1.8 0 0 0-.47 1.92c.39 1.1.86 2.72 1.37 4.6a17.02 17.02 0 0 0-.76 5.47c0 1.84.15 3.69.76 5.47.51 1.88.98 3.5 1.37 4.6a1.8 1.8 0 0 0 .47 1.92 1.8 1.8 0 0 0 1.92.47c1.1-.39 2.72-.86 4.6-1.37a17.02 17.02 0 0 0 5.47.76c1.84 0 3.69-.15 5.47-.76 1.88.51 3.5.98 4.6 1.37a1.8 1.8 0 0 0 1.92-.47 1.8 1.8 0 0 0 .47-1.92c-.39-1.1-.86-2.72-1.37-4.6a17.02 17.02 0 0 0 .76-5.47c0-1.84-.15-3.69-.76-5z" />
                                                </svg></a></li>

                                </div>
                            </div>
                            <div class="col-md-9 col-sm-12 col-xs-12">
                                <div class="detail-info">
                                    <h2 class="title-detail"><?php echo $title; ?></h2>
                                    <div class="product-detail-rating">
                                        <div class="pro-details-brand">
                                            <span> Category: <a href="book.php"><?php echo $categoryName; ?></a></span>


                                        </div>
                                        <div class="product-rate-cover text-end">
                                            <div class="product-rate d-inline-block">
                                                <div class="product-rating" style="width: <?php echo $ratingPercentage; ?>%;"></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="bt-1 border-color-1 mt-15 mb-15"></div>
                                    <div class="short-desc mb-30">
                                        <p><?php echo implode(' ', array_slice(explode(' ', $description), 0, 50)); ?></p>

                                    </div>
                                    <div class="product_sort_info font-xs mb-30">
                                        <ul>
                                            <li class="mb-10">Authors: <?php echo $authors; ?></li>
                                            <li class="mb-10">Publisher: <?php echo $publisher; ?></li>
                                            <li> Format: <?php echo $format; ?></li>
                                        </ul>
                                        <div class="">
                                            <a href="reserve-book.php?book_id=<?php echo $bookId; ?>" class="button button-add-to-cart">Reserve</a>
                                        </div>

                                    </div>
                                    <div class="bt-1 border-color-1 mt-30 mb-30"></div>

                                    <ul class="product-meta font-xs color-grey mt-50">
                                        <li class="mb-5">ISBN: <?php echo $bookDetails['ISBN']; ?></li>
                                        <li class="mb-5">KEYWORDS: <?php echo $bookDetails['Keywords']; ?></li>
                                        <li>Availability:<span class="in-stock text-success ml-5"><?php echo $availabilityStatus; ?></span></li>
                                    </ul>
                                </div>
                                <!-- Detail Info -->
                            </div>
                        </div>
                        <div class="tab-style3">
                            <ul class="nav nav-tabs text-uppercase">
                                <li class="nav-item">
                                    <a class="nav-link active" id="Description-tab" data-bs-toggle="tab" href="#Description">Description</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="Reviews-tab" data-bs-toggle="tab" href="#Reviews">Reviews</a>
                                </li>
                            </ul>
                            <div class="tab-content shop_info_tab entry-main-content">
                                <div class="tab-pane fade show active" id="Description">
                                    <div class="">
                                        <p><?php echo '<p>' . implode(' ', array_slice(explode(' ', $description), 0, 100)) . '...</p>';
                                            ?></p>
                                        <!-- Rest of description content here -->
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="Reviews">
                                    <!--Comments-->
                                    <div class="comments-area">
                                        <div class="row">
                                            <div class="col-lg-8">
                                                <h4 class="mb-30">Reader Comments</h4>
                                                <?php
                                                require_once "php-assets/config.php";
                                                $feedbackQuery = "SELECT * FROM Feedback";
                                                $feedbackResult = $link->query($feedbackQuery);
                                                ?>

                                                <!-- Display feedback data -->
                                                <div class="comment-list">
                                                    <?php while ($feedback = $feedbackResult->fetch_assoc()) { ?>
                                                        <div class="single-comment justify-content-between d-flex">
                                                            <div class="user justify-content-between d-flex">
                                                                <div class="thumb text-center">
                                                                    <img src="assets/imgs/page/avatar-6.jpg" alt="">
                                                                    <h6><a href="#"><?php echo $feedback['UserEmail']; ?></a></h6>
                                                                </div>
                                                                <div class="desc">
                                                                    <div class="product-rate d-inline-block">
                                                                        <!-- Replace the next line with your actual rating display logic -->
                                                                        <div class="product-rating" style="width: <?php echo rand(50, 100); ?>%"></div>
                                                                    </div>
                                                                    <p><?php echo $feedback['FeedbackText']; ?></p>
                                                                    <div class="d-flex justify-content-between">
                                                                        <div class="d-flex align-items-center">
                                                                            <p class="font-xs mr-30"><?php echo $feedback['Timestamp']; ?></p>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    <?php } ?>
                                                </div>

                                            </div>
                                            <div class="col-lg-4">
                                                <h4 class="mb-30">Reader reviews</h4>
                                                <div class="d-flex mb-30">
                                                    <div class="product-rate d-inline-block mr-15">
                                                        <div class="product-rating" style="width:90%">
                                                        </div>
                                                    </div>
                                                    <h6>4.8 out of 5</h6>
                                                </div>
                                                <div class="progress">
                                                    <span>5 star</span>
                                                    <div class="progress-bar" role="progressbar" style="width: 50%;" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100">50%
                                                    </div>
                                                </div>
                                                <div class="progress">
                                                    <span>4 star</span>
                                                    <div class="progress-bar" role="progressbar" style="width: 25%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">25%
                                                    </div>
                                                </div>
                                                <div class="progress">
                                                    <span>3 star</span>
                                                    <div class="progress-bar" role="progressbar" style="width: 45%;" aria-valuenow="45" aria-valuemin="0" aria-valuemax="100">45%
                                                    </div>
                                                </div>
                                                <div class="progress">
                                                    <span>2 star</span>
                                                    <div class="progress-bar" role="progressbar" style="width: 65%;" aria-valuenow="65" aria-valuemin="0" aria-valuemax="100">65%
                                                    </div>
                                                </div>
                                                <div class="progress mb-30">
                                                    <span>1 star</span>
                                                    <div class="progress-bar" role="progressbar" style="width: 85%;" aria-valuenow="85" aria-valuemin="0" aria-valuemax="100">85%
                                                    </div>
                                                </div>
                                                <a href="#" class="font-xs text-muted">How are ratings
                                                    calculated?</a>
                                            </div>
                                        </div>
                                    </div>
                                    <!--comment form-->
                                    <div class="comment-form">
                                        <h4 class="mb-15">Add a review</h4>
                                        <div class="product-rate d-inline-block mb-30">
                                        </div>


                                        <div class="row">
                                            <div class="col-lg-8 col-md-12">
                                                <form class="form-contact comment_form" action="feedback.php" method="post" novalidate>
                                                    <div class="row">
                                                        <div class="col-12">
                                                            <div class="form-group">
                                                                <textarea class="form-control w-100" name="comment" id="comment" cols="30" rows="9" placeholder="Write Comment"></textarea>
                                                            </div>
                                                        </div>

                                                        <div class="col-sm-6">
                                                            <div class="form-group">
                                                                <input class="form-control" name="email" id="email" type="email" placeholder="Email">
                                                            </div>
                                                        </div>

                                                    </div>
                                                    <div class="form-group">
                                                        <button type="submit" class="button button-contactForm">Submit
                                                            Review</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 primary-sidebar sticky-sidebar">
                    <div class="widget-area">
                        <div class="widget-category mb-30">
                            <h5 class="section-title style-1 mb-30 wow fadeIn animated">Category</h5>
                            <!-- Your file with the list of categories -->
                            <ul class="categories">
                                <?php
                                # Include connection
                                require_once "php-assets/config.php";

                                // Query the database to get all categories
                                $sql = "SELECT * FROM Category";
                                $result = mysqli_query($link, $sql);

                                while ($category = mysqli_fetch_assoc($result)) {
                                    echo "<li><a href='categories.php?category=" . $category['Slug'] . "'>" . $category['CategoryName'] . "</a></li>";
                                }
                                ?>
                            </ul>

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
    <script src="assets/js/plugins/jquery.elevatezoom.js"></script>    
    <script src="assets/js/main.js?v=3.3"></script>
    <script src="assets/js/shop.js?v=3.3"></script> -->
</body>

</html>