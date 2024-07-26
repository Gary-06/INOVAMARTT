<?php
session_start();
include('../../../dataAccess/conexion/Conexion.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Aquí debes validar los datos del usuario y la transferencia bancaria
    // Redirigir a una página de confirmación o mostrar un mensaje

    // Ejemplo básico para mostrar un mensaje
    echo '<p>Gracias por tu compra. Por favor, sube tu comprobante de transferencia.</p>';
    // Redirigir a una página para subir el comprobante
    exit();
}

// Mostrar formulario de login/registro
?>

<h1 class="text-2xl font-bold mb-4">Completa tu Compra</h1>
<p>Para proceder, ingresa como cliente o crea una cuenta.</p>

<form action="" method="post">
    <label for="usuario">Nombre de usuario:</label>
    <input type="text" id="usuario" name="usuario" required>

    <label for="password">Contraseña:</label>
    <input type="password" id="password" name="password" required>

    <button type="submit" class="bg-yellow-500 text-white py-2 px-4 rounded-lg">Iniciar sesión</button>
</form>

<p>¿No tienes cuenta? <a href="registro.php" class="text-yellow-500">Regístrate aquí</a></p>
