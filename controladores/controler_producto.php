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

<<<<<<< HEAD
    public function agregar($Producto){

        $sql = "INSERT INTO Producto (id_categoria, Nombre, Descripción, Precio, Imagen, Estado)
         VALUES ( '{$Producto->getIdCategoria()}', '{$Producto->getNombre()}', '{$Producto->getDescripcion()}',
         '{$Producto->getPrecio()}', '{$Producto->getImagen()}', '{$Producto->getEstado()}')";

         $rs=$this->ejecutarSQL($sql); 

    }

=======
    public function insertar($Producto) {
        $sql = "INSERT INTO Producto (id_categoria, Nombre, Descripción, Precio, Imagen, Estado) 
        VALUES (
        '{$Producto->getIdCategoria()}',
        '{$Producto->getNombre()}',
        '{$Producto->getDescripcion()}',
        '{$Producto->getPrecio()}',
        '{$Producto->getImagen()}',
        '{$Producto->getEstado()}';";

        $rs = $this->ejecutarSQL($sql);

    }



>>>>>>> d80f3d0db938ee0131384d538f096b162bbf300a

}
