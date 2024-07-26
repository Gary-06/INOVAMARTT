document.addEventListener("DOMContentLoaded", function () {
    // Variables para elementos del DOM
    const cartIcon = document.getElementById('cart-icon');
    const cartCount = document.getElementById('cart-count');
    const cartModal = document.getElementById('cart-modal');
    const cartItems = document.getElementById('cart-items');
    const closeCart = document.getElementById('close-cart');
    const purchaseButton = document.getElementById('purchase');

    // Array para almacenar los productos del carrito
    let carrito = [];

    // Función para agregar productos al carrito
    window.agregarAlCarrito = function (id, nombre, precio) {
        // Buscar si el producto ya está en el carrito
        const productoExistente = carrito.find(producto => producto.id === id);

        if (productoExistente) {
            // Incrementar la cantidad si ya existe
            productoExistente.cantidad++;
        } else {
            // Agregar nuevo producto al carrito
            carrito.push({ id, nombre, precio, cantidad: 1 });
        }

        actualizarCarritoUI();
    }

    // Función para actualizar la interfaz del carrito
    function actualizarCarritoUI() {
        // Actualizar el contador del carrito
        cartCount.textContent = carrito.reduce((total, producto) => total + producto.cantidad, 0);

        // Mostrar los productos del carrito en la lista
        cartItems.innerHTML = carrito.map(producto => `
            <li class="py-4 flex items-center border-b border-gray-300">
                <div class="flex flex-col w-full">
                    <div class="flex items-center justify-between mb-2">
                        <span class="font-semibold text-lg">${producto.nombre}</span>
                        <span class="text-gray-700 font-bold">$${(producto.precio * producto.cantidad).toFixed(2)}</span>
                    </div>
                    <div class="flex items-center">
                        <button onclick="cambiarCantidad(${producto.id}, -1)" class="bg-yellow-400 text-white px-3 py-1 rounded-l-md hover:bg-yellow-500">-</button>
                        <input type="text" value="${producto.cantidad}" class="w-12 text-center border border-gray-300 rounded-md mx-2" readonly>
                        <button onclick="cambiarCantidad(${producto.id}, 1)" class="bg-yellow-400 text-white px-3 py-1 rounded-r-md hover:bg-yellow-500">+</button>
                    </div>
                </div>
                <button onclick="eliminarDelCarrito(${producto.id})" class="ml-4 bg-red-500 text-white px-2 py-1 rounded-full hover:bg-red-600">
                    <i class="fas fa-trash"></i>
                </button>
            </li>
        `).join('');
    }

    // Función para cambiar la cantidad de productos en el carrito
    window.cambiarCantidad = function (id, delta) {
        const producto = carrito.find(producto => producto.id === id);
        if (producto) {
            producto.cantidad += delta;
            if (producto.cantidad <= 0) {
                eliminarDelCarrito(id);
            } else {
                actualizarCarritoUI();
            }
        }
    }

    // Función para eliminar productos del carrito
    window.eliminarDelCarrito = function (id) {
        carrito = carrito.filter(producto => producto.id !== id);
        actualizarCarritoUI();
    }

    // Evento para mostrar/ocultar la ventana modal del carrito
    cartIcon.addEventListener('click', function () {
        cartModal.classList.toggle('hidden');
    });

    // Evento para cerrar el carrito
    closeCart.addEventListener('click', function () {
        cartModal.classList.add('hidden');
    });

    // Evento para manejar la compra de productos
    purchaseButton.addEventListener('click', function () {
        if (carrito.length === 0) {
            Swal.fire({
                icon: 'warning',
                title: 'Carrito vacío',
                text: 'No hay productos en el carrito para comprar.',
            });
            return;
        }

        // Aquí puedes agregar la lógica para procesar la compra
        Swal.fire({
            icon: 'success',
            title: 'Compra exitosa',
            text: '¡Gracias por su compra!',
        });

        // Vaciar el carrito después de la compra
        carrito = [];
        actualizarCarritoUI();
        cartModal.classList.add('hidden');
    });
});
