<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "zenithmanga";

// Conexión a la base de datos
$conn = new mysqli($servername, $username, $password, $dbname);

// Consulta para obtener los datos
$sql = "SELECT id, nombre, descripcion, precio, calificacion, categoria FROM productos";
$result = $conn->query($sql);

// Arreglo para almacenar los datos
$data = array();

// Recorrer los resultados y agregarlos al arreglo
while ($row = $result->fetch_assoc()) {
    $data[] = $row;
}

// Convertir el arreglo a JSON y enviarlo al cliente
//echo json_encode($data);
$conn->close();

?>
