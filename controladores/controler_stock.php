<?php
require_once("conexion.php");

class ControllerStock extends Conexion {

    public function listar() {
        $sql = "SELECT s.id_stock, p.Nombre, s.Cantidad, s.Estado
        FROM Stock s
        INNER JOIN Producto p ON s.id_producto = p.id_producto";
        $rs = $this->ejecutarSQL($sql);
        $resultado = array();
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

}
?>
