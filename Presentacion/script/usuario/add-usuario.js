// Mostrar u ocultar el campo del código de admin
document.getElementById('tipo_usuario').addEventListener('change', function() {
    const codigoAdminContainer = document.getElementById('codigoAdminContainer');
    if (this.value === 'admin') {
        codigoAdminContainer.style.display = 'block';
    } else {
        codigoAdminContainer.style.display = 'none';
    }
});

// Añadir evento de submit al formulario de usuario
const usuarioForm = document.getElementById('usuarioForm');
usuarioForm.addEventListener('submit', async (event) => {
    event.preventDefault();

    const Nombre = document.getElementById('nombre').value;
    const Apellido = document.getElementById('apellido').value;
    const Correo_Electronico = document.getElementById('correo_electronico').value;
    const Contrasena = document.getElementById('contrasena').value;
    const Tipo_Usuario = document.getElementById('tipo_usuario').value;

    // Verificación del código de admin
    if (Tipo_Usuario === 'admin') {
        const codigoAdmin = document.getElementById('codigo_admin').value;
        const codigoCorrecto = 'lucho'; // Código de admin correcto
        
        if (codigoAdmin !== codigoCorrecto) {
            Swal.fire({
                icon: 'error',
                title: 'Error',
                text: 'Código de admin incorrecto.',
            });
            return; // Detiene el envío del formulario si el código es incorrecto
        }
    }

    // Crear objeto FormData para enviar los datos del formulario
    const formData = new FormData();
    formData.append('Nombre', Nombre);
    formData.append('Apellido', Apellido);
    formData.append('Correo_Electronico', Correo_Electronico);
    formData.append('Contrasena', Contrasena);
    formData.append('Tipo_Usuario', Tipo_Usuario);

    try {
        const response = await fetch('http://localhost/REFACTORIZACION/businessLogic/swusuarios.php', {
            method: 'POST',
            body: formData
        });
        
        if (response.ok) {
            Swal.fire({
                icon: 'success',
                title: 'Registro exitoso',
                text: 'El usuario ha sido registrado correctamente.',
            });
            usuarioForm.reset(); // Opcional: Resetea el formulario
        } else {
            Swal.fire({
                icon: 'error',
                title: 'Error',
                text: 'Hubo un problema al registrar el usuario.',
            });
        }
    } catch (error) {
        console.error('Error al agregar usuario:', error);
        Swal.fire({
            icon: 'error',
            title: 'Error',
            text: 'Hubo un problema al registrar el usuario.',
        });
    }
});
