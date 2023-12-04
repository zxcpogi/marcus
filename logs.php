<?php 
include_once('sidebar.php');
?>
<style>
    body {
            font-family: "Arial", "Helvetica Neue", "Helvetica", sans-serif;
            }
    
        table {
            width: 100%;
            border-collapse: collapse;
        }

        th, td {
            border: 1px solid #ddd;
            padding-top: 10px;
            padding-bottom: 20px;
            padding-left: 30px;
            padding-right: 40px;
            text-align: left;
        }

        th {
            background-color: rgb(37, 102, 223);
            color: #fff;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        .btn-create {
            background-color: #333;
            color: #fff;
            text-decoration: none;
            padding: 10px 20px;
            border-radius: 5px;
        }

        .btn-create:hover {
            background-color: #555;
        }
        /* Add custom styles for the Edit and Delete buttons */
        .btn-edit {
            background-color: #007bff;
            color: #fff;
            text-decoration: none;
            padding: 5px 10px;
            border-radius: 4px;
            margin-right: 5px;
        }

        .btn-edit:hover {
            background-color: #0056b3;
        }

        .btn-delete {
            background-color: red;
            color: #fff;
            text-decoration: none;
            padding: 10px 20px;
            border-radius: 5px;
            position: absolute;
            top: 40px; /* Adjust the top position */
            right: 50px; /* Adjust the right position */
        }

        .btn-delete:hover {
                        background-color: maroon;
                    }
        label {
            font-size: 20px;
            margin-right: 10px;
        }
        select {
            padding: 10px;
            font-size: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        button {
            background-color: #6CADF7;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
            left: 10px;
        }

        button:hover {
            background-color: #5F98D8;
        }

</style>
<!DOCTYPE html>
<html>
<head>
    <title>Admin Dashboard - Logs</title>
    <meta http-equiv="refresh" content="100">
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <div class="content">
        <header>
            <h1>Logs</h1>
            <a href="archive.php" class="btn-delete">Archive</a>
        </header>
        <hr>
        <main>
            <form method="post" action="">
                <label for="limit">Select Number of Entries to Display:</label>
                <select name="limit" id="limit">
                    <option value="10">10</option>
                    <option value="20">20</option>
                    <!-- Add more options as needed -->
                </select>
                <button type="submit" name="submit">Apply</button>
            </form>

            <?php
            include("db_connection.php");

            // Set the default limit
            $defaultLimit = 10;

            // Check if the form is submitted
            if (isset($_POST['submit'])) {
                $limit = isset($_POST['limit']) ? (int)$_POST['limit'] : $defaultLimit;
            } else {
                $limit = $defaultLimit;
            }

            $sql = "SELECT * FROM login_logs ORDER BY log_datetime DESC LIMIT $limit";

            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                echo "<table border='1' width='100%'>";
                echo "<tr>";
                echo "<th><font style='Franklin Gothic' size='5cm'>Username</th>";
                echo "<th><font style='Franklin Gothic' size='5cm'>Position</th>";
                echo "<th><font style='Franklin Gothic' size='5cm'>Action</th>";
                echo "<th><font style='Franklin Gothic' size='5cm'>DateTime</th>";

                while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td ><font style='Franklin Gothic' >" . $row['username'] . "</td>";
                    echo "<td ><font style='Franklin Gothic' >" . $row['position'] . "</td>";
                    echo "<td ><font style='Franklin Gothic' >" . $row['action'] . "</td>";
                    echo "<td ><font style='Franklin Gothic' >" . $row['log_datetime'] . "</td>";
                    echo "</tr>";
                }
            } else {
                echo "<p>No Data Logs found.</p>";
            }
            ?>
        </main>
    </div>
</body>
</html>

