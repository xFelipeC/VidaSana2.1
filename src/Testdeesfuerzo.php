<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Test de Esfuerzo</title>
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
            <h1>Test de Esfuerzo</h1>
            <p>El test de esfuerzo es una prueba diagnóstica que evalúa la respuesta del corazón al ejercicio físico, ayudando a detectar enfermedades cardíacas.</p>
            <button id="more-info-btn">Más Información</button>
        </section>
        <section id="more-info" class="services-list hidden">
            <h2>¿Qué es un Test de Esfuerzo?</h2>
            <p>El test de esfuerzo, también conocido como prueba de esfuerzo o ergometría, es una prueba que mide la capacidad del corazón para responder al estrés físico en un entorno clínico controlado.</p>
            <h2>¿Cómo se realiza?</h2>
            <p>Durante el test de esfuerzo, el paciente camina en una cinta rodante o pedalea en una bicicleta estacionaria mientras se monitorean la frecuencia cardíaca, la presión arterial y el electrocardiograma (ECG). La intensidad del ejercicio aumenta gradualmente.</p>
            <h2>¿Por qué es importante?</h2>
            <p>El test de esfuerzo ayuda a identificar problemas cardíacos que no son visibles en reposo. Es útil para diagnosticar enfermedades coronarias, evaluar la eficacia del tratamiento cardíaco y determinar niveles seguros de ejercicio para pacientes con problemas cardíacos.</p>
        </section>
        <button class="btn-back" onclick="location.href='../index.php'">← Volver a Inicio</button>
    </main>
    <script src="js/scrpit.js"></script>
</body>
</html>
