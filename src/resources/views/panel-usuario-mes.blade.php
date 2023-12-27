<?php
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
            <div class="menu-item-container">
                <a class="menu-item" id="verDia" href="/panelusuario/dia">Día</a>
            </div>
            <div class="menu-item-container">
                <a class="menu-item" id="verSemana" href="/panelusuario/semana">Semana</a>
            </div>
            <div class="menu-item-container selected-menu">
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
        <div class="calendario-container">
            <div class="calendario">
                <div class="mes">{{$meses[$mesint]}} {{$anio}}</div>
                <div class="dias-semana">
                    <div>Lun</div>
                    <div>Mar</div>
                    <div>Mié</div>
                    <div>Jue</div>
                    <div>Vie</div>
                    <div>Sáb</div>
                    <div>Dom</div>
                </div>
                <div class="dias">
                    <!-- Ejemplo de días en un mes (ajustar según el mes) -->
                    @for($i = 1; $i < $diaDeLaSemana; $i++)
                        <div class='dia'></div>
                    @endfor
                    @for($dia = 1; $dia <= $numeroDeDias; $dia++)
                    <div class={{(isset($diaSel) && $diaSel == $dia)? 'diaSel' : 'dia'}}>
                        <form action='/panelusuario/mes?action=selectDay&dia={{$dia}}&mes={{$mes}}&anio={{$anio}}' 
                            method='POST' style='width: 100%; height: 100%;'>
                            @csrf
                            <button type='submit' style='width: 100%; height: 100%;'>{{$dia}}</button>
                        </form>
                    </div>
                    @endfor
                    <!-- Continuar con los días hasta 31 -->
                </div>
            </div>
        </div>
        @if(isset($diaSel))
            <div class='mes'> {{$diaSel}} de {{$meses[$mesint]}} de {{$anio}}  </div>
            @if(!(isset($eventos) && count($eventos) > 0))
                <div>-- No hay eventos para este día --</div>
            @endif
            <div class='contenedor-eventos'>
                @foreach($eventos as $evento)
                    @php
                        $suscribed = session('personId') == $evento->Id_persona;
                        $suscrito = $suscribed?'evento-suscrito':'';
                        $action = $suscribed?'unsuscribe':'suscribe';
                    @endphp
                    <form action='/panelusuario/mes?action={{$action}}&dia={{$diaSel}}&mes={{$mes}}&anio={{$anio}}' 
                        method='POST' class='{{"evento ".$suscrito}}'>
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
        @endif
    </div>
</div>

</body>
</html>
