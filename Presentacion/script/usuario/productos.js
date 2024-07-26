document.addEventListener("DOMContentLoaded", function () {
    const productosContainer = document.getElementById('productos-container');

    // Función para obtener productos desde el servidor
    async function obtenerProductos() {
        try {
            const response = await fetch('http://localhost/REFACTORIZACION/businessLogic/obtenerProductos.php');
            const productos = await response.json();

            if (productos.error) {
                productosContainer.innerHTML = `<p class="text-red-500">${productos.error}</p>`;
                return;
            }

            if (productos.length > 0) {
                productosContainer.innerHTML = productos.map(producto => {
                    const imagenURL = `../../../businessLogic/imagenes/${producto.imagen}`;
                    const imagenExists = checkImageExists(imagenURL);

                    return `
                        <div class="bg-white p-4 rounded-lg shadow-lg">
                            <h2 class="text-xl font-bold mb-2">${producto.nombre}</h2>
                            <p class="text-gray-600 mb-2">Precio: $${producto.precio}</p>
                            <p class="text-gray-600 mb-4">${producto.descripcion}</p>
                            <button onclick="agregarAlCarrito(${producto.id}, '${producto.nombre}', ${producto.precio})" class="bg-yellow-500 text-white py-2 px-4 rounded-lg">Añadir al carrito</button>
                        </div>`;
                }).join('');
            } else {
                productosContainer.innerHTML = '<p>No hay productos disponibles.</p>';
            }
        } catch (error) {
            productosContainer.innerHTML = `<p class="text-red-500">Error al cargar productos: ${error.message}</p>`;
        }
    }

    // Verificar si una imagen existe (sin usar peticiones de CORS)
    function checkImageExists(url) {
        let request = new XMLHttpRequest();
        request.open('HEAD', url, false);
        request.send();
        return request.status !== 404;
    }

    // Llamada inicial para obtener productos
    obtenerProductos();
});
