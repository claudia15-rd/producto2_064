<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js"></script>      
    <title>Document</title>
</head>
<body>
<h1>Modificar ponente</h1>
    <form action="../modelo/ponente_upd.php" method="post">
      <label for="nombre">Nombre anterior</label>  
      <input type="text" id="nombre" name="nombre" /></br>      
      <label for="apellido1">Apellido1 anterior</label>
      <input type="text" id="apellido1" name="apellido1" /></br>
      <label for="apellido2">Apellido2 anterior</label>
      <input type="text" id="apellido2" name="apellido2" /></br> 
      
      <label for="nombre_new">Nombre nuevo</label>  
      <input type="text" id="nombre_new" name="nombre_new" /></br>      
      <label for="apellido1_new">Apellido1 nuevo</label>
      <input type="text" id="apellido1_new" name="apellido1_new" /></br>
      <label for="apellido2_new">Apellido2 nuevo</label>
      <input type="text" id="apellido2_new" name="apellido2_new" /></br> 



      <input type="submit" value="Enviar"/>
    </form>    
</body>
</html>