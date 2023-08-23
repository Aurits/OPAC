<?php

include('config.php');


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = $_POST["title"];
    $content = $_POST["content"];
    $publish_date = $_POST["publish_date"];
    $slug = generateSlug($title);

    $sql = "INSERT INTO Blog (Title, Content, PublishDate, Slug) VALUES (?, ?, ?, ?)";
    if ($stmt = mysqli_prepare($link, $sql)) {
        mysqli_stmt_bind_param($stmt, "ssss", $title, $content, $publish_date, $slug);
        if (mysqli_stmt_execute($stmt)) {
            echo "Blog post added successfully! <br><a href='../my-account.php'>back</a>";
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
