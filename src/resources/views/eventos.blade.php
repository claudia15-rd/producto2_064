<!DOCTYPE html>
<html>
<head>
    <title>Actos</title>
    <link rel="stylesheet" type="text/css" href="/css/encabezado.css">
    <link rel="stylesheet" type="text/css" href="/css/panel-admin.css">
</head>
<body>
<div class="encabezado">

        <h2>EventosApp</h2>
     
      
</div>
<div class="panel-admin">
    <h2>Próximos eventos</h2>

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
                            echo "<form action='/evento/$idevento' class='evento $suscrito'>
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