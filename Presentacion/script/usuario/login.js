document.getElementById('loginForm').addEventListener('submit', async (event) => {
    event.preventDefault();
    await loginUser();
});

async function loginUser() {
    const Correo_Electronico = document.getElementById('Correo_Electronico').value;
    const Contrasena = document.getElementById('Contrasena').value;

    if (!Correo_Electronico || !Contrasena) {
        Swal.fire({
            icon: 'warning',
            title: 'Campos incompletos',
            text: 'Por favor, complete todos los campos.',
        });
        return;
    }

    const formData = new FormData();
    formData.append('Correo_Electronico', Correo_Electronico);
    formData.append('Contrasena', Contrasena);

    try {
        const response = await fetch('http://localhost/REFACTORIZACION/businessLogic/swLogin.php', {
            method: 'POST',
            body: formData
        });
        const data = await response.json();
        
        if (data.success) {
            const Tipo_Usuario = data.user.Tipo_Usuario;
            Swal.fire({
                icon: 'success',
                title: 'Login exitoso',
                showConfirmButton: false,
                timer: 1500
            }).then(() => {
                if (Tipo_Usuario === 'admin') {
                    window.location.href = '../../../Presentacion/pages/administrator/PaginaAdmin.php'; // Ajusta la URL según sea necesario
                } else if (Tipo_Usuario === 'cliente') {
                    window.location.href = '../../../Presentacion/pages/Cliente/paginaCliente.php'; // Ajusta la URL según sea necesario
                }
            });
        } else {
            Swal.fire({
                icon: 'error',
                title: 'Credenciales incorrectas',
                text: 'El Correo Electrónico o la contraseña son incorrectos.',
            });
        }
    } catch (error) {
        console.error('Error al iniciar sesión:', error);
        Swal.fire({
            icon: 'error',
            title: 'Error',
            text: 'Ocurrió un error al intentar iniciar sesión. Por favor, intente de nuevo más tarde.',
        });
    }
}
