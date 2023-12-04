<?php
include("db_connection.php");

if (isset($_GET['id'])) {
    $patientId = $_GET['id'];

    // Perform the deletion query, assuming you have a table named 'patients'
    $sql = "DELETE FROM patients WHERE ID = $patientId";

    if ($conn->query($sql) === TRUE) {
        echo "Patient deleted successfully";
        
        // Redirect to patients.php after a 2-second delay
        header("refresh:2;url=patients.php");
    } else {
        echo "Error deleting patient: " . $conn->error;
    }

    $conn->close();
}
?>
