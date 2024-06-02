<?php

class Stock {

    private $id_stock;
    private $id_producto;
    private $cantidad_stock;
    private $estado;

    public function __construct($id_stock = "", $id_producto = "", $cantidad_stock = "", $estado = "") {
        $this->id_stock = $id_stock;
        $this->id_producto = $id_producto;
        $this->cantidad_stock = $cantidad_stock;
        $this->estado = $estado;
    }

    // Getters
    public function getIdStock() {
        return $this->id_stock;
    }

    public function getIdProducto() {
        return $this->id_producto;
    }

    public function getCantidadStock() {
        return $this->cantidad_stock;
    }

    public function getEstado() {
        return $this->estado;
    }

    // Setters
    public function setIdStock($id_stock) {
        $this->id_stock = $id_stock;
    }

    public function setIdProducto($id_producto) {
        $this->id_producto = $id_producto;
    }

    public function setCantidadStock($cantidad_stock) {
        $this->cantidad_stock = $cantidad_stock;
    }

    public function setEstado($estado) {
        $this->estado = $estado;
    }
}

?>
