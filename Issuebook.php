<?php
session_start();
if (!isset($_SESSION['loged_in']) || $_SESSION['loged_in'] !== true ) {
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
    <title>Book Issue</title>
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
        <h2 class="text-center mb-4">Book Issue</h2>
        <form action="./backend/addmembership.php" method="post">
            <div class="d-flex justify-content-evenly">
                <div class="left ">

                    <div class="mb-3">
                        <label for="bookname" class="form-label">Enter Book Name</label>
                        <select name="bookname" id="bookname" class="form-control" required>
                            <option value="" disabled selected>Select a book</option>
                            <option value="book1">Book 1</option>
                            <option value="book2">Book 2</option>
                            <option value="book3">Book 3</option>
                            <option value="book4">Book 4</option>
                        </select>
                    </div>
                  
                    <!-- Start Date -->
                    <div class="mb-3">
                        <label for="sdate" class="form-label">Issue Date</label>
                        <input type="date" name="sdate" id="sdate" class="form-control" required>
                    </div>
                      <!-- Return Date -->
                      <div class="mb-3">
                        <label for="edate" class="form-label">Return Date</label>
                        <input type="date" name="edate" id="edate" class="form-control" required>
                    </div>

                </div>

                <div class="right">
                     <!--Enter Author Name -->
                     <div class="mb-3">
    <label for="fname" class="form-label">Enter Author Name</label>
    <input type="text" name="fname" id="fname" class="form-control" placeholder="Type author name here" required>
</div>


        
                    <div class="mb-3">
                        <label for="remarks" class="form-label">Remarks</label>
                        <textarea name="remarks" id="remarks" class="form-control" rows="4"
                            placeholder="Enter remarks..."></textarea>
                    </div>

                     
                        
                    </div>
                </div>
            </div>

            <!-- Submit Button -->
            <div class="text-center">
                <p id="slot_result"></p>
                <button type="submit" id="submitbtn" class="btn btn-primary">Conform</button>
                <button class="btn btn-danger " onclick="cancel()">cancel</button>
            </div>
        </form>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.min.js"></script>
    <script>
    function cancel() {
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
            success: function(response) {
                // Update result based on the server response
                if (response === "available") {
                    $("#slot_result").html("<span style='color: green;'>Slot is available!</span>");
                    $("#submitbtn").prop("disabled", false)
                .show(); // Enable the submit button if slot is available
                } else if (response === "unavailable") {
                    $("#slot_result").html("<span style='color: red;'>Slot is unavailable.</span>");
                    $("#submitbtn").prop("disabled", true)
                .hide(); // Disable the submit button if slot is unavailable
                } else {
                    $("#slot_result").html("<span style='color: orange;'>Error: " + response + "</span>");
                    $("#submitbtn").prop("disabled", true).hide(); // Disable the submit button on error
                }
            },
            error: function() {
                $("#slot_result").html(
                    "<span style='color: red;'>Failed to check the slot. Try again.</span>");
                $("#submitbtn").prop("disabled", true).hide(); // Disable the submit button on error
            }
        });
    }
    </script>
</body>

</html>