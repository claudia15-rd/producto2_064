<?php  
    $host="localhost";
	$usuario = "root";
	$clave = "";
	$db = "eventos";
	$puerto = "3305";

    $conn =mysqli_connect($host, 
    $usuario, 
    $clave, 
    $db,
    $puerto);

    if (mysqli_connect_errno()) {
        print "Error al conectarse a la base de datos.";
        exit();
    } else { 
        //print "Conexión exitosa ";
    }
    
?>    