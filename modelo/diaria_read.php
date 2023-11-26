<?php
require_once('../dbh2.php');

// En otros archivos
session_start();
$usuario = $_SESSION['usuario'];
echo "Este es el usuario: ", $usuario;
echo "<br>";

$id_persona = $_SESSION['id_persona'];
echo "Este es su Id: ", $id_persona;
echo "<br>";

$fecha  = $_POST['fecha'];

$sql = "SELECT * FROM `actos` WHERE `Fecha` = '$fecha' ORDER BY `Id_acto` ASC";

$result = mysqli_query($conn, $sql);
$resultCheck = mysqli_num_rows($result);

if ($resultCheck > 0) {
    echo "Estos son los actos para ese día. En rojo si no está inscrito, verde si lo está, naranja si es ponente";
    echo "<br>";
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<br>";
        $id_titulo = $row['Titulo'];
        $id_acto   = $row['Id_acto'];

        echo $fecha, ": ", $id_titulo, " Acto nº: ", $id_acto;

        //Nos traemos los inscritos para ese acto
        $sql2 = "SELECT * FROM `inscritos` WHERE `Id_persona` = '$id_persona' AND `id_acto` = '$id_acto'";
        $result2 = mysqli_query($conn, $sql2);
        $resultCheck2 = mysqli_num_rows($result2);

        if ($resultCheck2 > 0) {
           //pintamos verde
           echo'<div style="background-color: green;">Inscrito</div>';
        }else{
           //pintamos rojo
           echo'<div style="background-color: red;">No inscrito</div>';
        }


        //Los ponentes
        //Nos traemos los inscritos para ese acto
        $sql3 = "SELECT * FROM `lista_ponentes` WHERE `Id_persona` = '$id_persona' AND `id_acto` = '$id_acto'";
        $result3 = mysqli_query($conn, $sql3);
        $resultCheck3 = mysqli_num_rows($result3);

        if ($resultCheck3 > 0) {
           //pintamos verde
           echo'<div style="background-color: orange;">Ponente</div>';
        }else{
           //pintamos rojo
           //echo'<div style="background-color: red;">No inscrito</div>';
        }



        //Y pintamos colores al lado
    }
      

    /* $sql2 = "INSERT INTO `personas` (`Id_persona`, `Nombre`, `Apellido1`, `Apellido2`) VALUES (NULL, '$nombre', '$apellido1', '$apellido2');";
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
  }  */
} else {
    echo "No se han encontrado actos para ese día";
}
