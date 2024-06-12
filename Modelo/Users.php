<?php

Class Users {

    private $id;
    private $usuario;
    private $contraseña;
    private $id_rol;
    private $fullname;
    private $direccion;
    private $telefono;
    private $correo;

    public function __construct($id="", $usuario="", $contraseña="", $id_rol="", $fullname="", $direccion="", $telefono="", $correo=""){
        $this->id = $id;
        $this->usuario = $usuario;
        $this->contraseña = $contraseña;
        $this->id_rol = $id_rol;
        $this->fullname = $fullname;
        $this->direccion = $direccion;
        $this->telefono = $telefono;
        $this->correo = $correo;

    }

      // getters
  public function getId() {
    return $this->id;
  }

  public function getUsuario() {
    return $this->usuario;
  }

  public function getContraseña() {
    return $this->contraseña;
  }

  public function getIdRol() {
    return $this->id_rol;
  }

  public function getFullname() {
    return $this->fullname;
  }

  public function getDireccion() {
    return $this->direccion;
  }

  public function getTelefono() {
    return $this->telefono;
  }

  public function getCorreo() {
    return $this->correo;
  }

  // setters
  public function setId($id) {
    $this->id = $id;
  }

  public function setUsuario($usuario) {
    $this->usuario = $usuario;
  }

  public function setContraseña($contraseña) {
    $this->contraseña = $contraseña;
  }

  public function setIdRol($id_rol) {
    $this->id_rol = $id_rol;
  }

  public function setFullname($fullname) {
    $this->fullname = $fullname;
  }

  public function setDireccion($direccion) {
    $this->direccion = $direccion;
  }

  public function setTelefono($telefono) {
    $this->telefono = $telefono;
  }

  public function setCorreo($correo) {
    $this->correo = $correo;
  }




}
?>