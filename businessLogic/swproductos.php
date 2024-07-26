<?php

include '../dataAccess/dataAccessLogic/Producto.php';

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    // Leer productos
    $conexionDB = new ConexionDB();
    $producto = new Producto($conexionDB);
    $productos = $producto->readProductos();
    echo json_encode($productos);
    exit;
}

else if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Agregar producto

    $directorio = "imagenes/";
    $nombreArchivo = $_FILES['imagen']['name'];
    $rutaTemporal = $_FILES['imagen']['tmp_name'];
    $rutaDefinitiva = $directorio.$nombreArchivo;

    if (!file_exists($directorio)) {
        mkdir($directorio, 0777);
    }

    move_uploaded_file($rutaTemporal, $rutaDefinitiva);

    $nombreProducto = $_POST['nombre'];
    $descripcion = $_POST['descripcion'];
    $precio = $_POST['precio'];
    $stock = $_POST['stock'];
    $categoria = $_POST['categoria'];
    $imagen = $rutaDefinitiva;
    $fechaCreacion = date('Y-m-d');
    $fechaActualizacion = date('Y-m-d');
    $estado = $_POST['estado'];

    $conexionDB = new ConexionDB();
    $producto = new Producto($conexionDB);

    $producto->setNombre($nombreProducto);
    $producto->setDescripcion($descripcion);
    $producto->setPrecio($precio);
    $producto->setStock($stock);
    $producto->setCategoria($categoria);
    $producto->setImagen($imagen);
    $producto->setFechaCreacion($fechaCreacion);
    $producto->setFechaActualizacion($fechaActualizacion);
    $producto->setEstado($estado);

    $producto->addProducto();
    $response = array('success' => true, 'message' => 'Producto añadido correctamente');
    echo json_encode($response);
    exit;
}

else if ($_SERVER['REQUEST_METHOD'] == 'PUT') {
    // Actualizar producto
    $data = json_decode(file_get_contents('php://input'), true);
    
    $idProducto = intval($data['id']);
    $nombreProducto = $data['nombre'];
    $descripcion = $data['descripcion'];
    $precio = $data['precio'];
    $stock = $data['stock'];
    $categoria = $data['categoria'];
    $imagenProducto = $data['imagen'];
    $estado = $data['estado'];

    $conexionDB = new ConexionDB();
    $producto = new Producto($conexionDB);

    $producto->setId($idProducto);
    $producto->setNombre($nombreProducto);
    $producto->setDescripcion($descripcion);
    $producto->setPrecio($precio);
    $producto->setStock($stock);
    $producto->setCategoria($categoria);
    $producto->setImagen($imagenProducto);
    $producto->setEstado($estado);
    $producto->updateProducto();
    exit;
}

else if ($_SERVER['REQUEST_METHOD'] == 'DELETE') {
    // Eliminar producto
    $idProducto = intval($_GET['id']);

    $conexionDB = new ConexionDB();
    $producto = new Producto($conexionDB);
    $producto->setId($idProducto);

    if ($producto->deleteProducto()) {
        $response['success'] = true;
        $response['message'] = 'Producto eliminado correctamente';
    } else {
        $response['message'] = 'Error al eliminar el producto';
    }
    echo json_encode($response);
    exit;
}

echo json_encode($response);
?>
