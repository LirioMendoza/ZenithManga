<?php
// Recibimos el parametro
$id = $_POST["id"];

// Realizamos la consulta SQL
$sql = "SELECT id, nombre, descripcion, precio, calificacion, categoria FROM productos WHERE id = $id";
$result = $conn->query($sql);
$data = array();

// Almacenamos el valor en una varisble
while ($row = $result->fetch_assoc()) {
    $data[] = $row;
}

// Cerramos la conexion
$conn->close();
?>