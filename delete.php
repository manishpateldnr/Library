<?php
require_once('config/db.php');

if (isset($_GET['id'])) {
    $id = intval($_GET['id']);
    $query = "DELETE FROM memberships WHERE id = $id";

    if (mysqli_query($con, $query)) {
        header('Location: Mupdate.php?message=deleted');
        exit;
    } else {
        echo "Error deleting record: " . mysqli_error($con);
    }
} else {
    die("Invalid request!");
}
?>
