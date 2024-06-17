<?php

session_start();

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

require_once("vistas/administrador/index.php");


if(isset($_SESSION['Cliente'])){

}else{
    require_once("vistas/administrador.php");
}


?>

