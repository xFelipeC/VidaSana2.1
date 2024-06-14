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

    // Si se pasa al paso 4, llenar los detalles de confirmación
    if (stepNumber === 4) {
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
        const selectedService = document.querySelector('.service-option.active p').innerText;
        document.getElementById('confirmService').innerText = selectedService;
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

    // Crear un objeto con los datos del formulario
    const data = {
        rut: rut,
        nombre: nombre,
        apellido: apellido,
        fecha_nacimiento: fechaNacimiento,
        nacionalidad: nacionalidad,
        direccion: direccion,
        telefono: telefono,
        afiliacion: afiliacion
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
