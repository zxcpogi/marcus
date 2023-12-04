<?php
include_once("db_connection.php");
session_start();
if (isset($_SESSION["adminUsername"]) && !empty($_SESSION["adminUsername"])) {
    // User is already logged in, redirect them to the appropriate dashboard
    $adminRole = $_SESSION["adminRole"];
    if ($adminRole === "Admin") {
        header("Location: dashboard.php");
    } elseif ($adminRole === "Staff") {
        header("Location: staff_dashboard.php");
    }
    exit;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $adminUsername = $_POST["adminUsername"];
    $adminPassword = $_POST["adminPassword"];

    // Authenticate the user and retrieve their role from the database
    $query = "SELECT Position, password FROM register WHERE username = '$adminUsername'";
    $result = mysqli_query($conn, $query);

    if ($result && mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $storedPassword = $row["password"];
        $userRole = $row["Position"];

        if ($adminPassword === $storedPassword) {
            $_SESSION["adminUsername"] = $adminUsername;
            $_SESSION["adminRole"] = $userRole; // Store user role in a session variable
            
            // Log the login action to the database
            $loginAction = "Logged in";
            $insertQuery = "INSERT INTO login_logs (username, position, action, log_datetime) VALUES ('$adminUsername', '$userRole', '$loginAction', NOW())"; // Assuming MySQL
            mysqli_query($conn, $insertQuery);
            
            
            // Redirect based on user's role
            if ($userRole === "Admin") {
                header("Location: dashboard.php");
            } elseif ($userRole === "Staff") {
                header("Location: staff_dashboard.php");
            }
            exit();
        } else {
            echo "Incorrect password. Please try again.";
        }
    } else {
        echo "Admin username not found. Please check your credentials.";
    }

    mysqli_close($conn);
}
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="refresh" content="100">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
    <link rel="stylesheet" href="Login.css">
</head>
<body>
    <div class="container">
        <div class="form-container">
        <h2>Welcome to VetCare: Animal Clinic & Grooming Center</h2>
        <hr>
            <form action="Login.php" method="POST">
                <div class="form-group">
                    <label for="adminUsername">Username</label>
                    <input type="text" id="adminUsername" name="adminUsername" required>
                </div>
                <div class="form-group">
                    <label for="adminPassword">Password</label>
                    <input type="password" id="adminPassword" name="adminPassword" required>
                    <input type="checkbox" id="showPassword"> Show Password
                </div>
                <button type="submit">Login</button>
            </form>
            <p>Don't have an account? <a href="register.php">Register here</a></p>
        </div>
    </div>

    <script>
        const showPasswordCheckbox = document.getElementById("showPassword");
        const adminPasswordInput = document.getElementById("adminPassword");

        showPasswordCheckbox.addEventListener("change", function () {
            if (showPasswordCheckbox.checked) {
                adminPasswordInput.type = "text";
            } else {
                adminPasswordInput.type = "password";
            }
        });
    </script>
</body>
</html>


