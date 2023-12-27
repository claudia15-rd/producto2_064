<!DOCTYPE html>
<html>
<head>
    <title>Formulario de Inscripcion</title>
    <link rel="stylesheet" type="text/css" href="/css/registro.css">
</head>
<body class="background">

<div class="formulario-registro">
    <h2>Formulario de Inscripcion</h2>
    <form action="/formulario/inscripcion?id={{$acto}}" method="post">
        @csrf
        <input type="text" name="nombre" placeholder="Nombre" required>
        <input type="text" name="primerApellido" placeholder="Primer Apellido" required>
        <input type="text" name="segundoApellido" placeholder="Segundo Apellido">
        <!-- <input type="email" name="correo" placeholder="Correo Electrónico" required> -->
        <input type="text" name="username" placeholder="Usuario" required>
        <input type="password" name="password" placeholder="Contraseña" required>
        
        <button type="submit">Inscribirse</button>
    </form>
</div>

</body>
</html>