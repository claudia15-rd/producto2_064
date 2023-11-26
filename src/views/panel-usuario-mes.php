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
        <a id="verSemana" href="/panel-usuario-semana">Semana</a>
        <a id="verMes" href="/panel-usuario-mes" style="background-color:red;">Mes</a>
    </div>
    <div class="calendario">
    <div class="calendario-container">
    <div class="calendario">
        <div class="mes"><?php $mesint = $mes - 1;echo "$meses[$mesint] $anio"; ?></div>
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
            <?php 
                for ($i = 1; $i < $diaDeLaSemana; $i++) {
                    echo "<div class='dia'></div>";
                }
                for ($i = 1; $i <= $numeroDeDias; $i++) {
                    echo "<div class='dia'>$i</div>";
                }
            ?>
            <!-- Continuar con los días hasta 31 -->
        </div>
    </div>
</div>
    </div>
</div>

</body>
</html>
