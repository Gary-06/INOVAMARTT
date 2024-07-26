<?php
include ('../dataAccess/dataAccessLogic/Usuario.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['Correo_Electronico']) && isset($_POST['Contrasena'])) {
    $Correo_Electronico = $_POST['Correo_Electronico'];
    $Contrasena = $_POST['Contrasena'];

    $objConexion = new ConexionDB();
    $objUser = new Usuario($objConexion);

    $user = $objUser->login($Correo_Electronico, $Contrasena);
    if ($user) {
        session_start();
        $_SESSION['user'] = $user;
        $response = array('success' => true, 'user' => $user);
    } else {
        $response = array('success' => false, 'message' => 'Credenciales incorrectas');
    }
    echo json_encode($response);
    exit;
}

?>
