<?php
require_once('../dbh2.php');
$descrip_act  = $_POST['descrip_act'];
if(isset($_POST['id_acto'])) $var=$_POST['id_acto'];

echo "<br>";   
echo "Actualizando acto: ", $var; 
echo "<br>";   
//Comprobamos que el tipo de acto existe
$sql = "SELECT * FROM `tipo_acto` WHERE `tipo_acto`.`Descripcion` = '$descrip_act';";
$result = mysqli_query($conn,$sql);
$resultCheck = mysqli_num_rows($result);
if ($resultCheck > 0) {
    echo "Tipo de acto encontrado";
    echo "<br>";   
    $fecha          = $_POST['fecha'];  
    $hora           = $_POST['hora']; 
    $titulo         = $_POST['titulo'];         
    $comments       = $_POST['comments'];

    while ($row = mysqli_fetch_assoc($result)) {
        $id_tipo_acto = $row['Id_tipo_acto'];
        $sql = "UPDATE `actos` SET `Fecha` = '$fecha', `Hora` = '$hora', `Titulo` = '$titulo ', `Descripcion_corta` = '$comments' WHERE `actos`.`Id_acto` = '$var';";

        // Ejecutar la consulta
        if ($conn->query($sql) === TRUE) {
          echo "Modificación exitosa del acto";
          echo "<br>";    
          }
         else {
          echo "Error en la modificación del acto" . $conn->error;
        }        
    }

}else {
  echo "El tipo de acto no existe. Créelo en administración de actos-crear";
}