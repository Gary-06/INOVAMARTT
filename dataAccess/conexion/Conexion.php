<?php
class ConexionDB {
    private $server = "localhost:3306";
    private $database = "tiendota";
    private $username = "root";
    private $password = "";
    private $conexion;

    public function conectar() {
        $this->conexion = new PDO("mysql:host=$this->server;dbname=$this->database", $this->username, $this->password);
        return $this->conexion; 
    }

    public function cerrarConexion() {
        // Cerrar conexion
        $this->conexion = null;  
    }
}
?>
