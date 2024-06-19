function nextStep(stepNumber) {
    // Validar los campos antes de permitir avanzar
    if (stepNumber === 2) {
        // Validar los campos del paso 1
        const rut = document.getElementById('rut').value;
        if (!rut) {
            alert('Por favor, ingrese el RUT.');
            return;
        }
    }

    if (stepNumber === 3) {
        // Validar los campos del paso 2
        const nombre = document.getElementById('nombre').value;
        const apellido = document.getElementById('apellido').value;
        const nacionalidad = document.getElementById('nacionalidad').value;
        const direccion = document.getElementById('direccion').value;
        const fechaNacimiento = document.getElementById('fecha_nacimiento').value;
        const telefono = document.getElementById('telefono').value;
        const afiliacion = document.getElementById('afiliacion').value;

        if (!nombre || !apellido || !nacionalidad || !direccion || !fechaNacimiento || !telefono || !afiliacion) {
            alert('Por favor, complete todos los campos del formulario.');
            return;
        }
    }

    // Ocultar todos los formularios de paso
    const steps = document.querySelectorAll('.step-form');
    steps.forEach(step => step.style.display = 'none');

    // Mostrar el formulario de paso correspondiente
    document.getElementById(`step${stepNumber}`).style.display = 'block';

    // Actualizar la línea de tiempo
    updateTimeline(stepNumber);

    // Si se pasa al paso 5, llenar los detalles de confirmación
    if (stepNumber === 5) {
        document.getElementById('confirmDocType').innerText = document.getElementById('docType').value;
        document.getElementById('confirmRUT').innerText = document.getElementById('rut').value;
        document.getElementById('confirmNombre').innerText = document.getElementById('nombre').value;
        document.getElementById('confirmApellido').innerText = document.getElementById('apellido').value;
        document.getElementById('confirmFechaNacimiento').innerText = document.getElementById('fecha_nacimiento').value;
        document.getElementById('confirmNacionalidad').innerText = document.getElementById('nacionalidad').value;
        document.getElementById('confirmDireccion').innerText = document.getElementById('direccion').value;
        document.getElementById('confirmTelefono').innerText = document.getElementById('telefono').value;
        document.getElementById('confirmAfiliacion').innerText = document.getElementById('afiliacion').value;

        // Obtener el servicio seleccionado
        document.getElementById('confirmService').innerText = localStorage.getItem('selectedService');

        // Obtener la fecha y hora seleccionadas
        document.getElementById('confirmDate').innerText = localStorage.getItem('selectedDate');
        document.getElementById('confirmTime').innerText = localStorage.getItem('selectedTime');
    }
}

function prevStep(stepNumber) {
    nextStep(stepNumber);
}

function updateTimeline(stepNumber) {
    const totalSteps = 5; // Número total de pasos
    for (let i = 1; i <= totalSteps; i++) {
        const stepElement = document.getElementById(`stepIndicator${i}`);
        const lineElement = stepElement.nextElementSibling;

        if (i < stepNumber) {
            stepElement.classList.add('completed');
            stepElement.classList.remove('active');
            if (lineElement) {
                lineElement.classList.add('active');
            }
        } else if (i === stepNumber) {
            stepElement.classList.add('active');
            stepElement.classList.remove('completed');
        } else {
            stepElement.classList.remove('active', 'completed');
            if (lineElement) {
                lineElement.classList.remove('active');
            }
        }
    }
}

function submitForm() {
    // Obtener los datos del formulario
    const rut = document.getElementById('rut').value;
    const nombre = document.getElementById('nombre').value;
    const apellido = document.getElementById('apellido').value;
    const fechaNacimiento = document.getElementById('fecha_nacimiento').value;
    const nacionalidad = document.getElementById('nacionalidad').value;
    const direccion = document.getElementById('direccion').value;
    const telefono = document.getElementById('telefono').value;
    const afiliacion = document.getElementById('afiliacion').value;
    const servicio = localStorage.getItem('selectedService');
    const fecha = localStorage.getItem('selectedDate');
    const hora = localStorage.getItem('selectedTime');

    // Crear un objeto con los datos del formulario
    const data = {
        rut: rut,
        nombre: nombre,
        apellido: apellido,
        fecha_nacimiento: fechaNacimiento,
        nacionalidad: nacionalidad,
        direccion: direccion,
        telefono: telefono,
        afiliacion: afiliacion,
        servicio: servicio,
        fecha: fecha,
        hora: hora
    };

    // Enviar los datos a través de una solicitud AJAX
    fetch('procesarFormularioRegistro.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify(data)
    })
    .then(response => response.text())
    .then(data => {
        console.log(data);
        // Redirigir o mostrar un mensaje de éxito
        alert('Registro exitoso');
        // Puedes redirigir a otra página o limpiar el formulario aquí
    })
    .catch(error => {
        console.error('Error:', error);
        alert('Hubo un error al registrar. Intente de nuevo.');
    });
}

document.addEventListener('DOMContentLoaded', function() {
    // Inicializar con el primer paso visible
    nextStep(1);

    // Agregar evento para seleccionar servicio
    const serviceOptions = document.querySelectorAll('.service-option');
    serviceOptions.forEach(option => {
        option.addEventListener('click', function() {
            serviceOptions.forEach(opt => opt.classList.remove('active'));
            this.classList.add('active');
        });
    });
});

function selectService(service) {
    localStorage.setItem('selectedService', service);
}

document.addEventListener('DOMContentLoaded', function() {
    var calendarEl = document.getElementById('calendar');
    var calendar = new FullCalendar.Calendar(calendarEl, {
        initialView: 'dayGridWeek',  // Mostrar solo vista de semana
        locale: 'es',
        height: 'auto',
        headerToolbar: {
            left: 'prev,next today',
            center: 'title',
            right: ''  // Ocultar otras vistas
        },
        contentHeight: 'auto',
        dateClick: function(info) {
            var selectedDate = info.dateStr;
            alert('Fecha seleccionada: ' + selectedDate);
            localStorage.setItem('selectedDate', selectedDate);
            // Aquí puedes realizar alguna acción con la fecha seleccionada, por ejemplo:
            document.querySelectorAll('.fc-daygrid-day').forEach(day => day.style.backgroundColor = '');  // Restablecer colores
            info.dayEl.style.backgroundColor = '#00796b';  // Cambiar color del día seleccionado
            mostrarHorasDisponibles(selectedDate);  // Mostrar horas disponibles para la fecha seleccionada
        }
    });
    calendar.render();
});

function mostrarHorasDisponibles(fecha) {
    const horasDisponibles = [
        "10:45", "11:00", "11:15", "11:30", "11:45"
    ];

    const contenedorHoras = document.getElementById('horasDisponibles');
    contenedorHoras.innerHTML = '';  // Limpiar contenido previo

    const card = document.createElement('div');
    card.className = 'hora-card';
    card.innerHTML = `
        <div class="doctor-info">
            <img src="../img/doctorVidaSana1.png" alt="Doctor" style="width: 80px; height: auto;">
            <div class="doctor-details">
                <p>Javier Fernández</p>
                <p>Traumatología Adulto</p>
            </div>
        </div>
        <div class="horas">
            ${horasDisponibles.map(hora => `<button class="hora-button" onclick="seleccionarHora('${hora}')">${hora}</button>`).join('')}
        </div>
        <button class="btn btn-info">Ver más horas disponible</button>
    `;

    contenedorHoras.appendChild(card);
}

function seleccionarHora(hora) {
    alert('Hora seleccionada: ' + hora);
    localStorage.setItem('selectedTime', hora);
}
