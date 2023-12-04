<!DOCTYPE html>
<html>
<head>
    <title>Admin Dashboard - Completed</title>
    <meta http-equiv="refresh" content="100">
</head>
<body>
    <div class="content">
        <header>
            <h1>Completed Patients</h1>
        </header>
        <hr>
        <main>
            <form method="post" action="">
                <label for="limit">Select Number of Entries to Display:</label>
                <select name="limit" id="limit">
                    <option value="10">10</option>
                    <option value="20">20</option>
                    <!-- Add more options as needed -->
                </select>
                <button type="submit" name="submit">Apply</button>
            </form>

            <?php
            include("db_connection.php");

            // Set the default limit
            $defaultLimit = 50;

            // Check if the form is submitted
            if (isset($_POST['submit'])) {
                $limit = isset($_POST['limit']) ? (int)$_POST['limit'] : $defaultLimit;
            } else {
                $limit = $defaultLimit;
            }

            $sql = "SELECT * FROM `complete_patients`";

            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                echo "<table border='1' width='100%'>";
                echo "<tr>";
                echo "<th><font style='Franklin Gothic' size='5cm'>Name</th>";
                echo "<th><font style='Franklin Gothic' size='5cm'>Phone No.</th>";
                echo "<th><font style='Franklin Gothic' size='5cm'>Pet Name</th>";
                echo "<th><font style='Franklin Gothic' size='5cm'>Service taken</th>";
                echo "<th><font style='Franklin Gothic' size='5cm'>Datetime Created </th>";
                echo "<th><font style='Franklin Gothic' size='5cm'>Datetime Ended </th>";
                echo "<th><font style='Franklin Gothic' size='5cm'>Action </th>";

                while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td ><font style='Franklin Gothic' >" . $row['name'] . "</td>";
                    echo "<td ><font style='Franklin Gothic' >" . $row['phone'] . "</td>";
                    echo "<td ><font style='Franklin Gothic' >" . $row['pet_name'] . "</td>";
                    echo "<td ><font style='Franklin Gothic' >" . $row['service'] . "</td>";
                    echo "<td ><font style='Franklin Gothic' >" . $row['datetime_created'] . "</td>";
                    echo "<td ><font style='Franklin Gothic' >" . $row['datetime_ended'] . "</td>";
                    echo "<td ><font style='Franklin Gothic' >" . $row['action'] . "</td>";
                    echo "</tr>";
                }
            } else {
                echo "<p>No Data found.</p>";
            }
            ?>
        </main>
    </div>
</body>
</html>
