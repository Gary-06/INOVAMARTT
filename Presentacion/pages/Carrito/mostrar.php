<?php
session_start();
include('../../../dataAccess/conexion/Conexion.php');

$subtotal = 0;

if (!isset($_SESSION['carrito']) || empty($_SESSION['carrito'])) {
    echo '<p>El carrito está vacío.</p>';
    exit();
}

echo '<h1 class="text-2xl font-bold mb-4">Carrito de Compras</h1>';
echo '<table class="min-w-full divide-y divide-gray-200">';
echo '<thead><tr><th>Producto</th><th>Cantidad</th><th>Precio</th><th>Total</th></tr></thead>';
echo '<tbody>';

foreach ($_SESSION['carrito'] as $producto) {
    $total_producto = $producto['precio'] * $producto['cantidad'];
    $subtotal += $total_producto;
    echo '<tr>';
    echo '<td>' . htmlspecialchars($producto['nombre']) . '</td>';
    echo '<td>' . htmlspecialchars($producto['cantidad']) . '</td>';
    echo '<td>$' . htmlspecialchars($producto['precio']) . '</td>';
    echo '<td>$' . $total_producto . '</td>';
    echo '</tr>';
}

echo '</tbody>';
echo '<tfoot><tr><td colspan="3" class="font-bold">Subtotal</td><td>$' . $subtotal . '</td></tr></tfoot>';
echo '</table>';

echo '<a href="checkout.php" class="bg-yellow-500 text-white py-2 px-4 rounded-lg">Proceder a la compra</a>';
?>
