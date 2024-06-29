<?php

// session_start();
require_once '../src/bbdd.php';


// Obtener datos del formulario
$tipoDocumento = $_POST['confirmDocType'];
$rut = $_POST['confirmRUT'];
$nombre = $_POST['confirmNombre'];
$apellido = $_POST['confirmApellido'];
$nacimiento = $_POST['confirmFechaNacimiento'];
$nacionalidad = $_POST['confirmNacionalidad'];
$direccion = $_POST['confirmDireccion'];
$telefono = $_POST['confirmTelefono'];
$afiliacion = $_POST['confirmAfiliacion'];
$servicio = $_POST['confirmService'];
$fechaAtencion = $_POST['confirmDate'];
$hora = $_POST['confirmTime'];

if($afiliacion = "Electrocardiograma"){
    $afiliacion = 1;
}elseif($afiliacion = "Holter de Presión"){
    $afiliacion = 2;
}elseif($afiliacion = "Holter de Ritmo"){
    $afiliacion = 3;
}elseif($afiliacion = "Ecocardiograma"){
    $afiliacion = 4;
}elseif($afiliacion = "Test de Esfuerzo"){
    $afiliacion = 5;
}elseif($afiliacion = "Endoscopia Digestiva Alta"){
    $afiliacion = 6;
}else{
    $afiliacion = 7;
}



// echo $confirmApellido;
// echo "hello world";
// //pruebas
//  $sql = "insert into persona values('$rut','$userName','$secondName','$surName','$secondSurName','$number','$email','$password');";
// // echo $sql;

// // //  if ($password == $cpassword){

// //         $res = $bd->query($sql); //haz la consulta

//         //fin prueba

// Verificar si el paciente ya existe en la base de datos
$sql_check_patient = "SELECT * FROM pacientes WHERE rut=?";
$stmt = $con->prepare($sql_check_patient);
$stmt->bind_param("s", $confirmRUT);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows == 0) {
    // Insertar nuevo paciente si no existe
    $sql_insert_patient = "INSERT INTO pacientes (rut, nombre, apellido, fechaNacimiento, nacionalidad, direccion, teléfono, tipo_Afiliación)
                           VALUES ($rut, $nombre, $apellido, $nacimiento, $nacionalidad, $direccion, $telefono, $afiliacion)";
    $stmt_insert = $con->prepare($sql_insert_patient);
    $stmt_insert->bind_param("ssssssss", $confirmRUT, $confirmNombre, $confirmApellido, $confirmFechaNacimiento, $confirmNacionalidad, $confirmDireccion, $confirmTelefono, $confirmAfiliacion);

    if ($stmt_insert->execute()) {
        echo "Nuevo paciente registrado correctamente.";
    } else {
        echo "Error al registrar nuevo paciente: " . $stmt_insert->error;
    }
    $stmt_insert->close();
}

// Obtener ID del profesional basado en el nombre
$sql_get_professional = "SELECT id_profesional FROM profesionales WHERE nombre=?";
$stmt_professional = $con->prepare($sql_get_professional);
$stmt_professional->bind_param("s", $confirmService);
$stmt_professional->execute();
$result_professional = $stmt_professional->get_result();

if ($result_professional->num_rows > 0) {
    $row_professional = $result_professional->fetch_assoc();
    $id_profesional = $row_professional['id_profesional'];

    // Insertar datos en la tabla citas
    $fecha_hora = $confirmDate . " " . $confirmTime;
    $sql_insert_appointment = "INSERT INTO citas (rut_paciente, id_profesional, id_procedimiento, fecha_hora, descuento)
                               VALUES (?, ?, NULL, ?, 0)";
    $stmt_appointment = $con->prepare($sql_insert_appointment);
    $stmt_appointment->bind_param("sis", $confirmRUT, $id_profesional, $fecha_hora);

    if ($stmt_appointment->execute()) {
        echo "Cita registrada correctamente.";
    } else {
        echo "Error al registrar cita: " . $stmt_appointment->error;
    }
    $stmt_appointment->close();
} else {
    echo "Profesional no encontrado.";
}

$stmt_professional->close();
$con->close();
?>