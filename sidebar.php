<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta http-equiv="refresh" content="100">
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet" />
  </head>
  <style>
        /* Style for the welcome message */
        .welcome-message { 
            color: #001C85; 
            padding: 10px; 
            text-align: center; 
            font-family: 'Times New Roman', Times, serif;
            font-size: x-large;
            position: relative;
            bottom: 60px;
            font-family: 'Times New Roman', serif;
        }
        .logo{
            align-items: center;
            position: relative;
            left: 80px;
            top: 5px;
            border-radius: 100%;
        }
        .clickable {
            cursor: pointer;
            padding: 10px;
            background-color: #001C85 ;
            color: #fff;
            border: 1px solid #007bff;
            border-radius: 5px;
            align-items: center;
            margin: 5px;
            transition: background-color 0.2s;
        }

        .clickable:hover {
            background-color: #0056b3;
        }
    </style>
    <body>
    <div class="sidebar">
    <img src="logo1.png" alt="Your Logo" class='logo'>
        <header><h2>Dashboard</h2></header>
        <ul>
            <li class="clickable" onclick="location.href='dashboard.php';">
                    <i class='bx bxs-home'></i> Home
            </li>
            <li class="clickable" onclick="location.href='appointments.php';">
                    <i class='bx bxs-calendar'></i> Appointments
            </li>
            <li class="clickable" onclick="location.href='patients.php';">
                    <i class='bx bxs-user'></i> Client
            </li>
            <li class="clickable" onclick="location.href='billing.php';">
                <i class='bx bxs-wallet'></i> Billings
            </li>
            <br>
            <li class="clickable" onclick="location.href='inventory.php';">
                    <i class='bx bxs-archive'></i> Inventory
            </li>
            <li class="clickable" onclick="location.href='services.php';">
                <i class='bx bxs-briefcase' ></i>Services
            </li>
            <li class="clickable" onclick="location.href='users.php';">
                    <i class='bx bxs-user-circle'></i> Users
            </li>
            <li class="clickable" onclick="location.href='logs.php';">
                <i class='bx bx-history'></i>Logs
            </li>
            <li class="clickable" onclick="location.href='concerns.php';">
                    <i class='bx bxs-message-dots'></i> Concerns
            </li>
            <li class="clickable" onclick="location.href='archive.php';">
                <i class='bx bxs-archive'></i> Archive
            </li>
            <li class="clickable" onclick="location.href='logout.php';">
                    <i class='bx bxs-log-out'></i> Logout
            </li>
        </ul>
        <?php
        include('db_connection.php');
        if (isset($_SESSION["adminUsername"])) {
            echo "<div class='welcome-message'>Username: " . $_SESSION["adminUsername"] . "</div>";
        }
        ?>
    </div>
</body>
</html>
