<?php
require_once('../dbh2.php');
$nombre  = $_POST['nombre'];
$apellido1  = $_POST['apellido1'];
$apellido2  = $_POST['apellido2'];

$sql = "INSERT INTO `personas` (`Id_persona`, `Nombre`, `Apellido1`, `Apellido2`) VALUES (NULL, '$nombre', '$apellido1', '$apellido2');";

// Ejecutar la consulta
if ($conn->query($sql) === TRUE) {
  echo "Inserción exitosa del ponente";
  echo "<br>";    
  }
 else {
  echo "Error en la inserción del ponente" . $conn->error;
}