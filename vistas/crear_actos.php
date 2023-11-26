<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear actos</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js"></script>      
</head>

<body>
    <h2>Crear acto</h2>
    <form action="../modelo/acto_ins.php" method="post">
      <label for="fecha">Día</label>  
      <input type="date" id="fecha" name="fecha" /></br> 
      <label for="hora">Hora</label>  
      <input type="time" id="hora" name="hora" /></br>            
      <label for="titulo">Título</label>
      <input type="text" id="titulo" name="titulo" /></br>
      <label for="descrip_act">Tipo de acto</label>
      <input type="text" id="descrip_act" name="descrip_act" /></br>
      <label>Additional Comments:</label><br>
    <textarea cols="35" rows="12" name="comments" id="para1">
    <php echo $comments; ?>
    </textarea><br>
      <input type="submit" value="Enviar"/>
    </form>
    <a href=crear_inscrito_acto.php>Agregar inscritos al acto</a></br>       
    <a href=crear_ponente_acto.php>Agregar ponentes al acto</a></br> 
</br>       
</body>

</html>