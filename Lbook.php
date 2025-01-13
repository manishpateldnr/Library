<?php
require_once('config/db.php');

// Securely fetch data from the database
$query = "SELECT * FROM items"; // Replace 'inventory' with your actual table name
$result = mysqli_query($con, $query);

if (!$result) {
    die("Query Failed: " . mysqli_error($con));
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <title>Inventory Management</title>
    <style>
        body {
            background-color: #f8f9fa;
            color: #495057;
            font-family: 'Arial', sans-serif;
        }
        .container {
            margin-top: 50px;
        }
        .card {
            background-color: #ffffff;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
        .card-header {
            background-color: #007bff;
            color: #fff;
            padding: 20px;
            border-top-left-radius: 10px;
            border-top-right-radius: 10px;
        }
        .card-header h2 {
            font-size: 24px;
            text-align: center;
        }
        .table {
            margin-top: 20px;
            border: 1px solid #dee2e6;
            background-color: #fff;
            border-radius: 8px;
            overflow: hidden;
        }
        .table th, .table td {
            padding: 12px;
            text-align: center;
        }
        .table-bordered th, .table-bordered td {
            border: 1px solid #dee2e6;
        }
        .table th {
            background-color: #007bff;
            color: #fff;
        }
        .table tbody tr:hover {
            background-color: #f1f1f1;
        }
        .btn-edit {
            background-color: #007bff;
            color: white;
            padding: 6px 12px;
            border-radius: 4px;
            text-decoration: none;
        }
        .btn-edit:hover {
            background-color: #0056b3;
        }
        .btn-delete {
            background-color: #dc3545;
            color: white;
            padding: 6px 12px;
            border-radius: 4px;
            text-decoration: none;
        }
        .btn-delete:hover {
            background-color: #c82333;
        }
        .right-side {
    height: 89vh;
    display: flex;
    align-items: center;
    justify-content: center;
    overflow: auto;
}

.table-container {
    width: 100%;
    max-width: 800px; /* Optional: Set a max-width for the table container */
    text-align: center; /* Center the text inside the container */
}

.table {
    width: 100%;
    margin: 0 auto;
    border-collapse: collapse;
}

.table th,
.table td {
    padding: 12px;
    text-align: center;
    border: 1px solid #dee2e6;
}

.table th {
    background-color: #007bff;
    color: white;
}

.table tbody tr:hover {
    background-color: #f1f1f1;
}

.table-striped tbody tr:nth-child(odd) {
    background-color: #f9f9f9;
}

.table-striped tbody tr:nth-child(even) {
    background-color: #f1f1f1;
}

    </style>
</head>
<body>
    <div class="container">
        <div class="row mt-5">
            <div class="col">
                <div class="card">
                    <div class="card-header">
                        <h2 class="display-6 text-center">Inventory Management</h2>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered table-striped text-center">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Type</th>
                                    <th>Date of Procurement</th>
                                    <th>Name</th>
                                    <th>Quantity</th>
                                     
                            </thead>
                            <tbody>
                                <?php
                                while ($row = mysqli_fetch_assoc($result)) {
                                    echo "<tr>";
                                    echo "<td>" . htmlspecialchars($row['id']) . "</td>";
                                    echo "<td>" . htmlspecialchars($row['type']) . "</td>";
                                    echo "<td>" . htmlspecialchars($row['date_of_procurement']) . "</td>";
                                    echo "<td>" . htmlspecialchars($row['name']) . "</td>";
                                    echo "<td>" . htmlspecialchars($row['quantity']) . "</td>";
                                    
                                    echo "</tr>";
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
