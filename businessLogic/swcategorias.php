<?php

include '../dataAccess/dataAccessLogic/Categoria.php';

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    // Read categorias
    $conexionDB = new ConexionDB();
    $categoria = new Categoria($conexionDB);
    $categorias = $categoria->readCategorias();
    echo json_encode($categorias);
    exit;
}

else if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Add categoria
    $nombreCategoria = $_POST['nameCategory'];
    $descripcionCategoria = $_POST['descriptionCategory'];

    $conexionDB = new ConexionDB();
    $categoria = new Categoria($conexionDB);
    
    $categoria->setNombre($nombreCategoria);
    $categoria->setDescripcion($descripcionCategoria);
    $categoria->addCategoria();
    $response = array('success' => true, 'message' => 'Categoría añadida correctamente');
    echo json_encode($response);
    exit;
}

else if ($_SERVER['REQUEST_METHOD'] == 'PUT') {
    // Update categoria
    $data = json_decode(file_get_contents('php://input'), true);
    // Obtener los valores del objeto JSON
    $idCategoria = intval($data['id']);
    $nombreCategoria = $data['nombre'];
    $descripcionCategoria = $data['descripcion'];

    $conexionDB = new ConexionDB();
    $categoria = new Categoria($conexionDB);

    $categoria->setId($idCategoria);
    $categoria->setNombre($nombreCategoria);
    $categoria->setDescripcion($descripcionCategoria);
    $categoria->updateCategoria();
    exit;
}

else if ($_SERVER['REQUEST_METHOD'] == 'DELETE') {
    // Delete categoria
    $idCategoria = intval($_GET['id']);
    $conexionDB = new ConexionDB();
    $categoria = new Categoria($conexionDB);
    $categoria->setId($idCategoria);

    if ($categoria->deleteCategoria()) {
        $response['success'] = true;
        $response['message'] = 'Categoria eliminada correctamente';
    } else {
        $response['message'] = 'Error al eliminar la categoria';
    }
    echo json_encode($response);
    exit;
}
echo json_encode($response);
?>
