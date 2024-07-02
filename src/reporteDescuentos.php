<?php
require_once '../src/bbdd.php';

// Consulta SQL para obtener las atenciones con descuento
$stmt = $con->prepare("SELECT pacientes.rut, pacientes.nombre, pacientes.apellido, citas.fecha_hora, procedimientos.nombre AS nombre_procedimiento, citas.descuento
                        FROM pacientes
                        JOIN citas ON pacientes.rut = citas.rut_paciente
                        JOIN procedimientos ON citas.id_procedimiento = procedimientos.id_procedimiento
                        WHERE citas.descuento > 0");

$stmt->execute();
$atenciones_con_descuento = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Calcular el monto total del descuento
$monto_total_descuento = 0;
foreach ($atenciones_con_descuento as $atencion) {
    $monto_total_descuento += $atencion['descuento'];
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
<main class="container mt-5">
    <section class="report">
        <div class="container mt-5">
            <h1>Reporte de Atenciones con Descuento</h1>
            <?php if (!empty($atenciones_con_descuento)): ?>
                <div class="table-responsive">
                    <table class="table table-striped table-bordered" id="reporte">
                        <thead class="table-dark">
                            <tr>
                                <th>RUT</th>
                                <th>Nombre</th>
                                <th>Apellido</th>
                                <th>Fecha y Hora</th>
                                <th>Procedimiento</th>
                                <th>Descuento</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($atenciones_con_descuento as $atencion): ?>
                                <tr>
                                    <td><?php echo htmlspecialchars($atencion['rut']); ?></td>
                                    <td><?php echo htmlspecialchars($atencion['nombre']); ?></td>
                                    <td><?php echo htmlspecialchars($atencion['apellido']); ?></td>
                                    <td><?php echo htmlspecialchars($atencion['fecha_hora']); ?></td>
                                    <td><?php echo htmlspecialchars($atencion['nombre_procedimiento']); ?></td>
                                    <td><?php echo htmlspecialchars($atencion['descuento']); ?></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
                <p class="total-descuento">Monto Total del Descuento: <?php echo htmlspecialchars($monto_total_descuento); ?></p>
            <?php else: ?>
                <p>No se encontraron atenciones con descuento.</p>
            <?php endif; ?>
        </div>
    </section>
    <br>
    <div class="button-container">
        <a href="reportePacientes.php"><button type="button" class="btn btn-primary">Volver atrás</button></a>
        <a href="admin.php"><button type="button" class="btn btn-primary">Volver al Panel de Administración</button></a>
        <button type="button" id="exportarPDF" class="btn btn-primary">Exportar a PDF</button>
    </div>
</main>
<br><br><br><br><br><br><br>
<footer class="footer mt-auto py-3 bg-light">
    <div class="container">
        <span class="text-muted">&copy; 2024 VidaSana. Todos los derechos reservados.</span>
    </div>
</footer>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz4fnFO9gybBogGzB4u5iQ6UJaI6go7AaXg07Q7HhFh0UR/SC5fPR05D70" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12mYxRcoFbVQRgiRnD6pzR8ST/e96bxFhb3TykhNfpm1LsE" crossorigin="anonymous"></script>
<script>
    document.getElementById('exportarPDF').addEventListener('click', function (event) {
        event.preventDefault();
        const { jsPDF } = window.jspdf;
        const doc = new jsPDF();
        doc.text("Reporte de Atenciones con Descuento", 10, 10);
        doc.autoTable({ html: '#reporte' });
        doc.save('reporte_atenciones_descuento.pdf');
    });
</script>
</body>
</html>
