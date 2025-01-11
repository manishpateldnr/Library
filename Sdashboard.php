<?php
session_start();
if (!isset($_SESSION['loged_in']) || $_SESSION['loged_in'] !== true || $_SESSION['user_type'] !== 'user') {
    // Redirect to login page or show error message
    header("Location: Slogin.php");
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
                <a class="btn btn-primary mt-3" href="./Reports.php">Reports Menu</a>
                <a class="btn btn-primary mt-3" href="./Transactions.php">Transactions</a>
            </div>
            <a href="./Adashboard.php" class="btn btn-sm ms-1 mt-2">Home...</a>
        </div>
        <div class="right-side col-9 ">
            <div class="container d-flex flex-column"> 
                <div class="row mt-4">
                    <h3 class="col text-center">Product Details</h3>
                </div>
                <table class="table table-stripe table-hover">
                    <thead>
                        <tr>
                            <th scope="col"></th>
                            <th scope="col">Code No. From</th>
                            <th scope="col"> Code No. To</th>
                            <th scope="col">Category</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th scope="row"></th>
                            <td>SC(B/M)000001</td>
                            <td>SC(B/M)000004</td>
                            <td>Science</td>
                        </tr>
                        <tr>
                            <th scope="row"></th>
                            <td>EC(B/M)000001</td>
                            <td>EC(B/M)000004</td>
                            <td>Economics</td>
                        </tr>
                        <tr>
                            <th scope="row"></th>
                            <td>FC(B/M)000001</td>
                            <td>FC(B/M)000004</td>
                            <td>Fiction</td>
                        </tr>
                        <tr>
                            <th scope="row"></th>
                            <td>CH(B/M)000001</td>
                            <td>CH(B/M)000004</td>
                            <td>Children</td>
                        </tr>
                        <tr>
                            <th scope="row"></th>
                            <td>PD(B/M)000001</td>
                            <td>PD(B/M)000004</td>
                            <td>Personal Development</td>
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