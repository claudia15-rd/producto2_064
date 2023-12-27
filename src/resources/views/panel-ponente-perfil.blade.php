<!DOCTYPE html>
<html>
<head>
    <title>Mi Perfil</title>
    <link rel="stylesheet" type="text/css" href="/css/encabezado.css">
    <link rel="stylesheet" type="text/css" href="/css/panel-admin.css">
</head>
<body>
<div class="encabezado">

        <h2>EventosApp</h2>
     
        <div class="encabezado-menu">
            <div class="menu-item-container">
                <a class="menu-item" id="verDia" href="/panelponente/futuros">Próximos Eventos</a>
            </div>
            <div class="menu-item-container">
                <a class="menu-item" id="verSemana" href="/panelponente/pasados">Eventos Pasados</a>
            </div>
            <div class="menu-item-container selected-menu">
                <a class="menu-item" id="verSemana" href="/panelponente/perfil">Mi perfil</a>
            </div>
        </div>
        <div class="menu-item-container">
            <a class="menu-item" href="/logout">Cerrar Sesión</a>
        </div>
</div>
<div class="panel-admin">
    <!-- Creación de Actos -->
    <section class="creacion-actos">
        <h2>Mi Perfil</h2>
        <form action="/panelponente/perfil" method="post">
            @csrf
            <input type="text" name="nombre" value='{{$persona->Nombre}}' placeholder="Nombre" required>
            <input type="text" name="primerApellido" value='{{$persona->Apellido1}}' placeholder="Primer Apellido" required>
            <input type="text" name="segundoApellido" value='{{$persona->Apellido2}}' placeholder="Segundo Apellido">
            <!-- <input type="email" name="correo" placeholder="Correo Electrónico" required> -->
            <input type="text" name="username" value='{{$usuario->Username}}' placeholder="Usuario" required>
            <input type="password" name="password" placeholder="Contraseña">
            
            <button class="form-submit-button" type="submit">Guardar Cambios</button>
        </form>
    </section>
</div>

</body>
</html>