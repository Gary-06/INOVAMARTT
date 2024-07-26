<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AÑADIR PRODUCTOS</title>
    <!-- Incluye Tailwind CSS -->
    <link href="../../../public/css/tailwind.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.7/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body class="bg-gray-100 min-h-screen flex flex-col">
    <!-- Header -->
    <header class="bg-black text-white p-4 flex justify-center items-center relative">
        <div class="text-2xl font-bold text-center">INNOVAMART</div>
    </header>

    <!-- Formulario centrado -->
    <div class="flex-grow flex items-center justify-center">
        <form id="productoForm" class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4 w-full max-w-md" method="POST" action="addProducto.php" enctype="multipart/form-data">
            <div class="mb-4">
                <label for="name" class="block text-gray-700 text-sm font-bold mb-2">Nombre:</label>
                <input type="text" id="name" name="nombre" placeholder="Ingrese el nombre del producto" class="input-field" required >
            </div>
            <div class="mb-4">
                <label for="description" class="block text-gray-700 text-sm font-bold mb-2">Descripción:</label>
                <input type="text" id="description" name="descripcion" placeholder="Ingrese la descripción" class="input-field" required>
            </div>
            <div class="mb-4">
                <label for="price" class="block text-gray-700 text-sm font-bold mb-2">Precio:</label>
                <input type="number" id="price" name="precio" placeholder="Ingrese el precio" class="input-field" step="0.01" required>
            </div>
            <div class="mb-4">
                <label for="stock" class="block text-gray-700 text-sm font-bold mb-2">Stock:</label>
                <input type="number" id="stock" name="stock" placeholder="Ingrese la cantidad en stock" class="input-field" required>
            </div>
            <div class="mb-4">
                <label for="category" class="block text-gray-700 text-sm font-bold mb-2">Categoría:</label>
                <input type="text" id="category" name="categoria" placeholder="Ingrese la categoría del producto" class="input-field" required>
            </div>
            <div class="mb-4">
                    <label for="imagen_producto" class="block text-[#191d20] font-bold mb-2">Imagen del Producto:</label>
                    <input type="file" id="imagen_producto" name="imagen_producto" accept="image/*" class="w-full px-3 py-2 border rounded-lg text-[#2E2E2E] focus:outline-none focus:border-blue-500">
                </div>
            <div class="mb-4">
                <label for="estado" class="block text-gray-700 text-sm font-bold mb-2">Estado:</label>
                <input type="text" id="estado" name="estado" placeholder="Ingrese el estado del producto" class="input-field" required>
            </div>
            <div class="flex items-center justify-between">
                <button type="submit" class="bg-yellow-600 hover:bg-yellow-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                    Enviar
                </button>
            </div>
        </form>
    </div>

    <!-- Footer -->
    <footer class="bg-black text-white text-center p-4">
        <p>&copy; 2024 INNOVAMART. All Rights Reserved.</p>
        <p>Guayaquil, Milagro Ecuador</p>
        <p>Cel. 0923-158-687 Telefono: 123457</p>
    </footer>
    
    <script src="../../../Presentacion/script/producto/add-producto.js"></script>
</body>
</html>
