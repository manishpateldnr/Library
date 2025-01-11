<?php
session_start();
if (!isset($_SESSION['loged_in']) || $_SESSION['loged_in'] !== true || $_SESSION['user_type'] !== 'admin') {
    // Redirect to login page or show error message
    header("Location: Alogin.php");
    exit;
}
include_once "./db/db.php";

if (isset($_SESSION['msg'])) {
    $message = $_SESSION['msg'];
    echo "<script>alert('$message');</script>";
}
unset($_SESSION['msg']);


?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php include "./layout/hlink.php"?>
    <title>Admin Dashboard </title>
    <style>
        .left-side{
            height: 89vh;
        }
        .right-side{
            height: 89vh;
            overflow: auto;
            overflow-x:hidden;
        }
    </style>
</head>

<body>
    <?php include_once './layout/navbar.php'; ?>

    <section class="body d-flex w-100">
        <div class="left-side col-3 bg-success-subtle">
            <div class="container d-flex flex-column  mt-5">
                <a class="btn btn-success mt-3" href="#">Maintanence Menu</a>
                <a class="btn btn-primary mt-3" href="./Reports.php">Reports Menu</a>
                <a class="btn btn-primary mt-3" href="./Transactions.php">Transactions</a>
            </div>
            <a href="./Adashboard.php" class="btn btn-sm ms-1 mt-2">Home...</a>
        </div>
        <div class="right-side col-9 ">
            <div class="container d-flex flex-column"> 
                <div class="row mt-4">
                    <h3 class="col text-center">Maintanence Menu</h3>
                </div>
                <div class="bg-success-subtle m-4 p-2 rounded shadow text-center d-flex flex-column align-items-center">
                    <a href="Addmembership.php" class="btn btn-outline-dark w-50">Membership Add</a>
                    <a href="Editstudent.php" class="btn btn-outline-dark w-50 mt-2">Membership update</a>
                    <a href="Addbook.php" class="btn btn-outline-dark w-50 mt-2">Book Add</a>
                    <a href="Editstudent.php" class="btn btn-outline-dark w-50 mt-2">Book update</a>
                    <a href="ManageUser.php" class="btn btn-outline-dark w-50 mt-2">User Management</a>
                </div>
            </div>
        </div>
    </section>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
</body>

</html>