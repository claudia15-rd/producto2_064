<!DOCTYPE html>
<html>
<head>
    <title>Detalle de evento</title>
    <link rel="stylesheet" type="text/css" href="/css/encabezado.css">
    <link rel="stylesheet" type="text/css" href="/css/panel-admin.css">
</head>
<body>
<div class="encabezado">

        <h2>EventosApp</h2>
    
</div>
<div class="panel-admin">
    <h2>Detalle de evento</h2>

    <!-- Creación de Actos -->
    <section class="creacion-actos">
        <h2>Detalle Acto</h2>
        <br>

    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <h1>{{ $evento->Titulo }}</h1>
                <p><strong>Fecha y Hora:</strong> {{ $evento->Fecha }} {{ $evento->Hora }}</p>
                <p><strong>Descripción:</strong> {{ $evento->Descripcion_corta }}</p>
                <p><strong>Asistentes:</strong> {{ $evento->Num_asistentes }}</p>
                <p><strong>Tipo de Evento:</strong> {{ $evento->Id_tipo_acto }}</p>
                <p><strong>Descripción Larga:</strong> {{ $evento->Descripcion_larga }}</p>
                @php
                    $userId=session('userId')
                @endphp
                <div style="display: flex; flex-direction:column;">
                    @if(isset($userId))
                        @if($inscrito==false)
                            <form action='/panelusuario/evento/suscribe' method='post'>
                                @csrf
                                <input type="text" name="id" hidden value={{$evento->Id_acto}}>
                                <button class="form-submit-button" type="submit">Inscribirse</button>
                            </form>
                        @else
                            <form action='/panelusuario/evento/baja' method='post'>
                                @csrf
                                <input type="text" name="id" hidden value={{$evento->Id_acto}}>
                                <button class="form-submit-button" type="submit">Darse de baja</button>
                            </form>
                        @endif
                    @else
                        <p>¿Eres usuario?</p>
                        <form action='/login'>
                            <button class="form-submit-button" type="submit">Inicia sesión para inscribirte</button>
                        </form>
                        <p>¿No eres usuario?</p>
                        <a href="/formulario/inscripcion?id={{$evento->Id_acto}}" class="form-submit-button" style="text-align: center; text-decoration: none;">Formulario de inscripción</a>
                    @endif
                </div>
            </div>
        </div>
    </div>


    </section>
</div>

</body>
</html>