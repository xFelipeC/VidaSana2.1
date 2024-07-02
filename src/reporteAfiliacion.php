<?php
require_once '../src/bbdd.php';

// Consulta SQL para obtener el tipo de afiliación más frecuente por especialidad
$stmt = $con->prepare("
    SELECT procedimientos.nombre AS nombre_procedimiento, pacientes.tipo_Afiliación, COUNT(pacientes.tipo_Afiliación) AS cantidad
    FROM pacientes
    JOIN citas ON pacientes.rut = citas.rut_paciente
    JOIN procedimientos ON citas.id_procedimiento = procedimientos.id_procedimiento
    GROUP BY procedimientos.nombre, pacientes.tipo_Afiliación
    ORDER BY procedimientos.nombre, cantidad DESC
");

$stmt->execute();
$resultados = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Agrupar los resultados por especialidad y determinar la afiliación más frecuente
$afiliacion_frecuente_por_especialidad = [];
foreach ($resultados as $resultado) {
    $procedimiento = $resultado['nombre_procedimiento'];
    if (!isset($afiliacion_frecuente_por_especialidad[$procedimiento])) {
        $afiliacion_frecuente_por_especialidad[$procedimiento] = $resultado;
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reporte de Descuento - Vida Sana</title>
    <link rel="shortcut icon" href="../img/logo4.webp" type="image/x-icon">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/login.css">
    <link rel="stylesheet" href="../css/reportes.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <!-- Referencias a las bibliotecas jsPDF y autoTable -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.3.1/jspdf.umd.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf-autotable/3.5.13/jspdf.plugin.autotable.min.js"></script>
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
<section class="report">
    <div class="container mt-5">
        <h1>Reporte de Afiliación por Especialidad</h1>
        <div id="reporte">
            <?php if (!empty($afiliacion_frecuente_por_especialidad)): ?>
                <table class="table">
                    <thead>
                        <tr>
                            <th>Especialidad</th>
                            <th>Afiliación Más Frecuente</th>
                            <th>Cantidad</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($afiliacion_frecuente_por_especialidad as $especialidad => $datos): ?>
                            <tr>
                                <td><?php echo htmlspecialchars($especialidad); ?></td>
                                <td><?php echo htmlspecialchars($datos['tipo_Afiliación']); ?></td>
                                <td><?php echo htmlspecialchars($datos['cantidad']); ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            <?php else: ?>
                <p>No se encontraron datos de afiliación por especialidad.</p>
            <?php endif; ?>
        </div>
    </div>
</section>
<br>
<div class="button-container">
    <a href="admin.php"><button type="button" class="btn btn-primary">Volver al Panel de Administración de Reportes</button></a>
    <a href="#" id="exportarPDF" class="btn btn-primary">Exportar a PDF</a>
</div>

<br><br><br><br><br><br><br><br><br><br>
<footer class="footer mt-auto py-3 bg-light">
    <div class="container">
        <span class="text-muted">&copy; 2024 VidaSana. Todos los derechos reservados.</span>
    </div>
</footer>

<!-- Referencias a los archivos JS -->
<script src="../js/jquery.min.js"></script>
<script src="../js/bootstrap.bundle.min.js"></script>
<script>
    document.getElementById('exportarPDF').addEventListener('click', function (event) {
        event.preventDefault();
        const { jsPDF } = window.jspdf;
        const doc = new jsPDF();
        doc.text("Reporte de Afiliación por Especialidad", 10, 10);
        doc.autoTable({ html: '#reporte table' });
        doc.save('reporte_afiliacion.pdf');
    });
</script>
</body>
</html>
