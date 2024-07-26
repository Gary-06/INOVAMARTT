<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario de Categoría</title>
    <link rel="stylesheet" href="../../../public/css/tailwind.css">
</head>
<body class="bg-gray-100 flex items-center justify-center h-screen">
    <form id="categoriaForm" class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4 w-full max-w-md">
        <div class="mb-4">
            <label for="nameCategory" class="block text-gray-700 text-sm font-bold mb-2">Nombre de la categoría:</label>
            <input type="text" id="nameCategory" name="nombre" placeholder="Ingrese el nombre de la categoría"
                class="input-field">
        </div>
        <div class="mb-6">
            <label for="descriptionCategory" class="block text-gray-700 text-sm font-bold mb-2">Descripción:</label>
            <input type="text" id="descriptionCategory" name="descripcion" placeholder="Ingrese la descripción"
                class="input-field">
        </div>
    <div class="flex items-center justify-between">
        <button type="submit"
            class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
            Enviar
        </button>
    </div>
</form>
<script src="../../../Presentacion/script/user/add-user.js"></script>
</body>
</html>
