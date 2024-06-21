<?php
require_once '../src/bbdd.php';

// Verifica si se ha enviado el formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener los datos del cuerpo de la solicitud
    $input = json_decode(file_get_contents('php://input'), true);

    // Variables para almacenar los datos
    $rut = $input['rut'];
    $nombre = $input['nombre'];
    $apellido = $input['apellido'];
    $fecha_nacimiento = $input['fecha_nacimiento'];
    $nacionalidad = $input['nacionalidad'];
    $direccion = $input['direccion'];
    $telefono = $input['telefono'];
    $afiliacion = $input['afiliacion'];

    // Verifica que todos los campos estén completos
    if ($nombre && $apellido && $rut && $nacionalidad && $direccion && $fecha_nacimiento && $telefono && $afiliacion) {
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

            // Prepara la consulta SQL
            $sql = "INSERT INTO pacientes (rut, nombre, apellido, fechaNacimiento, nacionalidad, direccion, teléfono, tipo_Afiliación) 
                    VALUES (:rut, :nombre, :apellido, :fecha_nacimiento, :nacionalidad, :direccion, :telefono, :afiliacion)";

            $stmt = $con->prepare($sql);

            // Asigna los valores a los parámetros
            $stmt->bindParam(':rut', $rut);
            $stmt->bindParam(':nombre', $nombre);
            $stmt->bindParam(':apellido', $apellido);
            $stmt->bindParam(':fecha_nacimiento', $fecha_nacimiento);
            $stmt->bindParam(':nacionalidad', $nacionalidad);
            $stmt->bindParam(':direccion', $direccion);
            $stmt->bindParam(':telefono', $telefono);
            $stmt->bindParam(':afiliacion', $afiliacion);

            // Ejecuta la consulta
            $stmt->execute();
            echo "Datos insertados correctamente.";
        } catch (PDOException $e) {
            echo "Error al insertar los datos: " . $e->getMessage();
        }
    } else {
        echo "Por favor, complete todos los campos.";
    }
} else {
    echo "Formulario no enviado.";
}
?>
