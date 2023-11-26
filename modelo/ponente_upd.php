<?php
require_once('../dbh2.php');
$nombre  = $_POST['nombre'];
$apellido1  = $_POST['apellido1'];
$apellido2  = $_POST['apellido2'];

$nombre_new  = $_POST['nombre_new'];
$apellido1_new  = $_POST['apellido1_new'];
$apellido2_new  = $_POST['apellido2_new'];

$sql = "UPDATE `personas` SET `Nombre` = '$nombre_new', `Apellido1` = '$apellido1_new', `Apellido2` = '$apellido2_new' WHERE `personas`.`Nombre` = '$nombre' and
`personas`.`Apellido1` = '$apellido1' and `personas`.`Apellido2` = '$apellido2';";
      
// Ejecutar la consulta
if ($conn->query($sql) === TRUE) {
  echo "Modificación exitosa del ponente";
  echo "<br>";    
  }
 else {
  echo "Error en la modificación del ponente" . $conn->error;
}