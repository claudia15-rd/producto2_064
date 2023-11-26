<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js"></script>
    <title>Vista diaria de eventos</title>
</head>

<body>
    <p>Introduce fecha</p>
    <form action="../modelo/diaria_read.php" method="post">
        <label for="fecha">Día</label>
        <input type="date" id="fecha" name="fecha" /></br>
        <input type="submit" value="Enviar" />

</body>

</html>