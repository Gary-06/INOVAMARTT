<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>INNOVAMART - Cliente</title>
    <!-- Enlace a Tailwind CSS -->
    <link href="../../../public/css/tailwind.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.7/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <style>
        .cart-modal {
            background-color: rgba(0, 0, 0, 0.5);
        }
        .fade-enter-active, .fade-leave-active {
            transition: opacity 0.5s;
        }
        .fade-enter, .fade-leave-to /* .fade-leave-active en versiones anteriores a 2.1.8 */ {
            opacity: 0;
        }
    </style>
</head>
<body class="bg-white text-gray-900 min-h-screen flex flex-col">
    <header class="bg-black text-white p-4 flex justify-between items-center relative">
        <div class="text-2xl font-bold">INNOVAMART</div>
        <!-- Ícono del carrito de compras -->
        <button id="cart-icon" class="bg-yellow-500 p-2 rounded-lg focus:outline-none focus:ring-2 focus:ring-yellow-600">
            <i class="fas fa-shopping-cart"></i>
            <span id="cart-count" class="ml-2">0</span>
        </button>
    </header>

    <!-- Main Content -->
    <main class="p-8 flex-grow">
        <div class="relative bg-cover bg-center bg-no-repeat h-96" style="background-image: url('../../styles/img/fondotienda.jpg');">
            <div class="absolute inset-0 bg-black opacity-50"></div>
            <div class="absolute inset-0 flex flex-col justify-center items-center text-white text-center">
                <h1 class="text-4xl font-bold mb-4">¡Bienvenido a nuestra tienda virtual!</h1>
                <p class="text-lg">Encuentra los mejores productos para ti.</p>
                <p class="text-lg mt-2">Visita nuestro catálogo y disfruta de una experiencia única.</p>
            </div>
        </div>

        <!-- Productos -->
        <section id="productos-container" class="p-8 grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
    <!-- Los productos se cargarán aquí dinámicamente -->
</section>
    </main>

    <!-- Ventana Modal del Carrito -->
    <div id="cart-modal" class="fixed inset-0 flex items-center justify-center hidden cart-modal">
        <div class="bg-white rounded-lg shadow-lg w-full max-w-md p-4">
            <h2 class="text-2xl font-bold mb-4">Carrito de Compras</h2>
            <ul id="cart-items" class="divide-y divide-gray-300">
                <!-- Los productos del carrito se agregarán aquí -->
            </ul>
            <div class="flex justify-between items-center mt-4">
                <button id="close-cart" class="bg-gray-500 text-white py-2 px-4 rounded-lg">Cerrar</button>
                <button id="purchase" class="bg-green-500 text-white py-2 px-4 rounded-lg">Comprar</button>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer class="bg-black text-white text-center p-4">
        <p>&copy; 2024 INNOVAMART. All Rights Reserved.</p>
        <p>Guayaquil, Milagro Ecuador</p>
        <p>Cel. 0923-158-687 Telefono: 123457</p>
    </footer>

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="../../script/usuario/productos.js"></script>
    <script src="../../script/usuario/carrito.js"></script>
</body>
</html>
