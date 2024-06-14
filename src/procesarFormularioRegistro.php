<?php
require_once '../src/bbdd.php';

// Verifica si se ha enviado el formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // Variables para almacenar los datos
  $nombre = filter_input(INPUT_POST, 'nombre', FILTER_SANITIZE_STRING);
  $apellido = filter_input(INPUT_POST, 'apellido', FILTER_SANITIZE_STRING);
  $rut = filter_input(INPUT_POST, 'rut', FILTER_SANITIZE_STRING);
  $nacionalidad = filter_input(INPUT_POST, 'nacionalidad', FILTER_SANITIZE_STRING);
  $direccion = filter_input(INPUT_POST, 'direccion', FILTER_SANITIZE_STRING);
  $fecha_nacimiento = filter_input(INPUT_POST, 'fecha_nacimiento', FILTER_SANITIZE_STRING);
  $telefono = filter_input(INPUT_POST, 'telefono', FILTER_SANITIZE_STRING);
  $afiliacion = filter_input(INPUT_POST, 'afiliacion', FILTER_SANITIZE_STRING);

  // Verifica que todos los campos estén completos
  if ($nombre && $apellido && $rut && $nacionalidad && $direccion && $fecha_nacimiento && $telefono && $afiliacion) {
    try {
      $dbDireccion = "localhost";
      $usuario = "root";
      $contrasena = "";
      $nombreDB = "VidaSana";
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
