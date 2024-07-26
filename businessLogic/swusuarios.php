<?php

include '../dataAccess/dataAccessLogic/Usuario.php';

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    // Leer usuarios
    $conexionDB = new ConexionDB();
    $usuario = new Usuario($conexionDB);
    $usuarios = $usuario->readUsuarios();
    echo json_encode($usuarios);
    exit;
}

else if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Agregar usuario
    $nombreUsuario = $_POST['Nombre'];
    $Apellido = $_POST['Apellido'];
    $Correo_electronico= $_POST['Correo_Electronico'];
    $Contrasena = $_POST['Contrasena'];
    $Tipo_Usuario = $_POST['Tipo_Usuario'];
    $Fecha_Registro = date('Y-m-d');

    $conexionDB = new ConexionDB();
    $usuario = new Usuario($conexionDB);

    $usuario->setNombre($nombreUsuario);
    $usuario->setApellido($Apellido);
    $usuario->setCorreoElectronico($Correo_electronico);
    $usuario->setContrasena($Contrasena);
    $usuario->setTipoUsuario($Tipo_Usuario);
    $usuario->setFechaRegistro($Fecha_Registro);
  

    $usuario->addUsuario();
    $response = array('success' => true, 'message' => 'Usuario añadido correctamente');
    echo json_encode($response);
    exit;
}

else if ($_SERVER['REQUEST_METHOD'] == 'PUT') {
    // Actualizar usuario
    $data = json_decode(file_get_contents('php://input'), true);
    
    $idUsuario = intval($data['ID_Usuario']);
    $nombreUsuario = $data['Nombre'];
    $Apellido = $data['Apellido'];
    $Correo_electronico= $data['Correo_Electronico'];
    $Contrasena = $data['Contrasena'];
    $Tipo_Usuario = $data['Tipo_Usuario'];
    $Fecha_Registro = date('Y-m-d');

    $conexionDB = new ConexionDB();
    $usuario = new Usuario($conexionDB);

    $usuario->setId($idUsuario);
    $usuario->setNombre($nombreUsuario);
    $usuario->setApellido($Apellido);
    $usuario->setCorreoElectronico($Correo_electronico);
    $usuario->setContrasena($Contrasena);
    $usuario->setTipoUsuario($Tipo_Usuario);
    $usuario->setFechaRegistro($Fecha_Registro);
    $usuario->updateUsuario();
    exit;
}

else if ($_SERVER['REQUEST_METHOD'] == 'DELETE') {
    // Eliminar usuario
    $idUsuario = intval($_GET['ID_Usuario']);

    $conexionDB = new ConexionDB();
    $usuario = new Usuario($conexionDB);
    $usuario->setId($idUsuario);

    if ($usuario->deleteUsuario()) {
        $response['success'] = true;
        $response['message'] = 'Usuario eliminado correctamente';
    } else {
        $response['message'] = 'Error al eliminar el usuario';
    }
    echo json_encode($response);
    exit;
}

echo json_encode($response);
?>
