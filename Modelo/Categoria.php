<?php

Class Categoria{

    Private $id_categoria;
    Private $Nombre;
    Private $Descripcion;


    public function __construct($id_cat="",$Nom="",$Des=""){

        $this -> $id_categoria = $id_cat;
        $this -> $Nombre = $Nom;
        $this -> $Descripcion = $Des;
    }


        // getters
        public function getIdCategoria() {
            return $this->id_categoria;
        }
    
        public function getNombre() {
            return $this->Nombre;
        }
    
        public function getDescripcion() {
            return $this->Descripcion;
        }
    
        // setters
        public function setIdCategoria($id_cat) {
            $this->id_categoria = $id_cat;
        }
    
        public function setNombre($Nom) {
            $this->Nombre = $Nom;
        }
    
        public function setDescripcion($Des) {
            $this->Descripcion = $Des;
        }



}

?>