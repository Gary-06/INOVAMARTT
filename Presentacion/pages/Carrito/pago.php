<?php
session_start();
// Puedes utilizar una librería para manejar uploads
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_FILES['comprobante'])) {
    // Manejar la carga del archivo y almacenamiento
    // Verificar el archivo y guardar en el servidor
    echo '<p>Comprobante recibido. Procesaremos tu pago.</p>';
    // Redirigir a una página de confirmación
    exit();
}
?>

<h1 class="text-2xl font-bold mb-4">Sube tu Comprobante de Transferencia</h1>
<form action="" method="post" enctype="multipart/form-data">
    <label for="comprobante">Selecciona el archivo:</label>
    <input type="file" id="comprobante" name="comprobante" required>
    <button type="submit" class="bg-yellow-500 text-white py-2 px-4 rounded-lg">Subir Comprobante</button>
</form>
