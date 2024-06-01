<?php

Class Producto{

    Private $id_producto;
    Private $id_categoria;
    Private $Nombre;
    Private $Descripcion;
    Private $Precio;
    Private $Imagen;
    Private $Estado;


    public function __construct($id_prod="",$id_cat="",$Nom="",$Des="",$Pre="",$Img="",$Esta=""){

        $this -> $id_producto = $id_prod;
        $this -> $id_categoria = $id_cat;
        $this -> $Nombre = $Nom;
        $this -> $Descripcion = $Des;
        $this -> $Precio = $Pre;
        $this -> $Imagen = $Img;
        $this -> $Estado = $Esta;
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
            return $this->Descripcion;
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
            $this->Descripcion = $Des;
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