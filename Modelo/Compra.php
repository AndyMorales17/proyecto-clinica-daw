<?php

class Compra {

    private $id_compra;
    private $id_cliente;
    private $id_producto;
    private $id_empleado;
    private $fecha;
    private $total;
    private $cantidad;

    public function __construct($id_com = "", $id_cli = "", $id_pro = "", $id_emple = "", $fecha = "", $total = "", $cantidad = "") {
        $this->id_compra = $id_com;
        $this->id_cliente = $id_cli;
        $this->id_producto = $id_pro;
        $this->id_empleado = $id_emple;
        $this->fecha = $fecha;
        $this->total = $total;
        $this->cantidad = $cantidad;
    }

    // Getters
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
        return $this->fecha;
    }

    public function getTotal() {
        return $this->total;
    }

    public function getCantidad() {
        return $this->cantidad;
    }

    // Setters
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

    public function setFecha($fecha) {
        $this->fecha = $fecha;
    }

    public function setTotal($total) {
        $this->total = $total;
    }

    public function setCantidad($cantidad) {
        $this->cantidad = $cantidad;
    }
}

?>
