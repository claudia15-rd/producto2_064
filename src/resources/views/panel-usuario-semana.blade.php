@php
    $meses = ['Enero','Febrero','Marzo','Abril','Mayo','Junio','Julio','Agosto','Septiembre','Octubre','Noviembre','Diciembre'];
@endphp

<!DOCTYPE html>
<html>
<head>
    <title>Calendario de Usuario</title>
    <link rel="stylesheet" type="text/css" href="/css/encabezado.css">
    <link rel="stylesheet" type="text/css" href="/css/panel-usuario.css">
</head>
<body>

<div class="encabezado">

        <h2>EventosApp</h2>
     
        <div class="encabezado-menu">
            <div class="menu-item-container">
                <a class="menu-item" id="verDia" href="/panelusuario/dia">Día</a>
            </div>
            <div class="menu-item-container selected-menu">
                <a class="menu-item" id="verSemana" href="/panelusuario/semana">Semana</a>
            </div>
            <div class="menu-item-container">
                <a class="menu-item" id="verMes" href="/panelusuario/mes">Mes</a>
            </div>
            <div class="menu-item-container">
                <a class="menu-item" id="verSemana" href="/panelusuario/perfil">Mi perfil</a>
            </div>
        </div>
        <div class="menu-item-container">
            <a class="menu-item" href="/logout">Cerrar Sesión</a>
        </div>
</div>

<div class="calendario-container">
    <div class="calendario">

        
        @foreach($periodo as $fecha)
            @php
                $fechaFormateada = $fecha->format('Y-m-d');
                [$anio, $mes, $dia] = explode('-', $fechaFormateada);
            @endphp
            <div class='mes' style='margin: 0;'> {{$dia}} de {{$meses[$mes-1]}} de {{$anio}} </div>
            @if(isset($eventos[$fechaFormateada]) && count($eventos[$fechaFormateada]) > 0)
                <div class='contenedor-eventos' style='margin-bottom: 1rem;'>
                    @foreach($eventos[$fechaFormateada] as $evento)
                        @php
                            $suscribed = session('personId') == $evento->Id_persona;
                            $suscrito = $suscribed?'evento-suscrito':'';
                            $action = $suscribed?'unsuscribe':'suscribe';
                        @endphp
                        <form action='/panelusuario/semana?action={{$action}}&dia={{$dia}}&mes={{$mes}}&anio={{$anio}}' 
                            method='POST' class='evento {{$suscrito}}'>
                            @csrf
                            <input type='text' name='acto' hidden value={{$evento->Id_acto}}></input>
                            <input type='number' name='inscripcion' hidden value={{$evento->Id_inscripcion}}></input>
                            <button type='submit'>
                                <div class='evento-info'>
                                    <p><span class='evento-titulo'>{{$evento->Titulo}}</span> a las {{$evento->Hora}}</p>
                                    <p class='evento-hora'>{{$evento->Descripcion_corta}}</p>
                                    <p>Asistentes: {{$evento->Num_asistentes}}</p>
                                </div>
                            </button>
                        </form>
                    @endforeach
                </div>
            @else
                <div>-- No hay eventos para este día --</div>
            @endif
        @endforeach
    </div>
</div>

</body>
</html>
