<?php
    //iniciamos session
    session_start();

    //traemos informacion y la guardamos en variables por ejemplo
    //$app = $_SESSION['app'];

    //aqui con con el include traemos todos los registros del archivo en este caso de la base de datos
    include('bbdd.php');

    $userName = $_SESSION["nombreProfesional"];
    
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contacto - Vida Sana</title>
    <link rel="shortcut icon" href="../img/logo4.webp" type="image/x-icon">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/login.css">

</head>
<body>
    <header>
        <nav>
            <div class="logo">
                <img src="../img/logo4.webp" alt="Vida Sana Logo">
            </div>
            <ul class="nav-links">
                <li><a href="../index.php">Inicio</a></li>
                <li><a href="quienessomos.php">Quienes Somos</a></li>
                <li><a href="ConsultasMedicas.php">Consultas Médicas</a></li>
                <li><a href="contacto.php">Contacto</a></li>
            </ul>
        </nav>
    </header>
    <main>
        <section class="about-us">
        <div class="container mt-5">
        <h1>Bienvenido Doctor:</h1>
        <p><b><?php echo $userName ?></b></p>
    </div>

        </section>
    </main>
</body>
</html>