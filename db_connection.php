<?php
$hostName = 'localhost';
$userName = 'root';
$password = '';
$databaseName = 'vet';
$conn = mysqli_connect($hostName, $userName, $password, $databaseName);

if (mysqli_connect_errno()) {
 echo "Failed to connect";
 exit();
}
//echo "Connection success!";
?>