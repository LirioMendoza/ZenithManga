<?php
$id = $_POST["id"];
$sql = "SELECT id, nombre, descripcion, precio, calificacion, categoria FROM productos WHERE id = $id";
$result = $conn->query($sql);
$data = array();
while ($row = $result->fetch_assoc()) {
    $data[] = $row;
}
$conn->close();
?>