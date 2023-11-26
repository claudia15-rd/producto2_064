<?php
  require_once('../dbh2.php');
  $usuario  = $_POST['usuario'];
  $usuario_nuevo  = $_POST['usuario_nuevo'];
  $password_nueva = $_POST['password_nueva'];  

  $sql = "SELECT * FROM `usuarios` WHERE `Username` = '$usuario'";
  $result = mysqli_query($conn,$sql);
  $resultCheck = mysqli_num_rows($result);

  if ($resultCheck > 0) {
    echo "Usuario antiguo encontrado, procedemos a modificación"; 
    echo "<br>";
    $sql2 = "UPDATE `usuarios` SET `Username` = '$usuario_nuevo', `Password` = '$password_nueva'  WHERE `Username` = '$usuario'";    
    $result2 = mysqli_query($conn,$sql2);

    $sql3 = "SELECT * FROM `usuarios` WHERE `Username` = '$usuario_nuevo'";
    $result3 = mysqli_query($conn,$sql3);
    $resultCheck3 = mysqli_num_rows($result3);
  
    echo "<br>";
    if ($resultCheck3 > 0) {
      echo "Usuario modificado con éxito!"; //deberíamos ir a aplicación eventos
      } else{
        echo "Usuario no modificado!"; //deberíamos ir a aplicación eventos        
      }

  }

?>  