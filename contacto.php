<?php
include("conexion.php");

if(isset($_POST['contact']))
{

    if(
        strlen ($_POST['nombre'])>= 1  &&
        strlen ($_POST['primerapellido'])>= 1  &&
        strlen ($_POST['segundoapellido'])>= 1  &&
        strlen ($_POST['usuario'])>= 1  &&
        strlen ($_POST['contraseña'])>= 1  &&
        strlen ($_POST['email'])>=  1
    ) 
    {
        $name = trim($_POST['nombre']);
        $primerapellido = trim($_POST['primerapellido']);
        $segundoapellido = trim($_POST['segundoapellido']);
        $usuario = trim($_POST['usuario']);
        $contraseña = trim($_POST['contraseña']);
        $email = trim($_POST['email']);
        $fecha = date("d/m/a");
        $tipo=trim($_POST['tipoUsuario']);

        //Con esto lo que vamos hacer es que no se pueda repetir un mismo usuario
        $noRepetido="SELECT * FROM usuarios WHERE Username='$usuario'" ;
        
        $existe=mysqli_query($conex,$noRepetido);
        if (mysqli_num_rows($existe) > 0 )
        {
            ?>
                <h1 class="error">Este usuario ya existe.</h1>
            <?php
        }
        else 
        {

            //Insertamos en la tabla persona
            $insertoPersonas ="INSERT INTO personas (Nombre , Apellido1 ,Apellido2)
            VALUE ('$name', '$primerapellido', '$segundoapellido')";
             $resultadoPersona = mysqli_query($conex, $insertoPersonas);
             $IdPersonas=mysqli_insert_id($conex);
             //////////////////////////////////////////////////////

             //Consulta Tipo Usuario
             
             $consultaTipoUsuario="SELECT Id_tipo_usuario FROM tipos_usuarios WHERE Descripcion='$tipo'";
             $resultadoTipoUsuario=mysqli_query($conex, $consultaTipoUsuario);
             $recojoTipoId=mysqli_fetch_array($resultadoTipoUsuario);
             /////////////////////////////////////////

             //Inserto todos los datos en Usuario
             $insertoUsuario="INSERT INTO usuarios (Username, Password, Id_Persona, Id_tipo_usuario)
             VALUE ('$usuario', '$contraseña', '$IdPersonas','$recojoTipoId[0]')";
             $resultadoUsuario=mysqli_query($conex, $insertoUsuario);
             ////////////////////////////////////////////////////////

  
             if ($resultadoUsuario)
             {
                ?>
               <h3 class="success">Tu registro se ha completado</h3>
                  <?php
                  //header("Location: http://localhost/procducto2_064/login.php");
                  header("Location: http:/./procducto2_064/login.php");
             } else
             {
                ?>
                     <h3 class="error">Ocurrio un error de conexion</h3>
                  <?php
              }
        }

        











           

       
    } 
    else 
    { 
        ?> 
            <h3 class="error">Rellena todos los campos</h3> 
        <?php
    }
}


?>