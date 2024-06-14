document.getElementById('more-info-btn').addEventListener('click', function() {
    var moreInfoSection = document.getElementById('more-info');
    if (moreInfoSection.classList.contains('hidden')) {
        moreInfoSection.classList.remove('hidden');
        this.textContent = 'Menos Información';
    } else {
        moreInfoSection.classList.add('hidden');
        this.textContent = 'Más Información';
    }
});
