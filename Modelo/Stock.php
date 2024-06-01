<?php

Class Stock{

    Private $id_stock;
    Private $id_producto;
    private $Cantidad_stock;
    private $Estado;


    public function __construct($id_stock="",$id_pro="", $Cant_stock="",$Estado=""){

        $this -> $id_stock = $id_stock;
        $this -> $id_producto = $id_pro;
        $this -> $Cantidad_stock = $Cant_stock;
        $this -> $Estado = $Estado;

    }


        // getters
        public function getIdStock() {
            return $this->id_stock;
        }
    
        public function getIdProducto() {
            return $this->id_producto;
        }
    
        public function getCantidadStock() {
            return $this->Cantidad_stock;
        }
    
        public function getEstado() {
            return $this->Estado;
        }
    
        // setters
        public function setIdStock($id_stock) {
            $this->id_stock = $id_stock;
        }
    
        public function setIdProducto($id_prod) {
            $this->id_producto = $id_prod;
        }
    
        public function setCantidadStock($Cant_stock) {
            $this->Cantidad_stock = $Cant_stock;
        }
    
        public function setEstado($Estado) {
            $this->Estado = $Estado;
        }


}



?>