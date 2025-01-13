<?php

// Include database connection file
include_once '../db/db.php';
session_unset(); 
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Get form data
    $type = mysqli_real_escape_string($conn, $_POST['type']);
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $isActive = isset($_POST['Checkactive']) ? 1 : 0;
    $isAdmin = isset($_POST['Checkadmin']) ? 1 : 0;

    // Insert or manage user based on type
    $sql = "INSERT INTO user (user_type, name, is_active, is_admin) 
            VALUES ('$type', '$name', '$isActive', '$isAdmin')";

    if (mysqli_query($conn, $sql)) {
        echo "<script>alert('User managed successfully!'); window.location.href='../Adashboard.php';</script>";
    } else {
        echo "<script>alert('Error: " . mysqli_error($conn) . "'); window.history.back();</script>";
    }

    // Close database connection
    mysqli_close($conn);
} else {
    echo "<script>alert('Invalid request method.'); window.history.back();</script>";
}
?>
