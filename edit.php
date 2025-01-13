<?php
require_once('config/db.php');

// Fetch the record to edit
if (isset($_GET['id'])) {
    $id = intval($_GET['id']);
    $query = "SELECT * FROM memberships WHERE id = $id";
    $result = mysqli_query($con, $query);

    if ($result && mysqli_num_rows($result) == 1) {
        $data = mysqli_fetch_assoc($result);
    } else {
        die("Record not found!");
    }
}

// Update the record after form submission
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = intval($_POST['id']);
    $first_name = mysqli_real_escape_string($con, $_POST['first_name']);
    $last_name = mysqli_real_escape_string($con, $_POST['last_name']);
    $contact_name = mysqli_real_escape_string($con, $_POST['contact_name']);
    $aadhar_card = mysqli_real_escape_string($con, $_POST['aadhar_card']);
    $address = mysqli_real_escape_string($con, $_POST['address']);
    $start_date = mysqli_real_escape_string($con, $_POST['start_date']);
    $end_date = mysqli_real_escape_string($con, $_POST['end_date']);
    $membership = mysqli_real_escape_string($con, $_POST['membership']);

    $updateQuery = "UPDATE memberships SET 
                    first_name='$first_name', 
                    last_name='$last_name', 
                    contact_name='$contact_name', 
                    aadhar_card='$aadhar_card', 
                    address='$address', 
                    start_date='$start_date', 
                    end_date='$end_date', 
                    membership='$membership' 
                    WHERE id = $id";

    if (mysqli_query($con, $updateQuery)) {
        header('Location: Mupdate.php'); // Redirect to the main page
        exit;
    } else {
        echo "Error updating record: " . mysqli_error($con);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Record</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <style>
        body {
            background-color: #f3f4f6;
            font-family: Arial, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        .container {
            max-width: 600px;
            background: #ffffff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        h2 {
            color: #333;
            text-align: center;
            margin-bottom: 20px;
            font-weight: bold;
        }
        label {
            font-weight: bold;
            color: #555;
        }
        .form-control {
            border: 1px solid #ced4da;
            border-radius: 5px;
            padding: 10px;
        }
        .btn-primary {
            background-color: #007bff;
            border: none;
            padding: 10px 20px;
        }
        .btn-primary:hover {
            background-color: #0056b3;
        }
        .btn-secondary {
            background-color: #6c757d;
            border: none;
            padding: 10px 20px;
        }
        .btn-secondary:hover {
            background-color: #5a6268;
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <h2>Edit Record</h2>
        <form method="POST" action="edit.php">
            <input type="hidden" name="id" value="<?= htmlspecialchars($data['id']) ?>">
            <div class="mb-3">
                <label>First Name</label>
                <input type="text" name="first_name" value="<?= htmlspecialchars($data['first_name']) ?>" class="form-control" required>
            </div>
            <div class="mb-3">
                <label>Last Name</label>
                <input type="text" name="last_name" value="<?= htmlspecialchars($data['last_name']) ?>" class="form-control" required>
            </div>
            <div class="mb-3">
                <label>Contact Name</label>
                <input type="text" name="contact_name" value="<?= htmlspecialchars($data['contact_name']) ?>" class="form-control" required>
            </div>
            <div class="mb-3">
                <label>Aadhar Card</label>
                <input type="text" name="aadhar_card" value="<?= htmlspecialchars($data['aadhar_card']) ?>" class="form-control" required>
            </div>
            <div class="mb-3">
                <label>Address</label>
                <input type="text" name="address" value="<?= htmlspecialchars($data['address']) ?>" class="form-control" required>
            </div>
            <div class="mb-3">
                <label>Start Date</label>
                <input type="date" name="start_date" value="<?= htmlspecialchars($data['start_date']) ?>" class="form-control" required>
            </div>
            <div class="mb-3">
                <label>End Date</label>
                <input type="date" name="end_date" value="<?= htmlspecialchars($data['end_date']) ?>" class="form-control" required>
            </div>
            <div class="mb-3">
                <label>Membership</label>
                <input type="text" name="membership" value="<?= htmlspecialchars($data['membership']) ?>" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
            <a href="Mupdate.php" class="btn btn-secondary">Cancel</a>
        </form>
    </div>
</body>
</html>
