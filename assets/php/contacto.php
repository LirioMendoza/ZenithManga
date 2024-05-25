<?php
include ("conexion.php");

// Guardamos en variables los datos recibidos
$nombre = $_POST["nombre"];
$apellido = $_POST["apellido"];
$correo = $_POST["correo"];
$telefono = $_POST["telefono"];
$mensaje = $_POST["mensaje"];

// Escapar los datos para evitar inyección de SQL
$nombre = mysqli_real_escape_string($conn, $nombre);
$apellido = mysqli_real_escape_string($conn, $apellido);
$correo = mysqli_real_escape_string($conn, $correo);
$telefono = mysqli_real_escape_string($conn, $telefono);
$mensaje = mysqli_real_escape_string($conn, $mensaje);

// Insertar los datos en la base de datos
$consulta = "INSERT INTO `comentarios` (nombre, apellido, correo, telefono, mensaje) VALUES ('$nombre', '$apellido', '$correo', '$telefono', '$mensaje')";

// Verificamos que la consulta esta correcta
if (mysqli_query($conn, $consulta)) {
  header("Location: ../../contact.html");
  exit();
} else {
  http_response_code(500); // Enviar código de error HTTP 500
}
?>