<?php 
include_once('sidebar.php');
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="refresh" content="100">
    <link rel="stylesheet" type="text/css" href="style.css">
    <title>Product Inventory</title>
    <style>
        body {
            font-family: "Arial", "Helvetica Neue", "Helvetica", sans-serif;
            margin: 0;
            padding: 0;
            background-color: #000080;
        }
        h1{
            margin: 0px;
        }

        form {
            margin-bottom: 20px;
        }

        label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }

        input[type="text"],
        input[type="date"],
        input[type="number"] {
            width: 90%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 3px;
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
        }
        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        a {
            color: #333;
            text-decoration: none;
        }

        a:hover {
            text-decoration: underline;
        }
        .btn-create {
            background-color: #008000;
                color: #fff;
                text-decoration: none;
                padding: 10px 20px;
                border-radius: 5px;
                position: absolute;
                top: 20px; /* Adjust the top position */
                right: 50px; /* Adjust the right position */
            }

        .btn-create:hover {
            background-color: darkgreen;
            }
            
        .btn-delete {
            background-color: #dc3545;
            color: #fff;
            text-decoration: none;
            padding: 5px 10px;
            border-radius: 4px;
            position: relative;
            left: 5px;
        }

        .btn-delete:hover {
            background-color: #c82333;
        }
        label {
        display: inline-block;
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
            background-color: #fed000;
            color: #0056b3;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
            left: 10px;
        }

        button:hover {
            background-color: darkgoldenrod;
        }
        .apply{
        padding: 10px 20px;
        background-color: #fed000;
        color: #000080; 
        border: none;
        border-radius: 5px; /* Rounded corners */
        font-size: 16px; /* Font size */
        cursor: pointer; /* Hover effect */
        }
        .limit{
            font-family: 'Times New Roman', Times, serif;
            color: #fed000;
        }
        
        h1 {
            font-family: 'Times New Roman', Times, serif;
            margin-top: 20px;
            color: #fed000;
        }
    </style>
</head>
<body>
    <div class="content">
        <header>
        <h1>Product List</h1>
        </header>
        <hr>
        <main>
        <form method="get" action="inventory.php">
            <label for="limit" class="limit" >Select Number of Entries to Display:</label>
                <select name="limit" id="limit">
                    <option value="10">10</option>
                    <option value="20">20</option>
                </select>
                <button type="submit" class='apply'>Apply</button>
            </form>
            <table>
                <tr>
                    <th>Product Name</th>
                    <th>Purchase Date</th>
                    <th>Expiration Date</th>
                    <th>Quantity</th>
                    <th>Action</th>
                </tr>
                <?php
                include("db_connection.php");
    
                // Set the default limit
                $defaultLimit = 10;
    
                // Check if the form is submitted
                if (isset($_GET['limit'])) {
                    $limit = isset($_GET['limit']) ? (int)$_GET['limit'] : $defaultLimit;
                } else {
                    $limit = $defaultLimit;
                }
                
                $query = "SELECT * FROM `inventory` LIMIT $limit";
                $result = mysqli_query($conn, $query);
                while ($row = mysqli_fetch_assoc($result)) {
                    $ID = $row['ID'];
                    $productName = $row['item_name'];
                    $purchaseDate = $row['item_date'];
                    $expirationDate = $row['item_expiration'];
                    $quantity = $row['item_stocks'];

                    echo "<tr>";
                    echo "<td>$productName</td>";
                    echo "<td>$purchaseDate</td>";
                    echo "<td>$expirationDate</td>";
                    echo "<td>$quantity</td>";
                    echo "<td><a class='btn-delete' href='javascript:void(0);' onclick='deleteproduct(" . $row['ID'] . ")'>Archive</a></td>";
                    echo "</tr>";
                }
                ?>
                </table>
        </main>
    </div>
    <a class='btn-create' href='create_newproduct.php'>Add new Product</a>

    <script>
    function deleteproduct(product_id) {
    if (confirm("Are you sure you want to delete this product?")) {
        console.log("Deleting product with ID: " + product_id);

        var xhr = new XMLHttpRequest();
        xhr.open("GET", "delete_product.php?product_id=" + product_id, true);

        xhr.onreadystatechange = function () {
            console.log("ReadyState: " + xhr.readyState + ", Status: " + xhr.status);

            if (xhr.readyState == 4) {
                if (xhr.status == 200) {
                    console.log("Response: " + xhr.responseText);
                    // Refresh the page after successful deletion
                    window.location.reload();
                } else {
                    console.log("Error: Something went wrong with the request.");
                }
            }
        };

        xhr.send();
    }
}

    </script>
</body>
</html>
