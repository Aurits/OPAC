<?php

include('config.php');


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = $_POST["title"];
    $authors = $_POST["authors"];
    $publication_year = $_POST["publication_year"];
    $publisher = $_POST["publisher"];
    $isbn = $_POST["isbn"];
    $description = $_POST["description"];
    $keywords = $_POST["keywords"];
    $format = $_POST["format"];
    $availability_status = $_POST["availability_status"];
    $location_id = $_POST["location_id"];
    $category_id = $_POST["category_id"];
    $slug = generateSlug($title);

    $sql = "INSERT INTO Resource (Title, Authors, PublicationYear, Publisher, ISBN, Description, Keywords, Format, AvailabilityStatus, LocationID, CategoryID, Slug) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
    if ($stmt = mysqli_prepare($link, $sql)) {
        mysqli_stmt_bind_param($stmt, "ssissssssiis", $title, $authors, $publication_year, $publisher, $isbn, $description, $keywords, $format, $availability_status, $location_id, $category_id, $slug);
        if (mysqli_stmt_execute($stmt)) {
            echo "Resource added successfully!  <br><a href='../my-account.php'>back</a>";
        } else {
            echo "Error: " . mysqli_error($link);
        }
        mysqli_stmt_close($stmt);
    }
}

// Function to generate a slug from a string
function generateSlug($str)
{
    $slug = strtolower(str_replace(' ', '-', $str));
    return $slug;
}
