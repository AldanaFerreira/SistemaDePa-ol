<?php
require_once ("Prestamo.php");

class Devolucion {
    private int $idDevolucion;
    private Prestamo $idPrestamo;
    private dateTime $fecha;
    private string $observaciones;
    private bool $devuelto;
    private bool $retrasado;


    public function __construct(int $idDevolucion, Prestamo $idPrestamo, dateTime $fecha, string $observaciones, bool $devuelto, bool $retrasado) {
        $this->idDevolucion = $idDevolucion;
        $this->idPrestamo = $idPrestamo;
        $this->fecha = $fecha;
        $this->observaciones = $observaciones;
        $this->devuelto = $devuelto;
        $this->retrasado = $retrasado;
    }

    //getters y setters
    public function getIdDevolucion(): int {
        return $this->idDevolucion;
    }   

    public function setIdDevolucion(int $idDevolucion): void {
        $this->idDevolucion = $idDevolucion;
    }

    public function getIdPrestamo(): Prestamo {
        return $this->idPrestamo;
    }

    public function setIdPrestamo(Prestamo $idPrestamo): void {
        $this->idPrestamo = $idPrestamo;
    }

    public function getFecha(): dateTime {
        return $this->fecha;
    }

    public function setFecha(dateTime $fecha): void {
        $this->fecha = $fecha;
    }

    public function getObservaciones(): string {
        return $this->observaciones;
    }

    public function setObservaciones(string $observaciones): void {
        $this->observaciones = $observaciones;
    }

    public function getDevuelto(): bool {
        return $this->devuelto;
    }

    public function setDevuelto(bool $devuelto): void {
        $this->devuelto = $devuelto;
    }

    public function getRetrasado(): bool {
        return $this->retrasado;
    }

    public function setRetrasado(bool $retrasado): void {
        $this->retrasado = $retrasado;
    }

    public function registrarDevolucion(Prestamo $idPrestamo, string $observaciones, bool $devuelto, bool $retrasado): bool {
        // logica para registrar la devolucion en la bd
        return true; // o false si falla
    }

    public function actualizarEstadoDevolucion(int $idDevolucion, bool $devuelto, bool $retrasado): bool {
        // logica para actualizar el estado de la devolucion en la bd
        return true; // o false si falla
    }

    public function verificarRetraso(): bool {
        return true; 
    }






}
?>