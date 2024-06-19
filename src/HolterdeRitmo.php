<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Holter de Ritmo</title>
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
            <h1>Holter de Ritmo</h1>
            <p>El Holter de ritmo es un dispositivo que monitoriza la actividad eléctrica del corazón de manera continua durante 24 horas o más, permitiendo detectar irregularidades en el ritmo cardíaco.</p>
            <button id="more-info-btn">Más Información</button>
        </section>
        <section id="more-info" class="services-list hidden">
            <h2>¿Qué es un Holter de Ritmo?</h2>
            <p>El Holter de ritmo, también conocido como monitor Holter, es un dispositivo portátil que registra la actividad eléctrica del corazón de forma continua durante un período de tiempo extendido, generalmente 24 a 48 horas.</p>
            <h2>¿Cómo se realiza?</h2>
            <p>Para realizar el monitoreo con el Holter de ritmo, se colocan electrodos en el pecho del paciente. Estos electrodos están conectados a un pequeño dispositivo que se lleva en la cintura o colgado del cuello, que registra todas las señales eléctricas del corazón durante el período de monitoreo.</p>
            <h2>¿Por qué es importante?</h2>
            <p>El Holter de ritmo es crucial para detectar arritmias u otras irregularidades en el ritmo cardíaco que pueden no aparecer en un ECG estándar. Proporciona una imagen detallada de cómo funciona el corazón durante las actividades diarias y el sueño.</p>
        </section>
        <button class="btn-back" onclick="location.href='../index.php'">← Volver a Inicio</button>
    </main>
    <script src="js/scrpit.js"></script>
</body>
</html>
