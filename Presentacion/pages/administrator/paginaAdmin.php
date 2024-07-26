<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menú ADMIN</title>
    <!-- Incluye Tailwind CSS -->
    <link href="../../../public/css/tailwind.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.7/dist/tailwind.min.css" rel="stylesheet">    
    <!-- Incluye FontAwesome para los íconos -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
</head>

<body class="bg-gray-100 flex flex-col min-h-screen">
    <!-- Barra de navegación -->
    <header class="bg-black text-white p-4 flex justify-center items-center relative">
    <div class="text-2xl font-bold text-center">INNOVAMART</div>
    <div class="flex items-center space-x-4 absolute right-4">
        <!-- Aquí puedes agregar elementos adicionales si es necesario -->
    </div>
</header>

    <!-- Contenido principal -->
    <div class="flex-grow container mx-auto py-8 mt-12">
        <!-- Grid para cardviews en una sola fila -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8">
            <!-- Cardview Categorías -->
            <div class="max-w-sm rounded-lg overflow-hidden shadow-lg bg-white border border-gray-200">
                <div class="px-6 py-4">
                    <div class="flex items-center mb-4">
                        <i class="fas fa-list text-4xl text-yellow-500 mr-2"></i>
                        <div class="font-bold text-2xl text-gray-800">Categorías</div>
                    </div>
                    <p class="text-gray-600 text-base">
                        Administra de manera eficiente todas las categorías registradas en tu plataforma.
                    </p>
                </div>
                <div class="px-6 pt-4 pb-2">
                    <a href="../Categoria/listCategoria.php"
                        class="inline-block bg-yellow-500 hover:bg-yellow-600 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline transition-colors duration-300">
                        Ingresar
                    </a>
                </div>
            </div>

            <!-- Cardview Usuarios -->
            <div class="max-w-sm rounded-lg overflow-hidden shadow-lg bg-white border border-gray-200">
                <div class="px-6 py-4">
                    <div class="flex items-center mb-4">
                        <i class="fas fa-users text-4xl text-yellow-500 mr-2"></i>
                        <div class="font-bold text-2xl text-gray-800">Usuarios</div>
                    </div>
                    <p class="text-gray-600 text-base">
                        Gestiona de manera eficiente todos los usuarios registrados en tu plataforma.
                    </p>
                </div>
                <div class="px-6 pt-4 pb-2">
                    <a href="../Usuario/listUsuario.php"
                        class="inline-block bg-yellow-500 hover:bg-yellow-600 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline transition-colors duration-300">
                        Ingresar
                    </a>
                </div>
            </div>

            <!-- Cardview Productos -->
            <div class="max-w-sm rounded-lg overflow-hidden shadow-lg bg-white border border-gray-200">
                <div class="px-6 py-4">
                    <div class="flex items-center mb-4">
                        <i class="fas fa-box text-4xl text-yellow-500 mr-2"></i>
                        <div class="font-bold text-2xl text-gray-800">Productos</div>
                    </div>
                    <p class="text-gray-600 text-base">
                        Administra de manera eficiente todos los productos registrados en tu plataforma.
                    </p>
                </div>
                <div class="px-6 pt-4 pb-2">
                    <a href="../Producto/listProducto.php"
                        class="inline-block bg-yellow-500 hover:bg-yellow-600 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline transition-colors duration-300">
                        Ingresar
                    </a>
                </div>
            </div>

            <!-- Cardview Página Cliente -->
            <div class="max-w-sm rounded-lg overflow-hidden shadow-lg bg-white border border-gray-200">
                <div class="px-6 py-4">
                    <div class="flex items-center mb-4">
                        <i class="fas fa-store text-4xl text-yellow-500 mr-2"></i>
                        <div class="font-bold text-2xl text-gray-800">Página Cliente</div>
                    </div>
                    <p class="text-gray-600 text-base">
                        Gestiona todos los aspectos relacionados con la página del cliente en tu plataforma.
                    </p>
                </div>
                <div class="px-6 pt-4 pb-2">
                    <a href="../Cliente/paginaCliente.php"
                        class="inline-block bg-yellow-500 hover:bg-yellow-600 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline transition-colors duration-300">
                        Ingresar
                    </a>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer class="bg-black text-white text-center p-4">
        <p>&copy; 2024 INNOVAMART. All Rights Reserved.</p>
        <p>Guayaquil, Milagro Ecuador</p>
        <p>Cel. 0923-158-687 Teléfono: 123457</p>
    </footer>
</body>

</html>
