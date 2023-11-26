<?php
$mes = date('m');
$anio = date('Y');
$meses = ['Enero','Febrero','Marzo','Abril','Mayo','Junio','Julio','Agosto','Septiembre','Octubre','Noviembre','Diciembre'];
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
    <link rel="stylesheet" type="text/css" href="panel-usuario.css">
</head>
<body>

<div class="calendario-container">
    <div class="calendario-header">
        <a id="verDia" href="/panel-usuario-dia">Día</a>
        <a id="verSemana" href="/panel-usuario-semana" style="background-color:red;">Semana</a>
        <a id="verMes" href="/panel-usuario-mes">Mes</a>
    </div>
    <div class="calendario">
    <div class="semana-container">
    <div class="encabezado-semana">
        <div class="dia-semana">Lunes</div>
        <div class="dia-semana">Martes</div>
        <div class="dia-semana">Miércoles</div>
        <div class="dia-semana">Jueves</div>
        <div class="dia-semana">Viernes</div>
        <div class="dia-semana">Sábado</div>
        <div class="dia-semana">Domingo</div>
    </div>
    <div class="cuerpo-semana">
        <!-- Repite esto para cada hora del día -->
        <div class="hora-dia">08:00</div>
        <div class="evento-semana"></div>
        <div class="evento-semana"></div>
        <!-- ... -->
    </div>
</div>
    </div>
</div>

</body>
</html>
