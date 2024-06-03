<?php

require_once("controladores/conexion.php");

$id_categoria = $connect->real_escape_string($_POST['idcategoria']);
$nombre = $connect->real_escape_string($_POST['nombre']);
$descripcion = $connect->real_escape_string($_POST['descripcion']);
$precio = $connect->real_escape_string($_POST['precio']);
$estado = $connect->real_escape_string($_POST['estado']);



$sql = "INSERT INTO Producto (id_categoria, Nombre, Descripción, Precio, Imagen, Estado)
VALUES ( $id_categoria,'$nombre', '$descripcion', '$precio', '$estado' );"
 $rs= $this->ejecutarSQL($sql);

 if ($rs == 1) {
    echo "Se ha insertado correctamente";
 }else{
    echo "Error al insertar";
 }
?>