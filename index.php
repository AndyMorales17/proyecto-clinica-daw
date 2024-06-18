<?php

session_start();
//session_destroy();

if (!defined("URL")) define("URL", "http://localhost/proyecto-clinica-daw/");

require_once("controladores/contenido.php");


require_once("controladores/controler_producto.php"); 
require_once("Modelo/Producto.php"); 

require_once("Modelo/Proveedor.php");
require_once("controladores/controler_proveedor.php");

require_once("controladores/controle_categoria.php");
require_once("Modelo/Categoria.php");

require_once("Modelo/Users.php");
require_once("controladores/login_controller.php");

require_once("Modelo/Stock.php");
require_once("controladores/controler_stock.php");

if (isset($_SESSION['usuario'])){
    if (isset($_SESSION['id_rol'])) {
        $id_rol = $_SESSION['id_rol'];
    
        // Ejemplo de uso del rol
        if ($id_rol == 1) {
            require_once("vistas/Cliente/index.php");
        } elseif ($id_rol == 2) {
            require_once("vistas/administrador/index.php");
        } else {
            echo "<script>alert('No funciona');</script>";
        }
    }
}else{
require_once("vistas/login.php");
}


?>

