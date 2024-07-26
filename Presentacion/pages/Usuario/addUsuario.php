<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de Usuarios</title>
    <!-- Incluye Tailwind CSS -->
    <link href="../../../public/css/tailwind.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.7/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body class="bg-gray-100 min-h-screen flex flex-col">
    <!-- Header -->
    <header class="bg-black text-white p-4 flex justify-between items-center relative">
        <a href="javascript:history.back()" class="bg-yellow-600 hover:bg-yellow-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline absolute right-4">
            Regresar
        </a>
        <div class="text-2xl font-bold text-center flex-1">INNOVAMART</div>
    </header>

    <!-- Formulario centrado -->
    <div class="flex-grow flex items-center justify-center">
        <form id="usuarioForm" class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4 w-full max-w-md" method="POST">
            <div class="mb-4">
                <label for="nombre" class="block text-gray-700 text-sm font-bold mb-2">Nombre:</label>
                <input type="text" id="nombre" name="nombre" placeholder="Ingrese su nombre" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
            </div>
            <div class="mb-4">
                <label for="apellido" class="block text-gray-700 text-sm font-bold mb-2">Apellido:</label>
                <input type="text" id="apellido" name="apellido" placeholder="Ingrese su apellido" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
            </div>
            <div class="mb-4">
                <label for="correo_electronico" class="block text-gray-700 text-sm font-bold mb-2">Correo Electrónico:</label>
                <input type="email" id="correo_electronico" name="correo_electronico" placeholder="Ingrese su correo" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
            </div>
            <div class="mb-4">
                <label for="contrasena" class="block text-gray-700 text-sm font-bold mb-2">Contraseña:</label>
                <input type="password" id="contrasena" name="contrasena" placeholder="Ingrese su contraseña" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
            </div>
            <div class="mb-4">
                <label for="tipo_usuario" class="block text-gray-700 text-sm font-bold mb-2">Tipo de Usuario:</label>
                <select id="tipo_usuario" name="tipo_usuario" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                    <option value="cliente">Cliente</option>
                    <option value="admin">Administrador</option>
                </select>
            </div>
            <div class="mb-4" id="codigoAdminContainer" style="display: none;">
                <label for="codigo_admin" class="block text-gray-700 text-sm font-bold mb-2">Código de Administrador:</label>
                <input type="password" id="codigo_admin" name="codigo_admin" placeholder="Ingrese el código" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
            </div>
            <div class="flex items-center justify-between">
                <button type="submit" class="bg-yellow-600 hover:bg-yellow-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                    Registrar
                </button>
            </div>
        </form>
    </div>

    <!-- Footer -->
    <footer class="bg-black text-white text-center p-4">
        <p>&copy; 2024 INNOVAMART. All Rights Reserved.</p>
        <p>Guayaquil, Milagro Ecuador</p>
        <p>Cel. 0923-158-687 Teléfono: 123457</p>
    </footer>

    <script src="../../../Presentacion/script/usuario/add-usuario.js"></script>
</body>

</html>
