<?php
include('../dataAccess/conexion/Conexion.php');

header('Content-Type: application/json'); // Configura el tipo de contenido de respuesta como JSON

try {
    $db = new ConexionDB();
    $conn = $db->conectar();

    $sql = "SELECT * FROM productos";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $productos = $stmt->fetchAll(PDO::FETCH_ASSOC);

    echo json_encode($productos); // Devuelve los productos como JSON

    $db->cerrarConexion();
} catch (PDOException $e) {
    echo json_encode(['error' => 'Error de conexión: ' . $e->getMessage()]);
}
?>
