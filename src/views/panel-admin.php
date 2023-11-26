<!DOCTYPE html>
<html>
<head>
    <title>Panel de Administración</title>
    <link rel="stylesheet" type="text/css" href="panel-admin.css">
</head>
<body>

<div class="panel-admin">
    <h2>Panel de Administración</h2>

    <!-- Creación de Actos -->
    <section class="creacion-actos">
        <h3>Crear Acto</h3>
        <form>
            <!-- Campos para crear un acto -->
            <input type="text" name="titulo" placeholder="Título del Acto">
            <input type="datetime-local" name="fechaHora">
            <select name="tipoActo">
                <option value="conferencia">Conferencia</option>
                <option value="seminario">Seminario</option>
                <option value="mesaRedonda">Mesa Redonda</option>
                <!-- Más tipos de acto -->
            </select>
            <textarea name="descripcion" placeholder="Descripción"></textarea>
            <!-- Más campos según se necesite -->
            <button type="submit">Crear Acto</button>
        </form>
    </section>

    <!-- Gestión de Ponentes y Tipos de Acto -->
    <section class="gestion-ponentes">
        <h3>Gestión de Ponentes y Tipos de Acto</h3>
        <!-- Aquí irían las interfaces para gestionar ponentes y tipos de acto -->
    </section>

    <!-- Gestión de Inscritos -->
    <section class="gestion-inscritos">
        <h3>Gestión de Inscritos</h3>
        <!-- Aquí iría la interfaz para gestionar a los inscritos -->
    </section>
    <!-- Gestión de Ponentes -->
    <section class="gestion-ponentes">
        <h3>Gestión de Ponentes</h3>
        <form>
            <!-- Campos para añadir un ponente -->
            <input type="text" name="nombrePonente" placeholder="Nombre del Ponente">
            <input type="text" name="especialidadPonente" placeholder="Especialidad">
            <!-- Botón para añadir ponente -->
            <button type="submit">Añadir Ponente</button>
        </form>
        <!-- Aquí se podrían listar los ponentes existentes con opciones para editar o eliminar -->
    </section>

    <!-- Gestión de Inscritos -->
    <section class="gestion-inscritos">
        <h3>Gestión de Inscritos</h3>
        <form>
            <!-- Campos para añadir o eliminar inscritos -->
            <input type="text" name="nombreInscrito" placeholder="Nombre del Inscrito">
            <select name="estadoInscrito">
                <option value="inscrito">Inscrito</option>
                <option value="noInscrito">No Inscrito</option>
            </select>
            <!-- Botón para modificar estado -->
            <button type="submit">Actualizar Estado</button>
        </form>
        <!-- Aquí se podrían listar los inscritos con opciones para editar o eliminar -->
    </section>
</div>

</body>
</html>