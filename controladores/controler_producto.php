<?php
require_once("conexion.php");

class ProductosController extends Conexion {

    public function listar($num) {
        $sql = "SELECT id_producto, Nombre, Descripción, Precio, Imagen, Estado 
        FROM Producto 
        WHERE id_categoria=$num 
        ORDER BY id_producto 
        ASC";  
        $rs = $this->ejecutarSQL($sql);
        $resultado = array();
        while ($fila = $rs->fetch_assoc()) {
            $resultado[] = $fila;
        }

        return $resultado;
    }

    public function agregar($Producto){

        $sql = "INSERT INTO Producto (id_categoria, Nombre, Descripción, Precio, Imagen, Estado)
         VALUES ( '{$Producto->getIdCategoria()}', '{$Producto->getNombre()}', '{$Producto->getDescripcion()}',
         '{$Producto->getPrecio()}', '{$Producto->getImagen()}', 'Activo')";

         $rs=$this->ejecutarSQL($sql); 

    }


    public function delete($id){
        $sql = "DELETE FROM Producto WHERE id_producto = $id";
        $rs=$this->ejecutarSQL($sql);
    }
    
    public function todos() {
        $sql = "SELECT id_producto, Nombre, Descripción, Precio, Imagen, Estado 
        FROM Producto ";  
        $rs = $this->ejecutarSQL($sql);
        $resultado = array();
        while ($fila = $rs->fetch_assoc()) {
            $resultado[] = $fila;
        }

        return $resultado;
    }
    public function proveedor(){

        $sql = "SELECT id_proveedor,Nombre
        FROM Proveedor ";  
        $rs = $this->ejecutarSQL($sql);
        $resultado = array();
        while ($fila = $rs->fetch_assoc()) {
            $resultado[] = $fila;
        }

        return $resultado;

    }


}
