<?php
require_once("conexion.php");

class controler_proveedor extends Conexion {

    public function listar() {
        $sql = "SELECT *
        FROM Proveedor ";  
        $rs = $this->ejecutarSQL($sql);
        $resultado = array();
        while ($fila = $rs->fetch_assoc()) {
            $resultado[] = $fila;
        }

        return $resultado;
    }



}