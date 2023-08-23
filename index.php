<?php
# Initialize the session
session_start();
include('php-assets/header.php');
?>
<main class="main">
    <section class="home-slider position-relative">
        <div class="hero-slider-1 dot-style-1 dot-style-1-position-1">
            <div class="single-hero-slider single-animation-wrap">
                <div class="container">
                    <div class="row align-items-center slider-animated-1">
                        <div class="col-lg-5 col-md-6">
                            <div class="hero-slider-content-2">
                                <h4 class="animated">Welcome to</h4>
                                <h2 class="animated fw-900">Empowering Education</h2>
                                <h1 class="animated fw-900 text-brand">Unlocking Knowledge</h1>
                                <p class="animated">Discover a world of learning opportunities and resources at your fingertips. Join us in the journey of exploration and education.</p>
                                <a class="btn btn-brand animated" href="about.php">Learn More</a>
                            </div>
                        </div>
                        <div class="col-lg-7 col-md-6">
                            <div class="single-slider-img single-slider-img-1">
                                <img class="animated slider-1-1 rounded" src="assets/imgs/isbat.jpg" alt="ISBAT University">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="single-hero-slider single-animation-wrap">
                <div class="container">
                    <div class="row align-items-center slider-animated-1">
                        <div class="col-lg-5 col-md-6">
                            <div class="hero-slider-content-2">
                                <h4 class="animated">Explore Our</h4>
                                <h2 class="animated fw-900">Library of Possibilities</h2>
                                <h1 class="animated fw-900 text-7">Dive into Knowledge</h1>
                                <p class="animated">Immerse yourself in a world of books, articles, and resources that inspire learning and growth. Let curiosity lead the way.</p>
                                <a class="btn btn-brand animated" href="library.php">Start Exploring</a>
                            </div>
                        </div>
                        <div class="col-lg-7 col-md-6">
                            <div class="single-slider-img single-slider-img-1">
                                <img class="animated slider-1-2 rounded" src="assets/imgs/library.jpg" alt="Library">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="slider-arrow hero-slider-1-arrow"></div>
    </section>


    <section class="product-tabs section-padding position-relative wow fadeIn animated">
        <div class="bg-square"></div>
        <div class="container">
            <div class="row product-grid-4">
                <?php
                require_once "php-assets/config.php";

                // Query to get all resources
                $sql = "SELECT * FROM Resource";
                $result = mysqli_query($link, $sql);


                while ($resource = mysqli_fetch_assoc($result)) {
                    echo '<div class="col-lg-2 col-md-3 col-sm-4 col-xs-4 col-4">';
                    echo '<div class="product-cart-wrap mb-30">';
                    echo '<div class="product-img-action-wrap">';
                    echo '<div class="product-img product-img-zoom">';
                    echo '<a href="book-details.php?resource_id=' . $resource['ResourceID'] . '">';
                    echo '<img class="default-img" src="assets/imgs/book.png" alt="">';
                    echo '</a>';

                    echo '</div>';
                    echo '</div>';
                    echo '<div class="product-content-wrap">';
                    echo '<h2><a href="book-details.php">' . $resource['Title'] . '</a></h2>';
                    echo '<div class="" title="90%">';
                    echo '<p>' . $resource['Authors'] . '</p>';
                    echo '</div>';
                    echo '<div class="product-price">';
                    echo '<span>' . $resource['PublicationYear'] . '</span>'; // You might want to replace this with the actual price
                    echo '</div>';
                    echo '</div>';
                    echo '</div>';
                    echo '</div>';
                }
                ?>
            </div>
            <!--End product-grid-4-->
        </div>
    </section>

    <!--     <section class="popular-categories section-padding mt-15 mb-25">
        <div class="container wow fadeIn animated">
            <h3 class="section-title mb-20"><span>Popular</span> Categories</h3>
            <div class="carausel-6-columns-cover position-relative">
                <div class="slider-arrow slider-arrow-2 carausel-6-columns-arrow" id="carausel-6-columns-arrows">
                </div>
                <div class="carausel-6-columns" id="carausel-6-columns">
                    <div class="card-1"> -->
    <?php
    // require_once "php-assets/config.php";


    // $sql = "SELECT * FROM Category";
    // $result = mysqli_query($link, $sql);

    // while ($category = mysqli_fetch_assoc($result)) {
    //     echo '<h5><a href="categories.php?category=' . $category['Slug'] . '">' . $category['CategoryName'] . '</a></h5>';
    // }
    ?>
    <!--                     </div>
                </div>
            </div>
        </div>
    </section> -->



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