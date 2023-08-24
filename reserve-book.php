<?php
require_once "php-assets/config.php";

# Initialize the session
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['book_id'])) {
    $bookId = $_GET['book_id'];

    // Turn on error reporting
    error_reporting(E_ALL);
    ini_set('display_errors', 1);


    // Check if the book is available before allowing reservation
    $availabilityQuery = "SELECT AvailabilityStatus FROM Resource WHERE ResourceID = $bookId";
    $availabilityResult = $link->query($availabilityQuery);
    $availability = $availabilityResult->fetch_assoc();

    if ($availability['AvailabilityStatus'] === 'Available') {
        // Insert reservation into the database
        $userId = $_SESSION['id']; // You need to have the user's ID from the session
        $reservationDate = date('Y-m-d');
        $status = 'Reserved'; // You can set the initial status as Reserved

        $insertReservationQuery = "INSERT INTO Reservation (UserID, ResourceID, ReservationDate, Status)
                                   VALUES ('$userId', '$bookId', '$reservationDate', '$status')";

        if ($link->query($insertReservationQuery) === TRUE) {
            // Update the book's availability status to Reserved
            $updateAvailabilityQuery = "UPDATE Resource SET AvailabilityStatus = 'Unavailable' WHERE ResourceID = $bookId";
            $link->query($updateAvailabilityQuery);

            echo "Book reserved successfully.";
            echo "<a href= 'book.php'>Back</a>";
        } else {
            echo "Error: " . $insertReservationQuery . "<br>" . $link->error;
        }
    } else {
        echo "The book copy is not available for reservation.";
    }
}
