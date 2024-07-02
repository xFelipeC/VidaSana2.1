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
                <a href="../index.php"><img src="../img/logo4.webp" alt="Vida Sana Logo"></a>
            </div>
            <ul class="nav-links">
                <li><a href="../index.php">Inicio</a></li>
                <li><a href="quienessomos.php">Quienes Somos</a></li>
                <li><a href="ConsultasMedicas.php">Consultas Médicas</a></li>
                <li><a href="contacto.php">Contacto</a></li>
            </ul> 
            <div class="nav-buttons">
                <button onclick="location.href='login.php'">Iniciar Sesión</button>
                <button onclick="location.href='ConsultaCita.php'">Consultar Cita</button>
            </div>
        </nav>
    </header>
    <main>
        <section class="about-us">
            <h1>Ecocardiograma</h1>
            <p>Contamos con el equipo médico y tecnológico adecuado para realizar un ecocardiografía y obtener información certera del corazón.</p>
            <br>
            <div class="ecocardiograma_img">
                <img src="../img/ecocardiograma.jpg" alt="ecocardiograma">
            </div>
            <h2>¿Qué es un Ecocardiograma?</h2>
            <p>Es un examen diagnóstico que usa ondas sonoras para producir imágenes del corazón donde podemos observar información sobre tamaño del corazón, capacidad de bombeo, estado y función de las cavidades y válvulas, además nos permitirnos identificar enfermedades cardíacas en niños y adultos. <br>
                    <br>
                Este examen se realiza para brindar la información que el cardiólogo o médico especialista necesite, además el especialista puede solicitarte uno de varios tipos de ecocardiogramas.</p>
            <h2>¿Cómo se realiza?</h2>
            <p>Es un examen sin riesgos y completamente indoloro: se realiza con ultrasonido inocuo, es decir, se le puede realizar a cualquier persona, en cualquier circunstancia y en cualquier lugar. <br>
                    <br>
                El paciente debe permanecer acostado y tranquilo. Se le aplica un gel sobre el pecho y un pequeño dispositivo que transmite la imagen del corazón a la pantalla.

La prueba puede durar entre 20 - 30 minutos dependiendo del Centro Médico.</p>
            <h2>¿Por qué es importante?</h2>
            <p>El ecocardiograma es una herramienta crucial para diagnosticar y monitorear enfermedades cardíacas. Puede detectar problemas en las válvulas cardíacas, en las paredes del corazón y en la capacidad del corazón para bombear sangre.</p>
            
            <h2>Tipos de Ecocardiogramas y sus Indicaciones.</h2>

            <h3>Ecocardiograma Doppler Color</h3>

            <p>El Ecocardiograma Doppler Color es una técnica de imagen no invasiva que combina el ecocardiograma tradicional con el Doppler color para evaluar el flujo sanguíneo a través del corazón y sus válvulas. Esta prueba permite a los médicos observar el funcionamiento del corazón en tiempo real, detectar problemas con las válvulas cardíacas, medir la velocidad y dirección del flujo sanguíneo, y diagnosticar condiciones como insuficiencia cardíaca, cardiopatías congénitas y otras enfermedades cardiovasculares. Es útil para evaluar la salud cardíaca, planificar tratamientos y monitorear la efectividad de las intervenciones terapéuticas.</p>

            <div class="eco_doppler">
                <img src="../img/doppler.webp" alt="Vida Sana Logo">
            </div>

            <h3>Ecocardiograma Fetal</h3>

            <p>La Ecocardiografia Fetal es un examen para evaluar la estructura del corazón y grandes vasos intratorácicos, permite también examinar la función y el ritmo cardíaco durante el embarazo. <br>

                El examen es una Ecografia Doppler color y pulsada, dirigida al corazón y grandes arterias, tiene una tiempo de duración de aproximadamente 30 - 40 minutos.</p>
   
                <div class="ecofetal_img">
                <img src="../img/ecofetal.jpg" alt="ecocardiograma">
                <p>A través de la Ecocardiografía Fetal se puede dar una diagnóstico de normalidad del corazón o el diagnóstico de una cardiopatía congénita. Las semanas mas óptima para realizar este examen es en el II trimestre entre las 22 - 28 semanas de embarazo. También se puede realizar la Ecocardiografia Fetal temprana entre las 13 - 16 semanas por vía transabdominal y transvaginal.</p>
            </div>    
        </section>
        <section id="more-info" class="services-list hidden">
        
        </section>
        <button class="btn-back" onclick="location.href='../index.php'">← Volver a Inicio</button>
    </main>
    <script src="js/scrpit.js"></script>
</body>
</html>

