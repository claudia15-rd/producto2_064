<?php

require_once('../dbh2.php');
$titulo   = $_POST['titulo'];


//Comprobamos que el tipo de acto existe
$sql = "SELECT * FROM `actos` WHERE `actos`.`titulo` = '$titulo';";
$result = mysqli_query($conn, $sql);
$resultCheck = mysqli_num_rows($result);

if ($resultCheck > 0) {
    echo "Acto encontrado";
    echo "<br>";
    echo "Información identificativa:";
    echo "<br>";
    //Aquí habría que pintar en un formulario los datos del acto para poderlos modificar...
    while ($row = mysqli_fetch_assoc($result)) {
        $id_acto      = $row['Id_acto']; //id
        echo "Acto nº: ", $id_acto;
        echo "<br>";
        //Fecha
        $fecha      = $row['Fecha']; //
        echo "Fecha: ", $fecha;
        echo "<br>";

        //hora
        $hora      = $row['Hora']; //
        echo "Hora: ", $hora;
        echo "<br>";

        //titulo
        $titulo      = $row['Titulo']; //
        echo "Título: ", $titulo;
        echo "<br>";
    }

    echo "Reenvíe los datos del formulario con la nueva información: ";
    echo '<br>';
    echo '<form action="../modelo/acto_upd.php" method="post">';
    echo '<label for="fecha">Día</label>';
    echo '<input type="date" id="fecha" name="fecha" /></br>';
    echo '<label for="id_acto">Acto</label>';
    echo "<input type='number' name='id_acto' value='".$id_acto."'>";
    echo '<label for="hora">Hora</label>';
    echo '<input type="time" id="hora" name="hora" /></br>';
    echo '<label for="titulo">Título</label>';
    echo '<input type="text" id="titulo" name="titulo" /></br>';
    echo '<label for="descrip_act">Tipo de acto</label>';
    echo '<input type="text" id="descrip_act" name="descrip_act" /></br>';
    echo '<label>Additional Comments:</label><br>
   <textarea cols="35" rows="12" name="comments" id="para1">
   <php echo $comments; ?>
   </textarea><br>';

    echo '<input type="submit" value="Enviar"/>';
    echo '</form>';

    /* echo '<a href=/vistas/crear_inscrito_acto.php>Agregar inscritos al acto</a></br>';
    echo '<a href=borrar_inscrito_acto.php>Borrar inscritos al acto</a></br>';
    echo '<a href=/vistas/crear_ponente_acto.php>Agregar ponentes del acto</a></br>';    
    echo '<a href=borrar_ponente_acto.php>Borrarar ponentes del acto</a></br>';   */
} else {
    echo "El acto no existe";
}
