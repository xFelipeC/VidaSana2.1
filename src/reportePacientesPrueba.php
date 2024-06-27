<?php
include('bbdd.php');

// Inicializar variables
$tipo_procedimiento = '';
$fecha_inicio = '';
$fecha_fin = '';
$results = [];

// Verificar si se está solicitando la generación del PDF
if (isset($_GET['generate_pdf']) && $_GET['generate_pdf'] === 'true') {
    // Obtener parámetros de consulta
    $tipo_procedimiento = $_GET['tipo_procedimiento'];
    $fecha_inicio = $_GET['fecha_inicio'];
    $fecha_fin = $_GET['fecha_fin'];

    // Consulta a la base de datos
    $sql = "SELECT pacientes.nombre, citas.fecha_hora 
            FROM citas 
            INNER JOIN pacientes ON citas.rut_paciente = pacientes.rut 
            INNER JOIN procedimientos ON citas.id_procedimiento = procedimientos.id_procedimiento 
            WHERE procedimientos.tipo = ? 
            AND citas.fecha_hora BETWEEN ? AND ?";
    $stmt = $con->prepare($sql);
    $stmt->execute([$tipo_procedimiento, $fecha_inicio, $fecha_fin]);
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // Generar el PDF usando PDFlib
    if (!empty($results)) {
        // Incluir la extensión PDFlib (habilitarla en php.ini si no está habilitada)
        if (!extension_loaded('PDFlib')) {
            echo 'La extensión PDFlib no está habilitada. Por favor, habilita la extensión en tu servidor PHP.';
            exit;
        }

        // Crear el objeto PDF
        $pdf = new PDFlib();

        // Establecer un título y tamaño de página
        $pdf->set_info("Creator", "Vida Sana");
        $pdf->set_info("Author", "Tu Nombre");
        $pdf->set_info("Title", "Reporte de Pacientes Agendados y Atendidos");

        $pdf->begin_page(595, 842); // Tamaño A4

        // Escribir el contenido del PDF
        $pdf->set_font("Helvetica", "B", 14);
        $pdf->set_text_pos(50, 700);
        $pdf->show("Reporte de Pacientes Agendados y Atendidos");
        $pdf->continue_text("\n\n");

        // Encabezados de tabla
        $pdf->set_font("Helvetica", "B", 12);
        $pdf->set_text_pos(50, 680);
        $pdf->show("Nombre");
        $pdf->set_text_pos(150, 680);
        $pdf->show("Fecha y Hora");
        $pdf->continue_text("\n");

        // Contenido de tabla
        $pdf->set_font("Helvetica", "", 12);
        $y = 660;
        foreach ($results as $row) {
            $pdf->set_text_pos(50, $y);
            $pdf->show($row['nombre']);
            $pdf->set_text_pos(150, $y);
            $pdf->show($row['fecha_hora']);
            $pdf->continue_text("\n");
            $y -= 20;
        }

        // Finalizar y descargar el PDF
        $pdf->end_page();
        $pdf->end_document();

        // Descargar el PDF generado
        header('Content-type: application/pdf');
        header('Content-Disposition: attachment; filename="reporte_pacientes.pdf"');
        echo $pdf->get_buffer();
        exit;
    } else {
        echo 'No se encontraron resultados para generar el PDF.';
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reporte de Pacientes</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    <h1>Pacientes agendados y atendidos</h1>

    <?php if (empty($results)): ?>
        <form method="get" action="reportePacientes.php?generate_pdf=true">
        <form method="get" action="reportePacientes.php?generate_pdf=true">
    <label for="tipo_procedimiento">Tipo de Procedimiento:</label>
    <select id="tipo_procedimiento" name="tipo_procedimiento" required>
        <option value="">Seleccione un procedimiento</option>
        <option value="Electrocardiograma">Electrocardiograma</option>
        <option value="Holter de presion">Holter de presión</option>
        <option value="Holter de ritmo">Holter de ritmo</option>
        <option value="Ecocardiograma">Ecocardiograma</option>
        <option value="Test de esfuerzo">Test de esfuerzo</option>
        <option value="Endoscopia Digestiva alta/baja">Endoscopia Digestiva alta/baja</option>
    </select>

    <label for="fecha_inicio">Fecha de Inicio:</label>
    <input type="date" id="fecha_inicio" name="fecha_inicio" required>

    <label for="fecha_fin">Fecha de Fin:</label>
    <input type="date" id="fecha_fin" name="fecha_fin" required>

    <a href="reportePacientes.php?generate_pdf=true"><button type="submit">Generar Reporte</button></a>
</form>

        </form>
    <?php else: ?>
        <table>
            <tr>
                <th>Nombre</th>
                <th>Fecha y Hora</th>
            </tr>
            <?php foreach ($results as $row): ?>
            <tr>
                <td><?php echo htmlspecialchars($row['nombre']); ?></td>
                <td><?php echo htmlspecialchars($row['fecha_hora']); ?></td>
            </tr>
            <?php endforeach; ?>
        </table>
        <br>
        <a href="reportePacientes.php?generate_pdf=true">Descargar PDF</a>
    <?php endif; ?>
</body>
</html>
