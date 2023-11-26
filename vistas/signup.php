<!DOCTYPE html>
<html lang=”es”>

<head>
    <meta charset=”UTF-8”>
    <meta name=”viewport” content=”width=device-width, initial-scale=1.0”>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js"></script>      
    <title>Nuevo usuario</title>
</head>

<body>
    <h1>Inserte nuevos datos de usuario</h1>
    <form action="../modelo/persona_ins.php" method="post">
      <label for="nombre">Nombre</label>  
      <input type="text" id="nombre" name="nombre" /></br>      
      <label for="apellido1">Apellido1</label>
      <input type="text" id="apellido1" name="apellido1" /></br>
      <label for="apellido2">Apellido2</label>
      <input type="text" id="apellido2" name="apellido2" /></br>      
      <label for="usuario">Usuario</label>  
      <input type="text" id="usuario" name="usuario" /></br>            
      <label for="password">Contraseña</label>
      <input type="password" id="password" name="password"/></br>  
      <label for="tipous">Tipo de usuario 1-Administrador 2-Usuario</label> 
      <select name="tipous" id="tipous">
       <option value="1">1</option>
       <option value="2">2</option>
      </select>     
      </br>  
      <input type="submit" value="Enviar"/>

    </form>

    </br>
    <a href=../index.php>Ir inicio</a>
</body>

</html>