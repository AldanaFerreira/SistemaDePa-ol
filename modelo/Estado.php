<?php
class Estado {
    private int $idEstado;
    private bool $disponible;
    private bool $reparacion;
    private bool $prestada;
    private bool $deBaja;
    private bool $devuelto;
    private bool $retrasado;


    public function __construct(int $idEstado, bool $disponible, bool $reparacion, bool $prestada, bool $deBaja, bool $devuelto, bool $retrasado) {
        $this->idEstado = $idEstado;
        $this->disponible = $disponible;
        $this->reparacion = $reparacion;
        $this->prestada = $prestada;
        $this->deBaja = $deBaja;
        $this->devuelto = $devuelto;
        $this->retrasado = $retrasado;
    }

    //getters y setters
    public function getIdEstado(): int {
        return $this->idEstado;
    }   

    public function setEstado(int $idEstado): void {
        $this->idEstado = $idEstado;
    }

    public function getDisponible(): bool {
        return $this->disponible;
    }

    public function setDisponible(bool $disponible): void {
        $this->disponible = $disponible;
    }

    public function getReparacion(): bool {
        return $this->reparacion;
    }

    public function setReparacion(bool $reparacion): void {
        $this->reparacion = $reparacion;
    }

    public function getPrestada(): bool {
        return $this->prestada;
    }

    public function setPrestada(bool $prestada): void {
        $this->prestada = $prestada;
    }

    public function getDeBaja(): bool {
        return $this->deBaja;
    }

    public function setDeBaja(bool $deBaja): void {
        $this->deBaja = $deBaja;
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

    public function actualizarEstado(Herramienta $herramienta): bool {
        return true;
    }

    public function consultarEstado(int $idHerramienta): bool {
        return true;
    }





}
?>