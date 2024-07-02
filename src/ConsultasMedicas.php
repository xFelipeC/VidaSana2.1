<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consultas Médicas - Vida Sana</title>
    <link rel="shortcut icon" href="../img/logo4.webp" type="image/x-icon">
    <link rel="stylesheet" href="../css/consultasMedicas.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href='https://cdn.jsdelivr.net/npm/fullcalendar@5.10.1/main.min.css' rel='stylesheet' />
    <style>
        .doctor-info {
            display: flex;
            align-items: center;
            margin-bottom: 10px;
        }
        .doctor-info img {
            border-radius: 50%;
            margin-right: 15px;
        }
        .doctor-details p {
            margin: 0;
        }
        .hora-card {
            border: 1px solid #00796b;
            border-radius: 10px;
            padding: 15px;
            background-color: #f9f9f9;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        .hora-button {
            margin: 5px;
            background-color: #00796b;
            color: white;
            border: none;
            padding: 10px;
            border-radius: 5px;
            cursor: pointer;
        }
        .hora-button:hover {
            background-color: #005f56;
        }
        .btn-info {
            background-color: #00796b;
            color: white;
            border: none;
            padding: 10px;
            border-radius: 5px;
            cursor: pointer;
            margin-top: 10px;
        }
        .btn-info:hover {
            background-color: #005f56;
        }
    </style>
