<?php
include("db_connection.php");

if (isset($_GET['id'])) {
    $patientId = $_GET['id'];

    // Validate and sanitize the input
    $patientId = filter_var($patientId, FILTER_VALIDATE_INT);
    if ($patientId === false) {
        die("Invalid patient ID");
    }

    // Update the patient's status to 'Completed' in the 'patients' table
    $updateSql = "UPDATE patients SET action = 'Completed' WHERE ID = ?";

    // Use prepared statement to prevent SQL injection
    $updateStmt = $conn->prepare($updateSql);
    $updateStmt->bind_param("i", $patientId);

    if ($updateStmt->execute()) {
        echo "Patient marked as 'Completed' successfully";

        // Move the completed patient to 'complete_patients' table
        $moveSql = "INSERT INTO complete_patients (id, name, phone, pet_name, services_taken, datetime_created, datetime_ended) 
                     SELECT id, name, phone, pet_name, services_taken, datetime_created, NOW() as datetime_ended 
                     FROM patients WHERE ID = ?";
        $moveStmt = $conn->prepare($moveSql);
        $moveStmt->bind_param("i", $patientId);
        $moveStmt->execute();

        // Delete the record from the 'patients' table
        $deleteSql = "DELETE FROM patients WHERE ID = ?";
        $deleteStmt = $conn->prepare($deleteSql);
        $deleteStmt->bind_param("i", $patientId);

        if ($deleteStmt->execute()) {
            echo "Patient deleted successfully";
        } else {
            echo "Error deleting patient: " . $deleteStmt->error;
        }

        // Redirect to patients.php after a 2-second delay
        header("refresh:2;url=patients.php");
    } else {
        echo "Error marking patient as 'Completed': " . $updateStmt->error;
    }

    $updateStmt->close();
    $moveStmt->close();
    $deleteStmt->close();
    $conn->close();
}
?>
