<?php
include('bbdd.php');

// Consulta a la base de datos
$sql = "SELECT especialidad, tipo_afiliacion, COUNT(*) as cantidad 
        FROM atenciones 
        INNER JOIN pacientes ON atenciones.paciente_id = pacientes.id 
        GROUP BY especialidad, tipo_afiliacion 
        ORDER BY especialidad, cantidad DESC";
$stmt = $con->prepare($sql);
$stmt->execute();
$results = $stmt->fetchAll(PDO::FETCH_ASSOC);

$especialidades = [];
foreach ($results as $row) {
    $especialidad = $row['especialidad'];
    if (!isset($especialidades[$especialidad])) {
        $especialidades[$especialidad] = $row;
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reporte de Afiliaciones por Especialidad</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    <h1>Afiliación más frecuente por especialidad</h1>
    <table>
        <tr>
            <th>Especialidad</th>
            <th>Tipo de Afiliación</th>
            <th>Cantidad</th>
        </tr>
        <?php foreach ($especialidades as $row): ?>
        <tr>
            <td><?php echo htmlspecialchars($row['especialidad']); ?></td>
            <td><?php echo htmlspecialchars($row['tipo_afiliacion']); ?></td>
            <td><?php echo htmlspecialchars($row['cantidad']); ?></td>
        </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>
