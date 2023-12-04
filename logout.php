<?php
// Start the session
include_once("db_connection.php"); // Include your database connection code
session_start();
// Log the logout action (before destroying the session)
if (isset($_SESSION["adminUsername"])) {
    $username = $_SESSION["adminUsername"];
    $position = $_SESSION["adminRole"];
    $logoutAction = "Logged out";
    
    // Log the logout action to the database
    $insertQuery = "INSERT INTO login_logs (username, position, action, log_datetime) VALUES ('$username', '$position', '$logoutAction', NOW())"; // Assuming MySQL
    mysqli_query($conn, $insertQuery);
}

// Destroy the session
session_destroy();

// Redirect to the login page (you can change this to your actual login page)
header("Location: login.php");
exit;
?>
