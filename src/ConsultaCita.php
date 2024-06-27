<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contacto - Vida Sana</title>
    <link rel="shortcut icon" href="../img/logo4.webp" type="image/x-icon">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/login.css">
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
        </nav>
    </header>
    <main>
        <section class="about-us">
            <div class="container mt-5">
                <h1>Vida Sana</h1>
                <p><b>Ingrese su rut para consultar su cita</b></p>
                <br>
                <div class="formulario">
                    <form id="consultaForm" method="POST" action="BuscarCita.php">
                        <div class="form-group">
                            <label for="rut">RUT del Paciente (Con puntos y guion)</label>
                            <input type="text" id="rut" name="rut" class="form-control" placeholder="Ej: 11.222.333-4" required>
                            <small id="rutHelp" class="form-text text-muted">Ingrese RUT del paciente</small>
                        </div>
                        <button type="submit" class="btn btn-primary">Buscar</button>
                    </form>
                    <img src="../img/carruzel3.jpg" alt="">
                </div>
            </div>
        </section>
    </main>
</body>
</html>
