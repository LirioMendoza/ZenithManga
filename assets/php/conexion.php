<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "zenithmanga";

// Conexión a la base de datos
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("". $conn->connect_error);
}

?>
