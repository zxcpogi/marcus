<?php 
include_once('sidebar.php');
?>
<html>
<head>
    <title>Admin Dashboard - Services</title>
    <meta http-equiv="refresh" content="100">
    <link rel="stylesheet" type="text/css" href="style.css">
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
            padding-top: 10px;
            padding-bottom: 20px;
            padding-left: 10px;
            padding-right: 10px;
            text-align: justify;
            
        }

        th {
            background-color: rgb(37, 102, 223);
            color: #fff;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        .btn-create {
            background-color: rgb(37, 102, 223);
            color: #fff;
            text-decoration: none;
            padding: 10px 20px;
            border-radius: 5px;
        }

        .btn-create:hover {
            background-color: #0056b3;
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
    background-color: #dc3545;
    color: #fff;
    text-decoration: none;
    padding: 5px 10px;
    border-radius: 4px;
}

.btn-delete:hover {
    background-color: #c82333;
}


    </style>
</head>
<body>
    <div class="content">
        <header>
            <h1>Services</h1>
            <a href="create_services.php" class="btn-create">Create New Services</a>
        </header>   
        <hr>
        <main>
        <?php
        include("db_connection.php");
        $sql = "SELECT * FROM services";
        $result = $conn->query($sql);

        if ($result) {
            // Check if there are any services to display
            if (mysqli_num_rows($result) > 0) {
                echo "<table>";
                echo "<tr>";
                
                echo "<th>Title</th>";
                echo "<th>Description</th>";
                echo "<th>Price</th>";
                echo "<th>Status</th>";
                echo "<th>Action</th>";
                echo "</tr>";
        
                // Loop through the results and display each service
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<tr>";
                   
                    echo "<td>" . $row['title'] . "</td>";
                    echo "<td>" . $row['description'] . "</td>";
                    echo "<td>" . $row['price'] . "</td>";
                    echo "<td>" . $row['status'] . "</td>";
                    echo "<td>";
                    echo "<a class='btn-edit' href='edit_services.php?id=" . $row['ID'] . "'>Edit</a>";
                    echo "<a class='btn-delete' href='delete_service.php?id=" . $row['ID'] . "'>Archive</a>";
                    echo "</td>"; // Close the <td> tag here
                    echo "</tr>";
                }
        
                echo "</table>";
            } else {
                echo "<p>No services found.</p>";
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
