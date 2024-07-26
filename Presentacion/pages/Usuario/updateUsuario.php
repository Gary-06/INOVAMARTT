<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Actualizar Usuario</title>
    <!-- Incluye Tailwind CSS -->
    <link rel="stylesheet" href="../../../public/css/tailwind.css">
</head>

<body class="bg-gray-100">
    <!-- Barra de navegación -->
    <?php include('../../Componentes/navigation.php');?>

    <div class="container mx-auto max-w-md py-8">
        <!-- Encabezado -->
        <div class="flex items-center justify-between mb-4 text-justify">
            <h1 class="text-3xl font-bold text-gray-800">Actualizar Usuario</h1>
        </div>

        <form id="updateUsuarioForm" class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
            <input type="hidden" id="ID_Usuario" name="ID_Usuario" value="">
            <div class="mb-4">
                <label for="nombre" class="block text-gray-700 text-sm font-bold mb-2">Nombre:</label>
                <input type="text" id="nombre" name="Nombre" placeholder="Ingrese el nombre de Usuario"
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
            </div>
            <div class="mb-4">
                <label for="apellido" class="block text-gray-700 text-sm font-bold mb-2">Apellido:</label>
                <input type="text" id="apellido" name="Apellido" placeholder="Ingrese Apellido"
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
            </div>
            <div class="mb-4">
                <label for="correo_electronico" class="block text-gray-700 text-sm font-bold mb-2">Correo electrónico:</label>
                <input type="email" id="correo_electronico" name="Correo_Electronico" placeholder="Ingrese su correo"
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
            </div>
            <div class="mb-4">
                <label for="contrasena" class="block text-gray-700 text-sm font-bold mb-2">Contraseña:</label>
                <input type="password" id="contrasena" name="Contrasena" placeholder="Ingrese contraseña"
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
            </div>
            
            <div class="mb-4">
                <label for="tipo_usuario" class="block text-gray-700 text-sm font-bold mb-2">Tipo de Usuario:</label>
                <select id="tipo_usuario" name="Tipo_Usuario" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                <option value="admin">admin</option>
                <option value="user">cliente</option>
                </select>
                </div>
            
            <div class="flex items-center justify-between">
                <button type="submit"
                    class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Actualizar</button>
            </div>
        </form>
    </div>

    <script src="../../../Presentacion/script/usuario/update-usuario.js"></script>
</body>

</html>
