<?php
include('sidebar.php');
include('db_connection.php');

// Initialize variables
$selectedClientId = isset($_POST['client']) ? $_POST['client'] : '';
$selectedServices = array(); // Initialize an empty array for selected services
$totalPrice = 'Not available';

if ($selectedClientId) {
    // Fetch the selected client's service
    $serviceQuery = "SELECT service FROM patients WHERE ID = $selectedClientId";
    $serviceResult = $conn->query($serviceQuery);

    if ($serviceResult->num_rows > 0) {
        $serviceRow = $serviceResult->fetch_assoc();
        $selectedServices[] = $serviceRow['service'];
        // Fetch the total price based on the selected client
        $totalPriceQuery = "SELECT total FROM patients WHERE id = $selectedClientId";
        $totalPriceResult = $conn->query($totalPriceQuery);
        
        if ($totalPriceResult->num_rows > 0) {
            $totalPriceRow = $totalPriceResult->fetch_assoc();
            $totalPrice = $totalPriceRow['total'];
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="refresh" content="100">
    <link rel="stylesheet" type="text/css" href="style.css"> <!-- Make sure to link your CSS file -->
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
</head>
<style>
    body {
            font-family: "Arial", "Helvetica Neue", "Helvetica", sans-serif;
            margin: 0;
            padding: 0;
            background-color: #000080;
        }

    .content {
        max-width: 1000px;
        margin: 0 auto;
        padding: 40px;
        background-color: #fff;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        position: relative;
        left: 5%;
        top: 10%;
        font-size: 24px;
    }

    .content header {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

    h1 {
        color: #001C85;
        font-size: 48px;
        text-transform: uppercase;
        letter-spacing: 1px;
        font-weight: normal;
    }

    hr {
        border: 1px solid #ccc;
        margin: 20px 0;
    }

    label {
        display: block;
        margin-bottom: 20px;
        color: #001C85;
        font-size: 24px;
    }

    select, input {
        font-size: 20px;
        width: 100%;
        padding: 15px;
    }

    input[type="submit"] {
        background-color: #001C85;
        color: #fff;
        cursor: pointer;
        padding: 15px;
        border: none;
        border-radius: 5px;
        width: auto;
    }

    input[type="submit"]:hover {
        background-color: #0056b3;
    }

    ul {
        list-style: none;
        padding: 0;
    }

    .service-list li {
        font-size: 20px;
        margin-bottom: 10px;
    }

    /* Existing styles */

    .total-price {
        font-size: 24px;
        font-weight: bold;
        color: #001C85;
    }
</style>

    <title>Admin Dashboard - Billing</title>
</head>
<body>
    <div class="content">
        <h1 class="h1">Billing</h1>
        <hr>

        <form action="billing.php" method="post">
            <label for="client">Client:</label>
            <select name="client" id="client">
                <?php
                $clientQuery = "SELECT ID, NAME, service FROM patients";
                $clientResult = $conn->query($clientQuery);

                if ($clientResult->num_rows > 0) {
                    while ($row = $clientResult->fetch_assoc()) {
                        $clientId = $row['ID'];
                        $clientName = $row['NAME'];
                        $selected = ($selectedClientId == $clientId) ? 'selected' : '';

                        echo "<option value='$clientId' $selected>$clientName</option>";
                    }
                } else {
                    echo "<option value='' disabled>No clients found</option>";
                }
                ?>
                
            </select>
            <br>
<br>
                <label>Service:</label>
                <ul class="service-list">
                    <?php
                    foreach ($selectedServices as $service) {
                        echo "<li>$service</li>";
                    }
                    ?>
                </ul>
                
            <p class="total-price">Total Price: <?php echo $totalPrice; ?></p>
            <input type="submit" value="Generate Invoice">
        </form>
    </div>
</body>
</html>

<?php
// Close the database connection
$conn->close();
?>
