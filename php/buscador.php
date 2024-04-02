<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "zenithmanga";

// Conexión a la base de datos
$conn = new mysqli($servername, $username, $password, $dbname);

// Consulta para obtener los datos
$categoria = isset($_GET['categoria']) ? $_GET['categoria'] : "";
$orden = isset($_GET['orden']) ? $_GET['orden'] : 'nombre_asc';

$sql = "SELECT * FROM productos ";

if ($categoria) {
  $sql .= " WHERE categoria = '$categoria' ";
}
//$sql = "SELECT id, nombre, descripcion, precio, calificacion, categoria FROM productos";

switch ($orden) {
    case "nombre_asc":
      $sql .= " ORDER BY nombre ASC;";
      break;
    case "nombre_desc":
      $sql .= " ORDER BY nombre DESC;";
      break;
    case "calificacion_desc":
      $sql .= " ORDER BY calificacion DESC;";
      break;
    case "calificacion_asc":
      $sql .= " ORDER BY calificacion ASC;";
      break;
  }

//echo $sql;

$result = $conn->query($sql);

// Arreglo para almacenar los datos
$data = array();

// Recorrer los resultados y agregarlos al arreglo
while ($row = $result->fetch_assoc()) {
    $data[] = $row;
}

//header("Location: ../index.html");
// Convertir el arreglo a JSON y enviarlo al cliente
echo json_encode($data);

$conn->close();

?>

