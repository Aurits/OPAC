<?php
include('config.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $category_name = $_POST["category_name"];
    $slug = generateSlug($category_name);

    $sql = "INSERT INTO Category (CategoryName, Slug) VALUES (?, ?)";
    if ($stmt = mysqli_prepare($link, $sql)) {
        mysqli_stmt_bind_param($stmt, "ss", $category_name, $slug);
        if (mysqli_stmt_execute($stmt)) {
            echo "Category added successfully!<br><a href='../my-account.php'>back</a>";
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
