<?php
session_start();
require_once "php-assets/config.php";

if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["resource_id"])) {
    $userId = $_SESSION["id"];
    $resourceId = $_POST["resource_id"];

    // Update the availability status of the resource to "Available"
    $updateAvailabilityQuery = "UPDATE Resource SET AvailabilityStatus = 'Available' WHERE ResourceID = ?";
    $updateStmt = $link->prepare($updateAvailabilityQuery);
    $updateStmt->bind_param("i", $resourceId);

    // Perform the update
    if ($updateStmt->execute()) {
        // Perform the removal from the cart
        $removeQuery = "DELETE FROM Reservation WHERE UserID = ? AND ResourceID = ?";
        $removeStmt = $link->prepare($removeQuery);
        $removeStmt->bind_param("ii", $userId, $resourceId);

        if ($removeStmt->execute()) {
            echo "Success <a href='book.php'>Back</a>";
        } else {
            echo "Error removing item <a href='book.php'>Back</a>";
        }

        $removeStmt->close();
    } else {
        echo "Error updating availability";
    }

    $updateStmt->close();
}
