<?php
session_start();
include('php-assets/header.php');
?>

<main class="main">
    <div class="page-header breadcrumb-wrap">
        <!-- Breadcrumb content -->
    </div>
    <section class="mt-50 mb-50">
        <div class="container custom">
            <div class="row">
                <div class="col-lg-9">
                    <div class="single-header mb-50">
                        <!-- Single header content -->
                    </div>
                    <div class="loop-grid pr-30">
                        <div class="row">
                            <?php
                            require_once "php-assets/config.php";

                            // Retrieve all blog data
                            $sql = "SELECT * FROM Blog";
                            $result = mysqli_query($link, $sql);

                            while ($blogData = mysqli_fetch_assoc($result)) {
                                echo '<div class="col-lg-3">';
                                echo '<article class="wow fadeIn animated hover-up mb-30">';
                                echo '<div class="post-thumb img-hover-scale">';
                                echo '<a href="blog-details.php?blog=' . $blogData['Slug'] . '">';
                                echo '<img src="assets/imgs/book.png" alt="">';
                                echo '</a>';
                                echo '<div class="entry-meta">';
                                echo '</div>';
                                echo '</div>';
                                echo '<div class="entry-content-2">';
                                echo '<h3 class="post-title mb-15">';
                                echo '<a href="blog-details.php?blog=' . $blogData['Slug'] . '">' . $blogData['Title'] . '</a>';
                                echo '</h3>';
                                echo '<p class="post-exerpt mb-30">' . substr($blogData['Content'], 0, 75) . '...</p>';
                                echo '<div class="entry-meta meta-1 font-xs color-grey mt-10 pb-10">';
                                echo '<div>';
                                echo '<span class="post-on"> <i class="fi-rs-clock"></i> ' . date("d F Y", strtotime($blogData['PublishDate'])) . '</span>';
                                echo '</div>';
                                echo '<a href="blog-details.php?blog=' . $blogData['Slug'] . '" class="text-brand">Read more <i class="fi-rs-arrow-right"></i></a>';
                                echo '</div>';
                                echo '</div>';
                                echo '</article>';
                                echo '</div>';
                            }
                            ?>
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
</body>

</html>