<?php

// Include database connection file
include_once '../db/db.php';
session_unset(); 
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Get form data
    $type = mysqli_real_escape_string($conn, $_POST['type']);
    $date = mysqli_real_escape_string($conn, $_POST['date']);
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $quantity = mysqli_real_escape_string($conn, $_POST['quantity']);

    // Insert data into books or movies table
    $sql = "INSERT INTO items (type, date_of_procurement, name, quantity) 
            VALUES ('$type', '$date', '$name', '$quantity')";

    if (mysqli_query($conn, $sql)) {
        echo "<script>alert('Item added successfully!'); window.location.href='../Adashboard.php';</script>";
    } else {
        echo "<script>alert('Error: " . mysqli_error($conn) . "'); window.history.back();</script>";
    }

    // Close database connection
    mysqli_close($conn);
} else {
    echo "<script>alert('Invalid request method.'); window.history.back();</script>";
}
?>
