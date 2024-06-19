<?php
require_once("conexion.php");

class ProductosController extends Conexion {
    

    public function listar($num) {
        $sql = "SELECT 
            p.id_producto, 
            p.Nombre, 
            p.Descripción, 
            p.Precio, 
            p.Imagen, 
            p.Estado,
            p.id_proveedor,
            p.id_categoria,
            pr.Nombre AS ProveedorNombre,
            c.Nombre AS CategoriaNombre
        FROM 
            Producto p
        INNER JOIN 
            Proveedor pr ON p.id_proveedor = pr.id_proveedor
        INNER JOIN 
            Categoria c ON p.id_categoria = c.id_categoria
        WHERE 
            p.id_categoria = $num
        ORDER BY 
            p.id_producto ASC;
        ";  
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
        $sql = "SELECT p.id_producto, p.Nombre, p.Descripción, p.Precio, p.Imagen, p.Estado,p.id_proveedor,
    p.id_categoria,
	c.Nombre AS CategoriaNombre, pr.Nombre AS ProveedorNombre
	FROM Producto p
	INNER JOIN Categoria c ON p.id_categoria = c.id_categoria
	INNER JOIN Proveedor pr ON p.id_proveedor = pr.id_proveedor; ";

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

    public function actualizar($Producto) {
        // Preparar la consulta SQL para actualizar el producto
        $sql = "UPDATE Producto SET 
        id_categoria = '{$Producto->getIdCategoria()}', 
        id_proveedor = '{$Producto->getIdProveedor()}',
        Nombre = '{$Producto->getNombre()}', 
        Descripción = '{$Producto->getDescripcion()}', 
        Precio = '{$Producto->getPrecio()}'";

        // Si se ha proporcionado una nueva imagen, agregarla a la consulta
        if ($Producto->getImagen() !== null) {
        $imagenBase64 = $Producto->getImagen();
        $sql .= ", Imagen = '{$imagenBase64}'";
        }
        
        // Finalizar la consulta con la condición WHERE
        $sql .= " WHERE id_producto = '{$Producto->getIdProducto()}'";
        
        // Ejecutar la consulta en la base de datos
        $rs = $this->ejecutarSQL($sql);

        
    }








}
