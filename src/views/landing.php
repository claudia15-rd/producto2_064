<!DOCTYPE html>
<html>
<head>
    <title>Ponentes Eventos</title>
    <link rel="stylesheet" type="text/css" href="landing.css">
</head>
<body>

<header>
    <h1>Bienvenidos a Ponentes Eventos</h1>
    <nav>
        <ul>
            <li><a href="/login">Login</a></li>
            <li><a href="#servicios">Servicios</a></li>
            <li><a href="#contacto">Contacto</a></li>
        </ul>
    </nav>
</header>

<section id="inicio">
    <h2>Bienvenido a Nuestra Empresa</h2>
    <p>Somos líderes en brindar soluciones innovadoras. Nuestro compromiso es ofrecer productos y servicios de alta calidad que se adaptan a tus necesidades.</p>
    <a href="#servicios" class="btn-inicio">Explora nuestros servicios</a>
</section>

<section id="servicios">
<h2>Nuestros Servicios</h2>
    <div class="servicio">
        <h3>Consultoría Profesional</h3>
        <p>Ofrecemos asesoramiento experto en diversas áreas para optimizar tus operaciones y estrategias de negocio.</p>
    </div>
    <div class="servicio">
        <h3>Desarrollo Tecnológico</h3>
        <p>Desarrollamos soluciones tecnológicas a medida, desde aplicaciones móviles hasta sistemas empresariales complejos.</p>
    </div>
    <div class="servicio">
        <h3>Soporte y Mantenimiento</h3>
        <p>Ofrecemos servicios de soporte técnico y mantenimiento para garantizar el funcionamiento óptimo de tus sistemas y aplicaciones. Nuestro equipo está disponible para asistirte con cualquier problema técnico o actualización que necesites.</p>
    </div>

    <!-- Servicio 4: Capacitación y Formación -->
    <div class="servicio">
        <h3>Capacitación y Formación</h3>
        <p>Impartimos cursos y talleres especializados en diversas áreas tecnológicas y de gestión empresarial. Nuestros programas están diseñados para mejorar las habilidades de tu equipo y mantenerlos actualizados con las últimas tendencias y herramientas del mercado.</p>
    </div>

    <!-- Servicio 5: Análisis de Datos y Big Data -->
    <div class="servicio">
        <h3>Análisis de Datos y Big Data</h3>
        <p>Te ayudamos a convertir grandes volúmenes de datos en información valiosa para tu negocio. Nuestros servicios incluyen análisis de datos, informes personalizados y desarrollo de estrategias basadas en datos para la toma de decisiones.</p>
    </div>
</section>

<section id="contacto">
<h2>Contacta con Nosotros</h2>
    <p>¿Tienes alguna pregunta o necesitas más información? No dudes en ponerte en contacto con nosotros.</p>
    
    <div class="informacion-contacto">
        <p><strong>Email:</strong> contacto@nuestraempresa.com</p>
        <p><strong>Teléfono:</strong> +1 234 567 8900</p>
    </div>

    <h3>Envíanos un Mensaje</h3>
    <form action="enviar.php" method="post">
        <input type="text" name="nombre" placeholder="Tu Nombre" required>
        <input type="email" name="email" placeholder="Tu Email" required>
        <textarea name="mensaje" placeholder="Tu Mensaje" required></textarea>
        <button type="submit">Enviar Mensaje</button>
    </form>
</section>

<footer>
    <p>Derechos reservados &copy; 2023</p>
</footer>

</body>
</html>