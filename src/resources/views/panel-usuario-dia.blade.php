<?php
$diaSel = isset($diaSel)? $diaSel: date('d');
$mes = isset($mesSel)? $mesSel: date('m');
$anio = isset($anioSel)? $anioSel: date('Y');
$meses = ['Enero','Febrero','Marzo','Abril','Mayo','Junio','Julio','Agosto','Septiembre','Octubre','Noviembre','Diciembre'];
$mesint = $mes - 1;
$inicioDelMesSiguiente = mktime(0, 0, 0, $mes + 1, 1, $anio);
$primerDiaMes = mktime(0, 0, 0, $mes, 1, $anio);
$diaDeLaSemana = date('w', $primerDiaMes);
// Restar un día para obtener el último día del mes actual
$ultimoDiaDelMes = strtotime('-1 day', $inicioDelMesSiguiente);

// Formatear para obtener solo el día
$numeroDeDias = date('d', $ultimoDiaDelMes);
?>

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
            <div class="menu-item-container selected-menu">
                <a class="menu-item" id="verDia" href="/panelusuario/dia">Día</a>
            </div>
            <div class="menu-item-container">
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
            @if(isset($diaSel))
                <div class='mes'> {{$diaSel}} de {{$meses[$mesint]}} de {{$anio}}  </div>
                @if(isset($eventos) && count($eventos) > 0)
                    <div class='contenedor-eventos'>
                        @foreach($eventos as $evento)
                            @php
                                $suscribed = session('personId') == $evento->Id_persona;
                                $suscrito = $suscribed?'evento-suscrito':'';
                                $action = $suscribed?'unsuscribe':'suscribe';
                                $idevento = $evento->Id_acto;
                                $idInscripcion = $evento->Id_inscripcion;
                                $titulo = $evento->Titulo;
                                $descripcion = $evento->Descripcion_corta;
                                $hora = $evento->Hora;
                                $asistentes = $evento->Num_asistentes;
                            @endphp
                            <form action='/panelusuario/dia?action={{$action}}&dia={{$diaSel}}&mes={{$mes}}&anio={{$anio}}' 
                                method='POST' class='evento {{$suscrito}}'>
                                @csrf
                                <input type='text' name='acto' hidden value='{{$idevento}}'></input>
                                <input type='number' name='inscripcion' hidden value='{{$idInscripcion}}'></input>
                                <button type='submit'>
                                    <div class='evento-info'>
                                        <p><span class='evento-titulo'>{{$titulo}}</span> a las {{$hora}}</p>
                                        <p class='evento-hora'>{{$descripcion}}</p>
                                        <p>Asistentes: {{$asistentes}}</p>
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
            @endif
    </div>
</div>

</body>
</html>
