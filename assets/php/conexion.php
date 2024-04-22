<?php
$servername = "localhost";
$username = "root";
$password = "12345678";
$dbname = "zenithmanga";

// Conexión a la base de datos
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("". $conn->connect_error);
}

?>
