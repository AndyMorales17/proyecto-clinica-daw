<?php
require_once("conexion.php");

class ProductosController extends Conexion {
    

    public function listar($num) {
        $sql = "SELECT id_producto, Nombre, Descripción, Precio, Imagen, Estado, id_proveedor,id_categoria 
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

    public function proveedor() {
        $sql = "SELECT *
        FROM Proveedor ";  
        $rs = $this->ejecutarSQL($sql);
        $resultado = array();
        while ($fila = $rs->fetch_assoc()) {
            $resultado[] = $fila;
        }

        return $resultado;
    }



    public function agregar($Producto){

        $sql = "INSERT INTO Producto (id_categoria, id_proveedor, Nombre, Descripción, Precio, Imagen, Estado)
        VALUES ('{$Producto->getIdCategoria()}', '{$Producto->getIdProveedor()}', '{$Producto->getNombre()}',
                '{$Producto->getDescripcion()}', '{$Producto->getPrecio()}', '{$Producto->getImagen()}', '{$Producto->getEstado()}')";

$rs = $this->ejecutarSQL($sql);

    }


    public function delete($id){
        $sql = "DELETE FROM Producto WHERE id_producto = $id";
        $rs=$this->ejecutarSQL($sql);
    }
    
    public function todos() {
        $sql = "SELECT id_producto, Nombre, Descripción, Precio, Imagen, Estado,id_proveedor,id_categoria 
        FROM Producto ";  
        $rs = $this->ejecutarSQL($sql);
        $resultado = array();
        while ($fila = $rs->fetch_assoc()) {
            $resultado[] = $fila;
        }

        return $resultado;
    }
    public function categoria(){

        $sql = "SELECT id_categoria,Nombre
        FROM Categoria ";  
        $rs = $this->ejecutarSQL($sql);
        $resultado = array();
        while ($fila = $rs->fetch_assoc()) {
            $resultado[] = $fila;
        }

        return $resultado;

    }








}
