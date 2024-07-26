<?php
include('../dataAccess/conexion/Conexion.php');

class Compra {
    private int $id;
    private int $id_usuario;
    private string $fecha;
    private float $total;
    private string $comprobante_pago;
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

    public function setFecha(string $fecha): void {
        $this->fecha = $fecha;
    }

    public function getFecha(): string {
        return $this->fecha;
    }

    public function setTotal(float $total): void {
        $this->total = $total;
    }

    public function getTotal(): float {
        return $this->total;
    }

    public function setComprobantePago(string $comprobante_pago): void {
        $this->comprobante_pago = $comprobante_pago;
    }

    public function getComprobantePago(): string {
        return $this->comprobante_pago;
    }

    public function addCompra(): bool {
        $success = false;
        try {
            $sql = "INSERT INTO compra (id_usuario, fecha, total, comprobante_pago) VALUES (?, ?, ?, ?)";
            $stmt = $this->conexionDB->prepare($sql);
            $stmt->execute([$this->getIdUsuario(), $this->getFecha(), $this->getTotal(), $this->getComprobantePago()]);
            $count = $stmt->rowCount();
            $success = $count > 0;
        } catch (PDOException $e) {
            echo $e->getMessage();
            $success = false;
        }
        return $success;
    }
}
?>
