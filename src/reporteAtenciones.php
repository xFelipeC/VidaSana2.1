<?php
include('bbdd.php');

// Consulta a la base de datos
$sql = "SELECT pacientes.nombre, atenciones.fecha, pacientes.tipo_afiliacion 
        FROM atenciones 
        INNER JOIN pacientes ON atenciones.paciente_id = pacientes.id";
$stmt = $con->prepare($sql);
$stmt->execute();
$results = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reporte de Atenciones</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    <h1>Atenciones por tipo de afiliación</h1>
    <table>
        <tr>
            <th>Nombre</th>
            <th>Fecha</th>
            <th>Tipo de Afiliación</th>
        </tr>
        <?php foreach ($results as $row): ?>
        <tr>
            <td><?php echo htmlspecialchars($row['nombre']); ?></td>
            <td><?php echo htmlspecialchars($row['fecha']); ?></td>
            <td><?php echo htmlspecialchars($row['tipo_afiliacion']); ?></td>
        </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>
