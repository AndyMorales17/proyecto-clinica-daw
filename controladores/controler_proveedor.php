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

    public function agregar($Proveedor){
        $sql = "INSERT INTO Proveedor (Nombre, Dirección, Teléfono)
                VALUES ('{$Proveedor->getNombre()}', '{$Proveedor->getDireccion()}', '{$Proveedor->getTelefono()}')";
    
        $rs = $this->ejecutarSQL($sql); 
    }
    

}