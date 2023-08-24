<?php
// Include your config file
require_once "php-assets/config.php";

// Check if the resource ID is provided
if (isset($_POST["resource_id"])) {
    $resourceID = $_POST["resource_id"];

    // Update availability status in the Resource table
    $updateQuery = "UPDATE Resource SET AvailabilityStatus = 'Available' WHERE ResourceID = ?";
    $stmt = $link->prepare($updateQuery);
    $stmt->bind_param("i", $resourceID);

    if ($stmt->execute()) {
        header("Location: book.php"); // Redirect back to the main page
    } else {
        // Handle error
        echo "Error updating availability status";
    }

    $stmt->close();
}
