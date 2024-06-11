<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vida Sana</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

    <header>
        <nav>
            <div class="logo">
                <img src="img/papagranel.jpg" alt="Vida Sana Logo">
            </div>
            <ul class="nav-links">
                <li><a href="index.php">Inicio</a></li>
                <li><a href="src/quienessomos.php">Quienes Somos</a></li>
                <li><a href="src/ConsultasMedicas.php">Consultas Médicas</a></li>
                <li><a href="src/contacto.php">Contacto</a></li>
            </ul>
            <div class="nav-buttons">
                <button onclick="location.href='#'">Registrarse</button>
                <button onclick="location.href='#'">Iniciar Sesión</button>
            </div>
        </nav>
    </header>
    <main>
        <section class="hero">
            <h1 style="color: #00796b;">Consultas Médicas</h1>
            <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-indicators">
                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
                </div>
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="img/electrocardiograma-registro-y-analisis.png" class="d-block w-100" alt="...">
                    </div>
                    <div class="carousel-item">
                        <img src="img/Pruebascardiologicas.png" class="d-block w-100" alt="...">
                    </div>
                    <div class="carousel-item">
                        <img src="img/gastroenterologia.png" class="d-block w-100" alt="...">
                    </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
            <p style="color: #00796b;">En <span class="highlight">Vida Sana</span>, ofrecemos servicios asociados a atención médica, imagenología, laboratorio y procedimientos</p>
            <div class="services">
                <div class="service">
                    <i class="fas fa-heartbeat"></i>
                    <h3 style="color: #00796b;">Electrocardiograma (ECG)</h3>
                    <a href="#">+</a>
                </div>
                <div class="service">
                    <i class="fas fa-stethoscope"></i>
                    <h3 style="color: #00796b;">Holter de presión</h3>
                    <a href="#">+</a>
                </div>
                <div class="service">
                    <i class="fas fa-procedures"></i>
                    <h3 style="color: #00796b;">Holter de Ritmo</h3>
                    <a href="#">+</a>
                </div>
                <div class="service">
                    <i class="fas fa-heart"></i>
                    <h3 style="color: #00796b;">Ecocardiograma</h3>
                    <a href="#">+</a>
                </div>
                <div class="service">
                    <i class="fas fa-running"></i>
                    <h3 style="color: #00796b;">Test de esfuerzo</h3>
                    <a href="#">+</a>
                </div>
                <div class="service">
                    <i class="fas fa-x-ray"></i>
                    <h3 style="color: #00796b;">Endoscopia Digestiva Alta/Baja</h3>
                    <a href="#">+</a>
                </div>
            </div>
        </section>
    </main>
    <script src="js/nose.js"></script>
</body>
</html>
