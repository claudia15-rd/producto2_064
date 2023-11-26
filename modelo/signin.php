<?php
require_once('../dbh2.php');

$usuario2  = $_POST['usuario'];
$password = $_POST['password'];


// En el inicio de tu script o aplicación
session_start();

// Establecer una variable de sesión
$_SESSION['usuario'] = "$usuario2";

$sql = "SELECT * FROM `usuarios` WHERE `Username` = '$usuario2'";
$result = mysqli_query($conn, $sql);
$resultCheck = mysqli_num_rows($result);

if ($resultCheck > 0) {
  echo "Usuario encontrado "; //deberíamos ir a aplicación eventos
  while ($row = mysqli_fetch_assoc($result)) {
    echo "<br>";
    echo $row['Username'];

    // Establecer una variable de sesión
     $_SESSION['id_persona'] = $row['Id_Persona'];

    echo "<br>";
    $tipo_us = $row['Id_tipo_usuario'];
    if ($tipo_us == 1) {
      echo "Bienvenido al panel de administración!"; //deberíamos ir a aplicación eventos   
      echo "<br>";
      echo '<a href="/vistas/tipos_actos.php">Administrar tipos de actos</a>';
      echo "<br>";
      echo '<a href="/vistas/ponentes.php">Administrar ponentes</a>';
      echo "<br>";
      echo '<a href="/vistas/actos.php">Administrar actos</a>';
    } else {
      echo '<a href="/vistas/eventos.php">Ir la aplicación de eventos</a>';
    }
  }
} else {
  /*Crear el usuario con los datos de persona y usuario*/
  echo "Usuario no registrado. Por favor: inserte datos de nuevo usuario";
  echo "<br>";
  echo '<a href="/vistas/signup.php">Darse de alta</a>';
}


/*$sql = "SELECT * FROM `usuarios`;";
  $result = mysqli_query($conn,$sql);
  $resultCheck = mysqli_num_rows($result);

  if ($resultCheck > 0) {
    echo "No eres el primer usuario!";
    while ($row = mysqli_fetch_assoc($result)){        
        echo "<br>";
        echo $row['Username'];
    }
  } else{
  printf("Nº usuarios registrados: ", $resultCheck);
   $nombre = "Juan";
  printf("Hola, %s!", $nombre);   
    echo "Sí eres el primer usuario!";
  }  */
