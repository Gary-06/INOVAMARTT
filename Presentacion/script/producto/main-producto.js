async function getProductos() {
    try {
        const response = await fetch('http://localhost/REFACTORIZACION/businessLogic/swproductos.php');
        
        // Verificar si la respuesta es exitosa
        if (!response.ok) {
            throw new Error('Error al obtener los productos');
        }

        const data = await response.json();

        console.log(data); // Verifica los datos que recibes aquí

        const productos = data;

        const tableBody = document.querySelector('#table-producto tbody');
        tableBody.innerHTML = '';
        let cont = 1;

        productos.forEach(producto => {
            // Crear fila de la tabla
            const row = document.createElement('tr');

            // Crear celdas para cada propiedad del producto
            const id = document.createElement('td');
            id.classList.add('py-3', 'px-6', 'text-left', 'whitespace-nowrap');
            id.textContent = cont++;
            
            const nombre = document.createElement('td');
            nombre.classList.add('py-3', 'px-6', 'text-left', 'whitespace-nowrap');
            nombre.textContent = producto.nombre;

            const descripcion = document.createElement('td');
            descripcion.classList.add('py-3', 'px-6', 'text-left', 'whitespace-nowrap');
            descripcion.textContent = producto.descripcion;

            const precio = document.createElement('td');
            precio.classList.add('py-3', 'px-6', 'text-left', 'whitespace-nowrap');
            precio.textContent = producto.precio;

            const stock = document.createElement('td');
            stock.classList.add('py-3', 'px-6', 'text-left', 'whitespace-nowrap');
            stock.textContent = producto.stock;

            const categoria = document.createElement('td');
            categoria.classList.add('py-3', 'px-6', 'text-left', 'whitespace-nowrap');
            categoria.textContent = producto.categoria;

            const fechaCreacion = document.createElement('td');
            fechaCreacion.classList.add('py-3', 'px-6', 'text-left', 'whitespace-nowrap');
            fechaCreacion.textContent = producto.fecha_creacion;

            const fechaActualizacion = document.createElement('td');
            fechaActualizacion.classList.add('py-3', 'px-6', 'text-left', 'whitespace-nowrap');
            fechaActualizacion.textContent = producto.fecha_actualizacion;

            const estado = document.createElement('td');
            estado.classList.add('py-3', 'px-6', 'text-left', 'whitespace-nowrap');
            estado.textContent = producto.estado;

            // Celda de acciones con íconos
            const actionsCell = document.createElement('td');

            // Icono de editar
            const editIcon = document.createElement('i');
            editIcon.classList.add('fas', 'fa-edit', 'text-blue-500', 'cursor-pointer', 'mr-2');
            editIcon.setAttribute('title', 'Editar');
            editIcon.addEventListener('click', () => openEditForm(producto));

            // Icono de eliminar
            const deleteIcon = document.createElement('i');
            deleteIcon.classList.add('fas', 'fa-trash-alt', 'text-red-500', 'cursor-pointer', 'mr-2');
            deleteIcon.setAttribute('title', 'Eliminar');
            deleteIcon.addEventListener('click', () => deleteProducto(producto.id));

            // Photo icon
            const photoIcon = document.createElement('i');
            photoIcon.classList.add('fa-regular', 'fa-file-image', 'text-green-500', 'cursor-pointer');
            photoIcon.setAttribute('title', 'Foto de Producto');
            photoIcon.addEventListener('click', () => showUserPhotos(producto.imagen));
    
            // Agregar íconos a la celda de acciones
            actionsCell.appendChild(editIcon);
            actionsCell.appendChild(deleteIcon);
            actionsCell.appendChild(photoIcon);

            // Agregar celdas a la fila
            row.appendChild(id);
            row.appendChild(nombre);
            row.appendChild(descripcion);
            row.appendChild(precio);
            row.appendChild(stock);
            row.appendChild(categoria);
            row.appendChild(fechaCreacion);
            row.appendChild(fechaActualizacion);
            row.appendChild(estado);
            row.appendChild(actionsCell);

            // Agregar fila a la tabla
            tableBody.appendChild(row);
        });

    } catch (error) {
        console.error('Error al obtener productos:', error);
        // Mostrar error con SweetAlert2
        Swal.fire(
            'Error',
            'No se pudo obtener la lista de productos. Por favor, intente de nuevo más tarde.',
            'error'
        );
    }
}

// Función para eliminar un producto
async function deleteProducto(id) {
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
                const response = await fetch(`http://localhost/REFACTORIZACION/businessLogic/swproductos.php?id=${id}`, {
                    method: 'DELETE'
                });

                if (response.ok) {
                    Swal.fire(
                        '¡Eliminado!',
                        'El producto ha sido eliminado con éxito.',
                        'success'
                    );
                    getProductos(); // Actualizar lista después de eliminar
                } else {
                    Swal.fire(
                        'Error',
                        'Hubo un problema al eliminar el producto.',
                        'error'
                    );
                }

            } catch (error) {
                console.error('Error al eliminar el producto:', error);
                Swal.fire(
                    'Error',
                    'Hubo un problema al eliminar el producto.',
                    'error'
                );
            }
        }
    });
}

// Función para abrir formulario de edición
function openEditForm(producto) {
    const newWindow = window.open('../Producto/updateProducto.php', '_blank', 'width=600,height=600');
  
    newWindow.onload = function() {
      newWindow.postMessage(producto, '*');
    };
  
    newWindow.onbeforeunload = function() {
      getProductos();
    };
}

// Función para mostrar la foto de un producto
async function showUserPhotos(imagen_producto) {
    const imageUrl = "../../../businessLogic/" + imagen_producto;

    const newWindow = window.open('', '_blank', 'width=600,height=600');
    newWindow.document.write(`
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Foto de Producto</title>
            <style>
                body {
                    display: flex;
                    justify-content: center;
                    align-items: center;
                    height: 100vh;
                    margin: 0;
                    background-color: #f0f0f0;
                }
                img {
                    max-width: 100%;
                    max-height: 100%;
                }
            </style>
        </head>
        <body>
            <img src="${imageUrl}" alt="Foto de Producto">
        </body>
        </html>
    `);
    newWindow.document.close();
}

// Ejecutar la función getProductos() cuando el documento esté listo
document.addEventListener('DOMContentLoaded', getProductos());
