<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Holter de Presión</title>
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
            <h1>Holter de Presión</h1>
            <p>El Holter de presión es una herramienta diagnóstica que monitorea la presión arterial del paciente durante un período de 24 horas o más, permitiendo una evaluación detallada de la variabilidad de la presión arterial a lo largo del día.</p>
            <button id="more-info-btn">Más Información</button>
        </section>
        <section id="more-info" class="services-list hidden">
            <h2>¿Qué es un Holter de Presión?</h2>
            <p>El Holter de presión es un dispositivo portátil que mide y registra la presión arterial del paciente de manera continua durante 24 horas o más, mientras el paciente realiza sus actividades diarias normales.</p>
            <h2>¿Cómo se realiza?</h2>
            <p>El dispositivo se coloca en el brazo del paciente y está conectado a un pequeño monitor que se lleva en la cintura. El monitor registra las lecturas de presión arterial a intervalos regulares durante el período de monitoreo.</p>
            <h2>¿Por qué es importante?</h2>
            <p>El Holter de presión proporciona una imagen completa de cómo varía la presión arterial a lo largo del día y la noche, lo que ayuda a los médicos a diagnosticar y manejar condiciones como la hipertensión y otros trastornos relacionados con la presión arterial.</p>
        </section>
        <button class="btn-back" onclick="location.href='../index.php'">← Volver a Inicio</button>
    </main>
    <script src="js/scrpit.js"></script>
</body>
</html>
