<?php
require_once '../src/bbdd.php';

// Verifica si se ha enviado el formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener el RUT del formulario
    $rut = $_POST['rut'] ?? null;

    // Verifica que el RUT esté completo
    if ($rut) {
        try {
            $dbDireccion = "localhost";
            $usuario = "root";
            $contrasena = "";
            $nombreDB = "VidaSana";
            // $direccion="localhost";
            // $usuario="id22346718_vidasana";
            // $contrasena="vidaSana777*";
            // $nombreDB="id22346718_vidasana";
            $conexionDB = new ConexionBd($dbDireccion, $usuario, $contrasena, $nombreDB);
            $con = $conexionDB->obtenerConexion();

            // Prepara la consulta SQL para obtener los datos del paciente
            $sql = "SELECT * FROM pacientes WHERE rut = :rut";
            $stmt = $con->prepare($sql);

            // Asigna el valor al parámetro
            $stmt->bindParam(':rut', $rut);

            // Ejecuta la consulta
            $stmt->execute();

            // Obtiene el resultado
            $resultado = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($resultado) {
                // Muestra los datos del paciente
                echo "RUT: " . htmlspecialchars($resultado['rut']) . "<br>";
                echo "Nombre: " . htmlspecialchars($resultado['nombre']) . "<br>";
                echo "Apellido: " . htmlspecialchars($resultado['apellido']) . "<br>";
                echo "Fecha de Nacimiento: " . htmlspecialchars($resultado['fechaNacimiento']) . "<br>";
                echo "Nacionalidad: " . htmlspecialchars($resultado['nacionalidad']) . "<br>";
                echo "Dirección: " . htmlspecialchars($resultado['direccion']) . "<br>";
                echo "Teléfono: " . htmlspecialchars($resultado['teléfono']) . "<br>";
                echo "Tipo de Afiliación: " . htmlspecialchars($resultado['tipo_Afiliación']) . "<br>";
            } else {
                echo "No se encontró ningún paciente con el RUT proporcionado.";
            }
        } catch (PDOException $e) {
            echo "Error al obtener los datos: " . $e->getMessage();
        }
    } else {
        echo "Por favor, proporcione un RUT.";
    }
} else {
    echo "Formulario no enviado.";
}
?>
