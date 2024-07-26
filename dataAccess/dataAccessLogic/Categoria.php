<?php
include('../dataAccess/conexion/Conexion.php');

class Categoria {

    private int $id;
    private string $nombre;
    private string $descripcion;
    private $conexionDB;


    public function __construct(ConexionDB $conexionDB) {
        $this->conexionDB = $conexionDB->conectar();
    }
    // Métodos Get y Set para cada propiedad
    public function setId(int $id): void
    {
        $this->id = $id;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function setNombre(string $nombre): void
    {
        $this->nombre = $nombre;
    }

    public function getNombre(): string
    {
        return $this->nombre;
    }

    public function setDescripcion(string $descripcion): void
    {
        $this->descripcion = $descripcion;
    }

    public function getDescripcion(): string
    {
        return $this->descripcion;
    }

#ADD CATEGORIA
    public function addCategoria(): bool {
        $success = false;
        try {
            $sql = "INSERT INTO categorias (nombre, descripcion) VALUES (?, ?)";
            
            $stmt = $this->conexionDB->prepare($sql);
            echo ($this-> getNombre()); 
            $stmt->execute(array ($this->getNombre(), $this->getDescripcion()));
            $count = $stmt->rowCount();
            $success = $count > 0;
        } catch (PDOException $e) {
            echo $e->getMessage();
            $success = false;
        }
        return $success;
    }
# READ CATEGORIAS
    public function readCategorias(): array {
        try {
            $sql = "SELECT * FROM categorias";
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

#DELETE CATEGORIA
public function deleteCategoria(): bool {
    try {
        $sql = "DELETE FROM categorias WHERE id = ?";
        $stmt = $this->conexionDB->prepare($sql);
        $stmt->execute(array($this->getId()));
        $count = $stmt->rowCount();
        return $this->affectedColumns($count);
    } catch (PDOException $e) {
        echo $e->getMessage();
        return false;
    }
}

#UPDATE CATEGORIA
    public function updateCategoria(): bool {
        try {
            $sql = "UPDATE categorias SET nombre = ?, descripcion = ? WHERE id = ?";
            $stmt = $this->conexionDB->prepare($sql);
            $stmt->execute(array($this->getNombre(),$this->getDescripcion(), $this->getId()));
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
}
