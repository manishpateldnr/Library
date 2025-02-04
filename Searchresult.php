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
    <title>Search Result </title>
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
                <a class="btn btn-primary mt-3" href="./Availablebooks.php">Is book available?</a>
                <a class="btn btn-primary mt-3" href="./Issuebook.php">Issue book?</a>
                <a class="btn btn-primary mt-3" href="./Returnbook.php">Return book?</a>
                <a class="btn btn-primary mt-3" href="./Payfine.php">Pay Fine?</a>
            
            </div>
        </div>
        <div class="right-side col-9 ">
            <div class="container d-flex flex-column"> 
                <div class="row mt-4">
                    <h3 class="col text-center">Book Availability</h3>
                </div>
                <table class="table table-stripe table-hover">
                    <thead>
                        <tr>
                            <th scope="row"></th>
                            <th scope="col">Book Name</th>
                            <th scope="col"> Author Name</th>
                            <th scope="col">Serial Number</th>
                            <th scope="col">Available</th>
                            <th scope="col">Select to issue the book</th>
                            
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th scope="row"></th>
                            <td>abc</td>
                            <td>Premchand</td>
                            <td>5</td>
                            <td>Available</td>
                            <td>radio button</td>
                        </tr>
                        <tr>
                        <th scope="row"></th>
                            <td>abc</td>
                            <td>Premchand</td>
                            <td>5</td>
                            <td>Available</td>
                            <td>radio button</td>
                        </tr>
                        <tr>
                        <th scope="row"></th>
                            <td>abc</td>
                            <td>Premchand</td>
                            <td>5</td>
                            <td>Available</td>
                            <td>radio button</td>
                        </tr>
                        <tr>
                        <th scope="row"></th>
                            <td>abc</td>
                            <td>Premchand</td>
                            <td>5</td>
                            <td>Available</td>
                            <td>radio button</td>
                        </tr>
                        <tr>
                        <th scope="row"></th>
                            <td>abc</td>
                            <td>Premchand</td>
                            <td>5</td>
                            <td>Available</td>
                            <td>radio button</td>
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