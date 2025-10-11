<?php
// Clase Reporte en sintaxis PHP
class Reporte {
    public int $idReporte;
    public string $tipoReporte;
    public string $descripcion;
    public int $curso;
    public int $comision;
    public int $profesor;
    public int $turno;
    public int $horario;
    public datetime $fechaReporte;
    public int $idUsuario;
    public int $idTipoPañol;

    public function __construct(int $idReporte, string $tipoReporte, string $descripcion, int $curso, int $comision, int $profesor, int $turno, int $horario, datetime $fechaReporte, int $idUsuario, int $idTipoPañol) {
        $this->idReporte = $idReporte;
        $this->tipoReporte = $tipoReporte;
        $this->descripcion = $descripcion;
        $this->curso = $curso;
        $this->comision = $comision;
        $this->profesor = $profesor;
        $this->turno = $turno;
        $this->horario = $horario;
        $this->fechaReporte = $fechaReporte;
        $this->idUsuario = $idUsuario;
        $this->idTipoPañol = $idTipoPañol;
    }

    // Getters y setters pueden agregarse si los necesitas
    public function getIdReporte(): int {
        return $this->idReporte;
    }

    public function getTipoReporte(): string {
        return $this->tipoReporte;
    }   

    public function getDescripcion(): string {
        return $this->descripcion;
    }   

    public function getCurso(): int {
        return $this->curso;
    }

    public function getComision(): int {
        return $this->comision;
    }

    public function getProfesor(): int {
        return $this->profesor;
    }

    public function getTurno(): int {
        return $this->turno;
    }

    public function getHorario(): int {
        return $this->horario;
    }

    public function getFechaReporte(): datetime {
        return $this->fechaReporte;
    }   

    public function getIdUsuario(): int {
        return $this->idUsuario;
    }           

    public function getIdTipoPañol(): int {
        return $this->idTipoPañol;
    }

    public function setIdReporte(int $idReporte): void {
        $this->idReporte = $idReporte;
    }

    public function setTipoReporte(string $tipoReporte): void {
        $this->tipoReporte = $tipoReporte;
    }

    public function setDescripcion(string $descripcion): void {
        $this->descripcion = $descripcion;
    }

    public function setCurso(int $curso): void {
        $this->curso = $curso;
    }

    public function setComision(int $comision): void {
        $this->comision = $comision;
    }   

    public function setProfesor(int $profesor): void {
        $this->profesor = $profesor;
    }

    public function setTurno(int $turno): void {
        $this->turno = $turno;
    }

    public function setHorario(int $horario): void {
        $this->horario = $horario;
    }

    public function setFechaReporte(datetime $fechaReporte): void {
        $this->fechaReporte = $fechaReporte;
    }

    public function setIdUsuario(int $idUsuario): void {
        $this->idUsuario = $idUsuario;
    }

    public function setIdTipoPañol(int $idTipoPañol): void {
        $this->idTipoPañol = $idTipoPañol;
    }


    // ---- Métodos para interactuar con la base de datos ----
    public function guardarReporte() {
        // Lógica para guardar el reporte en la BD
        return true; // simulacion de exito
    }
    public function actualizarReporte() {
        // Lógica para actualizar el reporte en la BD
        return true; // simulacion de exito
    }
    public function eliminarReporte() {
        // Lógica para eliminar el reporte de la BD
        return true; // simulacion de exito
    }
}
?>