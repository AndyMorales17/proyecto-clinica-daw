<?php
class contenido
{

    public function mostra_archivo()
    {
        require_once("conexion.php");


        $url=isset($_GET["url"])? $_GET["url"]:null;
        $url=explode("/",$url);
        $id = end($url); 
        $pagina="";
        
        if($url[0]==null){
            $pagina="vistas/inicio.php";}
        elseif ($url[0] == "estado") {
                $pagina = "vistas/administrador/menuadmin";
        }elseif ($url[0] == "inicio") {
            $pagina = "vistas/inicio.php";
        }elseif ($url[0] == "servicios") {
            $pagina = "vistas/administrador/servicios.php";
        }elseif ($url[0] == "nosotros") {
            $pagina = "vistas/administrador/nosotros.php";
        }elseif ($url[0] == "contactos") {
            $pagina = "vistas/administrador/contactos.php";
        }
        return $pagina;
    }
}
