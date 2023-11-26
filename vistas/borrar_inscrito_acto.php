<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js"></script>      
    <title>Inscribir en acto</title>
</head>
<body>
<form action="../modelo/acto_inscrito_del.php" method="post">    
<label for="titulo">Título</label>   
<input type="text" id="titulo" name="titulo" /></br>
<label for="usuario">Usuario</label>  
<input type="text" id="usuario" name="usuario" /></br>
<input type="submit" value="Enviar"/>
</body>
</html>