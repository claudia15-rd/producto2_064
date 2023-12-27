<!DOCTYPE html>
<html>
<head>
    <title>Registro de Usuario</title>
    <link rel="stylesheet" type="text/css" href="/css/registro.css">
</head>
<body class="background">

<div class="formulario-registro">
    <h2>Login</h2>
    <form action="/login" method="post">
        @csrf
        <input type="text" name="username" placeholder="Usuario" required>
        <input type="password" name="password" placeholder="Contraseña" required>
        <?php
            if (!empty($error)){
                echo "<p class='error'>Usuario o Contraseña incorrectos</p>";
            }
        ?>
        <a href="/registro">Registrate Aquí</a>
        <button type="submit">Entrar</button>
    </form>
</div>

</body>
</html>