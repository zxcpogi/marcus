<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="refresh" content="100">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Appointments Details</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
            margin: 0;
            padding: 0;
        }
        .container {
            margin-left: 250px; /* Adjust for the sidebar width */
            padding: 20px;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 5px;
        }

        h1 {
            text-align: center;
        }

        p {
            font-size: 18px;
        }
        
    </style>
</head>
<body>
<?php
include("sidebar.php");
?>
<div class="container">
        <?php
        if (isset($_GET['id'])) {
            $serviceId = $_GET['id'];
            include("db_connection.php");
            $query = "SELECT * FROM appointments WHERE id = $serviceId";
            $result = $conn->query($query);
        
            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                $patientName = $row['name'];
                $patientEmail = $row['email'];
                $patientContact = $row['phone'];
                $patientAddress = $row['address'];
                $petName = $row['pet_name'];
                $petGender = $row['pet_gender'];
                $petBreed = $row['pet_breed'];
                $petColor = $row['pet_color'];
                $petSpecies = $row['pet_species']; 
                $petBday = $row['pet_bday'];
                $neutered = $row['neutered'];
                $petHistory = $row['history'];
                $service = $row['service'];
                $status = $row['action'];
        
                echo "<h1>Owner Details</h1>";
                echo "<p><strong>Name:</strong> $patientName</p>";
                echo "<p><strong>Email:</strong> $patientEmail</p>";
                echo "<p><strong>Phone No.:</strong> $patientContact</p>";
                echo "<p><strong>Address:</strong> $patientAddress</p>";
                echo "<p><strong>Status:</strong> $status</p>";
                echo "<hr>";
                echo "<h1>Pet Details</h1>";
                echo "<p><strong>Name:</strong> $petName</p>";
                echo "<p><strong>Gender:</strong> $petGender</p>";
                echo "<p><strong>Breed:</strong> $petBreed</p>";
                echo "<p><strong>Color:</strong> $petColor</p>";
                echo "<p><strong>Species:</strong> $petSpecies</p>";
                echo "<p><strong>Birthdate:</strong> $petBday</p>";
                echo "<p><strong>Neutered:</strong> $neutered</p>";
                echo "<p><strong>Medical History:</strong> $petHistory</p>";
                echo "<p><strong>Services:</strong> $service</p>";
                echo "<a href='appointments.php'>Back to Appointment List</a>";
            } else {
                echo "No appointments found for this service ID.";
            }
            $conn->close();
        } else {
            echo "Service ID not provided.";
        }
        
        ?>
    </div>
</body>
</html>