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
      
        return $pagina;
    }
}
