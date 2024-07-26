window.addEventListener('message', (event) => {
    const usuario = event.data;
    document.getElementById('ID_Usuario').value = usuario.ID_Usuario;
    document.getElementById('nombre').value = usuario.Nombre;
    document.getElementById('apellido').value = usuario.Apellido;
    document.getElementById('correo_electronico').value = usuario.Correo_Electronico;
    document.getElementById('contrasena').value = usuario.Contrasena;
    document.getElementById('tipo_usuario').value = usuario.Tipo_Usuario;
    
});

async function updateUsuario(event) {
    event.preventDefault();
    
    const ID_Usuario = document.getElementById('ID_Usuario').value;
    const Nombre = document.getElementById('nombre').value;
    const Apellido = document.getElementById('apellido').value;
    const Correo_Electronico = document.getElementById('correo_electronico').value;
    const Contrasena = document.getElementById('contrasena').value;
    const Tipo_Usuario = document.getElementById('tipo_usuario').value;

    const usuario = {
        ID_Usuario: ID_Usuario,
        Nombre: Nombre,
        Apellido: Apellido,
        Correo_Electronico: Correo_Electronico,
        Contrasena: Contrasena,
        Tipo_Usuario: Tipo_Usuario
        
    };

    console.log(usuario);

    try {
        const response = await fetch('http://localhost/REFACTORIZACION/businessLogic/swusuarios.php', {
            method: 'PUT',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify(usuario)
        });
       window.close();
        
    } catch (error) {
        console.error('Error al actualizar usuario:', error);
    }
}

document.getElementById('updateUsuarioForm').addEventListener('submit', updateUsuario);
