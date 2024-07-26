<?php
include('../dataAccess/conexion/Conexion.php');

class Carrito {
    private int $id;
    private int $id_usuario;
    private int $id_producto;
    private int $cantidad;
    private $conexionDB;

    public function __construct(ConexionDB $conexionDB) {
        $this->conexionDB = $conexionDB->conectar();
    }

    public function setId(int $id): void {
        $this->id = $id;
    }

    public function getId(): int {
        return $this->id;
    }

    public function setIdUsuario(int $id_usuario): void {
        $this->id_usuario = $id_usuario;
    }

    public function getIdUsuario(): int {
        return $this->id_usuario;
    }

    public function setIdProducto(int $id_producto): void {
        $this->id_producto = $id_producto;
    }

    public function getIdProducto(): int {
        return $this->id_producto;
    }

    public function setCantidad(int $cantidad): void {
        $this->cantidad = $cantidad;
    }

    public function getCantidad(): int {
        return $this->cantidad;
    }

    public function addProducto(): bool {
        $success = false;
        try {
            $sql = "INSERT INTO carrito (id_usuario, id_producto, cantidad) VALUES (?, ?, ?)";
            $stmt = $this->conexionDB->prepare($sql);
            $stmt->execute([$this->getIdUsuario(), $this->getIdProducto(), $this->getCantidad()]);
            $count = $stmt->rowCount();
            $success = $count > 0;
        } catch (PDOException $e) {
            echo $e->getMessage();
            $success = false;
        }
        return $success;
    }

    public function getProductosPorUsuario(int $id_usuario): array {
        try {
            $sql = "SELECT * FROM carrito WHERE id_usuario = ?";
            $stmt = $this->conexionDB->prepare($sql);
            $stmt->execute([$id_usuario]);
            $stmt->setFetchMode(PDO::FETCH_ASSOC);
            $arrayQuery = $stmt->fetchAll();
            return $arrayQuery;
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
        return [];
    }

    public function deleteCarritoPorUsuario(int $id_usuario): bool {
        try {
            $sql = "DELETE FROM carrito WHERE id_usuario = ?";
            $stmt = $this->conexionDB->prepare($sql);
            $stmt->execute([$id_usuario]);
            $count = $stmt->rowCount();
            return $count > 0;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }
}
?>
