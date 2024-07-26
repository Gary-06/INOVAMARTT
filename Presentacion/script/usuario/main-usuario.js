async function getUsuarios() {
    try {
        const response = await fetch('http://localhost/REFACTORIZACION/businessLogic/swusuarios.php');
        
        if (!response.ok) {
            throw new Error('Error al obtener los usuarios');
        }

        const data = await response.json();

        console.log(data); // Verifica los datos que recibes aquí

        const usuarios = data;

        const tableBody = document.querySelector('#table-usuario tbody');
        tableBody.innerHTML = '';
        let cont = 1;

        usuarios.forEach(usuario => {
            // Crear fila de la tabla
            const row = document.createElement('tr');

            // Crear celdas para cada propiedad del usuario
            const ID_Usuario = document.createElement('td');
            ID_Usuario.classList.add('py-3', 'px-6', 'text-left', 'whitespace-nowrap');
            ID_Usuario.textContent = cont++;
            
            const Nombre = document.createElement('td');
            Nombre.classList.add('py-3', 'px-6', 'text-left', 'whitespace-nowrap');
            Nombre.textContent = usuario.Nombre;

            const Apellido = document.createElement('td');
            Apellido.classList.add('py-3', 'px-6', 'text-left', 'whitespace-nowrap');
            Apellido.textContent = usuario.Apellido;

            const Correo_Electronico = document.createElement('td');
            Correo_Electronico.classList.add('py-3', 'px-6', 'text-left', 'whitespace-nowrap');
            Correo_Electronico.textContent = usuario.Correo_Electronico;

            const Tipo_Usuario = document.createElement('td');
            Tipo_Usuario.classList.add('py-3', 'px-6', 'text-left', 'whitespace-nowrap');
            Tipo_Usuario.textContent = usuario.Tipo_Usuario;

            const Fecha_Registro = document.createElement('td');
            Fecha_Registro.classList.add('py-3', 'px-6', 'text-left', 'whitespace-nowrap');
            Fecha_Registro.textContent = usuario.Fecha_Registro;

            // Celda de acciones con íconos
            const actionsCell = document.createElement('td');

            // Icono de editar
            const editIcon = document.createElement('i');
            editIcon.classList.add('fas', 'fa-edit', 'text-blue-500', 'cursor-pointer', 'mr-2');
            editIcon.setAttribute('title', 'Editar');
            editIcon.addEventListener('click', () => openEditForm(usuario));

            // Icono de eliminar
            const deleteIcon = document.createElement('i');
            deleteIcon.classList.add('fas', 'fa-trash-alt', 'text-red-500', 'cursor-pointer', 'mr-2');
            deleteIcon.setAttribute('title', 'Eliminar');
            deleteIcon.addEventListener('click', () => deleteUsuario(usuario.ID_Usuario));

            // Agregar íconos a la celda de acciones
            actionsCell.appendChild(editIcon);
            actionsCell.appendChild(deleteIcon);

            // Agregar celdas a la fila
            row.appendChild(ID_Usuario);
            row.appendChild(Nombre);
            row.appendChild(Apellido);
            row.appendChild(Correo_Electronico);
            row.appendChild(Tipo_Usuario);
            row.appendChild(Fecha_Registro);
            row.appendChild(actionsCell);

            // Agregar fila a la tabla
            tableBody.appendChild(row);
        });

    } catch (error) {
        console.error('Error al obtener usuarios:', error);
        
        // SweetAlert2 para mostrar error
        Swal.fire(
            'Error',
            'No se pudo obtener la lista de usuarios. Intente de nuevo más tarde.',
            'error'
        );
    }
}

// Función para eliminar un usuario
async function deleteUsuario(ID_Usuario) {
    // Mostrar SweetAlert2 para confirmación
    Swal.fire({
        title: '¿Estás seguro?',
        text: "Esta acción no se puede deshacer",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#d33',
        cancelButtonColor: '#3085d6',
        confirmButtonText: 'Sí, eliminar',
        cancelButtonText: 'Cancelar'
    }).then(async (result) => {
        if (result.isConfirmed) {
            try {
                const response = await fetch(`http://localhost/REFACTORIZACION/businessLogic/swusuarios.php?ID_Usuario=${ID_Usuario}`, {
                    method: 'DELETE'
                });
                
                if (response.ok) {
                    Swal.fire(
                        '¡Eliminado!',
                        'El usuario ha sido eliminado.',
                        'success'
                    );
                } else {
                    Swal.fire(
                        'Error',
                        'Hubo un problema al eliminar el usuario.',
                        'error'
                    );
                }
                
                getUsuarios(); // Actualizar lista después de eliminar
            } catch (error) {
                console.error('Error al eliminar el usuario:', error);
                Swal.fire(
                    'Error',
                    'Hubo un problema al eliminar el usuario.',
                    'error'
                );
            }
        }
    });
}

// Función para abrir formulario de edición
function openEditForm(usuario) {
    const newWindow = window.open('../Usuario/updateUsuario.php', '_blank', 'width=600,height=600');
  
    newWindow.onload = function() {
        newWindow.postMessage(usuario, '*');
    };
  
    newWindow.onbeforeunload = function() {
        getUsuarios();
    };
}

// Ejecutar la función getUsuarios() cuando el documento esté listo
document.addEventListener('DOMContentLoaded', getUsuarios());
