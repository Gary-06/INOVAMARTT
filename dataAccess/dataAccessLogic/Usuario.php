<?php
include('../dataAccess/conexion/Conexion.php');

class Usuario {
    private int $ID_Usuario;
    private string $Nombre;
    private string $Apellido;
    private string $Correo_Electronico;
    private string $Contrasena;
    private string $Tipo_Usuario;
    private string $Fecha_Registro;
    private $conexionDB;

    public function __construct(ConexionDB $conexionDB) {
        $this->conexionDB = $conexionDB->conectar();
    }

    // Métodos Get y Set para cada propiedad
    public function setId(int $ID_Usuario): void {
        $this->ID_Usuario = $ID_Usuario;
    }

    public function getId(): int {
        return $this->ID_Usuario;
    }

    public function setNombre(string $Nombre): void {
        $this->Nombre = $Nombre;
    }

    public function getNombre(): string {
        return $this->Nombre;
    }

    public function setApellido(string $Apellido): void {
        $this->Apellido = $Apellido;
    }

    public function getApellido(): string {
        return $this->Apellido;
    }

    public function setCorreoElectronico(string $Correo_Electronico): void {
        $this->Correo_Electronico = $Correo_Electronico;
    }

    public function getCorreoElectronico(): string {
        return $this->Correo_Electronico;
    }

    public function setContrasena(string $Contrasena): void {
        $this->Contrasena = $Contrasena;
    }

    public function getContrasena(): string {
        return $this->Contrasena;
    }

    public function setTipoUsuario(string $Tipo_Usuario): void {
        $this->Tipo_Usuario = $Tipo_Usuario;
    }

    public function getTipoUsuario(): string {
        return $this->Tipo_Usuario;
    }

    public function setFechaRegistro(string $Fecha_Registro): void {
        $this->Fecha_Registro = $Fecha_Registro;
    }

    public function getFechaRegistro(): string {
        return $this->Fecha_Registro;
    }

    // Método para agregar usuario
    public function addUsuario(): bool {
        $success = false;
        try {
            $sql = "INSERT INTO usuarios (Nombre, Apellido, Correo_Electronico, Contrasena, Tipo_Usuario, Fecha_Registro) 
                    VALUES (?, ?, ?, ?, ?, ?)";
            
            $stmt = $this->conexionDB->prepare($sql);
            $stmt->execute([$this->getNombre(), $this->getApellido(), $this->getCorreoElectronico(), $this->getContrasena(), $this->getTipoUsuario(), $this->getFechaRegistro()]);
            $count = $stmt->rowCount();
            $success = $count > 0;
        } catch (PDOException $e) {
            echo $e->getMessage();
            $success = false;
        }
        return $success;
    }

    // Método para leer usuarios
    public function readUsuarios(): array {
        try {
            $sql = "SELECT * FROM usuarios";
            $stmt = $this->conexionDB->prepare($sql);
            $stmt->execute();
            $stmt->setFetchMode(PDO::FETCH_ASSOC);
            $arrayQuery = $stmt->fetchAll();
            return $arrayQuery;
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
        return [];
    }

    // Método para actualizar usuario
    public function updateUsuario(): bool {
        try {
            $sql = "UPDATE usuarios SET Nombre = ?, Apellido = ?, Correo_Electronico = ?, Contrasena = ?, Tipo_Usuario = ? WHERE ID_Usuario = ?";
            $stmt = $this->conexionDB->prepare($sql);
            $stmt->execute([$this->getNombre(), $this->getApellido(), $this->getCorreoElectronico(), $this->getContrasena(), $this->getTipoUsuario(), $this->getId()]);
            $count = $stmt->rowCount();
            return $this->affectedColumns($count);
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }

    // Método para eliminar usuario
    public function deleteUsuario(): bool {
        try {
            $sql = "DELETE FROM usuarios WHERE ID_Usuario = ?";
            $stmt = $this->conexionDB->prepare($sql);
            $stmt->execute([$this->getId()]);
            $count = $stmt->rowCount();
            return $this->affectedColumns($count);
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }

    private function affectedColumns($numer): bool
    {
        if ($numer <> null && $numer > 0) {
            $msm = true;
        } else {
            $msm=false;
        }
        return $msm;
    }

    public function login(string $Correo_Electronico, string $Contrasena)
    {
        try {
            $sql = "SELECT * FROM usuarios WHERE Correo_Electronico = ? AND Contrasena = ?";
            $stmt = $this->conexionDB->prepare($sql);
            $stmt->execute(array($Correo_Electronico, $Contrasena));
            $user = $stmt->fetch(PDO::FETCH_ASSOC);
            return $user;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }
}
?>