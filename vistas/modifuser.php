<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js"></script>      
    <title>Modificar usuario</title>
</head>
<body>
    <h1>Modificar usuario</h1>
    <form action="../modelo/persona_upd.php" method="post">
      <label for="usuario">Usuario</label>      
      <input type="text" id="usuario" name="usuario" /></br>            

      <label for="usuario_nuevo">Nuevo usuario</label>      
      <input type="text" id="usuario_nuevo" name="usuario_nuevo" /></br>            
      <label for="password_nueva">Nueva Contraseña</label>
      <input type="password" id="password_nueva" name="password_nueva"/></br>
      
      <input type="submit" value="Enviar"/>

    </form>    
</body>
</html>