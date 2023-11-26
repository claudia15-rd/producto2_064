<?php
require_once('../dbh2.php');
$titulo   = $_POST['titulo'];
$usuario  = $_POST['usuario'];

//Comprobamos que el acto existe
$sql = "SELECT * FROM `actos` WHERE `actos`.`titulo` = '$titulo';";
$result = mysqli_query($conn, $sql);
$resultCheck = mysqli_num_rows($result);
if ($resultCheck > 0) {
    echo "Acto encontrado";
    echo "<br>";
    while ($row = mysqli_fetch_assoc($result)) {
        $id_acto      = $row['Id_acto'];
        echo "Acto encontrado con nº: ", $id_acto;
        //Comprobamos que existe el usuario 
        $sql2 = "SELECT * FROM `usuarios` WHERE `usuarios`.`Username` = '$usuario';";
        $result2 = mysqli_query($conn, $sql2);
        $resultCheck2 = mysqli_num_rows($result2);
        if ($resultCheck2 > 0) {
            while ($row2 = mysqli_fetch_assoc($result2)) {
            $id_persona     = $row2['Id_Persona'];
            echo "<br>";
            echo "Usuario encontrado, con id_persona: ", $id_persona;
            echo "<br>";
            $sql3 = "DELETE FROM `lista_ponentes` where `lista_ponentes`.`id_acto` = '$id_acto' and `lista_ponentes`.`Id_persona` = '$id_persona';";
            // Ejecutar la consulta
            if ($conn->query($sql3) === TRUE) {
                echo "Ponente borrado del acto";
                echo "<br>";
            } else {
                echo "Error al borrar ponente del acto" . $conn->error;
            }
        }

        } else {
            echo "Error. El usuario existe.";
        }
    }
} else {
    echo "El acto no existe. Créelo en administración de actos-crear";
}
