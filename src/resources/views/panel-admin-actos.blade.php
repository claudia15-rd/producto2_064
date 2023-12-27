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
            <div class="menu-item-container selected-menu">
                <a class="menu-item" id="verDia" href="/paneladmin/actos">Actos</a>
            </div>
            <div class="menu-item-container">
                <a class="menu-item" id="verSemana" href="/paneladmin/acto/crear">Crear Acto</a>
            </div>
            <div class="menu-item-container">
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
        <h2>Actos</h2>
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
                            $suscribed = session('personId') == $evento['Id_persona'];
                            $suscrito = $suscribed?'evento-suscrito':'';
                            $action = $suscribed?'unsuscribe':'suscribe';
                            $idevento = $evento['Id_acto'];
                            $idInscripcion = $evento['Id_inscripcion'];
                            $titulo = $evento['Titulo'];
                            $descripcion = $evento['Descripcion_corta'];
                            $hora = $evento['Hora'];
                            $asistentes = $evento['Num_asistentes'];
                            echo "<form action='/paneladmin/acto/editar?id=$idevento' class='evento $suscrito'>
                                <input type='text' name='id' hidden value='$idevento'></input>
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

</div>

</body>
</html>