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
    // Inicializar con el primer paso visible
    nextStep(1);
});
