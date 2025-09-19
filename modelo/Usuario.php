<?php
class Usuario {
    private int $idUsuario;
    private string $dni;
    private string $email;
    private string $password;
    private string $nombre;
    private string $apellido;


    public function __construct(int $idUsuario, string $dni, string $email, string $password, string $nombre, string $apellido) {
        $this->idUsuario = $idUsuario;
        $this->dni = $dni;
        $this->email = $email;
        $this->password = $password;
        $this->nombre = $nombre;
        $this->apellido = $apellido;
    }

    //getters y setters

    public function getIdUsuario(): int {
        return $this->idUsuario;
    }

    public function setIdUsuario(int $idUsuario): void {
        $this->idUsuario = $idUsuario;
    }

    public function getDni(): string {
        return $this->dni;
    }

    public function setDni(string $dni): void {
        $this->dni = $dni;
    }

    public function getEmail(): string {
        return $this->email;
    }

    public function setEmail(string $email): void {
        $this->email = $email;
    }

    public function getPassword(): string {
        return $this->password;
    }

    public function setPassword(string $password): void {
        $this->password = $password;
    }

    public function getNombre(): string {
        return $this->nombre;
    }

    public function setNombre(string $nombre): void {
        $this->nombre = $nombre;
    }

    public function getApellido(): string {
        return $this->apellido;
    }

    public function setApellido(string $apellido): void {
        $this->apellido = $apellido;
    }

    public function registrarUsuario(): bool {
        // aca iría la lógica para registrar el usuario en la db
        return true; // simulacion de exito
    }

    public function iniciarSesion(string $email, string $password): bool {
        // aca iría la lógica para iniciar sesion
        return true; // simulacion de exito
    }

    public function actualizarDatos(): bool {

        return true; 
    }

    public function eliminarUsuario(): bool {
        
        return true; 
    }

}
?>