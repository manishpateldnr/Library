<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Membership</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="container">
        <h1>Update Membership</h1>
        <?php
        // Include database connection file
        include_once '../db/db.php';
        session_unset(); 
        session_start();

        // Check if 'id' parameter is provided to identify the record to update
        if (isset($_GET['id'])) {
            $id = mysqli_real_escape_string($conn, $_GET['id']);

            // Fetch existing record details
            $result = mysqli_query($conn, "SELECT * FROM memberships WHERE id = '$id'");
            $row = mysqli_fetch_assoc($result);
        ?>

        <form action="update_membership.php?id=<?php echo $id; ?>" method="POST">
            <div class="form-group">
                <label for="fname">First Name</label>
                <input type="text" id="fname" name="fname" value="<?php echo htmlspecialchars($row['first_name']); ?>" required>
            </div>
            <div class="form-group">
                <label for="lname">Last Name</label>
                <input type="text" id="lname" name="lname" value="<?php echo htmlspecialchars($row['last_name']); ?>" required>
            </div>
            <div class="form-group">
                <label for="cname">Contact Name</label>
                <input type="text" id="cname" name="cname" value="<?php echo htmlspecialchars($row['contact_name']); ?>" required>
            </div>
            <div class="form-group">
                <label for="address">Address</label>
                <input type="text" id="address" name="address" value="<?php echo htmlspecialchars($row['address']); ?>" required>
            </div>
            <div class="form-group">
                <label for="sdate">Start Date</label>
                <input type="date" id="sdate" name="sdate" value="<?php echo htmlspecialchars($row['start_date']); ?>" required>
            </div>
            <div class="form-group">
                <label for="edate">End Date</label>
                <input type="date" id="edate" name="edate" value="<?php echo htmlspecialchars($row['end_date']); ?>" required>
            </div>
            <div class="form-group">
                <label for="adhar">Aadhar Card</label>
                <input type="text" id="adhar" name="adhar" value="<?php echo htmlspecialchars($row['aadhar_card']); ?>" required>
            </div>
            <div class="form-group">
                <label for="membership">Membership Type</label>
                <input type="text" id="membership" name="membership" value="<?php echo htmlspecialchars($row['membership']); ?>" required>
            </div>
            <button type="submit" name="update_membership" class="btn">Update</button>
        </form>

        <?php
        } else {
            echo "<script>alert('Invalid request. ID not provided.'); window.history.back();</script>";
        }

        // Close database connection
        mysqli_close($conn);
        ?>
    </div>
</body>
</html>
