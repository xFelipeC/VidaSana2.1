function nextStep(stepNumber) {
    // Ocultar todos los formularios de paso
    const steps = document.querySelectorAll('.step-form');
    steps.forEach(step => step.style.display = 'none');

    // Mostrar el formulario de paso correspondiente
    document.getElementById(`step${stepNumber}`).style.display = 'block';

    // Actualizar la línea de tiempo
    updateTimeline(stepNumber);
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

document.addEventListener('DOMContentLoaded', function() {
    const docType = document.getElementById("docType");
    const rutLabel = document.querySelector('label[for="rut"]');
    const rutInput = document.getElementById("rut");
    const rutHelp = document.getElementById("rutHelp");

    docType.addEventListener("change", function() {
        if (docType.value === "passport") {
            rutLabel.textContent = "Pasaporte del Paciente";
            rutInput.placeholder = "Ej: 87654321";
            rutHelp.textContent = "Ingrese Pasaporte del paciente";
        } else {
            rutLabel.textContent = "RUT del Paciente";
            rutInput.placeholder = "Ej: 8.765.432-1";
            rutHelp.textContent = "Ingrese RUT del paciente";
        }
    });

    // Inicializar con el primer paso visible
    nextStep(1);
});
