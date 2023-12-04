<?php 
include_once('sidebar.php');
?>
<!DOCTYPE html>
<html>
<head>
    <title>Create Service</title>
    <meta http-equiv="refresh" content="100">
    <link rel="stylesheet" type="text/css" href="style.css">
    <style>
        body {
            font-family: "Arial", "Helvetica Neue", "Helvetica", sans-serif;
            }
        h2{
            text-align: center;
        }
        .container {
            background-color: #fff;
            max-width: 100%;
            margin: 0 auto;
            padding: 20px;
            border: 1px solid #ccc;
            box-shadow: 0 0 5px rgba(0, 0, 0, 0.3);
            margin-left:275px;
            margin-right: 20px;
        }

        form label {
            font-weight: bold;
        }

        form input[type="text"],
        form textarea,
        form select {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        form select {
            height: 40px;
        }

        form input[type="submit"] {
            background-color: #333;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        a {
            color: #333;
            text-decoration: none;
            display: inline-block;
            margin-top: 10px;
        }

        a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body><br>
<h2>Create Service</h2>
<hr>
    <div class="container">
        <form method="post" action="create_services.php">
            <label for="title">Title:</label>
            <input type="text" name="title" required><br>
            <label for="description">Description:</label>
            <textarea name="description" required></textarea><br>
            <label for="price">Price:</label>
            <input type="text" name="price" required><br>
            <label for="status">Status:</label>
            <select name="status" required>
                <option value="Active">Active</option>
                <option value="Inactive">Inactive</option>
            </select><br>
            <input type="submit" value="Create">
        </form>
        <a href="services.php">Back to Services</a>
    </div>
</body>
</html>

<?php
// Include your database connection file
include("db_connection.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = $_POST['title'];
    $description = $_POST['description'];
    $price = $_POST['price'];
    $status = $_POST['status'];

    // Sanitize input
    $title = mysqli_real_escape_string($conn, $title);
    $description = mysqli_real_escape_string($conn, $description);
    $price = floatval($price); // Convert to float
    $status = mysqli_real_escape_string($conn, $status);

    // Insert the new service into the database
    $sql = "INSERT INTO services (title, description, price, status) VALUES ('$title', '$description', $price, '$status')";

    if ($conn->query($sql) === TRUE) {
        header("Location: services.php");
    } else {
        echo "Error creating service: " . $conn->error;
    }

    // Close the database connection
    $conn->close();
}
?>
