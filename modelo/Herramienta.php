<?php
require_once ("Estado.php");
require_once ("Categoria.php");

class Herramienta {
    private int $idHerramienta;
    private Estado $idEstado;
    private Categoria $idCategoria;
    private string $nombre;
    private string $descripcion;
    private int $cantidadDisponible;

    public function __construct(int $idHerramienta, int $idEstado, int $idCategoria, string $nombre, string $descripcion, int $cantidadDisponible) {
        $this->idHerramienta = $idHerramienta;
        $this->idEstado = $idEstado;
        $this->idCategoria = $idCategoria;
        $this->nombre = $nombre;
        $this->descripcion = $descripcion;
        $this->cantidadDisponible = $cantidadDisponible;
    }

    //getters y setters

    public function getIdHerramienta(): int {
        return $this->idHerramienta;
    }

    public function setIdHerramienta(int $idHerramienta): void {
        $this->idHerramienta = $idHerramienta;
    }

    public function getIdEstado(): int {
        return $this->idEstado;
    }

    public function setIdEstado(int $idEstado): void {
        $this->idEstado = $idEstado;
    }

    public function getIdCategoria(): int {
        return $this->idCategoria;
    }

    public function setIdCategoria(int $idCategoria): void {
        $this->idCategoria = $idCategoria;
    }

    public function getNombre(): string {
        return $this->nombre;
    }

    public function setNombre(string $nombre): void {
        $this->nombre = $nombre;
    }

    public function getDescripcion(): string {
        return $this->descripcion;
    }

    public function setDescripcion(string $descripcion): void {
        $this->descripcion = $descripcion;
    }

    public function getCantidadDisponible(): int {
        return $this->cantidadDisponible;
    }

    public function setCantidadDisponible(int $cantidadDisponible): void {
        $this->cantidadDisponible = $cantidadDisponible;
    }

    public function registrarHerramienta(): bool {
        // logica para registrar la herramienta en la bad
        return true; // retorna true si el registro fue exitoso
    }

    public function actualizarHerramienta(): bool {
        // logica para actualizar la herramienta en la db
        return true; // retorna true si la actualizacion fue exitosa
    }

    public function darDeBaja(): bool {
        // logica para dar de baja la herramienta en la db
        return true; // retorna true si la baja fue exitosa
    }

    public function consultarDisponibilidad(): int {
        // logica para consultar la disponibilidad de la herramienta
        return true; // retorna la cantidad disponible
    }
















}
?>