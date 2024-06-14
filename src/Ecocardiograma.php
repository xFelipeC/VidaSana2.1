<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ecocardiograma</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    <header>
        <nav>
        <div class="logo">
                <img src="../img/logo4.webp" alt="Vida Sana Logo">
            </div>
            <ul class="nav-links">
                <li><a href="../index.php">Inicio</a></li>
                <li><a href="quienessomos.php">Quienes Somos</a></li>
                <li><a href="ConsultasMedicas.php">Consultas Médicas</a></li>
                <li><a href="contacto.php">Contacto</a></li>
            </ul>
            <div class="nav-buttons">
                <button onclick="location.href='src/FormularioRegistrarse.php'">Registrarse</button>
                <button onclick="location.href='#'">Iniciar Sesión</button>
            </div>
        </nav>
    </header>
    <main>
        <section class="intro">
            <h1>Ecocardiograma</h1>
            <p>El ecocardiograma es una prueba diagnóstica que utiliza ultrasonido para crear imágenes detalladas del corazón, ayudando a evaluar su estructura y función.</p>
            <button id="more-info-btn">Más Información</button>
        </section>
        <section id="more-info" class="hidden">
            <h2>¿Qué es un Ecocardiograma?</h2>
            <p>Un ecocardiograma es una prueba que utiliza ondas de ultrasonido para producir imágenes del corazón. Permite a los médicos observar cómo late el corazón y cómo bombea sangre.</p>
            <h2>¿Cómo se realiza?</h2>
            <p>Para realizar un ecocardiograma, se coloca un transductor en el pecho del paciente. Este dispositivo emite ondas de sonido que rebotan en el corazón y crean imágenes en movimiento en una pantalla.</p>
            <h2>¿Por qué es importante?</h2>
            <p>El ecocardiograma es una herramienta crucial para diagnosticar y monitorear enfermedades cardíacas. Puede detectar problemas en las válvulas cardíacas, en las paredes del corazón y en la capacidad del corazón para bombear sangre.</p>
        </section>
    </main>
    <script src="js/scrpit.js"></script>
</body>
</html>
