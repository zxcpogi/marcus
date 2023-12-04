<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="refresh" content="100">   
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration</title>
    <link rel="stylesheet" href="register.css">
</head>
<style>
    body {
    font-family: "Arial", "Helvetica Neue", "Helvetica", sans-serif;
    background-color: #f2f2f2;
    margin: 0;
    padding: 0;
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
}

.container {
    background-color: #fff;
    max-width: 800px;
    padding: 50px;
    border-radius: 5px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
    text-align: center;
}

h2 {
    margin-bottom: 20px;
    color: #333;
}

.form-group {
    margin-bottom: 15px;
    text-align: left;
}

label {
    font-weight: bold;
}

input[type="text"],
input[type="username"],
input[type="password"],
select { 
    width: 100%;
    padding: 10px;
    margin-top: 5px;
    margin-bottom: 10px;
    border: 1px solid #ccc;
    border-radius: 5px;
}

button[type="submit"] {
    background-color: #007bff;
    color: #fff;
    border: none;
    padding: 10px 20px;
    border-radius: 5px;
    cursor: pointer;
    transition: background-color 0.3s ease;
    margin-top: 15px; /* Add margin-top to create space between the "Position" field and the button */
}

button[type="submit"]:hover {
    background-color: #0056b3;
}

p {
    margin-top: 15px;
}

a {
    text-decoration: none;
    color: #007bff;
}

    </style>
<body>
<form action="register.php" method="POST">
    <div class="container">
        <div class="form-container">
            <h2>Create an Account</h2>
            <form action="register.php" method="POST">
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" id="name" name="Name" required>
                </div>
                <div class="form-group">
                    <label for="username">Username</label>
                    <input type="username" id="username" name="username" required>
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" id="password" name="password" required>
                </div>
                <div class="form-group">
                        <label for="position">Position</label>
                        <select id="position" name="position" required>
                            <option value="Admin">Admin</option>
                            <option value="Staff">Staff</option>
                        </select>
                    </div>
                <button type="submit">Register</button>
            </form>
            <p>Already have an account? <a href="Login.php">Login here</a></p>
        </div>
    </div>
</form>
</body>
</html>

<?php
session_start();
include_once("db_connection.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["Name"];
    $username = $_POST["username"];
    $password = $_POST["password"]; // Hash the password for security
    $position = $_POST["position"]; // Get the selected position

    // Check if the username already exists
    $query = "SELECT * FROM register WHERE username = '$username'";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) > 0) {
        echo "Username already exists. Please choose a different one.";
    } else {
        // Insert the user data into the database
        $insertQuery = "INSERT INTO register (name, username, password, position) VALUES ('$name', '$username', '$password', '$position')";
        if (mysqli_query($conn, $insertQuery)) {
            echo "Registration successful.";
        } else {
            echo "Error: " . mysqli_error($conn);
        }
    }

    // Close the database connection
    mysqli_close($conn);
}
?>
