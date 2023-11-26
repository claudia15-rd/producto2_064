<?php
require_once('../dbh2.php');
$descrip_act  = $_POST['descrip_act'];

//Comprobamos que el tipo de acto existe
$sql = "SELECT * FROM `tipo_acto` WHERE `tipo_acto`.`Descripcion` = '$descrip_act';";
$result = mysqli_query($conn,$sql);
$resultCheck = mysqli_num_rows($result);
if ($resultCheck > 0) {
    echo "Tipo de acto encontrado";
    $fecha          = $_POST['fecha'];  
    $hora           = $_POST['hora']; 
    $titulo         = $_POST['titulo'];         
    $comments       = $_POST['comments'];

    while ($row = mysqli_fetch_assoc($result)) {
        $id_tipo_acto = $row['Id_tipo_acto'];
        $sql = "INSERT INTO `actos` (`Id_acto`, `Fecha`, `Hora`, `Titulo`, `Descripcion_corta`, `Descripcion_larga`, `Num_asistentes`, `Id_tipo_acto`) VALUES (NULL, '$fecha', '$hora', '$titulo', '$comments', '', '', '$id_tipo_acto');";

        // Ejecutar la consulta
        if ($conn->query($sql) === TRUE) {
          echo "Inserción exitosa del acto";
          echo "<br>";    
          }
         else {
          echo "Error en la inserción del acto" . $conn->error;
        }        
    }

}else {
  echo "El tipo de acto no existe. Créelo en administración de actos-crear";
}