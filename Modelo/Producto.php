<?php

class Producto {

    private $id_producto;
    private $id_categoria;
    private $Nombre;
    private $Descripción;
    private $Precio;
    private $Imagen;
    private $Estado;

    public function __construct($id_prod = "", $id_cat = "", $Nom = "", $Des = "", $Pre = "", $Img = "", $Esta = "") {
        $this->id_producto = $id_prod;
        $this->id_categoria = $id_cat;
        $this->Nombre = $Nom;
        $this->Descripción = $Des;
        $this->Precio = $Pre;
        $this->Imagen = $Img;
        $this->Estado = $Esta;
    }

    // getters
    public function getIdProducto() {
        return $this->id_producto;
    }

    public function getIdCategoria() {
        return $this->id_categoria;
    }

    public function getNombre() {
        return $this->Nombre;
    }

    public function getDescripcion() {
        return $this->Descripción;
    }

    public function getPrecio() {
        return $this->Precio;
    }

    public function getImagen() {
        return $this->Imagen;
    }

    public function getEstado() {
        return $this->Estado;
    }

    // setters
    public function setIdProducto($id_prod) {
        $this->id_producto = $id_prod;
    }

    public function setIdCategoria($id_cat) {
        $this->id_categoria = $id_cat;
    }

    public function setNombre($Nom) {
        $this->Nombre = $Nom;
    }

    public function setDescripcion($Des) {
        $this->Descripción = $Des;
    }

    public function setPrecio($Pre) {
        $this->Precio = $Pre;
    }

    public function setImagen($Img) {
        $this->Imagen = $Img;
    }

    public function setEstado($Esta) {
        $this->Estado = $Esta;
    }
}

?>
