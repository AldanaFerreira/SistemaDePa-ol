<?php
require_once ("Herramienta.php");

Class Stock {
    // Atributos (campos de la tabla Stock)
    private int $idStock;
    private Herramienta $idHerramienta;
    private int $cantidadDisponible;
    private int $cantidadReservada;
    private int $stockMinimo;
    private string $ubicacion;
    private string $estado;
    private DateTime $fechaActualizacion;

    public function __construct(int $idStock, Herramienta $idHerramienta, int $cantidadDisponible, int $cantidadReservada, int $stockMinimo, string $ubicacion, string $estado, DateTime $fechaActualizacion) {
        $this->idStock = $idStock;
        $this->idHerramienta = $idHerramienta;
        $this->cantidadDisponible = $cantidadDisponible;
        $this->cantidadReservada = $cantidadReservada;
        $this->stockMinimo = $stockMinimo;
        $this->ubicacion = $ubicacion;
        $this->estado = $estado;
        $this->fechaActualizacion = $fechaActualizacion;
    }

    // Getters y Setters
    public function getIdStock(): int {
        return $this->idStock;
    }   

    public function setIdStock(int $idStock): void {
        $this->idStock = $idStock;
    }

    public function getIdHerramienta(): Herramienta {
        return $this->idHerramienta;
    }

    public function setIdHerramienta(Herramienta $idHerramienta): void {
        $this->idHerramienta = $idHerramienta;
    }

    public function getCantidadDisponible(): int {
        return $this->cantidadDisponible;
    }

    public function setCantidadDisponible(int $cantidadDisponible): void {
        $this->cantidadDisponible = $cantidadDisponible;
    }

    public function getCantidadReservada(): int {
        return $this->cantidadReservada;
    }

    public function setCantidadReservada(int $cantidadReservada): void {
        $this->cantidadReservada = $cantidadReservada;
    }

    public function getStockMinimo(): int {
        return $this->stockMinimo;
    }

    public function setStockMinimo(int $stockMinimo): void {
        $this->stockMinimo = $stockMinimo;
    }

    public function getUbicacion(): string {
        return $this->ubicacion;
    }

    public function setUbicacion(string $ubicacion): void {
        $this->ubicacion = $ubicacion;
    }

    public function getEstado(): string {
        return $this->estado;
    }

    public function setEstado(string $estado): void {
        $this->estado = $estado;
    }

    public function getFechaActualizacion(): DateTime {
        return $this->fechaActualizacion;
    }

    public function setFechaActualizacion(DateTime $fechaActualizacion): void {
        $this->fechaActualizacion = $fechaActualizacion;
    }

    // Métodos para interactuar con la base de datos (simulados aquí)

    public function actualizarStock(int $idStock, int $cantidadDisponible, int $cantidadReservada, int $stockMinimo, string $ubicacion, string $estado): bool {
        // Lógica para actualizar el stock en la BD
        return true;
    }
    public function obtenerStock(int $idStock): ?Stock {
        // Lógica para obtener un stock de la BD
        return null; // Simulación de no encontrado
    }
    public function listarStocks(): array {
        // Lógica para listar todos los stocks de la BD
        return []; // Simulación de lista vacía
    }

}
?>