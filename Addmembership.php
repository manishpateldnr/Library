<?php
session_start();
if (!isset($_SESSION['loged_in']) || $_SESSION['loged_in'] !== true || $_SESSION['user_type'] !== 'admin') {
    // Redirect to login page or show error message
    header("Location: Alogin.php");
    exit;
}

if (isset($_SESSION['msg'])) {
    $message = $_SESSION['msg'];
    echo "<script>alert('$message');</script>";
}
unset($_SESSION['msg']);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add New Member</title>
    <?php include "./layout/hlink.php"?>
    <!-- Include jQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <style>
        /* Optional: Initial style */
        .error {
            border: 2px solid red;
        }
        .valid {
            border: 2px solid green;
        }
    </style>
</head>

<body>
<?php include_once './layout/navbar.php'; ?>

    <div class="container card my-3 w-50 shadow py-2">
        <h2 class="text-center mb-4">Add Membership</h2>
        <form action="./backend/addmembership.php" method="post">
            <div class="d-flex justify-content-evenly">
                <div class="left ">

                    <div class="mb-3">
                        <label for="fname" class="form-label">First Name</label>
                        <input type="text" name="fname" id="fname" class="form-control" 
                            required>
                    </div>
                    <!-- Test Name -->
                    <div class="mb-3">
                        <label for="Cname" class="form-label">Contact Name</label>
                        <input type="text" name="cname" id="cname" class="form-control"
                            required>
                    </div>

                    <!-- Start Date -->
                    <div class="mb-3">
                        <label for="sdate" class="form-label">Start Date</label>
                        <input type="date" name="sdate" id="sdate" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label for="adhar" class="form-label">Adhar Card No.</label>
                        <input type="text" name="adhar" id="adhar" class="form-control" required>
                    </div>
                    
                </div>

                <div class="right">
                    <div class="mb-3">
                        <label for="lname" class="form-label">Last Name</label>
                        <input type="text" name="lname" id="lname" class="form-control" 
                            required>
                    </div>
                    <div class="mb-3">
                        <label for="address" class="form-label">Contact Address</label>
                        <input type="text" name="address" id="address" class="form-control" 
                            required>
                    </div>
                    <div class="mb-3">
                        <label for="edate" class="form-label">End Date</label>
                        <input type="date" name="edate" id="edate" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <div class="row">
                            <p>Membership</p>
                            <div class="form-check col-4">
                                <input class="form-check-input"  type="radio" name="membership" id="6months" value="6months" >
                                <label class="form-check-label" for="">
                                    6 m
                                </label>
                            </div>
                            <div class="form-check col-4">
                                <input class="form-check-input"  type="radio" name="membership" id="1year" value="1year" >
                                <label class="form-check-label" for="">
                                    1 yr
                                </label>
                            </div>
                            <div class="form-check col-4">
                                <input class="form-check-input"  type="radio" name="membership" id="2year" value="2year" >
                                <label class="form-check-label" for="">
                                    2 yr
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Submit Button -->
            <div class="text-center">
                <p id="slot_result"></p>
                <button type="submit" id="submitbtn" class="btn btn-primary">Submit</button>
                <button class="btn btn-danger " onclick="cancle()">Cancle</button>
            </div>
        </form>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.min.js"></script>
    <script>
    function cancle(){
        alert("Transaction cancelled");
        window.history.back();
    }
    // Function to check the slot availability
    function checkSlot() {
        let date = $("#start_date").val();
        let time = $("#start_time").val();

        // Validate inputs
        if (!date || !time) {
            $("#slot_result").html("<span style='color: orange;'>Please select both date and time.</span>");
            return;
        }

        // Send AJAX request
        $.ajax({
            url: "http://localhost/cbtest/backend/check_slot.php", // Replace with your backend file path
            type: "POST",
            data: {
                start_date: date,
                start_time: time
            },
            success: function (response) {
                // Update result based on the server response
                if (response === "available") {
                    $("#slot_result").html("<span style='color: green;'>Slot is available!</span>");
                    $("#submitbtn").prop("disabled", false).show(); // Enable the submit button if slot is available
                } else if (response === "unavailable") {
                    $("#slot_result").html("<span style='color: red;'>Slot is unavailable.</span>");
                    $("#submitbtn").prop("disabled", true).hide(); // Disable the submit button if slot is unavailable
                } else {
                    $("#slot_result").html("<span style='color: orange;'>Error: " + response + "</span>");
                    $("#submitbtn").prop("disabled", true).hide(); // Disable the submit button on error
                }
            },
            error: function () {
                $("#slot_result").html("<span style='color: red;'>Failed to check the slot. Try again.</span>");
                $("#submitbtn").prop("disabled", true).hide(); // Disable the submit button on error
            }
        });
    }
    
    </script>
</body>

</html>
