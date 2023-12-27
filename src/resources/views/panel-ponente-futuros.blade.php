<?php
$diaSel = isset($diaSel) ? $diaSel : date('d');
$mes = isset($mesSel) ? $mesSel : date('m');
$anio = isset($anioSel) ? $anioSel : date('Y');
$meses = ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'];
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
                <a class="menu-item" id="verDia" href="/panelponente/futuros">Próximos Eventos</a>
            </div>
            <div class="menu-item-container">
                <a class="menu-item" id="verSemana" href="/panelponente/pasados">Eventos Pasados</a>
            </div>
            <div class="menu-item-container">
                <a class="menu-item" id="verSemana" href="/panelponente/perfil">Mi perfil</a>
            </div>
        </div>
        <div class="menu-item-container">
            <a class="menu-item" href="/logout">Cerrar Sesión</a>
        </div>
    </div>

    <section class="creacion-actos">
        <h2 style="text-align: center">Proximos Eventos</h2>
        <?php
            $meses = ['Enero','Febrero','Marzo','Abril','Mayo','Junio','Julio','Agosto','Septiembre','Octubre','Noviembre','Diciembre'];
            echo "<div class='calendario' style='margin-bottom: 1rem;'>";
            if (!isset($actos) || !(count($actos) > 0)){
                    echo "<div style='margin-bottom: 1rem;'>-- No hay eventos --</div>";
                exit;
            }
            foreach ($actos as $fecha => $eventosdia) {
                list($anio, $mes, $dia) = explode("-", $fecha);
                $mesint= $mes - 1;
                echo "<div class='mes' style='margin: 0;'> $dia de $meses[$mesint] de $anio </div>";
                if (isset($eventosdia) && count($eventosdia) > 0){
                    echo "<div class='contenedor-eventos' style='margin-bottom: 1rem;'>";
                    foreach($eventosdia as $evento){
                            $suscribed = session('personId') == $evento->Id_persona;
                            $suscrito = $suscribed?'evento-suscrito':'';
                            $action = $suscribed?'unsuscribe':'suscribe';
                            $idevento = $evento->Id_acto;
                            $idInscripcion = $evento->id_ponente;
                            $titulo = $evento->Titulo;
                            $descripcion = $evento->Descripcion_corta;
                            $hora = $evento->Hora;
                            $asistentes = $evento->Num_asistentes;
                            echo "<form action='/panelponente/baja/acto' method='POST' class='evento $suscrito'>";
                            echo csrf_field();
                            echo "<input type='text' name='id' hidden value='$idevento'></input>
                                <button type='submit'>
                                    <div class='evento-info'>
                                        <p><span class='evento-titulo'>$titulo</span> a las $hora</p>
                                        <p class='evento-hora'>$descripcion</p>
                                        <p>Asistentes: $asistentes</p>
                                    </div>
                                    <div class='evento-actions'>
                                        
                                    </div>
                                </button>
                            </form>";
                        }
                    echo "</div>";
                }else{
                    echo "<div style='margin-bottom: 1rem;'>-- No hay eventos para este día --</div>";
                } 
            }
            echo "</div>";
        ?>
    </section>

</body>

</html>