<?php
include("conexion.php");

if(isset($_POST['contacto']))
{
    $usuario = $_POST["usuario"];
    $contraseña = $_POST["contraseña"];
    //Valido en la bd y miro si existe
    $consulta="SELECT * FROM usuarios WHERE Username='$usuario' AND Password='$contraseña'";
    $existe=mysqli_query($conex,$consulta);
    $recojoExisteDescripcionId=mysqli_fetch_array($existe);
    //////////////////////////////////////////////////////////

    if (mysqli_num_rows($existe) > 0 )
    {
        //echo $recojoExisteDescripcionId[0];
        //Existe y ahora tengo que saber que tipo de usuario es para mostrar pantallas
        $consultaTipoUsuario="SELECT Descripcion FROM tipos_usuarios WHERE Id_Tipo_Usuario='$recojoExisteDescripcionId[4]'";
        echo $consultaTipoUsuario;
       
        $existe=mysqli_query($conex,$consultaTipoUsuario);

        $recojoExisteDescripcion=mysqli_fetch_array($existe);
        //////////////////////////////////////////////////////////////
        //echo $recojoExisteDescripcion[0];
       if (strtoupper($recojoExisteDescripcion[0])=="ADMINISTRADOR")
       {
        header("Location: /./procducto2_064/panel.php");
         
       }
       elseif (strtoupper($recojoExisteDescripcion[0])=="USUARIO")
       {
        header("Location: /./procducto2_064/user.php");
           
           
       }
       elseif (strtoupper($recojoExisteDescripcion[0])=="PONENTE")
       {
        header("Location: /./procducto2_064/ponente.html");
       }
       else 
       {
        echo "No existe el tipo de usuario.";
       }
        
        
        
        
    }
    else
    {
        ?>
        <h3 class="error">El usuario no está dado de alta</h3>
        <?php
    }
}

