// Capturar el elemento de imagen y el campo de carga de archivos
const profileImage = document.getElementById('profile-image');
const uploadInput = document.getElementById('upload-input');

// Agregar un controlador de eventos de clic a la imagen
profileImage.addEventListener('click', function() {
    uploadInput.click(); // Activar el campo de carga de archivos al hacer clic en la imagen
});

// Agregar un controlador de eventos de cambio al campo de carga de archivos
uploadInput.addEventListener('change', function() {
    const file = uploadInput.files[0]; // Obtener el archivo cargado

    if (file) {
        const reader = new FileReader();

        reader.onload = function(e) {
            profileImage.src = e.target.result; // Mostrar la nueva imagen en la página
        };

        reader.readAsDataURL(file);
    }
});


// Obtener el botón que abre el modal
const openModalBtn = document.querySelector('.open-modal-btn');

// Obtener el overlay del modal y su contenido
const modalOverlay = document.querySelector('.modal-overlay');
const modalContent = document.querySelector('.modal-content');

// Abrir el modal al hacer clic en el botón
openModalBtn.addEventListener('click', function() {
    modalOverlay.classList.add('active');
    modalContent.classList.add('active');
});

// Cerrar el modal al hacer clic fuera del contenido del modal
modalOverlay.addEventListener('click', function(e) {
    if (e.target === modalOverlay) {
        modalOverlay.classList.remove('active');
        modalContent.classList.remove('active');
    }
});