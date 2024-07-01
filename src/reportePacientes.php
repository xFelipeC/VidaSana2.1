<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reporte de Pacientes - Vida Sana</title>
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
        <section class="report">
            <div class="container mt-5">
                <h1>Generar Reporte de Pacientes Agendados y Atendidos</h1>
                <form action="generarReportePacientes.php" method="POST">
                    <div class="form-group">
                        <label for="tipo_procedimiento">Tipo de Procedimiento:</label>
                        <select id="tipo_procedimiento" name="tipo_procedimiento" class="form-control">
                            <option value="1">Electrocardiograma (ECG)</option>
                            <option value="2">Holter de presión</option>
                            <option value="3">Holter de Ritmo</option>
                            <option value="4">Ecocardiograma</option>
                            <option value="5">Test de esfuerzo</option>
                            <option value="6">Endoscopia Digestiva Alta</option>
                            <option value="7">Endoscopia Digestiva Baja</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="fecha_inicio">Fecha de Inicio:</label>
                        <input type="date" id="fecha_inicio" name="fecha_inicio" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="fecha_fin">Fecha de Fin:</label>
                        <input type="date" id="fecha_fin" name="fecha_fin" class="form-control" required>
                    </div>
                    <button type="submit" class="btn btn-primary mt-3">Generar Reporte</button>
                </form>
            </div>
        </section>
    </main>
</body>
    <br><br><br><br><br><br><br><br><br><br>
    <footer class="footer mt-auto py-3 bg-light">
        <div class="container">
            <span class="text-muted">&copy; 2024 VidaSana. Todos los derechos reservados.</span>
        </div>
    </footer>
</html>
