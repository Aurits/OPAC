<?php

include('config.php');
// Turn on error reporting
error_reporting(E_ALL);
ini_set('display_errors', 1);


if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["add_resource"])) {
    $title = $_POST["title"];
    $authors = $_POST["authors"];
    $publication_year = $_POST["publication_year"];
    $publisher = $_POST["publisher"];
    $description = $_POST["description"];
    $keywords = $_POST["keywords"];
    $availability_status = $_POST["availability_status"];
    // $location_id = $_POST["location_id"];
    $category_id = $_POST["category_id"];
    $slug = generateSlug($title);

    $isbns = $_POST["isbn"];
    $formats = $_POST["format"];
    $location_ids = $_POST["location_id"];
    $sql = "INSERT INTO Resource (Title, Authors, PublicationYear, Publisher, Description, Keywords, AvailabilityStatus, LocationID, CategoryID, Slug, ISBN, Format) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
    if ($stmt = mysqli_prepare($link, $sql)) {
        foreach ($isbns as $index => $isbn) {
            $slug = generateSlug($isbn);
            $format = $formats[$index];
            $location_id = $location_ids[$index]; // Use the corresponding location ID
            mysqli_stmt_bind_param($stmt, "ssissssiisss", $title, $authors, $publication_year, $publisher, $description, $keywords, $availability_status, $location_id, $category_id, $slug, $isbn, $format);

            if (mysqli_stmt_execute($stmt)) {
                echo "Resource(s) added successfully! <br><a href='../my-account.php'>back</a>";
            } else {
                echo "Error: " . mysqli_error($link);
            }
        }
        mysqli_stmt_close($stmt);
    }
}


// Function to generate a slug from a string
function generateSlug($str)
{
    $slug = strtolower(str_replace(' ', '-', $str));

    // Generate a random string of characters and numbers
    $random = substr(md5(rand()), 0, 5); // Change '5' to the desired length

    // Append the random string to the slug
    $uniqueSlug = $slug . '-' . $random;

    return $uniqueSlug;
}
