<?php
require_once('../dbh2.php');
$descrip_act  = $_POST['descrip_act'];

  $sql = "DELETE FROM `tipo_acto` WHERE `tipo_acto`.`Descripcion` = '$descrip_act';";
 
  // Ejecutar la consulta
  if ($conn->query($sql) === TRUE) {
    echo "Borrado exitoso del tipo de acto";
    echo "<br>";    
    }
   else {
    echo "Error en el borrado del tipo de acto" . $conn->error;
  }
