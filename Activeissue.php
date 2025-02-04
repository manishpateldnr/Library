<?php
session_start();
if (!isset($_SESSION['loged_in']) || $_SESSION['loged_in'] !== true ) {
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
    <title>Active issue </title>
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
                <a class="btn btn-primary mt-3" href="./MLbooks.php">Master List of Books</a>
                <a class="btn btn-primary mt-3" href="./MLmovies.php">Master List of Movies</a>
                <a class="btn btn-primary mt-3" href="./MLmembers.php">Master List of Memberships</a>
                <a class="btn btn-primary mt-3" href="./Activeissue.php">Active Issues</a>
                <a class="btn btn-primary mt-3" href="./Overduereturns.php">Overdue returns</a>
                <a class="btn btn-primary mt-3" href="./PIRequests.php">Issue Requests</a>
            </div>
        </div>
        <div class="right-side col-9 ">
            <div class="container d-flex flex-column"> 
                <div class="row mt-4">
                    <h3 class="col text-center"> Active Issues</h3>
                </div>
                <table class="table table-striped text-center">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Book/Movie</th>
                        <th>Membership ID</th>
                        <th>Date of Issue</th>
                        <th>Date of Return</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td>The Matrix</td>
                        <td>MB12345</td>
                        <td>2024-02-01</td>
                        <td>2024-02-10</td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>Harry Potter</td>
                        <td>MB67890</td>
                        <td>2024-02-02</td>
                        <td>2024-02-12</td>
                    </tr>
                </tbody>
            </table>
            </div>
        </div>
    </section>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
</body>

</html>
