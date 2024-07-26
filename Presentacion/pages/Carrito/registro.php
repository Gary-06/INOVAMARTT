<?php
session_start();
include('../../../dataAccess/conexion/Conexion.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Código para registrar un nuevo usuario en la base de datos
    // ...

    // Luego redirigir a la página de inicio de sesión o carrito
    header('Location: checkout.php');
    exit();
}
?>

<h1 class="text-2xl font-bold mb-4">Registro de Usuario</h1>
<form action="" method="post">
    <label for="nombre">Nombre:</label>
    <input type="text" id="nombre" name="nombre" required>

    <label for="email">Correo electrónico:</label>
    <input type="email" id="email" name="email" required>

    <label for="usuario">Nombre de usuario:</label>
    <input type="text" id="usuario" name="usuario" required>

    <label for="password">Contraseña:</label>
    <input type="password" id="password" name="password" required>

    <button type="submit" class="bg-yellow-500 text-white py-2 px-4 rounded-lg">Registrar</button>
</form>
