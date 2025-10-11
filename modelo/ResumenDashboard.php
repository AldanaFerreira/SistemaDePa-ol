<?php

require_once ("Herramienta.php");
require_once ("Prestamo.php");

class ResumenDashboard {
    private int $idResumenDashboard;
    private int $stockTotal;
    private int $bajoStock;
    private int $prestamosActivos;
    private datetime $fechaGeneracion;
    private Herramienta $idHerramienta;
    private Prestamo $idPrestamo;

    public function __construct(int $idResumenDashboard, int $stockTotal, int $bajoStock, int $prestamosActivos, datetime $fechaGeneracion, Herramienta $idHerramienta, Prestamo $idPrestamo) {
        $this->idResumenDashboard = $idResumenDashboard;
        $this->stockTotal = $stockTotal;
        $this->bajoStock = $bajoStock;
        $this->prestamosActivos = $prestamosActivos;
        $this->fechaGeneracion = $fechaGeneracion;  
        $this->idHerramienta = $idHerramienta;
        $this->idPrestamo = $idPrestamo;
    }

    // Getters y setters

    public function getIdResumenDashboard(): int {
        return $this->idResumenDashboard;
    }

    public function setIdResumenDashboard(int $idResumenDashboard): void {
        $this->idResumenDashboard = $idResumenDashboard;
    }

    public function getStockTotal(): int {
        return $this->stockTotal;
    }

    public function setStockTotal(int $stockTotal): void {
        $this->stockTotal = $stockTotal;
    }

    public function getBajoStock(): int {
        return $this->bajoStock;
    }

    public function setBajoStock(int $bajoStock): void {
        $this->bajoStock = $bajoStock;
    }

    public function getPrestamosActivos(): int {
        return $this->prestamosActivos;
    }

    public function setPrestamosActivos(int $prestamosActivos): void {
        $this->prestamosActivos = $prestamosActivos;
    }

    public function getFechaGeneracion(): datetime {
        return $this->fechaGeneracion;
    }

    public function setFechaGeneracion(datetime $fechaGeneracion): void {
        $this->fechaGeneracion = $fechaGeneracion;
    }

    public function getIdHerramienta(): Herramienta {
        return $this->idHerramienta;
    }

    public function setIdHerramienta(Herramienta $idHerramienta): void {
        $this->idHerramienta = $idHerramienta;
    }

    public function getIdPrestamo(): Prestamo {
        return $this->idPrestamo;
    }

    public function setIdPrestamo(Prestamo $idPrestamo): void {
        $this->idPrestamo = $idPrestamo;
    }

    public function generarResumen() {
        // Lógica para generar el resumen del dashboard
        return true; // simulacion de exito
    }

    public function actualizarResumen() {
        // Lógica para actualizar el resumen del dashboard
        return true; // simulacion de exito
    }

    public function eliminarResumen() {
        // Lógica para eliminar el resumen del dashboard
        return true; // simulacion de exito
    }
}