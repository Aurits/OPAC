<?php
# Initialize the session
session_start();

?>

<?php
include('php-assets/header.php'); ?>

<main class="main">
    <div class="page-header breadcrumb-wrap">
        <div class="container">
            <div class="breadcrumb">
                <a href="index.php" rel="nofollow">Home</a>
                <span></span> Privacy Policy
            </div>
        </div>
    </div>
    <section class="mt-50 mb-50">
        <div class="container">
            <div class="row">
                <div class="col-lg-9">
                    <div class="single-page pr-30 mb-lg-0 mb-sm-5">
                        <div class="single-header style-2">
                            <h2>Your Privacy Matters</h2>
                        </div>
                        <div class="single-content">
                            <p>Welcome to our Privacy Policy page. Your privacy is important to us. It's crucial to understand how your personal information is collected, used, and safeguarded. Please take a moment to read through the following information.</p>

                            <h4>Your Acceptance and Compliance</h4>
                            <p>Your access to and use of our services is subject to your acceptance and compliance with these Terms of Service. By using our website, you agree to adhere to these terms. These terms apply to all visitors, users, and individuals who access or utilize our services.</p>

                            <h4>Rights and Restrictions</h4>
                            <ol>
                                <li>We respect your privacy and protect your personal information.</li>
                                <li>We collect only the necessary information required for providing our services.</li>
                                <li>Your personal data will not be shared, sold, or rented to any third party.</li>
                                <li>You have the right to access, update, or delete your personal information.</li>
                            </ol>

                            <h4>Links to Other Websites</h4>
                            <p>Our website may contain links to other websites that are not operated by us. We are not responsible for the content and privacy practices of these third-party websites. We encourage you to review their privacy policies when you leave our website.</p>

                            <h4>Termination of Service</h4>
                            <p>We reserve the right to terminate or suspend your access to our services at any time, without prior notice, for violating the terms outlined in this policy or for any other reason.</p>

                            <p>We take your privacy seriously and strive to ensure that your personal information is secure and well-protected. If you have any questions or concerns about our Privacy Policy, please contact us.</p>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 primary-sidebar sticky-sidebar">
                    <div class="widget-area">

                        <!--Widget categories-->
                        <div class="sidebar-widget widget_categories mb-40">
                            <div class="widget-header position-relative mb-20 pb-10">
                                <h5 class="widget-title">Categories</h5>
                            </div>
                            <div class="post-block-list post-module-1 post-module-5">
                                <ul>
                                    <?php
                                    require_once "php-assets/config.php";

                                    // Query to get all categories
                                    $sql = "SELECT * FROM Category";
                                    $result = mysqli_query($link, $sql);

                                    while ($category = mysqli_fetch_assoc($result)) {
                                        echo "<li class='cat-item cat-item-" . $category['CategoryID'] . "'><a href='categories.php?category=" . $category['Slug'] . "'>" . $category['CategoryName'] . "</a></li>";
                                    }
                                    ?>
                                </ul>

                            </div>
                        </div>
                        <!--Widget latest posts style 1-->
                        <div class="sidebar-widget widget_alitheme_lastpost mb-20">
                            <div class="widget-header position-relative mb-20 pb-10">
                                <h5 class="widget-title">Trending Now</h5>
                            </div>
                            <div class="row">
                                <div class="col-12 sm-grid-content mb-30">
                                    <div class="post-thumb d-flex border-radius-5 img-hover-scale mb-15">
                                        <a href="blog-details.php">
                                            <img src="assets/imgs/library.jpg" alt="">
                                        </a>
                                    </div>
                                    <div class="post-content media-body">
                                        <h4 class="post-title mb-10 text-limit-2-row">ISBAT University Main Library </h4>
                                        <div class="entry-meta meta-13 font-xxs color-grey">
                                            <span class="post-on mr-10">25 April</span>

                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <!--Widget ads-->

                        <!--Widget Tags-->
                        <div class="sidebar-widget widget_tags mb-50">
                            <div class="widget-header position-relative mb-20 pb-10">
                                <h5 class="widget-title">Popular Books </h5>
                            </div>
                            <div class="tagcloud">
                                <?php
                                require_once "php-assets/config.php";

                                // Query to get all categories
                                $sql = "SELECT * FROM Category";
                                $result = mysqli_query($link, $sql);

                                while ($category = mysqli_fetch_assoc($result)) {
                                    echo "<a class='tag-cloud-link' href='categories.php?category=" . $category['Slug'] . "'>" . $category['CategoryName'] . "</a>";
                                }
                                ?>
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