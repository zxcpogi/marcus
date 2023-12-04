<?php 
include("sidebar.php");
?>

<html>
<head>
    <title>Admin Dashboard - Appointments</title>
    <meta http-equiv="refresh" content="100">
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<style>
       body {
            font-family: "Arial", "Helvetica Neue", "Helvetica", sans-serif;
            margin: 0;
            padding: 0;
            background-color: #000080;
        }

        .content header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            text-align: center;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }

        th, td {
            
            border: 1px solid #ddd;
            padding-top: 10px;
            padding-bottom: 20px;
            padding-left: 20px;
            padding-right: 20px;
            text-align: left;
        }

        th {
            background-color: #F3E5AB;
            color: black;
            font-size: 20px;
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

        .btn-view {
            background-color: #007bff;
            color: #fff;
            text-decoration: none;
            padding: 5px 10px;
            border-radius: 4px;
            margin-right: 5px;
        }

        .btn-edit {
            background-color: green;
            color: #fff;
            text-decoration: none;
            padding: 5px 10px;
            border-radius: 4px;
            margin-right: 5px;
        }

        .btn-edit:hover {
            background-color: darkgreen;
        }

        .btn-delete {
            background-color: #dc3545;
            color: #fff;
            text-decoration: none;
            padding: 5px 10px;
            border-radius: 4px;
        }

.btn-delete:hover {
        background-color: #c82333;
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
h1 {
            font-family: 'Times New Roman', Times, serif;
            text-align: center;
            margin-top: 20px;
            color: #fed000;
        }
.limit{
            font-family: 'Times New Roman', Times, serif;
            color: #fed000;
}
.apply{
    font-family: 'Times New Roman', Times, serif;
    background-color: #fed000;
}
button {
                    color: #000080;
                    padding: 10px 20px;
                    border: none;
                    border-radius: 5px;
                    cursor: pointer;
                    font-size: 16px;
                    position: relative;
                    left: 10px;
                }

button:hover {
            background-color: darkgoldenrod;    
        }

</style>
<body>
    <div class="content">
        <header>
            <h1>Appointments</h1>
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

$sql = "SELECT * FROM appointments ORDER BY date_created DESC LIMIT $limit";
$result = $conn->query($sql);

if ($result) {
    // Check if there are any appointments to display
    if (mysqli_num_rows($result) > 0) {
        echo '<form method="post" action="">';
        echo '<label for="limit" class="limit"</label>Select Number of Entries to Display:</label>';
        echo '<select name="limit" id="limit">';
        echo '<option value="10" ' . ($limit == 10 ? 'selected' : '') . '>10</option>';
        echo '<option value="20" ' . ($limit == 20 ? 'selected' : '') . '>20</option>';
        // Add more options as needed
        echo '</select>';
        echo '<button type="submit" name="submit" class="apply"</button>Apply</button>';
        echo '</form>';

        echo "<table>";
        echo "<tr>";
        echo "<th>Name</th>";
        echo "<th>Phone No.</th>";
        echo "<th>Address</th>";
        echo "<th>Email</th>";
        echo "<th>Date Created</th>";
        echo "<th>Action</th>";
        echo "</tr>";

        // Loop through the results and display each appointment
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>";
            echo "<td>" . $row['name'] . "</td>";
            echo "<td>" . $row['phone'] . "</td>";
            echo "<td>" . $row['address'] . "</td>";
            echo "<td>" . $row['email'] . "</td>";
            echo "<td>" . $row['date_created'] . "</td>";
            echo "<td>";
            echo "<a class='btn-view' href='viewApp.php?id=" . $row['id'] . "'>View</a>";
            echo "<a class='btn-edit' href='approvedApp.php?id=" . $row['id'] . "'>Accept</a>";
            echo "<a class='btn-delete' href='rejectApp.php?id=" . $row['id'] . "'>Decline</a>";
            echo "</td>"; // Close the <td> tag here
            echo "</tr>";
        }

        echo "</table>";
    } else {
        echo "<h2><p>No Appointments Found.</p></h2>";
    }
} else {
    echo "Error: " . mysqli_error($conn);
}

// Close the database connection
mysqli_close($conn);
?>
