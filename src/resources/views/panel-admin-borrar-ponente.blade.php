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
                <a class="menu-item" id="verDia" href="/paneladmin/actos">Actos</a>
            </div>
            <div class="menu-item-container">
                <a class="menu-item" id="verSemana" href="/paneladmin/acto/crear">Crear Acto</a>
            </div>
            <div class="menu-item-container selected-menu">
                <a class="menu-item" id="verMes" href="/paneladmin/tipoacto/crear">Crear Tipo Acto</a>
            </div>
            <div class="menu-item-container">
                <a class="menu-item" id="verSemana" href="/paneladmin/perfil">Mi perfil</a>
            </div>
        </div>
        <div class="menu-item-container">
            <a class="menu-item" href="/logout">Cerrar Sesión</a>
        </div>
    </div>
    <div class="panel-admin">
        <h2>Panel de Administración</h2>

        <!-- Creación de Actos -->
        <section class="creacion-actos">
            <h2>Borrar ponente</h2>
            <form action="/paneladmin/ponente/borrar" method="GET">

                <div class="calendario-container">
                    <div class="calendario">
                        @if(isset($ponentes) && count($ponentes) > 0)
                        <div class='contenedor-eventos'>
                            @foreach($ponentes as $ponente)
                            @php
                            $user = $ponente->Username                            
                            @endphp
                            <form action="/paneladmin/ponente/borrar" method="GET">
                                @csrf
                                @csrf
                                <input type="hidden" name="user" value="{{$user}}"> 
                                <button type='submit'>
                                    <div class='evento-ponente'>
                                        <p>Ponente: {{$user}}
                                    </div>
                                    <div class='evento-actions'>

                                    </div>
                                </button>
                            </form>
                            @endforeach
                        </div>
                        @else
                        <div>-- No hay eventos para este día --</div>
                        @endif
            </form>
        </section>
    </div>

</body>

</html>