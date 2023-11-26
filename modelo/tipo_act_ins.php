<?php
require_once('../dbh2.php');
$descrip_act  = $_POST['descrip_act'];

  $sql = "INSERT INTO `tipo_acto` (`Id_tipo_acto`, `Descripcion`) VALUES (NULL, '$descrip_act');";

  // Ejecutar la consulta
  if ($conn->query($sql) === TRUE) {
    echo "Inserción exitosa del tipo de acto";
    echo "<br>";    
    }
   else {
    echo "Error en la inserción del tipo de acto" . $conn->error;
  }

