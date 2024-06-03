<?php
require_once("conexion.php");

class ProductosController extends Conexion {

    public function listar() {
        $sql = "SELECT id_producto, Nombre, Descripción, Precio, Imagen, Estado 
        FROM Producto 
        WHERE id_categoria=1 
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
         '{$Producto->getPrecio()}', '{$Producto->getImagen()}', '{$Producto->getEstado()}')";

         $rs=$this->ejecutarSQL($sql); 

    }


    public function delete($id){
        $sql = "DELETE FROM Producto WHERE id_producto = '{$id->getIdProducto()}'";
        $rs=$this->ejecutarSQL($sql);
    }


}
