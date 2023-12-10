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
        <h2>Detalle Acto</h2>
        <br>
        @php
            $fechaHora = $acto['Fecha']."T".$acto['Hora'];
        @endphp
            <form action='/paneladmin/acto/editar?id={{$acto['Id_acto']}}' method='POST'>
                @csrf
                <input type='text' name='titulo' value='{{$acto['Titulo']}}' placeholder='Título del Acto' required>
                <input type='text' name='descripcion' value='{{$acto['Descripcion_corta']}}' placeholder='Descripción Corta' required>
                <input type='datetime-local' name='fechaHora' value={{$fechaHora}} required>
                <select name='tipoActo' value={{$acto['Id_tipo_acto']}} required>";
                    @foreach ($acttypes as $acttype)
                        @if($acto['Id_tipo_acto'] == $acttype['Id_tipo_acto'])
                            <option value={{$acttype['Id_tipo_acto']}} selected>{{$acttype['Descripcion']}}</option>
                        @else
                            <option value={{$acttype['Id_tipo_acto']}}>{{$acttype['Descripcion']}}</option>
                        @endif
                    @endforeach
                </select>
                <input type='number' name='numAsistentes' value={{$acto['Num_asistentes']}} placeholder='Num. de Asistentes' required>
                <textarea name='descripcionLarga' placeholder='Descripción Larga'>{{$acto['Descripcion_larga']}}</textarea>
                <button class='form-submit-button' type='submit'>Modificar Acto</button>
            </form>
            <form action='/paneladmin/acto/eliminar?id={{$acto['Id_acto']}}' style='margin-top: 1rem;' method='POST'>
                @csrf
                <button class='form-submit-button-delete' type='submit'>Borrar Acto</button>
            </form>
    </section>
</div>

</body>
</html>