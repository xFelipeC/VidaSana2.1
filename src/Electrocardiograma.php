<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Electrocardiograma</title>
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
                <button onclick="location.href='FormularioRegistrarse.php'">Registrarse</button>
                <button onclick="location.href='#'">Iniciar Sesión</button>
            </div>
        </nav>
    </header>
    <main>
        <section class="about-us">
            <h1>Electrocardiograma (ECG)</h1>
            <p>El electrocardiograma es una prueba médica que registra la actividad eléctrica del corazón a lo largo del tiempo. Es una herramienta fundamental en la cardiología moderna.</p>
            <button id="more-info-btn">Más Información</button>
        </section>
        <section id="more-info" class="services-list hidden">
            <h2>¿Qué es un Electrocardiograma?</h2>
            <p>Un electrocardiograma (ECG o EKG) es una prueba que se realiza para medir la actividad eléctrica del corazón. Se usa para detectar diversas afecciones cardíacas, como arritmias, ataques cardíacos y otros problemas del corazón.</p>
            <h2>¿Cómo se realiza?</h2>
            <p>Para realizar un ECG, se colocan electrodos en la piel del paciente en lugares específicos. Estos electrodos detectan las señales eléctricas generadas por el corazón y las transmiten a una máquina que las registra.</p>
            <h2>¿Por qué es importante?</h2>
            <p>El ECG es una herramienta no invasiva que ayuda a los médicos a diagnosticar y monitorear enfermedades cardíacas. Es rápida, indolora y puede proporcionar información crítica sobre la salud del corazón.</p>
        </section>
        <button class="btn-back" onclick="location.href='../index.php'">← Volver a Inicio</button>
    </main>
    <script src="js/scrpit.js"></script>
</body>
</html>
