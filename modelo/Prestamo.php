<?php
require_once ("Prestamo.php");
require_once ("Usuario.php");
require_once ("Herramienta.php");
require_once ("Estado.php");


class Prestamo {
    private Prestamo $idPrestamo;
    private dateTime $fechaDevolucion;
    private Usuario $usuario;
    private Herramienta $herramienta;
    private Estado $idEstado;


    public function __construct(int $idPrestamo, dateTime $fechaDevolucion, Usuario $usuario, Herramienta $herramienta, Estado $idEstado) {
        $this->idPrestamo = $idPrestamo;
        $this->fechaDevolucion = $fechaDevolucion;
        $this->usuario = $usuario;
        $this->herramienta = $herramienta;
        $this->idEstado = $idEstado;
    }

    //getters y setters
    public function getIdPrestamo(): int {
        return $this->idPrestamo;
    }

    public function setIdPrestamo(int $idPrestamo): void {
        $this->idPrestamo = $idPrestamo;
    }

    public function getFechaDevolucion(): dateTime {
        return $this->fechaDevolucion;
    }

    public function setFechaDevolucion(dateTime $fechaDevolucion): void {
        $this->fechaDevolucion = $fechaDevolucion;
    }

    public function getUsuario(): Usuario {
        return $this->usuario;
    }

    public function setUsuario(Usuario $usuario): void {
        $this->usuario = $usuario;
    }

    public function getHerramienta(): Herramienta {
        return $this->herramienta;
    }

    public function setHerramienta(Herramienta $herramienta): void {
        $this->herramienta = $herramienta;
    }

    public function getIdEstado(): Estado {
        return $this->idEstado;
    }

    public function setIdEstado(Estado $idEstado): void {
        $this->idEstado = $idEstado;
    }

    public function registrarPrestamo(Usuario $usuario, Herramienta $herramienta): bool {
        // logica para registrar el prestamo en la bd
        return true; // Retorna true si el registro fue exitoso
    }

    public function actualizarPrestamo(): bool {
        return true;
    }

    public function finalizarPrestamo(): bool {
        return true; 
    }

    public function consultarPrestamo(int $idPrestamo): bool {
        return true;
     }


}
?>