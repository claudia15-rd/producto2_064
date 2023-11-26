<!DOCTYPE html>
<html lang=”es”>

<head>
    <meta charset=”UTF-8”>
    <meta name=”viewport” content=”width=device-width, initial-scale=1.0”>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js"></script>    
    <title>Acceso</title>
</head>

<body>
    <h1>Accede a la aplicación de eventos</h1>
    <p>Introduce correo y contraseña</p>
    <form action="../modelo/signin.php" method="post">
      <label for="usuario">Usuario</label>
      <input type="text" id="usuario" name="usuario" /></br>
      <label for="password">Contraseña</label>
      <input type="password" id="password" name="password"/>      
      <input type="submit" value="Enviar"/>

    </form>

    </br>
    <a href=signup.php>Darse de alta</a>
    </br>
    <a href=modifuser.php>Modificar datos de usuario</a>
    </br>
    <a href=../index.php>Ir inicio</a>
</body>

</html>