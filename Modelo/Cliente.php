<?php

class Cliente {

    private $id_cliente;
    private $nombre;
    private $apellido;
    private $email;
    private $estado;
    private $telefono;
    private $direccion;

    // Constructor
    public function __construct($id_cli = "", $nom = "", $ape = "", $em = "", $esta = "", $tel = "", $dir = "") {
        $this->id_cliente = $id_cli;
        $this->nombre = $nom;
        $this->apellido = $ape;
        $this->email = $em;
        $this->estado = $esta;
        $this->telefono = $tel;
        $this->direccion = $dir;
    }

    // Getters
    public function getIdCliente() {
        return $this->id_cliente;
    }

    public function getNombre() {
        return $this->nombre;
    }

    public function getApellido() {
        return $this->apellido;
    }

    public function getEmail() {
        return $this->email;
    }

    public function getEstado() {
        return $this->estado;
    }

    public function getTelefono() {
        return $this->telefono;
    }

    public function getDireccion() {
        return $this->direccion;
    }

    // Setters
    public function setIdCliente($id_cli) {
        $this->id_cliente = $id_cli;
    }

    public function setNombre($nom) {
        $this->nombre = $nom;
    }

    public function setApellido($ape) {
        $this->apellido = $ape;
    }

    public function setEmail($em) {
        $this->email = $em;
    }

    public function setEstado($esta) {
        $this->estado = $esta;
    }

    public function setTelefono($tel) {
        $this->telefono = $tel;
    }

    public function setDireccion($dir) {
        $this->direccion = $dir;
    }
}

?>
