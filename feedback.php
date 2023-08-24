
<?php
require_once "php-assets/config.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    echo '<pre>';
    print_r($_POST);
    echo '</pre>';


    $email = $_POST['email'];
    $feedbackText = $_POST['comment'];
    $timestamp = date('Y-m-d H:i:s'); // Current date and time

    $insertQuery = "INSERT INTO Feedback (UserEmail, FeedbackText, Timestamp) 
VALUES ('$email', '$feedbackText', '$timestamp')";

    if ($link->query($insertQuery) === TRUE) {
        echo "Feedback submitted successfully.";
        echo "<a href='index.php'>Back</a>";
    } else {
        echo "Error: " . $insertQuery . "<br>" . $link->error;
    }
}


?>