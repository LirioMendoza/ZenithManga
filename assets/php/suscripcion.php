<?php
include ("conexion.php");

// Guardamos en variables los datos recibidos
$correo = $_POST["correo"];
$redirect = $_POST["redirect"];

// Escapar los datos para evitar inyección de SQL
$correo = mysqli_real_escape_string($conn, $correo);

// Insertar los datos en la base de datos
$consulta = "INSERT INTO `suscripciones` (correo) VALUES ('$correo')";

// Verificamos que la consulta esta correcta
if (mysqli_query($conn, $consulta)) {
  header("Location: $redirect");
  exit();
} else {
  http_response_code(500); // Enviar código de error HTTP 500
}

?>