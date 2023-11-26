<!DOCTYPE html>
<html>
<head>
    <title>Registro de Usuario</title>
    <link rel="stylesheet" type="text/css" href="registro.css">
</head>
<body class="background">

<div class="formulario-registro">
    <h2>Registro de Usuario</h2>
    <form action="procesar_registro.php" method="post">
        <input type="text" name="nombre" placeholder="Nombre" required>
        <input type="text" name="primerApellido" placeholder="Primer Apellido" required>
        <input type="text" name="segundoApellido" placeholder="Segundo Apellido">
        <input type="email" name="correo" placeholder="Correo Electrónico" required>
        <input type="text" name="usuario" placeholder="Usuario" required>
        <input type="password" name="contrasena" placeholder="Contraseña" required>
        
        <div class="tipo-usuario">
            <p>Tipo de Usuario:</p>
            <select name="tipoUsuario" id="tipoUsuario" required>
                <option value="administrador">Administrador</option>
                <option value="usuario">Usuario</option>
                <option value="ponente">Ponente</option>
            </select>
        </div>
        
        <button type="submit">Registrarse</button>
    </form>
</div>

</body>
</html>