<?php
class contenido
{

    public function mostra_archivo()
    {
        require_once("conexion.php");


        $url = isset($_GET["url"]) ? $_GET["url"] : null;
        $url = explode("/", $url);
        $id = end($url);
        $pagina = "";
        
        if($url[0]==null){
            $pagina="vistas/inicio.php";}
        elseif ($url[0] == "estado") { 
                $pagina = "vistas/administrador/menuadmin";
        }elseif ($url[0] == "inicio") {
            $pagina = "vistas/inicio.php";
        }elseif ($url[0] == "categoria") {
            $pagina = "vistas/administrador/categoria.php";
        }elseif ($url[0] == "nosotros") {
            $pagina = "vistas/administrador/nosotros.php";
        }elseif ($url[0] == "contactos") {
            $pagina = "vistas/administrador/contactos.php";
        }
        elseif ($url[0] == "productos") {
            $pagina = "vistas/administrador/productos/productos.php";
        }
        elseif ($url[0] == "producto2") {
            $pagina = "vistas/administrador/productos/producto2.php";
        }
        elseif ($url[0] == "producto3") {
            $pagina = "vistas/administrador/productos/producto3.php";
        }
        elseif ($url[0] == "producto4") {
            $pagina = "vistas/administrador/productos/producto4.php";
        }
        elseif ($url[0] == "producto5") {
            $pagina = "vistas/administrador/productos/producto5.php";
        }
        elseif ($url[0] == "producto6") {
            $pagina = "vistas/administrador/productos/producto6.php";
        }
        elseif ($url[0] == "todos") {
            $pagina = "vistas/administrador/productos/productotodos.php";
        }
        elseif($url[0] == "guarda"){
            $pagina = "vistas/administrador/guarda.php";
        }elseif ($url[0] == "proveedores") {
            $pagina = "vistas/administrador/proveedores.php";
        }
        elseif($url[0] == "login"){
            $pagina = "vistas/login.php";
        }
        elseif($url[0] == "stock"){
            $pagina = "vistas/administrador/stock.php";
        }
        elseif ($url[0] == "categoria2") { 
            $pagina = "vistas/Cliente/categoria.php";
        }elseif ($url[0] == "todos2") {
            $pagina = "vistas/Cliente/productotodos.php";
        }elseif($url[0] == "carrito"){
                $pagina = "vistas/Cliente/carrito.php";
        }
        return $pagina;
    }
}
