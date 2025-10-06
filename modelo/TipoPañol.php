<?php
require_once ("Usuario.php");

Class TipoPañol {
    // Atributos (campos de la tabla TipoPañol)
    private int $idTipoPañol;
    private string $nombre;
    private string $descripcion;

    public function __construct(int $idTipoPañol, string $nombre, string $descripcion) {
        $this->idTipoPañol = $idTipoPañol;
        $this->nombre = $nombre;
        $this->descripcion = $descripcion;
    }

    // Getters y Setters
    public function getIdTipoPañol(): int {
        return $this->idTipoPañol;
    }

    public function setIdTipoPañol(int $idTipoPañol): void {
        $this->idTipoPañol = $idTipoPañol;
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

    // Métodos para interactuar con la base de datos (simulados aquí)
    public function guardarTipoPañol(): bool {
        // Lógica para guardar en la BD
        return true;
   }

    public function actualizarTipoPañol(): bool {
        // Lógica para actualizar en la BD
        return true;
    }

    public function eliminarTipoPañol(): bool {
        // Lógica para eliminar de la BD
        return true;
    }

    public function obtenerTipoPañol(int $idTipoPañol): ?TipoPañol {
        // Lógica para obtener un TipoPañol de la BD
        return null; // Simulación de no encontrado
    }

    public function listarTiposPañol(): array {
        // Lógica para listar todos los TiposPañol de la BD
        return []; // Simulación de lista vacía
    }
}
?>