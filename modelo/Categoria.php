<?php
class Categoria {
    private int $IdCategoria;
    private string $nombre;
    private string $descripcion;

    public function __construct(int $IdCategoria, string $nombre, string $descripcion) {
        $this->IdCategoria = $IdCategoria;
        $this->nombre = $nombre;
        $this->descripcion = $descripcion;
    }

    // getters y setters
    public function getIdCategoria(): int {
        return $this->IdCategoria;
    }

    public function setIdCategoria(int $IdCategoria): void {
        $this->IdCategoria = $IdCategoria;
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
  
    public function registrarCategoria(): bool {
        return true; 
    }

    public function actualizarCategoria(): bool {
        return true;
    }

    public function eliminarCategoria(): bool {
        return true;
    }

    public function listarCategoria(): array { 
        return [];
    }



}
?>