</head>
<body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src='https://cdn.jsdelivr.net/npm/fullcalendar@5.10.1/main.min.js'></script>

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
            <div class="nav-buttons">
                <!-- <button onclick="location.href='FormularioRegistrarse.php'">Registrarse</button> -->
                <button onclick="location.href='login.php'">Iniciar Sesión</button>
                <button onclick="location.href='ConsultaCita.php'">Consultar Cita</button>
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
                <!-- <form id="step1Form" action="" method="post" > -->
                    <div class="form-group">
                        <label for="docType">Documento de Identificación</label>
                        <select id="docType" class="form-control">
                            <option value="carnet">Carnet de Identidad</option>
                            <option value="passport">Pasaporte</option>
                        </select>
                    </div>
                    <!-- <form action="ConsultasMedicas.php" method="post"> -->
                    <div class="form-group">
                        <label for="rut">RUT del Paciente (Con puntos y guion)</label>
                        <input type="text" id="rut" class="form-control" placeholder="Ej: 11.222.333-4">
                        <small id="rutHelp" class="form-text text-muted">Ingrese RUT del paciente</small>
                    </div>
                    <!-- </form> -->
                    <button type="button" class="btn btn-primary" onclick="nextStep(2)">Continuar</button>
                <!-- </form> -->
            </div>

            <!-- Paso 2: Formulario de Registro -->
            <div class="step-form" id="step2" style="display:none;">
                <h2 class="step-subtitle">Paso 2: Registrarse</h2>
                <div class="container">
                    <div class="card card-primary" style="max-width: 500px; margin: 40px auto; padding: 20px;">
                        <div class="card-header" style="background-color: #00796b; color: #ffffff;">
                            <h3 class="card-title">Registrate</h3>
                        </div>
                        <!-- <form id="step2Form"> -->
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="nombre">Nombre</label>
                                    <input type="text" class="form-control" id="nombre" name="nombre" value="<?php $nombre ?>" placeholder="Ingrese su nombre" required>
                                </div>
                                <div class="form-group">
                                    <label for="apellido">Apellido</label>
                                    <input type="text" class="form-control" id="apellido" name="apellido" placeholder="Ingrese su apellido" required>
                                </div>
                                <div class="form-group">
                                    <label for="nacionalidad">Nacionalidad</label>
                                    <input type="text" class="form-control" id="nacionalidad" name="nacionalidad" placeholder="Ingrese su nacionalidad" required>
                                </div>
                                <div class="form-group">
                                    <label for="direccion">Dirección</label>
                                    <input type="text" class="form-control" id="direccion" name="direccion" placeholder="Ingrese su dirección" required>
                                </div>
                                <div class="form-group">
                                    <label for="fecha_nacimiento">Fecha de Nacimiento</label>
                                    <input type="date" class="form-control" id="fecha_nacimiento" name="fecha_nacimiento" required>
                                </div>
                                <div class="form-group">
                                    <label for="telefono">Teléfono</label>
                                    <input type="text" class="form-control" id="telefono" name="telefono" placeholder="Ingrese su teléfono" required>
                                </div>
                                <div class="form-group">
                                    <label for="afiliacion">Tipo de Afiliación</label>
                                    <select class="form-control" id="afiliacion" name="afiliacion" required>
                                        <option value="fonasa">FONASA</option>
                                        <option value="isapre">ISAPRE</option>
                                    </select>
                                </div>
                            </div>
                            <div class="card-footer">
                            <form action="" method="post"> 
                                <button type="submit" class="btn btn-secondary back-button" >Volver al paso anterior</button>
                                <button type="button" class="btn btn-primary" onclick="nextStep(3)">Registrar</button>
                            </form>
                            </div>
                        <!-- </form> -->
                    </div>
                </div>
            </div>
            <!-- Paso 3: Seleccionar servicio -->
            <!-- <form id="step3Form"> -->
                <div class="step-form" id="step3" style="display:none;">
                <h2 class="step-subtitle">Paso 3: Seleccionar servicio</h2>
                <h3 class="service-title">Nuestros Servicios</h3>
                <div class="service-selection">
                    <div class="service-option" onclick="selectService('Electrocardiograma (ECG)'); nextStep(4);">
                        <i class="fas fa-heartbeat"></i>
                        <p>Electrocardiograma (ECG)</p>
                    </div>
                    <div class="service-option" onclick="selectService('Holter de presión'); nextStep(4);">
                        <i class="fas fa-stethoscope"></i>
                        <p>Holter de presión</p>
                    </div>
                    <div class="service-option" onclick="selectService('Holter de Ritmo'); nextStep(4);">
                        <i class="fas fa-pulse"></i>
                        <p>Holter de Ritmo</p>
                    </div>
                    <div class="service-option" onclick="selectService('Ecocardiograma'); nextStep(4);">
                        <i class="fas fa-heart"></i>
                        <p>Ecocardiograma</p>
                    </div>
                    <div class="service-option" onclick="selectService('Test de esfuerzo'); nextStep(4);">
                        <i class="fas fa-running"></i>
                        <p>Test de esfuerzo</p>
                    </div>
                    <div class="service-option" onclick="selectService('Endoscopia Digestiva Alta'); nextStep(4);">
                        <i class="fas fa-procedures"></i>
                        <p>Endoscopia Digestiva Alta</p>
                    </div>
                    <div class="service-option" onclick="selectService('Endoscopia Digestiva Baja (Colonoscopia)'); nextStep(4);">
                        <i class="fas fa-procedures"></i>
                        <p>Endoscopia Digestiva Baja (Colonoscopia)</p>
                    </div>
                </div>
                <button type="button" class="btn btn-secondary back-button" onclick="prevStep(2)">Volver al paso anterior</button>
            </div>
            <!-- </form> -->
            <!-- Paso 4: Calendario -->
            <div class="step-form" id="step4" style="display:none;">
                <h2 class="step-subtitle">Paso 4: Seleccionar día y hora</h2>
                <div id='calendar'></div>
                <div id="horasDisponibles"></div>
                <input type="hidden" id="selectedDate">
                <input type="hidden" id="selectedTime">
                <button type="button" class="btn btn-secondary back-button" onclick="prevStep(3)">Volver al paso anterior</button>
                <button type="button" class="btn btn-primary" onclick="nextStep(5)">Continuar</button>
            </div>
            <!-- Paso 5: Confirmar detalles -->
            
                <div class="step-form" id="step5" style="display:none;">
                    <h2 class="step-subtitle">Paso 5: Confirmar detalles</h2>
                    <div class="confirmation-details">
                    <!-- <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Ingrese su nombre"> -->
                    <p><strong>Documento de Identificación:</strong> <span id="confirmDocType"></span></p>
                    <p><strong>RUT del Paciente:</strong> <span id="confirmRUT"></span></p>
                    <p><strong>Nombre:</strong> <span id="confirmNombre"></span></p>
                    <p><strong>Apellido:</strong> <span id="confirmApellido"></span></p>
                    <p><strong>Fecha de Nacimiento:</strong> <span id="confirmFechaNacimiento"></span></p>
                    <p><strong>Nacionalidad:</strong> <span id="confirmNacionalidad"></span></p>
                    <p><strong>Dirección:</strong> <span id="confirmDireccion"></span></p>
                    <p><strong>Teléfono:</strong> <span id="confirmTelefono"></span></p>
                    <p><strong>Tipo de Afiliación:</strong> <span id="confirmAfiliacion"></span></p>
                    <p><strong>Servicio Seleccionado:</strong> <span id="confirmService"></span></p>
                    <p><strong>Fecha:</strong> <span id="confirmDate"></span></p>
                    <p><strong>Hora:</strong> <span id="confirmTime"></span></p>
                    <!-- <input type="hidden" id="confirmDocType" name="confirmDocType">
                    <input type="hidden" id="confirmRUT" name="confirmRUT">
                    <input type="hidden" id="confirmNombre" name="confirmNombre">
                    <input type="text" id="confirmApellido" name="confirmApellido">
                    <input type="hidden" id="confirmFechaNacimiento" name="confirmFechaNacimiento">
                    <input type="hidden" id="confirmNacionalidad" name="confirmNacionalidad">
                    <input type="hidden" id="confirmDireccion" name="confirmDireccion">
                    <input type="hidden" id="confirmTelefono" name="confirmTelefono">
                    <input type="hidden" id="confirmAfiliacion" name="confirmAfiliacion">
                    <input type="hidden" id="confirmService" name="confirmService">
                    <input type="hidden" id="confirmDate" name="confirmDate">
                    <input type="hidden" id="confirmTime" name="confirmTime"> -->
                    <form role="form "id="step5Form" action="guardarDatosConsulta.php" method="post" onsubmit="copiarValoresASpan();">
                    <input type="hidden" id="inputDocType" name="confirmDocType">
                    <input type="hidden" id="inputRUT" name="confirmRUT">
                    <input type="hidden" id="inputNombre" name="confirmNombre">
                    <input type="hidden" id="inputApellido" name="confirmApellido">
                    <input type="hidden" id="inputFechaNacimiento" name="confirmFechaNacimiento">
                    <input type="hidden" id="inputNacionalidad" name="confirmNacionalidad">
                    <input type="hidden" id="inputDireccion" name="confirmDireccion">
                    <input type="hidden" id="inputTelefono" name="confirmTelefono">
                    <input type="hidden" id="inputAfiliacion" name="confirmAfiliacion">
                    <input type="hidden" id="inputService" name="confirmService">
                    <input type="hidden" id="inputDate" name="confirmDate">
                    <input type="hidden" id="inputTime" name="confirmTime">

                    <!-- <input type="time" name="" id="">
                    <input type="date" name="" id=""> -->
                    </div>
                    <!-- <button type="button" class="btn btn-primary" onclick="submitForm()">Confirmar y Continuar</button>
                    <button type="button" class="btn btn-secondary back-button" onclick="prevStep(4)">Volver al paso anterior</button> -->
                    <input type="submit" class="btn btn-primary" value="Confirmar y Continuar">
                    <input type="Button" class="btn btn-secondary back-button" onclick="prevStep(4)" value="Volver al paso anterior">
                </div>
                
            </form>
        </section>
    </main>
    
    <script src="../js/consultas.js"></script>
    <script>
        function actualizarCampoIdentificacion() {
            const docType = document.getElementById('docType').value;
            const labelIdentificacion = document.getElementById('labelIdentificacion');
            const rutHelp = document.getElementById('rutHelp');
            
            if (docType === 'passport') {
                labelIdentificacion.textContent = 'Pasaporte del Paciente';
                rutHelp.textContent = 'Ingrese el número de pasaporte del paciente';
                document.getElementById('rut').placeholder = 'Ej: 123456789';
            } else {
                labelIdentificacion.textContent = 'RUT del Paciente (Con puntos y guion)';
                rutHelp.textContent = 'Ingrese RUT del paciente';
                document.getElementById('rut').placeholder = 'Ej: 11.222.333-4';
            }
        }

        function nextStep(stepNumber) {
            for (let i = 1; i <= 5; i++) {
                document.getElementById(step${i}).style.display = i === stepNumber ? 'block' : 'none';
                document.getElementById(stepIndicator${i}).classList.toggle('active', i === stepNumber);
            }
        }

        function prevStep(stepNumber) {
            nextStep(stepNumber);
        }

        function selectService(service) {
            document.getElementById('confirmService').textContent = service;
        }

        function selectDoctor(doctor) {
            document.getElementById('confirmDoctor').textContent = doctor;
        }

        function submitReservation() {
            alert('Reserva confirmada.');
            // Aquí puedes agregar la lógica para enviar la reserva al servidor
        }
    </script>

</body>
</html>
<!-- <input type="submit" name="Login" value="Login" > -->