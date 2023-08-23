<?php
include('config.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $location_name = $_POST["location_name"];
    $address = $_POST["address"];
    $opening_hours = $_POST["opening_hours"];

    $sql = "INSERT INTO Location (LocationName, Address, OpeningHours) VALUES (?, ?, ?)";
    if ($stmt = mysqli_prepare($link, $sql)) {
        mysqli_stmt_bind_param($stmt, "sss", $location_name, $address, $opening_hours);
        if (mysqli_stmt_execute($stmt)) {
            echo "Location added successfully! <br><a href='../my-account.php'>back</a>";
        } else {
            echo "Error: " . mysqli_error($link);
        }
        mysqli_stmt_close($stmt);
    }
}
