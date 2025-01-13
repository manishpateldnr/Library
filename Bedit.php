<?php
require_once('config/db.php');

// Fetch the record to edit
if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $id = intval($_GET['id']);
    $stmt = $con->prepare("SELECT * FROM items WHERE id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result && $result->num_rows == 1) {
        $data = $result->fetch_assoc();
    } else {
        die("Record not found!");
    }
    $stmt->close();
} else {
    die("Invalid request!");
}

// Update the record after form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['id']) && is_numeric($_POST['id'])) {
        $id = intval($_POST['id']);
        $type = trim($_POST['type']);
        $date_of_procurement = trim($_POST['date_of_procurement']);
        $name = trim($_POST['name']);
        $quantity = intval($_POST['quantity']);

        // Validate inputs
        if (empty($type) || empty($date_of_procurement) || empty($name) || $quantity <= 0) {
            echo "All fields are required and must be valid!";
        } else {
            $stmt = $con->prepare("UPDATE items SET type = ?, date_of_procurement = ?, name = ?, quantity = ? WHERE id = ?");
            $stmt->bind_param("sssii", $type, $date_of_procurement, $name, $quantity, $id);

            if ($stmt->execute()) {
                header('Location: Bupdate.php'); // Redirect to the main page
                exit;
            } else {
                echo "Error updating record: " . $stmt->error;
            }
            $stmt->close();
        }
    } else {
        echo "Invalid record ID!";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Procurement Record</title>
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
        <h2>Edit Procurement Record</h2>
        <form method="POST" action="">
            <input type="hidden" name="id" value="<?= htmlspecialchars($data['id']) ?>">
            <div class="mb-3">
                <label>Type</label>
                <input type="text" name="type" value="<?= htmlspecialchars($data['type']) ?>" class="form-control" required>
            </div>
            <div class="mb-3">
                <label>Date of Procurement</label>
                <input type="date" name="date_of_procurement" value="<?= htmlspecialchars($data['date_of_procurement']) ?>" class="form-control" required>
            </div>
            <div class="mb-3">
                <label>Name</label>
                <input type="text" name="name" value="<?= htmlspecialchars($data['name']) ?>" class="form-control" required>
            </div>
            <div class="mb-3">
                <label>Quantity</label>
                <input type="number" name="quantity" value="<?= htmlspecialchars($data['quantity']) ?>" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
            <a href="Bupdate.php" class="btn btn-secondary">Cancel</a>
        </form>
    </div>
</body>
</html>
