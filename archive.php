<?php
//include("sidebar.php");
include("db_connection.php");
?>

<html>

<head>
    <title>Admin Dashboard - Archives</title>
    <meta http-equiv="refresh" content="100">
    <link rel="stylesheet" type="text/css" href="style.css">
</head>

<body>

    <!-- Your HTML structure for the admin dashboard goes here -->

    <div class="dashboard-container">

        <!-- Logs Section -->
        <div class="section">
            <h2>Logs</h2>
            <?php
            // Include code to display logs from the database
            // You can use SQL queries to fetch and display logs
            ?>
        </div>

        <!-- Clients Section -->
        <div class="section">
            <h2>Clients</h2>
            <?php
            // Include code to display clients from the database
            // You can use SQL queries to fetch and display client information
            ?>
        </div>

        <!-- Inventory Section -->
        <div class="section">
            <h2>Inventory</h2>
            <?php
            // Include code to display inventory from the database
            // You can use SQL queries to fetch and display inventory information
            ?>
        </div>

    </div>

</body>

</html>
