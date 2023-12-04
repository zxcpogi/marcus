<?php
include("db_connection.php");

if (isset($_GET['id'])) {
    $appointmentId = $_GET['id'];

    // Assuming you have a column named 'action' to represent the appointment status in the database
    $status = 'ACCEPTED';

    $sql = "UPDATE appointments SET action = '$status' WHERE id = $appointmentId";

    if ($conn->query($sql) === TRUE) {
        // Fetch the details of the approved appointment
        $selectQuery = "SELECT * FROM appointments WHERE id = $appointmentId";
        $result = $conn->query($selectQuery);

        if ($result && $result->num_rows > 0) {
            $row = $result->fetch_assoc();

            // Extract details of the approved appointment
            $full_name = $row["name"];
            $email = $row["email"];
            $phone = $row["phone"];
            $address = $row["address"];
            $calendar = $row["date"];
            $appointment_time = $row["time"];
            $pet_name = $row["pet_name"];
            $pet_gender = $row["pet_gender"];
            $pet_type = $row["pet_species"];
            $pet_breed = $row["pet_breed"];
            $pet_bday = $row["pet_bday"];
            $pet_color = $row["pet_color"];
            $service = $row["service"];
            $total = $row["total"];
            $neutered = $row["neutered"];
            $pet_medicalhistory = $row["history"];
            $date_created = $row['date_created'];

            // Insert the approved appointment into the patient list or another list
            $insertQuery = "INSERT INTO patients (name, email, contact, address, pet_name, pet_gender, pet_type, pet_breed, pet_bday, pet_color, neutered, history, date, time, service,total, date_created, action) 
                            VALUES ('$full_name', '$email', '$phone', '$address', '$pet_name', '$pet_gender', '$pet_type', '$pet_breed', '$pet_bday', '$pet_color', '$neutered', '$pet_medicalhistory', '$calendar', '$appointment_time', '$service','$total', '$date_created', 'ACCEPTED')";

            if ($conn->query($insertQuery) === TRUE) {
                // Delete the approved appointment data from the appointments table
                $deleteQuery = "DELETE FROM appointments WHERE id = $appointmentId";
                if ($conn->query($deleteQuery) === TRUE) {
                    // Redirect back to the list of appointments
                    header("Location: appointments.php");
                    exit();
                } else {
                    echo "Error deleting the approved appointment: " . $conn->error;
                }
            } else {
                echo "Error inserting into patient list: " . $conn->error;
            }
        } else {
            echo "Error fetching the approved appointment details: " . $conn->error;
        }
    } else {
        echo "Error updating record: " . $conn->error;
    }
} else {
    echo "Invalid appointment ID.";
}

$conn->close();
?>
