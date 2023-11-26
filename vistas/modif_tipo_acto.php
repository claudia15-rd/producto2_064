<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js"></script>      
    <title>Modificar tipo de acto</title>
</head>
<body>
<p>Modifique tipo de acto</p>
    <form action="../modelo/tipo_act_upd.php" method="post">
      <label for="descrip_act">Descripción antigua Tipo de acto</label>
      <input type="text" id="descrip_act" name="descrip_act" /></br>   
      <label for="descrip_act_new">Descripción nueva Tipo de acto</label>
      <input type="text" id="descrip_act_new" name="descrip_act_new" /></br>         
      <input type="submit" value="Enviar"/>
    </form>    
</body>
</html>