<?php 
include("sidebar.php");
?>
<style>
   body {
            font-family: "Arial", "Helvetica Neue", "Helvetica", sans-serif;
            }

    .content header {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }

        th, td {
            
            border: 1px solid #ddd;
            padding: 15px;
            text-align: left;
        }

        th {
            background-color: rgb(37, 102, 223);
            color: #fff;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }
        .btn-delete {
            background-color: red;
            color: #fff;
            width: 5%;
            text-decoration: none;
            padding: 10px 20px;
            border-radius: 5px;
            position: absolute;
            top: 40px; /* Adjust the top position */
            right: 50px; /* Adjust the right position */
            text-align: center;
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
            padding: 10px 25px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
            position: relative;
            left: 10px;
        }

        button:hover {
            background-color: #5F98D8;
        }

</style>
<html>
<head>
    <title>Admin Dashboard - Concerns</title>
    <meta http-equiv="refresh" content="100">
    <link rel="stylesheet" type="text/css" href="style.css">
</head><body>
<div class="content">
    <header>
        <h1>Concerns</h1>
        <a href="archive.php" class="btn-delete">Archive</a>
    </header>
    <hr>
    <main>
        <?php
        include("db_connection.php");

        // Check if the "limit" form has been submitted
        if (isset($_POST['submit']) && isset($_POST['limit'])) {
            $limit = $_POST['limit'];
        } else {
            // Default limit
            $limit = 10;
        }

        $sql = "SELECT * FROM contact ORDER BY datetime DESC LIMIT $limit";
        $result = $conn->query($sql);

        if ($result) {
            if (mysqli_num_rows($result) > 0) {
                echo '<form method="post" action="">';
                echo '<label for="limit">Select Number of Entries to Display:</label>';
                echo '<select name="limit" id="limit">';
                echo '<option value="10" ' . ($limit == 10 ? 'selected' : '') . '>10</option>';
                echo '<option value="20" ' . ($limit == 20 ? 'selected' : '') . '>20</option>';
                echo '<option value="30" ' . ($limit == 30 ? 'selected' : '') . '>30</option>';
                // Add more options as needed
                echo '</select>';
                echo '<button type="submit" name="submit">Apply</button>';
                echo '</form>';

                echo "<table border='1'>";
                echo "<tr>";
                echo "<th>Name</th>";
                echo "<th>Email</th>";
                echo "<th>Message</th>";
                echo "<th>DateTime</th>";
                echo "</tr>";
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<tr>";
                    echo "<td>" . $row['name'] . "</td>";
                    echo "<td>" . $row['email'] . "</td>";
                    echo "<td>" . $row['message'] . "</td>";
                    echo "<td>" . $row['datetime'] . "</td>";
                    echo "</tr>";
                }
                echo "</table>";
            } else {
                echo "<h2><p>No Concerns Found.</p></h2>";
            }
        } else {
            echo "Error: " . mysqli_error($conn);
        }

        // Close the database connection
        mysqli_close($conn);
        ?>
    </main>
</div>
</body>
</html>