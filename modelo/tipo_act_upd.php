<?php
require_once('../dbh2.php');
$descrip_act   = $_POST['descrip_act'];
$descrip_act2  = $_POST['descrip_act_new'];

  $sql = "UPDATE `tipo_acto` SET `Descripcion` = '$descrip_act2' WHERE `tipo_acto`.`Descripcion` = '$descrip_act';";

  // Ejecutar la consulta
  if ($conn->query($sql) === TRUE) {
    echo "Modificación exitosa del tipo de acto";
    echo "<br>";    
    }
   else {
    echo "Error en la modificación del tipo de acto" . $conn->error;
  }