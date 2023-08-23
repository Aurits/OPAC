<?php
# Initialize the session
session_start();
include('php-assets/header.php');
?>
<main class="main">
    <div class="page-header breadcrumb-wrap">
        <div class="container">
            <div class="breadcrumb">
                <a href="index.php" rel="nofollow">Home</a>
                <span></span> Blog
                <span></span> Technology
            </div>
        </div>
    </div>
    <section class="mt-50 mb-50">
        <div class="container custom">
            <div class="row">
                <div class="col-lg-9">
                    <div class="single-page pr-30">
                        <?php
                        require_once "php-assets/config.php";

                        // Retrieve blog data based on slug from URL parameter
                        if (isset($_GET['blog'])) {
                            $blogSlug = $_GET['blog'];
                            $sql = "SELECT * FROM Blog WHERE Slug = ?";
                            $stmt = mysqli_prepare($link, $sql);
                            mysqli_stmt_bind_param($stmt, "s", $blogSlug);
                            mysqli_stmt_execute($stmt);
                            $result = mysqli_stmt_get_result($stmt);
                            $blogData = mysqli_fetch_assoc($result);

                            if ($blogData) {
                                echo '<div class="single-header style-2">';
                                echo '<h1 class="mb-30">' . $blogData['Title'] . '</h1>';
                                echo '<div class="single-header-meta">';
                                echo '<div class="entry-meta meta-1 font-xs mt-15 mb-15">';
                                echo '<span class="post-on has-dot">' . date("d F Y", strtotime($blogData['PublishDate'])) . '</span>';
                                echo '</div>';
                                echo '</div>';
                                echo '</div>';
                                echo '<figure class="single-thumbnail">';
                                echo '<img height="100" width="100" src="assets/imgs/book.png" alt="">'; // Replace with actual image source
                                echo '</figure>';
                                echo '<div class="single-content">';
                                echo '<p>' . $blogData['Content'] . '</p>';
                                echo '</div>';
                            } else {
                                echo '<p>Blog not found.</p>';
                            }

                            mysqli_stmt_close($stmt);
                        } else {
                            echo '<p>No blog selected.</p>';
                        }
                        ?>
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
?> <!-- Vendor JS-->
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