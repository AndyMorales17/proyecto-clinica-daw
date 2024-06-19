<?php
require_once("conexion.php");

class ControllerCompras extends Conexion
{

    public function listar()
    {
        $sql = "SELECT c.id_compra, u.fullname AS usuario, p.nombre AS producto, c.Fecha, c.Cantidad, 
                         p.precio,
                       (c.Cantidad * p.precio) AS total
                FROM Compras c
                INNER JOIN Users u ON c.id_usuario = u.id
                INNER JOIN Producto p ON c.id_producto = p.id_producto;";
        $rs = $this->ejecutarSQL($sql);
        $resultado = array();
        while ($fila = $rs->fetch_assoc()) {
            $resultado[] = $fila;
        }

        return $resultado;
    }

}
?>
