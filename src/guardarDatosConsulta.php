<?php

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
$fecha = $_POST['confirmDate'];
$hora = $_POST['confirmTime'];
$fechaAtencion = $fecha . ' ' . $hora;

// Crear objetos DateTime para la fecha de nacimiento y la fecha actual
$fechaNacimiento = new DateTime($nacimiento);
$fechaActual = new DateTime();

// Calcular la diferencia en años entre la fecha de nacimiento y la fecha actual
$edad = $fechaActual->diff($fechaNacimiento)->y;

// echo "Edad: $edad años";

if($edad >=65 && $servicio="fonasa"){
    $descuento = 0.20;
    $mDescuento = "Enorabuena! Usted por pertenecer a la 3era Edad y pertenecer a fonasa se ha ganado un descuento del 20%
                    del total a pagar, se le descontara al momento de pagar en caja el dia de su hora
                    en la clinica, no olvide llevar carnet de identidad";
}elseif($edad >=65 && $servicio="isapre"){
    $descuento = 0.10;
    $mDescuento = "Enorabuena! Usted por pertenecer a la 3era Edad y pertenecer a isapre se ha ganado un descuento del 10%
                    del total a pagar, se le descontara al momento de pagar en caja el dia de su hora
                    en la clinica, no olvide llevar carnet de identidad";

}
else{
    $descuento = 0;
    $mDescuento = "";
}

if($servicio == "Electrocardiograma (ECG)"){
    $servicio = 1;
} elseif($servicio == "Holter de presión"){
    $servicio = 2;
} elseif($servicio == "Holter de Ritmo"){
    $servicio = 3;
} elseif($servicio == "Ecocardiograma"){
    $servicio = 4;
} elseif($servicio == "Test de esfuerzo"){
    $servicio = 5;
} elseif($servicio == "Endoscopia Digestiva Alta"){
    $servicio = 6;
} else {
    $servicio = 7;
}

// Verificar si el paciente ya existe por su RUT
$stmt = $con->prepare("SELECT rut FROM pacientes WHERE rut = :rut");
$stmt->bindParam(':rut', $rut);
$stmt->execute();
$paciente_existente = $stmt->fetch(PDO::FETCH_ASSOC);

if ($paciente_existente) {
    // Si el paciente ya existe, solo registrar la cita
    $sql_insert_appointment = "INSERT INTO citas (rut_paciente, id_profesional, id_procedimiento, fecha_hora, descuento)
                               VALUES ('$rut', 1, $servicio, '$fechaAtencion', '$descuento')";
    
    $res2 = $con->query($sql_insert_appointment);
    
    // echo "Cita registrada correctamente.";
    $mensaje_exito = "Cita registrada correctamente.";
} else {
    // Si el paciente no existe, registrar primero al paciente y luego la cita
    $sql_insert_pacient = "INSERT INTO pacientes (rut, nombre, apellido, fechaNacimiento, nacionalidad, direccion, teléfono, tipo_Afiliación)
                           VALUES ('$rut', '$nombre', '$apellido', '$nacimiento', '$nacionalidad', '$direccion', '$telefono', '$afiliacion')";
    
    $sql_insert_appointment = "INSERT INTO citas (rut_paciente, id_profesional, id_procedimiento, fecha_hora, descuento)
                               VALUES ('$rut', 1, $servicio, '$fechaAtencion', $descuento)";
    
    $res1 = $con->query($sql_insert_pacient);
    $res2 = $con->query($sql_insert_appointment);
    
    $mensaje_exito = "Paciente y cita registrados correctamente.";
    // echo "Paciente y cita registrados correctamente.";
}

// Liberar recursos
$con = null;
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vida Sana</title>
    <link rel="shortcut icon" href="../img/logo4.webp" type="image/x-icon">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

</head>
<body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

    <header>
        <nav>
            <div class="logo">
                <a href="index.php"><img src="../img/logo4.webp" alt="Vida Sana Logo"></a>
            </div>
            <ul class="nav-links">
                <li><a href="../index.php">Inicio</a></li>
                <li><a href="quienessomos.php">Quienes Somos</a></li>
                <li><a href="ConsultasMedicas.php">Consultas Médicas</a></li>
                <li><a href="contacto.php">Contacto</a></li>
            </ul>
            <div class="nav-buttons">
                <!-- <button onclick="location.href='src/FormularioRegistrarse.php'">Registrarse</button> -->
                <button onclick="location.href='login.php'">Iniciar Sesión</button>
                <button onclick="location.href='ConsultaCita.php'">Consultar Cita</button>
            </div>
        </nav>
    </header>
    <main>
        <br><br><br>
        <section class="hero">
            <div class="alert alert-success" role="alert">
                <?php echo $mensaje_exito; ?>
                <hr>
                <?php echo $mDescuento; ?>
            </div>
        </section>
        <br><br><br>
    </main>
    <footer>
        <div class="footer-container">
            <div class="footer-section">
                <h3>Sobre Nosotros</h3>
                <p>Somos una empresa dedicada a ofrecer servicios de salud de calidad. Nuestro objetivo es mejorar la vida de nuestros clientes con un enfoque integral y personalizado.</p>
            </div>
            <div class="footer-section">
                <h3>Enlaces Rápidos</h3>
                <ul>
                    <li><a href="#">Inicio</a></li>
                    <li><a href="#">Servicios</a></li>
                    <li><a href="#">Sobre Nosotros</a></li>
                    <li><a href="#">Contacto</a></li>
                </ul>
            </div>
            <div class="footer-section">
                <h3>Contacto</h3>
                <p>Dirección: Calle Falsa 123, Ciudad, País</p>
                <p>Teléfono: (123) 456-7890</p>
                <p>Email: info@vidasana.com</p>
            </div>
            <div class="footer-section">
                <h3>Síguenos</h3>
                <div class="social-icons">
                    <a href="#"><i class="fab fa-facebook-f"></i></a>
                    <a href="#"><i class="fab fa-twitter"></i></a>
                    <a href="#"><i class="fab fa-instagram"></i></a>
                    <a href="#"><i class="fab fa-linkedin-in"></i></a>
                </div>
            </div>
        </div>
        <hr>
        <div class="footer-bottom">
            &copy; 2024 VidaSana. Todos los derechos reservados.
        </div>
    </footer>

    <script src="js/nose.js"></script>
</body>
</html>
