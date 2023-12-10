<!DOCTYPE html>
<html>
<head>
    <title>Registro de Usuario</title>
    <link rel="stylesheet" type="text/css" href="/css/registro.css">
</head>
<body class="background">

<div class="formulario-registro">
    <h2>Registro de Usuario</h2>
    <form action="/registro" method="post">
        @csrf
        <input type="text" name="nombre" placeholder="Nombre" required>
        <input type="text" name="primerApellido" placeholder="Primer Apellido" required>
        <input type="text" name="segundoApellido" placeholder="Segundo Apellido">
        <!-- <input type="email" name="correo" placeholder="Correo Electrónico" required> -->
        <input type="text" name="username" placeholder="Usuario" required>
        <input type="password" name="password" placeholder="Contraseña" required>
        
        <div class="tipo-usuario">
            <p>Tipo de Usuario:</p>
            <select name="usertype" id="usertype" required>
                <?php 
                    foreach ($usertypes as $usertype) {
                        $id = $usertype['Id_tipo_usuario'];
                        $nombre = $usertype['Descripcion'];
                        echo "<option value='$id'>$nombre</option>";
                    }
                ?>
            </select>
        </div>
        
        <button type="submit">Registrarse</button>
    </form>
</div>

</body>
</html>