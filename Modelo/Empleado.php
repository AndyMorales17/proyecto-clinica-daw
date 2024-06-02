<?php

class Empleado {

    private $id_empleado;
    private $nombre;
    private $apellido;
    private $direccion;
    private $telefono;
    private $carnet;
    private $correo;
    private $estado;

    public function __construct($id_emple = "", $nom = "", $ape = "", $dir = "", $tel = "", $car = "", $correo = "", $esta = "") {
        $this->id_empleado = $id_emple;
        $this->nombre = $nom;
        $this->apellido = $ape;
        $this->direccion = $dir;
        $this->telefono = $tel;
        $this->carnet = $car;
        $this->correo = $correo;
        $this->estado = $esta;
    }

    // Getters
    public function getIdEmpleado() {
        return $this->id_empleado;
    }

    public function getNombre() {
        return $this->nombre;
    }

    public function getApellido() {
        return $this->apellido;
    }

    public function getDireccion() {
        return $this->direccion;
    }

    public function getTelefono() {
        return $this->telefono;
    }

    public function getCarnet() {
        return $this->carnet;
    }

    public function getCorreo() {
        return $this->correo;
    }

    public function getEstado() {
        return $this->estado;
    }

    // Setters
    public function setIdEmpleado($id_emple) {
        $this->id_empleado = $id_emple;
    }

    public function setNombre($nom) {
        $this->nombre = $nom;
    }

    public function setApellido($ape) {
        $this->apellido = $ape;
    }

    public function setDireccion($dir) {
        $this->direccion = $dir;
    }

    public function setTelefono($tel) {
        $this->telefono = $tel;
    }

    public function setCarnet($car) {
        $this->carnet = $car;
    }

    public function setCorreo($correo) {
        $this->correo = $correo;
    }

    public function setEstado($esta) {
        $this->estado = $esta;
    }
}

?>
