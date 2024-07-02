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
                    <select id="docType" class="form-control" onchange="actualizarCampoIdentificacion()">
                        <option value="carnet">Carnet de Identidad</option>
                        <option value="passport">Pasaporte</option>
                    </select>
                </div>
                <!-- <form action="ConsultasMedicas.php" method="post"> -->
                <div class="form-group">
                    <label for="rut" id="labelIdentificacion">RUT del Paciente (Con puntos y guion)</label>
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
                                <button type="submit" class="btn btn-secondary back-button">Volver al paso anterior</button>
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
                <div class="container">
                    <div class="row">
                        <div class="col-md-4 service-card">
                            <div class="card">
                                <img src="../img/general.jpg" class="card-img-top" alt="Medicina General">
                                <div class="card-body">
                                    <h5 class="card-title">Medicina General</h5>
                                    <p class="card-text">Consulta de medicina general para diagnóstico y tratamiento de enfermedades comunes.</p>
                                    <button class="btn btn-info" onclick="selectService('Medicina General')">Seleccionar</button>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 service-card">
                            <div class="card">
                                <img src="../img/pediatria.jpg" class="card-img-top" alt="Pediatría">
                                <div class="card-body">
                                    <h5 class="card-title">Pediatría</h5>
                                    <p class="card-text">Consulta especializada para el cuidado de la salud de los niños.</p>
                                    <button class="btn btn-info" onclick="selectService('Pediatría')">Seleccionar</button>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 service-card">
                            <div class="card">
                                <img src="../img/ginecologia.jpg" class="card-img-top" alt="Ginecología">
                                <div class="card-body">
                                    <h5 class="card-title">Ginecología</h5>
                                    <p class="card-text">Consulta especializada en salud reproductiva y bienestar femenino.</p>
                                    <button class="btn btn-info" onclick="selectService('Ginecología')">Seleccionar</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4 service-card">
                            <div class="card">
                                <img src="../img/dermatologia.jpg" class="card-img-top" alt="Dermatología">
                                <div class="card-body">
                                    <h5 class="card-title">Dermatología</h5>
                                    <p class="card-text">Consulta especializada en el cuidado de la piel y tratamiento de enfermedades cutáneas.</p>
                                    <button class="btn btn-info" onclick="selectService('Dermatología')">Seleccionar</button>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 service-card">
                            <div class="card">
                                <img src="../img/odontologia.jpg" class="card-img-top" alt="Odontología">
                                <div class="card-body">
                                    <h5 class="card-title">Odontología</h5>
                                    <p class="card-text">Consulta especializada en salud bucal y cuidado dental.</p>
                                    <button class="btn btn-info" onclick="selectService('Odontología')">Seleccionar</button>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 service-card">
                            <div class="card">
                                <img src="../img/cardiologia.jpg" class="card-img-top" alt="Cardiología">
                                <div class="card-body">
                                    <h5 class="card-title">Cardiología</h5>
                                    <p class="card-text">Consulta especializada en el diagnóstico y tratamiento de enfermedades del corazón.</p>
                                    <button class="btn btn-info" onclick="selectService('Cardiología')">Seleccionar</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <button class="btn btn-secondary back-button" onclick="previousStep(2)">Volver al paso anterior</button>
            </div>
            <!-- </form> -->
            <!-- Paso 4: Seleccionar fecha y hora -->
            <div class="step-form" id="step4" style="display:none;">
                <h2 class="step-subtitle">Paso 4: Seleccionar fecha y hora</h2>
                <div id='calendar'></div>
                <div id="selectedDate"></div>
                <div id="timeSlots"></div>
                <button class="btn btn-secondary back-button" onclick="previousStep(3)">Volver al paso anterior</button>
            </div>
            <!-- Paso 5: Confirmación -->
            <div class="step-form" id="step5" style="display:none;">
                <h2 class="step-subtitle">Paso 5: Confirmación</h2>
                <div class="container">
                    <div class="card hora-card">
                        <div class="card-body">
                            <h5 class="card-title">Confirmación de Cita</h5>
                            <p class="card-text"><strong>Paciente:</strong> <span id="confirmacionPaciente"></span></p>
                            <p class="card-text"><strong>Servicio:</strong> <span id="confirmacionServicio"></span></p>
                            <p class="card-text"><strong>Fecha:</strong> <span id="confirmacionFecha"></span></p>
                            <p class="card-text"><strong>Hora:</strong> <span id="confirmacionHora"></span></p>
                        </div>
                    </div>
                </div>
                <button class="btn btn-primary" onclick="confirmBooking()">Confirmar</button>
                <button class="btn btn-secondary back-button" onclick="previousStep(4)">Volver al paso anterior</button>
            </div>
        </section>
    </main>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var calendarEl = document.getElementById('calendar');
            var calendar = new FullCalendar.Calendar(calendarEl, {
                initialView: 'dayGridMonth',
                selectable: true,
                dateClick: function(info) {
                    var selectedDate = info.dateStr;
                    document.getElementById('selectedDate').innerHTML = "Fecha seleccionada: " + selectedDate;
                    showTimeSlots(selectedDate);
                }
            });
            calendar.render();
        });

       
        function actualizarCampoIdentificacion() {
    const docType = document.getElementById('docType').value;
    const labelIdentificacion = document.getElementById('labelIdentificacion');
    const rutInput = document.getElementById('rut');
    const rutHelp = document.getElementById('rutHelp');

    if (docType === 'carnet') {
        labelIdentificacion.textContent = 'RUT del Paciente (Con puntos y guion)';
        rutHelp.textContent = 'Ingrese RUT del paciente';
        rutInput.placeholder = 'Ej: 11.222.333-4';
    } else if (docType === 'passport') {
        labelIdentificacion.textContent = 'Pasaporte del Paciente';
        rutHelp.textContent = 'Ingrese el número de pasaporte';
        rutInput.placeholder = 'Ej: 123456789';
    }
}

        function showTimeSlots(selectedDate) {
            var timeSlotsContainer = document.getElementById('timeSlots');
            timeSlotsContainer.innerHTML = ""; // Clear previous time slots

            var availableSlots = [
                "09:00 - 09:30",
                "10:00 - 10:30",
                "11:00 - 11:30",
                "14:00 - 14:30",
                "15:00 - 15:30"
            ];

            availableSlots.forEach(function(slot) {
                var slotButton = document.createElement('button');
                slotButton.className = 'hora-button';
                slotButton.innerText = slot;
                slotButton.onclick = function() {
                    selectTimeSlot(slot);
                };
                timeSlotsContainer.appendChild(slotButton);
            });
        }

        function selectTimeSlot(slot) {
            var confirmation = confirm("¿Confirmar hora " + slot + "?");
            if (confirmation) {
                document.getElementById('confirmacionHora').innerText = slot;
                nextStep(5); // Ir a la página de confirmación
            }
        }

        function nextStep(step) {
            var currentStep = step - 1;
            var currentStepForm = document.getElementById('step' + currentStep);
            var nextStepForm = document.getElementById('step' + step);

            currentStepForm.style.display = 'none';
            nextStepForm.style.display = 'block';

            document.getElementById('stepIndicator' + currentStep).classList.remove('active');
            document.getElementById('stepIndicator' + step).classList.add('active');
        }

        function previousStep(step) {
            var currentStep = step + 1;
            var currentStepForm = document.getElementById('step' + currentStep);
            var previousStepForm = document.getElementById('step' + step);

            currentStepForm.style.display = 'none';
            previousStepForm.style.display = 'block';

            document.getElementById('stepIndicator' + currentStep).classList.remove('active');
            document.getElementById('stepIndicator' + step).classList.add('active');
        }

        function selectService(service) {
            document.getElementById('confirmacionServicio').innerText = service;
            nextStep(4);
        }

        function confirmBooking() {
            var paciente = document.getElementById('nombre').value + ' ' + document.getElementById('apellido').value;
            var servicio = document.getElementById('confirmacionServicio').innerText;
            var fecha = document.getElementById('selectedDate').innerText.split(': ')[1];
            var hora = document.getElementById('confirmacionHora').innerText;

            document.getElementById('confirmacionPaciente').innerText = paciente;
            document.getElementById('confirmacionServicio').innerText = servicio;
            document.getElementById('confirmacionFecha').innerText = fecha;
            document.getElementById('confirmacionHora').innerText = hora;

            alert("Cita confirmada para " + paciente + " en el servicio de " + servicio + " el " + fecha + " a las " + hora);
            // Aquí se puede enviar la información al servidor para guardar la cita
        }
    </script>
</body>

</html>
