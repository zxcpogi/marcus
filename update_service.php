<?php
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if the service_id is provided
    if(isset($_POST['service_id'])) {
        $service_id = $_POST['service_id'];
        
        // Include your database connection file
        include("db_connection.php");

        // Retrieve the updated service information from the form
        $title = $_POST['title'];
        $description = $_POST['description'];
        $price = $_POST['price'];
        $status = $_POST['status'];

        // Update the service in the database
        $sql = "UPDATE services SET title='$title', description='$description', price='$price', status='$status' WHERE ID=$service_id";

        if ($conn->query($sql) === TRUE) {
            // Successful update, redirect back to the services page
            header("Location: services.php");
            exit();
        } else {
            // Error in the update query
            echo "Error updating service: " . $conn->error;
        }

        // Close the database connection
        mysqli_close($conn);
    } else {
        echo "<p>Service ID not provided.</p>";
    }
} else {
    // Redirect to the services page if the form is not submitted
    header("Location: services.php");
    exit();
}
?>
