<?php
require_once("conexion.php");

class ControllerStock extends Conexion {

    public function listar() {
        $sql = "SELECT s.id_stock, p.Nombre, s.Cantidad, s.Estado, c.Nombre AS Categoria
                FROM Stock s
                INNER JOIN Producto p ON s.id_producto = p.id_producto
                INNER JOIN Categoria c ON p.id_categoria = c.id_categoria";
    
        $rs = $this->ejecutarSQL($sql);
        $resultado = array(); // corrected line
        while ($fila = $rs->fetch_assoc()) {
            $resultado[] = $fila;
        }
    
        return $resultado;
    }

    public function agregar($Stock) {
        $sql = "INSERT INTO Stock (id_producto, Cantidad, Estado)
                VALUES ('{$Stock->getIdProducto()}', '{$Stock->getCantidadStock()}', '{$Stock->getEstado()}')";
        $rs = $this->ejecutarSQL($sql);
    }

    public function existeStock($id_producto) {
        $sql = "SELECT * FROM Stock WHERE id_producto = '$id_producto'";
        $rs = $this->ejecutarSQL($sql);
        return $rs->num_rows > 0;
    }

    public function cantidad($id, $cantidad) {
        $sql = "UPDATE Stock
        SET Cantidad = $cantidad
        WHERE id_stock = $id;";
        $rs = $this->ejecutarSQL($sql);

    }

    public function estado($id) {
        $sql = "UPDATE Stock
        SET Estado = 1
        WHERE id_stock = $id;";
        $rs = $this->ejecutarSQL($sql);

    }

    public function cero($id) {
        $sql = "UPDATE Stock
        SET Estado = 0
        WHERE id_stock = $id;";
        $rs = $this->ejecutarSQL($sql);

    } 
    public function stock($id_producto,$cantidad) {
        $sql = "UPDATE Stock 
                SET Cantidad = Cantidad - '$cantidad' 
                WHERE id_producto = '$id_producto'";
        $rs = $this->ejecutarSQL($sql);

    }    

}
?>
