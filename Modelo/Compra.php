<?php

Class Compra{

    private $id_compra;
    private $id_cliente;
    private $id_producto;
    private $id_empleado;
    private $Fecha;
    private $Total;
    private $Cantidad;


    public function __construct($id_com="", $id_cli="", $id_pro="", $id_emple="", $Fecha="", $Total="", $Canti=""){

        $this -> $id_compra = $id_com;
        $this -> $id_cliente = $id_cli;
        $this -> $id_producto = $id_pro;
        $this -> $id_empleado = $id_emple;
        $this -> $Fecha = $Fecha;
        $this -> $Total = $Total;
        $this -> $Cantidad = $Canti;

    }


     // getters
     public function getIdCompra() {
        return $this->id_compra;
    }

    public function getIdCliente() {
        return $this->id_cliente;
    }

    public function getIdProducto() {
        return $this->id_producto;
    }

    public function getIdEmpleado() {
        return $this->id_empleado;
    }

    public function getFecha() {
        return $this->Fecha;
    }

    public function getTotal() {
        return $this->Total;
    }

    public function getCantidad() {
        return $this->Cantidad;
    }


        // setters
        public function setIdCompra($id_com) {
            $this->id_compra = $id_com;
        }
    
        public function setIdCliente($id_cli) {
            $this->id_cliente = $id_cli;
        }
    
        public function setIdProducto($id_pro) {
            $this->id_producto = $id_pro;
        }
    
        public function setIdEmpleado($id_emple) {
            $this->id_empleado = $id_emple;
        }
    
        public function setFecha($Fecha) {
            $this->Fecha = $Fecha;
        }
    
        public function setTotal($Total) {
            $this->Total = $Total;
        }
    
        public function setCantidad($Canti) {
            $this->Cantidad = $Canti;
        }


    

}

?>