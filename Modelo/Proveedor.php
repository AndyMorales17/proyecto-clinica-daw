<?php

class Proveedor {

    private $id_proveedor;
    private $Nombre;
    private $Direccion;
    private $Telefono;

    public function __construct($id_prov = "", $Nom = "", $Dir = "", $Tel = "") {
        $this->id_proveedor = $id_prov;
        $this->Nombre = $Nom;
        $this->Direccion = $Dir;
        $this->Telefono = $Tel;
    }

    // Getters
    public function getIdProveedor() {
        return $this->id_proveedor;
    }

    public function getNombre() {
        return $this->Nombre;
    }

    public function getDireccion() {
        return $this->Direccion;
    }

    public function getTelefono() {
        return $this->Telefono;
    }

    // Setters
    public function setIdProveedor($id_prov) {
        $this->id_proveedor = $id_prov;
    }

    public function setNombre($Nom) {
        $this->Nombre = $Nom;
    }

    public function setDireccion($Dir) {
        $this->Direccion = $Dir;
    }

    public function setTelefono($Tel) {
        $this->Telefono = $Tel;
    }
}

?>
