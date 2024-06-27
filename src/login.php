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
                <a href="../index.php"><img src="../img/logo4.webp" alt="Vida Sana Logo"></a>
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
        <h1>Iniciar Session</h1>
        <p><b>Esta Seccion es para Personal de la Clinica</b></p>
        <br>
        <div class="formulario">
            
            <form id="loginForm" method="POST" action="postLogin.php">
                <div class="form-group">
                    <label for="username">Usuario</label>
                    <input type="text" id="username" name="username" class="form-control" placeholder="Ingrese su usuario" required>
                </div>
                <div class="form-group">
                    <label for="password">Contraseña</label>
                    <input type="password" id="password" name="password" class="form-control" placeholder="Ingrese su contraseña" required>
                </div>
                <button type="submit" class="btn btn-primary">Iniciar Sesión</button>
            </form>
            <img src="../img/carruzel3.jpg" alt="">
        </div>
    </div>

        </section>
    </main>
</body>
</html>
