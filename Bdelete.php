<?php
require_once('config/db.php');

if (isset($_GET['id'])) {
    $id = intval($_GET['id']);
    $query = "DELETE FROM items WHERE id = $id";

    if (mysqli_query($con, $query)) {
        header('Location: Bupdate.php?message=deleted');
        exit;
    } else {
        echo "Error deleting record: " . mysqli_error($con);
    }
} else {
    die("Invalid request!");
}
?>
