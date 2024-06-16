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

    public function eliminar($id){
        $sql = "DELETE FROM Proveedor WHERE id_proveedor = $id";
        $rs=$this->ejecutarSQL($sql);
    }

    public function actualizar($Proveedor) {
            $id_proveedor = $Proveedor->getIdProveedor();
            $nombre = $Proveedor->getNombre();
            $direccion = $Proveedor->getDireccion();
            $telefono = $Proveedor->getTelefono();
    
            $sql = "UPDATE Proveedor SET Nombre = '$nombre', Dirección = '$direccion', Teléfono = '$telefono'
                    WHERE id_proveedor = $id_proveedor";
            $rs=$this->ejecutarSQL($sql);
    
    }

    

}