<?php

Class Proveedor{

    Private $id_proveedor;
    Private $Nombre;
    Private $Dirección;
    Private $Teléfono;



    public function __construct($id_prov="",$Nom="",$Dir="",$Tel=""){

        $this -> $id_proveedor= $id_prov;
        $this -> $Nombre= $Nom;
        $this -> $Dirección= $Dir;
        $this -> $Teléfono= $Tel;
    }


    //Getters

        // getters
        public function getIdProveedor() {
            return $this->id_proveedor;
        }
    
        public function getNombre() {
            return $this->Nombre;
        }
    
        public function getDirección() {
            return $this->Dirección;
        }
    
        public function getTeléfono() {
            return $this->Teléfono;
        }



          // setters
    public function setIdProveedor($id_prov) {
        $this->id_proveedor = $id_prov;
    }

    public function setNombre($Nom) {
        $this->Nombre = $Nom;
    }

    public function setDirección($Dir) {
        $this->Dirección = $Dir;
    }

    public function setTeléfono($Tel) {
        $this->Teléfono = $Tel;
    }


    }

    

?>