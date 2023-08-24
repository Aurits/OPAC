<?php
session_start();
include('php-assets/header.php');
?>
<main class="main">
    <div class="page-header breadcrumb-wrap">
        <div class="container">
            <div class="breadcrumb">
                <a href="index.php" rel="nofollow">Home</a>
                <span></span> Books
            </div>
        </div>
    </div>
    <section class="mt-50 mb-50">
        <div class="container">
            <div class="row">
                <div class="col-lg-9">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="mt-0 header-title text-center">Search your favorite books here</h4>
                                    <p class="text-muted font-14 mb-3">
                                        We found books for you
                                    </p>

                                    <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap">
                                        <thead>
                                            <tr>
                                                <th>Book</th>
                                                <th>Title</th>
                                                <th>Authors</th>
                                                <th>Publication Year</th>
                                                <th>Publisher</th>
                                                <th>ISBN</th>
                                                <th>Description</th>

                                            </tr>
                                        </thead>

                                        <tbody>
                                            <?php
                                            require_once "php-assets/config.php";

                                            // Query to get resources with related details
                                            $resourceQuery = "SELECT r.ResourceID, r.Title, r.Authors, r.PublicationYear, r.Publisher, r.ISBN, r.Description,
                                    l.LocationName, c.CategoryName
                              FROM Resource AS r
                              LEFT JOIN Location AS l ON r.LocationID = l.LocationID
                              LEFT JOIN Category AS c ON r.CategoryID = c.CategoryID";
                                            $result = mysqli_query($link, $resourceQuery);

                                            while ($row = mysqli_fetch_assoc($result)) {

                                                echo "<tr>";
                                                echo '<td><a href="book-details.php?resource_id=' . $row['ResourceID'] . '">';
                                                echo '<img width="30px" class="default-img" src="assets/imgs/book.png" alt="">';
                                                echo '</a></td>';
                                                echo "<td>{$row['Title']}</td>";
                                                echo "<td>{$row['Authors']}</td>";
                                                echo "<td>{$row['PublicationYear']}</td>";
                                                echo "<td>{$row['Publisher']}</td>";
                                                echo "<td>{$row['ISBN']}</td>";
                                                echo "<td>{$row['Description']}</td>";
                                                echo "</tr>";
                                            }
                                            ?>
                                        </tbody>
                                    </table>
                                </div>



                            </div>

                        </div>
                    </div>


<?php
if (isset($_SESSION['role']) && $_SESSION['role'] == 1) {
    // User has role 1, show the table
    ?>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <p class="text-muted font-14 mb-3">
                        Admin Add
                    </p>




                    <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap">
    <thead>
        <!-- ... your table header ... -->
    </thead>
    <tbody>
        <?php
        require_once "php-assets/config.php";

        // Query to get resources with related details
        $resourceQuery = "SELECT r.ResourceID, r.Title, r.Authors, r.PublicationYear, r.Publisher, r.ISBN, r.Description,
                l.LocationName, c.CategoryName, r.AvailabilityStatus
            FROM Resource AS r
            LEFT JOIN Location AS l ON r.LocationID = l.LocationID
            LEFT JOIN Category AS c ON r.CategoryID = c.CategoryID";
        $result = mysqli_query($link, $resourceQuery);

        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>";
            echo '<td><a href="book-details.php?resource_id=' . $row['ResourceID'] . '">';
            echo '<img width="30px" class="default-img" src="assets/imgs/book.png" alt=""></a></td>';
            echo "<td>{$row['Title']}</td>";
            echo "<td>{$row['Authors']}</td>";
            echo "<td>{$row['PublicationYear']}</td>";
            echo "<td>{$row['Publisher']}</td>";
            echo "<td>{$row['ISBN']}</td>";
            echo "<td>{$row['AvailabilityStatus']}</td>";
            echo "<td>";
            
            // Only display the button if the availability status is 'Unavailable'
            if ($row['AvailabilityStatus'] == 'Unavailable') {
                echo '<form method="post" action="update-availability.php">';
                echo '<input type="hidden" name="resource_id" value="' . $row['ResourceID'] . '">';
                echo '<button type="submit" class="update-availability-btn" onclick="confirmUpdate(this);">Return</button>';
                echo '</form>';
            }
            
            echo "</td>";
            echo "</tr>";
        }
        ?>
    </tbody>
</table>





                </div>
            </div>
        </div>
    </div>
    <?php
}
?>

<!-- Continue with the rest of your HTML content -->

                    <!-- end row -->
                </div>
                <div class="col-lg-3 primary-sidebar sticky-sidebar">
                    <div class="row">
                        <div class="col-lg-12 col-mg-6"></div>
                        <div class="col-lg-12 col-mg-6"></div>
                    </div>
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

                    <!-- Product sidebar Widget -->


                </div>
            </div>
        </div>
    </section>
</main>

<?php
include('php-assets/footer.php');
?>


<script>
function confirmUpdate(formElement) {
    if (confirm("Are you sure you want to mark this resource as available?")) {
        formElement.submit();
    }
}
</script>



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

<script src="assets/js/main.js?v=3.3"></script>
<script src="assets/js/shop.js?v=3.3"></script>

<!-- Vendor -->
<script src="assets/libs/jquery/jquery.min.js"></script>
<script src="assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="assets/libs/simplebar/simplebar.min.js"></script>
<script src="assets/libs/node-waves/waves.min.js"></script>
<script src="assets/libs/waypoints/lib/jquery.waypoints.min.js"></script>
<script src="assets/libs/jquery.counterup/jquery.counterup.min.js"></script>
<script src="assets/libs/feather-icons/feather.min.js"></script>

<!-- third party js -->
<script src="assets/libs/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="assets/libs/datatables.net-bs5/js/dataTables.bootstrap5.min.js"></script>
<script src="assets/libs/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
<script src="assets/libs/datatables.net-responsive-bs5/js/responsive.bootstrap5.min.js"></script>
<script src="assets/libs/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
<script src="assets/libs/datatables.net-buttons-bs5/js/buttons.bootstrap5.min.js"></script>
<script src="assets/libs/datatables.net-buttons/js/buttons.html5.min.js"></script>
<script src="assets/libs/datatables.net-buttons/js/buttons.flash.min.js"></script>
<script src="assets/libs/datatables.net-buttons/js/buttons.print.min.js"></script>
<script src="assets/libs/datatables.net-keytable/js/dataTables.keyTable.min.js"></script>
<script src="assets/libs/datatables.net-select/js/dataTables.select.min.js"></script>
<script src="assets/libs/pdfmake/build/pdfmake.min.js"></script>
<script src="assets/libs/pdfmake/build/vfs_fonts.js"></script>
<!-- third party js ends -->

<!-- Datatables init -->
<script src="assets/js/pages/datatables.init.js"></script>

<!-- App js -->
<script src="assets/js/app.min.js"></script>
</body>

</html>