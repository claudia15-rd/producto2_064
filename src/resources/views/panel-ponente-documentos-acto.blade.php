<!DOCTYPE html>
<html>
<head>
    <title>Panel de Administración</title>
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
                <a class="menu-item" id="verSemana" href="/panelponente/documentos">Documentos Acto</a>
            </div>
        </div>
        <div class="menu-item-container">
            <a class="menu-item" href="/logout">Cerrar Sesión</a>
        </div>
</div>
<div class="panel-admin">
    <h2>Panel de Ponentes</h2>

    <!-- Creación de Actos -->
    <section class="creacion-actos">
        <h2>Documentos Acto</h2>
        <br>
            <form action='/panelponente/documento/upload?id={{$acto}}' method='POST' enctype="multipart/form-data">
                @csrf
                <input type="file" name="documento">
                <button class='form-submit-button' type='submit'>Subir Documento</button>
            </form>            
    </section>
</div>

</body>
</html>