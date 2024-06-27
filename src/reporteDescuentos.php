<?php
include('bbdd.php');

// Consulta a la base de datos
$sql = "SELECT pacientes.nombre, atenciones.fecha, atenciones.descuento 
        FROM atenciones 
        INNER JOIN pacientes ON atenciones.paciente_id = pacientes.id 
        WHERE atenciones.descuento > 0";
$stmt = $con->prepare($sql);
$stmt->execute();
$results = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Calcular monto total del descuento
$total_descuento = 0;
foreach ($results as $row) {
    $total_descuento += $row['descuento'];
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reporte de Descuentos</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    <h1>Atenciones con descuento</h1>
    <table>
        <tr>
            <th>Nombre</th>
            <th>Fecha</th>
            <th>Descuento</th>
        </tr>
        <?php foreach ($results as $row): ?>
        <tr>
            <td><?php echo htmlspecialchars($row['nombre']); ?></td>
            <td><?php echo htmlspecialchars($row['fecha']); ?></td>
            <td><?php echo htmlspecialchars($row['descuento']); ?></td>
        </tr>
        <?php endforeach; ?>
    </table>
    <p>Monto total del descuento: <?php echo htmlspecialchars($total_descuento); ?></p>
</body>
</html>
