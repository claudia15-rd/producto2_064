
<?php 
        include("conexion.php");
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Regirtro de administrador </title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
     crossorigin="anonymous" referrerpolicy="no-referrer" />
     <link rel="stylesheet" href="./registro.css">
</head>
<body>
   
    <div class=" form-contenido">
       
 <form method="post" autocomplete="off">
    <h2>Registrate</h2>
    
   <div class="grupo-contenedor">
     <div class="form-contenedor">
         <label for="name">Nombre</label>
         <input type="text"  name="nombre" placeholder="Nombre">
       </div>
       <div class="grupo-contenedor">
       <div clas="form-contenedor">
         <label for="primer apellido">Primer apellido</label>
         <input type="text" name="primerapellido" placeholder="Primer apellido">
       </div>
       </div>
    
       <div class="grupo-contenedor">
      <div clas="form-contenedor">
         <label for="segundo apellido">Segundo apellido</label>
         <input type="text" name="segundoapellido" placeholder="Segundo apellido">
     </div>
      <div class="form-contenedor">
         <label for="usurio">Usurio</label>
        <input type="text"  name ="usuario" placeholder="Usurio">
    </div>
    </div>
 
    
<div class="grupo-contenedor">
    <div clas="form-contenedor">
         <label for="password">Contraseña</label>
         <input type="password" name="contraseña"  placeholder="Contraseña">
     </div>
     </div>
     <div class="grupo-contenedor">
         <div clas="form-contenedor">
         <label for="email">Correo electronico</label>
         <input type="email" name="email" placeholder="Correo electronico">
       </div>
     
         <div class="form-contenedor">
             <label for="tipo usurio"  >Tipos de usuarios</label>
             <select name="tipoUsuario">
             <?php
                
                $consulta="SELECT * FROM tipos_usuarios";
                if($result = mysqli_query($conex,$consulta))
                {
                    if(mysqli_num_rows($result) > 0 )
                    {
                        while($row=mysqli_fetch_array($result))
                        {
                            echo "<option value='$row[Descripcion]'>$row[Descripcion]</options>";
                        }
                    }
                }
                ?>
                </select>             
         </div>
        </div>
        <div>
             <a href="#" class="termino">Terminos y condiciones</a>
          </div>  
      
         <div>
        <input type="submit"  name ="contact"  class="boton" value="Registrate">

        </div>
    </form>

</div>

<?php include("contacto.php");
       
?>

</body>
</html>