<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consultas Médicas - Vida Sana</title>
    <link rel="stylesheet" href="../css/consultasMedicas.css"> <!-- Enlace al nuevo archivo CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

    <header>
        <nav>
            <div class="logo">
                <img src="../img/papagranel.jpg" alt="Vida Sana Logo">
            </div>
            <ul class="nav-links">
                <li><a href="../index.php">Inicio</a></li>
                <li><a href="quienessomos.php">Quienes Somos</a></li>
                <li><a href="ConsultasMedicas.php">Consultas Médicas</a></li>
                <li><a href="contacto.php">Contacto</a></li>
            </ul>
            <div class="nav-buttons">
                <button onclick="location.href='#'">Registrarse</button>
                <button onclick="location.href='#'">Iniciar Sesión</button>
            </div>
        </nav>
    </header>
    <main>
        <section class="step-section">
            <h1 class="step-title">Reserva de hora</h1>
            <div class="step-progress">
                <div class="progress-bar">
                    <div class="step" id="stepIndicator1">1</div>
                    <div class="line"></div>
                    <div class="step" id="stepIndicator2">2</div>
                    <div class="line"></div>
                    <div class="step" id="stepIndicator3">3</div>
                    <div class="line"></div>
                    <div class="step" id="stepIndicator4">4</div>
                    <div class="line"></div>
                    <div class="step" id="stepIndicator5">5</div>
                </div>
            </div>
            <!-- Paso 1: Identificar paciente -->
            <div class="step-form" id="step1">
                <form>
                    <div class="form-group">
                        <label for="docType">Documento de Identificación</label>
                        <select id="docType" class="form-control">
                            <option value="carnet">Carnet de Identidad</option>
                            <option value="passport">Pasaporte</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="rut">RUT del Paciente</label>
                        <input type="text" id="rut" class="form-control" placeholder="Ej: 8.765.432-1">
                        <small id="rutHelp" class="form-text text-muted">Ingrese RUT del paciente</small>
                    </div>
                    <button type="button" class="btn btn-primary" onclick="nextStep(2)">Continuar</button>
                </form>
            </div>
            <!-- Paso 2: Seleccionar servicio -->
            <div class="step-form" id="step2" style="display:none;">
                <h2 class="step-subtitle">Paso 2: Seleccionar servicio</h2>
                <h3 class="service-title">Nuestros Servicios</h3>
                <div class="service-selection">
                    <div class="service-option" onclick="nextStep(3)">
                        <i class="fas fa-heartbeat"></i>
                        <p>Electrocardiograma (ECG)</p>
                    </div>
                    <div class="service-option" onclick="nextStep(3)">
                        <i class="fas fa-stethoscope"></i>
                        <p>Holter de presión</p>
                    </div>
                    <div class="service-option" onclick="nextStep(3)">
                        <i class="fas fa-pulse"></i>
                        <p>Holter de Ritmo</p>
                    </div>
                    <div class="service-option" onclick="nextStep(3)">
                        <i class="fas fa-heart"></i>
                        <p>Ecocardiograma</p>
                    </div>
                    <div class="service-option" onclick="nextStep(3)">
                        <i class="fas fa-running"></i>
                        <p>Test de esfuerzo</p>
                    </div>
                    <div class="service-option" onclick="nextStep(3)">
                        <i class="fas fa-procedures"></i>
                        <p>Endoscopia Digestiva Alta</p>
                    </div>
                    <div class="service-option" onclick="nextStep(3)">
                        <i class="fas fa-procedures"></i>
                        <p>Endoscopia Digestiva Baja (Colonoscopia)</p>
                    </div>
                </div>
                <button type="button" class="btn btn-secondary back-button" onclick="prevStep(1)">Volver al paso anterior</button>
            </div>
            <!-- Otros pasos irían aquí -->
        </section>
    </main>
    <script src="../js/consultas.js"></script>
</body>
</html>
