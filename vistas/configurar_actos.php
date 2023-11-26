<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Configurar actos</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js"></script>      
</head>
<body>
      <h1>Configurar detalles de acto</h1>
      <h2>Informe título de acto a Configurar</h2>
      <form action="../modelo/acto_configurar.php" method="post">
      <label for="titulo">Título</label>
      <input type="text" id="titulo" name="titulo" /></br>
      <input type="submit" value="Enviar"/>    
      </br>
    <a href=/vistas/crear_inscrito_acto.php>Agregar inscritos a un acto</a></br>
    <a href=borrar_inscrito_acto.php>Borrar inscritos de un acto</a></br>
    <a href=/vistas/crear_ponente_acto.php>Agregar ponentes a un acto</a></br>    
    <a href=borrar_ponente_acto.php>Borrarar ponentes de un acto</a></br>

</body>
</html>