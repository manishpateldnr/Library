<?php

// Include database connection file
include_once '../db/db.php';
session_unset(); 
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Get form data
    $fname = mysqli_real_escape_string($conn, $_POST['fname']);
    $lname = mysqli_real_escape_string($conn, $_POST['lname']);
    $cname = mysqli_real_escape_string($conn, $_POST['cname']);
    $address = mysqli_real_escape_string($conn, $_POST['address']);
    $sdate = mysqli_real_escape_string($conn, $_POST['sdate']);
    $edate = mysqli_real_escape_string($conn, $_POST['edate']);
    $adhar = mysqli_real_escape_string($conn, $_POST['adhar']);
    $membership = mysqli_real_escape_string($conn, $_POST['membership']);

    // Insert data into memberships table
    $sql = "INSERT INTO memberships (first_name, last_name, contact_name, address, start_date, end_date, aadhar_card, membership) 
            VALUES ('$fname', '$lname', '$cname', '$address', '$sdate', '$edate', '$adhar', '$membership')";

    if (mysqli_query($conn, $sql)) {
        echo "<script>alert('Membership added successfully!'); window.location.href='../Adashboard.php';</script>";
    } else {
        echo "<script>alert('Error: " . mysqli_error($conn) . "'); window.history.back();</script>";
    }

    // Close database connection
    mysqli_close($conn);
} else {
    echo "<script>alert('Invalid request method.'); window.history.back();</script>";
}
?>
