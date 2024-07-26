<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LISTAR PRODUCTOS</title>
    <!-- Incluye Tailwind CSS -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@latest/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body class="bg-gray-100 min-h-screen flex flex-col">
    <!-- Header -->
    <header class="bg-black text-white p-4 flex justify-center items-center relative">
        <div class="text-2xl font-bold text-center">INNOVAMART</div>
    </header>

    <!-- Main Content -->
    <main class="bg-gray-100 p-8 flex-grow">
        <div class="container mx-auto py-8">
            <!-- Encabezado -->
            <div class="flex items-center justify-between mb-4">
                <h1 class="text-3xl font-bold text-gray-800">Gestión de productos</h1>
                <div class="flex space-x-4"> <!-- Ajusta el espacio entre los botones aquí -->
                    <a href="addProducto.php" class="bg-yellow-600 hover:bg-yellow-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Crear Producto</a>
                    <button onclick="history.back()" class="bg-yellow-600 hover:bg-yellow-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Regresar</button>
                </div>
            </div>

            <!-- Tabla de Productos -->
            <div class="bg-white shadow-md rounded my-8 overflow-x-auto">
                <table class="w-full bg-white" id="table-producto">
                    <thead class="bg-gray-800 text-white">
                        <tr>
                            <th class="py-2 px-6 text-left">ID</th>
                            <th class="py-2 px-6 text-left">Nombre</th>
                            <th class="py-2 px-6 text-left">Descripción</th>
                            <th class="py-2 px-6 text-left">Precio</th>
                            <th class="py-2 px-6 text-left">Stock</th>
                            <th class="py-2 px-6 text-left">Categoría</th>
                            <th class="py-2 px-6 text-left">fecha_creacion</th>
                            <th class="py-2 px-6 text-left">fecha_actualizacion</th>
                            <th class="py-2 px-6 text-left">Estado</th>
                            <th class="py-2 px-6 text-left">Acciones</th>
                        </tr>
                    </thead>
                    <tbody class="text-gray-700">
                        <!-- Aquí se llenarán dinámicamente los datos de los productos -->
                    </tbody>
                </table>
            </div>
        </div>
    </main>

    <!-- Footer -->
    <footer class="bg-black text-white text-center p-4">
        <p>&copy; 2024 INNOVAMART. All Rights Reserved.</p>
        <p>Guayaquil, Milagro Ecuador</p>
        <p>Cel. 0923-158-687 Teléfono: 123457</p>
    </footer>
    <script src="../../../Presentacion/script/producto/main-producto.js"></script>
</body>

</html>
