<?php include("conexion.php");


?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Creador de eventos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body>

    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Nuevo acto</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="panelEventos.php" method="POST">
                    <div class="modal-body">
                        <div class="form-grup mb-3">
                            <label for="">Fecha del acto</label>
                            <input type="date" class="form-2" name="fecha" placeholder="Fecha del acto">
                        </div>
                        <div class="form-grup mb-3">
                            <label for=""> Hora del acto</label>
                            <input type="time" class="form-2" name="hora" placeholder="Hora del acto">
                        </div>
                        <div class="form-grup mb-3">
                            <label for="">Tipo del acto</label>
                            <!--  <input type="text" class="form-2" name="tipo" placeholder="Tipo de acto"> -->
                            <select name="tipo">
                                <?php
                                $consulta = "SELECT * FROM tipo_acto";
                                if ($result = mysqli_query($conex, $consulta)) {
                                    if (mysqli_num_rows($result) > 0) {
                                        while ($row = mysqli_fetch_array($result)) {
                                            echo "<option value='$row[Descripcion]'>$row[Descripcion]</options>";
                                        }
                                    }
                                }
                                ?>
                            </select>
                        </div>
                        <div class="form-grup mb-3">
                            <label for="">Nombre del acto</label>
                            <input type="text" class="form-2" name="titulo" placeholder="Nombre del acto">
                        </div>
                        <div class="form-grup mb-3">
                            <label for="">Nombre Ponente</label>
                            <input type="text" class="form-2" name="nombrePonente" placeholder="Nombre del Ponente">
                        </div>
                        <div class="form-grup mb-3">
                            <label for="">Descripción corta</label>
                            <input type="text" class="form-2" name="descripcionCorta" placeholder="Descripción corta">
                        </div>
                        <div class="form-grup mb-3">
                            <label for="">Descripción larga</label>
                            <input type="text" class="form-2" name="descripcionLarga" placeholder="Descripción larga">
                        </div>

                        <div class="form-grup mb-3">
                            <label for="">Numero de asistentes</label>
                            <input type="text" class="form-2" name="numero" placeholder="Numero de asistentes">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                        <button type="submit" name="IntroduceEvento" class="btn btn-primary">Introduce un
                            evento</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="contenedor mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="carta">

                    <div class="cabeza">

                        <h1>Creador de eventos</h1>
                        <button type="button" class="btn btn-primary  float-end" data-bs-toggle="modal"
                            data-bs-target="#staticBackdrop">
                            Crea tu evento
                        </button>
                    </div>

                    <div class="body-2 ">
                        <table class="table table-striped table-bordered table-danger ">
                            <thead>
                                <tr>
                                    <th scope="col">ID</th>
                                    <th scope="col">FECHA</th>
                                    <th scope="col">HORA</th>
                                    <th scope="col">TIPO </th>
                                    <th scope="col">NOMBRE</th>
                                    <th scope="col">DESCRIPCIÓN CORTA</th>
                                    <th scope="col">DESCRIPCIÓN LARGA</th>
                                    <th scope="col">ASISTENTES</th>
                                    <th scope="col">MODIFICAR PONENTES</th>
                                    <th scope="col">MODIFICAR ASISTENTES</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $consulta = "SELECT * FROM actos";
                                $consultaEjecutada = mysqli_query($conex, $consulta);
                                if (mysqli_num_rows($consultaEjecutada) > 0) {
                                    while ($row = mysqli_fetch_array($consultaEjecutada)) {
                                        ?>
                                        <tr>
                                            <td>
                                                <?php echo $row['Id_acto']; ?>
                                            </td>
                                            <td>
                                                <?php echo $row['Fecha']; ?>
                                            </td>
                                            <td>
                                                <?php echo $row['Hora']; ?>
                                            </td>
                                            <td>
                                                <?php 
                                                //echo $row['Id_tipo_acto']; 
                                                $id=$row['Id_tipo_acto'];
                                                $consultaDescripcion="SELECT Descripcion FROM tipo_acto WHERE Id_tipo_acto='$id'";
                                               // echo $consultaDescripcion;
                                                $resultadoDescripcion=mysqli_query($conex,  $consultaDescripcion);
                                                $recojoDescripcion= mysqli_fetch_array($resultadoDescripcion);
                                                echo $recojoDescripcion[0];
                                                ?>
                                            </td>

                                            <td>
                                                <?php echo $row['Titulo']; ?>
                                            </td>
                                            <td>
                                                <?php echo $row['Descripcion_corta']; ?>
                                            </td>
                                            <td>
                                                <?php echo $row['Descripcion_larga']; ?>
                                            </td>
                                            <td>
                                                <?php echo $row['Num_asistentes']; ?>
                                            </td>
                                            
                                            <td>
                                                <a href="" class=" btn btn.mod">Modificar</a>
                                            </td>
                                            <td>
                                                <a href="" class=" btn btn.elim">Eliminar</a>
                                            </td>
                                        </tr>
                                        <?php
                                    }
                                } else {
                                    ?>
                                    <tr colspan="7">No hay eventos introducidos</tr>
                                <?php

                                }

                                ?>


                            </tbody>
                        </table>
                    </div>

                </div>

            </div>

        </div>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>
</body>

</html>