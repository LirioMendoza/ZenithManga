<?php
// Guardamos en variables los datos recibidos
$correo = $_POST["correo"];
$redirect = $_POST["redirect"];

// Informacion de nuestra base de datos
$host = "localhost";
$user = "root";
$password = "";
$data_base = "zenithmanga";

// Conexión a la base de datos
$conexion = mysqli_connect($host, $user, $password, $data_base);

// Verificar la conexión
if (!$conexion) {
    die("Error al conectar a la base de datos: " . mysqli_connect_error());
  }

// Escapar los datos para evitar inyección de SQL
$correo = mysqli_real_escape_string($conexion, $correo);

// Insertar los datos en la base de datos
$consulta = "INSERT INTO `suscripciones` (correo) VALUES ('$correo')";

// Verificamos que la consulta esta correcta
if (mysqli_query($conexion, $consulta)) {
    header("Location: $redirect");
  exit();
} else {
  http_response_code(500); // Enviar código de error HTTP 500
}

?>
