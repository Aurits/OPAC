<?php
# Initialize the session
session_start();

# If user is not logged in then redirect him to login page
if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== TRUE) {
    echo "<script>" . "window.location.href='./login.php';" . "</script>";
    exit;
}

include('php-assets/header.php');
?>
<main class="main">
    <div class="page-header breadcrumb-wrap">
        <div class="container">
            <div class="breadcrumb">
                <a href="index.php" rel="nofollow">Home</a>
                <span></span> Reservations
            </div>
        </div>
    </div>
    <section class="mt-50 mb-50">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="table-responsive">
                        <table class="table shopping-summery text-center clean">
                            <thead>
                                <tr class="main-heading">
                                    <th scope="col">Image</th>
                                    <th scope="col">Title</th>
                                    <th scope="col">Author</th>
                                    <th scope="col">Year</th>
                                    <th scope="col">Location</th>
                                    <th scope="col">Remove</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                // Include your config file
                                require_once "php-assets/config.php";

                                $userId = $_SESSION['id']; // You need to have the user's ID from the session
                                $cartQuery = "SELECT r.*, l.LocationName
                      FROM Reservation AS c
                      JOIN Resource AS r ON c.ResourceID = r.ResourceID
                      JOIN Location AS l ON r.LocationID = l.LocationID
                      WHERE c.UserID = $userId";
                                $cartResult = $link->query($cartQuery);

                                while ($cartItem = $cartResult->fetch_assoc()) {
                                ?>
                                    <tr>
                                        <td class="image product-thumbnail"><img width="30px" src="assets/imgs/book.png" alt="#"></td>
                                        <td class="product-des product-name">
                                            <h5 class="product-name"><a href="book-details.php"><?php echo $cartItem['Title']; ?></a></h5>
                                        </td>
                                        <td class="price" data-title="Price">
                                            <p class="font-xs"><?php echo $cartItem['Authors']; ?></p>
                                        </td>
                                        <td class="text-center">
                                            <p class="font-xs"><?php echo $cartItem['PublicationYear']; ?></p>
                                        </td>
                                        <td class="">
                                            <p class="font-xs"><?php echo $cartItem['LocationName']; ?></p>
                                        </td>
                                        <td class="action" data-title="Remove">
                                            <form method="post" action="delete-reserve.php">
                                                <input type="hidden" name="resource_id" value="<?php echo $cartItem['ResourceID']; ?>">
                                                <button type="submit" class="remove-from-cart-btn" onclick="return confirm('Are you sure you want to remove this item?');">
                                                    <i class="fi-rs-trash"></i> Remove
                                                </button>
                                            </form>
                                        </td>


                                    </tr>
                                <?php
                                }
                                ?>
                            </tbody>
                        </table>

                    </div>

                    <div class="cart-action text-end">
                        <a class="btn" href="generatepdf.php"><i class="fi-rs-shopping-bag mr-10"></i>Finish</a>
                    </div>


                    <div class="divider center_icon mt-50 mb-50"><i class="fi-rs-fingerprint"></i></div>

                </div>
            </div>
        </div>
    </section>
</main>

<?php
include('php-assets/footer.php');
?>


<script>
    document.addEventListener("DOMContentLoaded", function() {
        const removeButtons = document.querySelectorAll(".remove-from-cart-btn");

        removeButtons.forEach(button => {
            button.addEventListener("click", function() {
                const resourceId = button.getAttribute("data-resource-id");
                removeFromCart(resourceId);
            });
        });

        function removeFromCart(resourceId) {
            // Perform AJAX request to remove the item from the cart
            const xhr = new XMLHttpRequest();
            xhr.open("POST", "php-assets/remove-from-cart.php", true);
            xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
            xhr.onreadystatechange = function() {
                if (xhr.readyState === XMLHttpRequest.DONE) {
                    if (xhr.status === 200) {
                        // Reload the page after successful removal
                        location.reload();
                    } else {
                        // Handle error
                        console.error("Error removing item from cart");
                    }
                }
            };

            // Send the resource ID to the server
            xhr.send("resource_id=" + encodeURIComponent(resourceId));
        }
    });
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
<script src="assets/js/shop.js?v=3.3"></script> <!-- <script src="assets/js/vendor/modernizr-3.6.0.min.js"></script>
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
    
    <script src="assets/js/main.js?v=3.3"></script>
    <script src="assets/js/shop.js?v=3.3"></script> -->

</body>

</html>