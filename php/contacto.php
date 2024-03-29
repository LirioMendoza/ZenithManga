<?php
// Guardamos en variables los datos recibidos
$nombre = $_POST["nombre"];
$apellido = $_POST["apellido"];
$correo = $_POST["correo"];
$telefono = $_POST["telefono"];
$mensaje = $_POST["mensaje"];

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
$nombre = mysqli_real_escape_string($conexion, $nombre);
$apellido = mysqli_real_escape_string($conexion, $apellido);
$correo = mysqli_real_escape_string($conexion, $correo);
$telefono= mysqli_real_escape_string($conexion, $telefono);
$mensaje = mysqli_real_escape_string($conexion, $mensaje);

// Insertar los datos en la base de datos
$consulta = "INSERT INTO `comentarios` (nombre, apellido, correo, telefono, mensaje) VALUES ('$nombre', '$apellido', '$correo', '$telefono', '$mensaje')";

// Verificamos que la consulta esta correcta
if (mysqli_query($conexion, $consulta)) {
  header("Location: ../contact.html");
  exit();
} else {
  http_response_code(500); // Enviar código de error HTTP 500
}

?>
