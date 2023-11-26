<?php
include("conexion.php");

if(isset($_POST['IntroduceEvento']))
{
    $fecha = $_POST['fecha'];
    $hora = $_POST['hora'];
    $tipo = $_POST['tipo'];
    $titulo = $_POST['titulo'];
    $descripcionCorta = $_POST['descripcionCorta'];
    $descripcionLarga = $_POST['descripcionLarga'];
    $numero = $_POST['numero'];
}

    // Primero vamos a sacar el id de tipo de acto
    $id_acto="SELECT Id_tipo_acto FROM tipo_acto WHERE Descripcion='$tipo'";
    $resultadoIdTipoActo = mysqli_query($conex,$id_acto);
    $recojoIDTipoActo= mysqli_fetch_array($resultadoIdTipoActo);
    //////////////////////////////////////////

    //Creamos el envento
     $eventoCompleto ="INSERT INTO actos (Fecha , Hora , Titulo, Descripcion_corta, Descripcion_larga, Num_asistentes, Id_tipo_acto)
    VALUES ('$fecha', '$hora', '$titulo', '$descripcionCorta', '$descripcionLarga','$numero','$recojoIDTipoActo[0]')";
    $resultadoEvento=mysqli_query($conex, $eventoCompleto);
    if ($resultadoEvento)
    {
        echo 'Se creo correctamente.';
    }
    else 
    {
        echo 'Hay problemas para crear el evento.';
    }
    ////////////////////////////////////////////////////

?>