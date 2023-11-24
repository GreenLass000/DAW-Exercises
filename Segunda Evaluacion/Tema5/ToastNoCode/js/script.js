document.addEventListener('contextmenu', function (e) {
    e.preventDefault();
    showToast();
});

document.addEventListener('keydown', function (e) {
    if (e.ctrlKey && e.shiftKey && e.key === 'C') {
        e.preventDefault();
        showToast();
    }

    if (e.ctrlKey && e.shiftKey && e.key === 'I') {
        e.preventDefault();
        showToast();
    }

    if (e.key === "F12") {
        e.preventDefault();
        showToast();
    }
});

function showToast() {
    const toast = document.getElementById('toast');
    toast.style.display = 'block';

    setTimeout(function () {
        toast.classList.add('fadeIn');
    }, 0); // Añadir la clase fadeIn inmediatamente

    setTimeout(function () {
        toast.classList.remove('fadeIn');
        toast.classList.add('fadeOut');
    }, 1500); // Cambiar a la clase fadeOut después de 4 segundos

    setTimeout(function () {
        toast.style.display = 'none';
        toast.classList.remove('fadeOut');
    }, 2000); // Ocultar el toast después de 1.5 segundos adicionales
}
