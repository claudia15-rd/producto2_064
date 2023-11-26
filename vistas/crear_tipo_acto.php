<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js"></script>      
    <title>Crear tipo de acto</title>
</head>
<body>
    <p>Inserte tipo de acto</p>
    <form action="../modelo/tipo_act_ins.php" method="post">
      <label for="descrip_act">Tipo de acto</label>
      <input type="text" id="descrip_act" name="descrip_act" /></br>   
      <input type="submit" value="Enviar"/>
    </form>
    
</body>
</html>