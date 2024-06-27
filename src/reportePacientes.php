<?php
include('bbdd.php');

// Inicializar variables
$tipo_procedimiento = '';
$fecha_inicio = '';
$fecha_fin = '';
$results = [];

// Verificar si los parámetros existen en la solicitud GET
if (isset($_GET['tipo_procedimiento']) && isset($_GET['fecha_inicio']) && isset($_GET['fecha_fin'])) {
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
        <form method="get" action="reportePacientes.php">
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

            <button type="submit">Generar Reporte</button>
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
    <?php endif; ?>
</body>
</html>
