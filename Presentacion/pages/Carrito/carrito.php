<?php
session_start();

if (!isset($_SESSION['carrito'])) {
    $_SESSION['carrito'] = [];
}

function agregarAlCarrito($producto) {
    if (isset($_SESSION['carrito'][$producto['id']])) {
        $_SESSION['carrito'][$producto['id']]['cantidad'] += 1;
    } else {
        $_SESSION['carrito'][$producto['id']] = $producto;
        $_SESSION['carrito'][$producto['id']]['cantidad'] = 1;
    }
}

if (isset($_GET['action']) && $_GET['action'] == 'agregar' && isset($_GET['id'])) {
    $id_producto = intval($_GET['id']);
    
    // Conexión a la base de datos y obtención del producto
    include('../../../dataAccess/conexion/Conexion.php');
    $db = new ConexionDB();
    $conn = $db->conectar();
    
    $sql = "SELECT * FROM productos WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->execute([$id_producto]);
    $producto = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($producto) {
        agregarAlCarrito($producto);
    }

    $db->cerrarConexion();
}
?>
