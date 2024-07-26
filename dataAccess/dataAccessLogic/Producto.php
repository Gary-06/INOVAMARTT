<?php
include('../dataAccess/conexion/Conexion.php');

class Producto {
    private int $id;
    private string $nombre;
    private string $descripcion;
    private float $precio;
    private int $stock;
    private string $categoria;
    private string $imagen;
    private string $fecha_creacion;
    private string $fecha_actualizacion;
    private string $estado;
    private $conexionDB;

    public function __construct(ConexionDB $conexionDB) {
        $this->conexionDB = $conexionDB->conectar();
    }

    // Métodos Get y Set para cada propiedad
    public function setId(int $id): void {
        $this->id = $id;
    }

    public function getId(): int {
        return $this->id;
    }

    public function setNombre(string $nombre): void {
        $this->nombre = $nombre;
    }

    public function getNombre(): string {
        return $this->nombre;
    }

    public function setDescripcion(string $descripcion): void {
        $this->descripcion = $descripcion;
    }

    public function getDescripcion(): string {
        return $this->descripcion;
    }

    public function setPrecio(float $precio): void {
        $this->precio = $precio;
    }

    public function getPrecio(): float {
        return $this->precio;
    }

    public function setStock(int $stock): void {
        $this->stock = $stock;
    }

    public function getStock(): int {
        return $this->stock;
    }

    public function setCategoria(string $categoria): void {
        $this->categoria = $categoria;
    }

    public function getCategoria(): string {
        return $this->categoria;
    }

    public function setImagen(string $imagen): void {
        $this->imagen = $imagen;
    }

    public function getImagen(): string {
        return $this->imagen;
    }

    public function setFechaCreacion(string $fecha_creacion): void {
        $this->fecha_creacion = $fecha_creacion;
    }

    public function getFechaCreacion(): string {
        return $this->fecha_creacion;
    }

    public function setFechaActualizacion(string $fecha_actualizacion): void {
        $this->fecha_actualizacion = $fecha_actualizacion;
    }

    public function getFechaActualizacion(): string {
        return $this->fecha_actualizacion;
    }

    public function setEstado(string $estado): void {
        $this->estado = $estado;
    }

    public function getEstado(): string {
        return $this->estado;
    }

    #ADD PRODUCTO
    public function addProducto(): bool {
        $success = false;
        try {
            $sql = "INSERT INTO productos (nombre, descripcion, precio, stock, categoria, imagen, fecha_creacion, fecha_actualizacion, estado) 
                    VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
            
            $stmt = $this->conexionDB->prepare($sql);
            $stmt->execute([$this->getNombre(), $this->getDescripcion(), $this->getPrecio(), $this->getStock(), $this->getCategoria(), $this->getImagen(), $this->getFechaCreacion(), $this->getFechaActualizacion(), $this->getEstado()]);
            $count = $stmt->rowCount();
            $success = $count > 0;
        } catch (PDOException $e) {
            echo $e->getMessage();
            $success = false;
        }
        return $success;
    }

    # READ PRODUCTOS
    public function readProductos(): array {
        try {
            $sql = "SELECT * FROM productos";
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

    #UPDATE PRODUCTO
    public function updateProducto(): bool {
        try {
            $sql = "UPDATE productos SET nombre = ?, descripcion = ?, precio = ?, stock = ?, categoria = ?, imagen = ?, estado = ? WHERE id = ?";
            $stmt = $this->conexionDB->prepare($sql);
            $stmt->execute([$this->getNombre(), $this->getDescripcion(), $this->getPrecio(), $this->getStock(), $this->getCategoria(), $this->getImagen(), $this->getEstado(), $this->getId()]);
            $count = $stmt->rowCount();
            return $this->affectedColumns($count);
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }

    #DELETE PRODUCTO
    public function deleteProducto(): bool {
        try {
            $sql = "DELETE FROM productos WHERE id = ?";
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
}
?>