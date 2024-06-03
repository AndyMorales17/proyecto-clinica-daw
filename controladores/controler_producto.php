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

    public function agregar($producto){

        $sql = "INSERT INTO Producto (id_categoria, Nombre, Descripción, Precio, Imagen, Estado)
         VALUES ( '{$producto->getIdCategoria()}', '{$producto->getNombre()}', '{$producto->getDescripcion()}',
         '{$producto->getPrecio()}', '{$producto->getImagen()}', '{$producto->getEstado()}')";

         $rs=$this->ejecutarSQL($sql); 

    }


}
