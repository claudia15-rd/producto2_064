<?php
require_once('../dbh2.php');
$nombre  = $_POST['nombre'];
$apellido1  = $_POST['apellido1'];
$apellido2  = $_POST['apellido2'];

echo "Nombre: ", $nombre;
echo "<br>";
echo "Apelldo1: ", $apellido1;
echo "<br>";
echo "Apellido2 ", $apellido2;
echo "<br>";

//$sql3 = "SELECT * FROM `personas` WHERE `Nombre` = '$nombre' AND `Apellido1` = '$apellido1' AND `Apellido2` = '$apellido2'";
$sql3 = "SELECT * FROM `personas` WHERE `Nombre` = '$nombre' AND `Apellido1` = '$apellido1' AND `Apellido2` = '$apellido2'";

// Ejecutar la consulta
//if ($conn->query($sql3) === TRUE) {

    $result3 = mysqli_query($conn, $sql3);
    while ($row = mysqli_fetch_assoc($result3)) {
        $id_persona = $row['Id_persona'];
        echo "Ponente encontrado, procedemos al borrado";
        echo "<br>";
        $sql4 = "DELETE FROM `personas` WHERE `personas`.`Id_persona` = '$id_persona'";
        // Ejecutar la consulta
        if ($conn->query($sql4) === TRUE) {
            echo "Borrado exitoso del ponente";
            echo "<br>";
        } else {
            echo "Error en el borrado del ponente" . $conn->error;
        }
    }
//} else {
//    echo "Error ponente no encontrado" . $conn->error;
//}
