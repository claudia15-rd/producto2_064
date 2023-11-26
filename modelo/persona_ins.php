<?php
require_once('../dbh2.php');
$nombre  = $_POST['nombre'];
$apellido1  = $_POST['apellido1'];
$apellido2  = $_POST['apellido2'];
$usuario  = $_POST['usuario'];
$password = $_POST['password'];
$tipous   = $_POST['tipous'];

echo "Tipo de usuario insertado: ", $tipous;
echo "<br>"; 

$sql = "SELECT * FROM `usuarios` WHERE `Username` = '$usuario'";
$result = mysqli_query($conn, $sql);
$resultCheck = mysqli_num_rows($result);

if ($resultCheck > 0) {
  echo "Usuario encontrado, inserte un nombre de usuario no existente";
} else {
  echo "Usuario no encontrado, creamos datos de usuario";
  echo "<br>"; 
  $sql2 = "INSERT INTO `personas` (`Id_persona`, `Nombre`, `Apellido1`, `Apellido2`) VALUES (NULL, '$nombre', '$apellido1', '$apellido2');";

  // Ejecutar la consulta
  if ($conn->query($sql2) === TRUE) {
    echo "Inserción exitosa en tabla personas";
    echo "<br>";    
    $sql3 = "SELECT * FROM `personas` WHERE `Nombre` = '$nombre' AND `Apellido1` = '$apellido1' AND `Apellido2` = '$apellido2'";
    $result3 = mysqli_query($conn, $sql3);
    while ($row = mysqli_fetch_assoc($result3)) {
      $id_persona = $row['Id_persona'];
      echo "Creamos datos de usuario";
      echo "<br>";          
      $sql4 = "INSERT INTO `usuarios` (`Id_usuario`, `Username`, `Password`, `Id_Persona`, `Id_tipo_usuario`) VALUES (NULL, '$usuario', '$password', '$id_persona', '$tipous');";
      // Ejecutar la consulta
      if ($conn->query($sql4) === TRUE) {
        echo "Usuario creado con éxito!";
      } else {
        echo "Error en la inserción de usuarios: " . $conn->error;
      }
    }
  } else {
    echo "Error en la inserción de personas: " . $conn->error;
  }
  //Traerse el id de persona y completar
  /* if ($resultCheck > 0){

      $sql3 = "SELECT * FROM `personas` WHERE `Nombre` = '$nombre' AND `Apellido1` = '$apellido1' AND `Apellido2` = '$apellido2'";
      $result3 = mysqli_query($conn,$sql);
      while ($row = mysqli_fetch_assoc($result3)){        
        echo "<br>";
        $id_persona = $row['Id_persona'];        
        echo "Datos de persona creados correctamente";
        $sql4 = "INSERT INTO `usuarios` (`Id_usuario`, `Username`, `Password`, `Id_Persona`, `Id_tipo_usuario`) VALUES (NULL, '$usuario', '$password', '$id_persona', '$tipous');";
        $result4 = mysqli_query($conn,$sql2);
        $resultCheck4 = mysqli_num_rows($result22);   
    

    }

    }else{
      echo "Error al crear los datos de persona"; 
    }*/
}
